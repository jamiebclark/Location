<?php
class MappableBehavior extends ModelBehavior {
	var $name = 'Mappable';
	
	function setup(Model &$Model, $settings = array()) {
		$Model->bindModel(array(
			'belongsTo' => array(
				'State' => array(
					'className' => 'Location.State',
					'foreignKey' => 'state',
				),
				'Country' => array(
					'className' => 'Location.Country',
					'foreignKey' => 'country',
				)
			)
		), false);
	}
}