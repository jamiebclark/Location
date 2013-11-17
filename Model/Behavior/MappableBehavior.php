<?php
class MappableBehavior extends ModelBehavior {
	var $name = 'Mappable';
	
	function setup(Model $Model, $settings = array()) {
		$default = array(
			'validate' => false,
			//'google' => false, TODO: Add Google Location Saving
			'location' => true,
			'timezone' => false,
			
			//Database fields
			'addlineField' => 'addline',
			'addlineCount' => 2,
			'cityField' => 'city',
			'stateField' => 'state',
			'zipField' => 'zip',
			'countryField' => 'country',
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
				$this->mappableValidate($Model, $field, 'notEmpty', $message);
			}
		}
	}
	
	function mappableValidate($Model, $field, $rule, $message = null) {
		if (isset($Model->validate[$field])) {
			if (!is_array($Model->validate[$field])) {
				$Model->validate[$field] = array($Model->validate[$field]);
			}
		} else {
			$Model->validate[$field] = array();
		}
		$Model->validate[$field][] = compact('rule', 'message');
		return true;
	}
}