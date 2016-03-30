<?php
App::uses('GoogleMaps', 'Location.Lib');
class MappableBehavior extends ModelBehavior {
	public $name = 'Mappable';
	
	public function setup(Model $Model, $settings = array()) {
		$default = array(
			'validate' => false,			//Validate address fields
			'location' => true,				//Link to State and Country tables
			'timezone' => false,			//Link to Timezone table
			'geocode' => false,				//If true, checks Google Geocoding on address update
			
			//Database fields
			'addlineField' => 'addline',	//Base Address Field
			'addlineCount' => 2,			//How many address lines there are
			'cityField' => 'city',			//City Field
			'stateField' => 'state',		//State Field
			'zipField' => 'zip',			//Zip Code Field
			'countryField' => 'country',	//Country Field
		);
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = $default;
		}
		$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], (array) $settings);
		
		$settings =& $this->settings[$Model->alias];
		extract($settings);
		
		//Binds to location models
		$belongsTo = array();
		if (!empty($settings['location'])) {
			$joins = array('State' => $stateField, 'Country' => $countryField);
			foreach ($joins as $joinModel => $foreignKey):
				if (
					$settings['location'] === true || 
					(is_array($settings['location']) && in_array($joinModel, $settings['location'])) ||
					$settings['location'] == $joinModel
				) {
					$belongsTo[$joinModel] = array('className' => 'Location.' . $joinModel) + compact('foreignKey');
				}
			endforeach;
		}
		
		if ($settings['timezone']) {
			$belongsTo['Timezone'] = array(
				'className' => 'Location.Timezone', 
				'foreignKey' => 'timezone_id'
			);
			ClassRegistry::init('Location.Timezone')->bindModel(array('hasMany' => array($Model->alias)), false);
		}
		$Model->bindModel(compact('belongsTo'), false);
		
		if ($validate) {
			$fields = array(
				$addlineField . '1' => 'Please enter an address',
				$cityField => 'Please enter a city',
				$stateField => 'Please enter a state',
				$zipField => 'Please enter a zip code',
				$countryField => 'Please select a country',
			);
			foreach ($fields as $field => $message) {
				if (empty($field)) {
					continue;
				}
				$this->mappableValidate($Model, $field, 'notBlank', $message);
			}
		}
	}
	
	public function afterSave(Model $Model, $created = false, $options = array()) {
		if (!empty($this->settings[$Model->alias]['geocode'])) {
			$this->setGoogleLocation($Model);
		}
		return parent::afterSave($Model, $created, $options);
	}
	
	public function setGoogleLocation(Model $Model) {
		if (!empty($Model->data[$Model->alias])) {
			$data =& $Model->data[$Model->alias];
		} else {
			$data =& $Model->data;
		}

		$vals = array('lat', 'lon', 'geocode_valid');
		$vals = array_combine($vals, array(null, null, false));

		if (!empty($data['state'])) {
			$keys = array('addline1', 'city', 'state', 'zip', 'country');
			$address = '';
			foreach ($keys as $key) {
				if (!empty($data[$key])) {
					$address .= $data[$key] . ' ';
				}
			}
			if ($geocode = GoogleMaps::geocode($address)) {
				$vals['geocode_valid'] = true;
				$vals['lat'] = $geocode['lat'];
				$vals['lon'] = $geocode['lon'];
				$vals['map_valid'] = $geocode['mapping_valid'];
				$vals['mail_valid'] = $geocode['mailing_valid'];
			}
		}
		$setData = array();
		foreach ($vals as $field => $val) {
			$field = $this->getSettingField($Model, $field, 'geocode');
			if ($Model->schema($field)) {
				$setData[$Model->escapeField($field)] = $val;
			}
		}
		
		/*
		//This has been removed after geocode v 3
		if ($Model->schema('geocode_accuracy')) {
			$setData[$Model->escapeField('geocode_accuracy')] = $geocode['accuracy'];
		}
		*/
		if (!empty($setData)) {
			$Model->updateAll($setData, array($Model->escapeField($Model->primaryKey) => $Model->id));
		}
		return true;
	}
	
	public function validateMapAddress($Model, $result, $prefix = null) {
		$addressString = $this->getMapAddressString($Model, $result, false, $prefix);
		return !empty($addressString) ? GoogleMaps::validate($addressString, GoogleMaps::MAILING) : null;
	}
	
	/**
	 * Parses the address from a result
	 *
	 * @param Model $Model Model using the behavior
	 * @param Array $result The single-value result array from a database query
	 * @param bool $full If true pulls every database field with a counter (more than likely just addline), 
	 *  	if false only pulls the first
	 * @param string $prefix Optional additional prefix to add to each database field
	 *
	 * @return Array The passed $result with only the address fields present
	 **/
	public function getMapAddress(Model $Model, $result, $full = false, $prefix = null) {
		$address = array();
		$settings = $this->settings[$Model->alias];
		$keys = array('addline', 'city', 'state', 'zip', 'country');
		foreach ($keys as $key) {
			if (!($address = $this->getMapAddressKey($Model, $result, $address, $key, $full, $prefix))) {
				return null;
			}
		}
		return $address;
	}
	
	/**
	 * Finds a string representation of the address passed in a Model result
	 *
	 * @param Model $Model Model using the behavior
	 * @param Array $result The single-value result array from a database query
	 * @param bool $full If true pulls every database field with a counter (more than likely just addline), 
	 *  	if false only pulls the first
	 * @param string $prefix Optional additional prefix to add to each database field
	 * 
	 * @return string Address string if valid, a blank string if false
	 **/
	public function getMapAddressString(Model $Model, $result, $full = false, $prefix = null) {
		if ($address = $this->getMapAddress($Model, $result, $full, $prefix)) {
			return implode(', ', $address);
		} else {
			return '';
		}
	}

	/**
	 * Find a database field key in a result array based on the behavior settings
	 *
	 * @param Model $Model Model using the behavior
	 * @param Array $result The single-value result array from a database query
	 * @param Array $address The array where the current information is being stored
	 * @param string $key The database field key. This will be checked against the settings for a user-defined value
	 * @param bool $full If true pulls every database field with a counter (more than likely just addline), 
	 *  	if false only pulls the first
	 * @param string $prefix Optional additional prefix to add to each database field
	 * 
	 * @return Array Maniupulated $address array
	 **/
	private function getMapAddressKey($Model, $result, $address, $key, $full, $prefix) {
		$settings = $this->settings[$Model->alias];
		if (isset($settings[$key . 'Field'])) {
			$field = $settings[$key . 'Field'];
			if (!empty($prefix)) {
				$field = "$prefix$field";
			}
			if (isset($settings[$key . 'Count']) && $settings[$key . 'Count'] > 0) {
				$count = !$full ? 1 : $settings[$key . 'Count'];					
				for ($i = 1; $i <= $count; $i++) {
					$countField = $field . $i;
					if (!empty($result[$countField])) {
						$val = $result[$countField];
					} else if ($i == 1) {
						return null;
					} else {
						$val = null;
					}
					$address[$countField] = $val;
				}
			} else {
				if (empty($result[$field])) {
					return null;
				} else {
					$address[$field] = $result[$field];
				}
			}				
		}
		return $address;
	}
	
	function mappableValidate($Model, $field, $rule, $message = null) {
		if (isset($Model->validate[$field])) {
			if (!is_array($Model->validate[$field])) {
				$Model->validate[$field] = array($Model->validate[$field]);
			}
		} else {
			$Model->validate[$field] = array();
		}
		$Model->validate[$field][] = compact('rule', 'message') + array('required' => 1);
		return true;
	}
	
	/**
	 * Allows you to specify a custom field name in the settings
	 *  array('varName' => 'customField') 
	 * Returns "customField"
	 *  array('varName') or array('varName' => true)
	 * Returns "varName";
	 **/
	private function getSettingField($Model, $field, $subKey = null) {
		if (!empty($subKey)) {
			if (!isset($this->settings[$Model->alias][$subKey])) {
				return $field;
			} else {
				$settings = $this->settings[$Model->alias][$subKey];
			}
		} else {
			$settings = $this->settings[$Model->alias];
		}
		if (!is_array($settings) || !isset($settings[$field]) || $settings[$field] === true) {
			return $field;
		} else {
			return $settings[$field];
		}
	}	
}