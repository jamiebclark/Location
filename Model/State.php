<?php
class State extends LocationAppModel {
	var $name = 'State';
	var $actsAs = array('Location.SelectList');
	var $belongsTo = array('Location.Country');
	
	function selectListCondensed($options = array()) {
		$options = array_merge(array(
			'value' => $this->alias . '.id',
			'optGroup' => 'Country.title',
			'blankMessage' => '--',
		), $options);
		return $this->selectList($options);
	}
}
