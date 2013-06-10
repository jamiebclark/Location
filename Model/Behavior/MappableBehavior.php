<?php
class MappableBehavior extends ModelBehavior {
	var $name = 'Mappable';
	
	function setup(Model &$Model, $settings = array()) {
		$default = array(
			'validate' => false,
			'google' => false,
			'location' => true,
			'timezone' => false,
		);
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = $default;
		}
		$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], (array) $settings);
		
		$settings =& $this->settings[$Model->alias];
		//Binds to location models
		$belongsTo = array();
		if ($settings['location']) {
			$belongsTo += array(
				'State' => array(
					'className' => 'Location.State',
					'foreignKey' => 'state',
				),
				'Country' => array(
					'className' => 'Location.Country',
					'foreignKey' => 'country',
				),
			);
		}
		if ($settings['timezone']) {
			$belongsTo['Timezone'] = array(
				'className' => 'Location.Timezone', 
				'foreignKey' => 'timezone_id'
			);
			ClassRegistry::init('Location.Timezone')->bindModel(array('hasMany' => array($Model->alias)), false);
		}
		$Model->bindModel(compact('belongsTo'), false);
	}
}