<?php
class Country extends LocationAppModel {
	var $name = 'Country';
	var $actsAs = array('Location.SelectList' => array(
			'blank' => true,
			'key' => 'Country.id',
			'value' => 'CONCAT(Country.id, " - ",Country.title)'
		)
	);
	var $hasMany = array('Location.State');

	function selectListCondensed($options = array()) {
		$options = array_merge(array(
			'blankMessage' => '--',
			'value' => $this->alias . '.id',
		), $options);
		return $this->selectList($options);
	}
}
