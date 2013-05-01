<?php
class Timezone extends LocationAppModel {
	var $name = 'Timezone';	
	var $recursive = -1;
	
	function findId($timezoneStr = null) {
		//Finds user's timezone
		if (empty($timezoneStr)) {
			$timezoneStr = date_default_timezone_get();
		}
		$timezone = $this->find('first', array(
			'recursive' => -1,
			'fields' => array(
				$this->alias . '.id'
			),
			'conditions' => array(
				$this->alias . '.title' => $timezoneStr
			)
		));
		
		if ($timezone) {
			return $timezone[$this->alias]['id'];
		} else {
			return false;
		}
	}
}
