<?php
class Timezone extends LocationAppModel {
	var $name = 'Timezone';	
	var $recursive = -1;
	
	private $shortcuts = array(
		-8 => 'Pacific Time',
		-7 => 'Mountain Time',
		-6 => 'Central Time',
		-5 => 'Eastern Time',
		-4 => 'Atlantic Time',
	);

	function findId($timezoneStr = null) {
		//Finds user's timezone
		if (empty($timezoneStr)) {
			$timezoneStr = date_default_timezone_get();
		}
		$timezone = $this->find('first', array(
			'recursive' => -1,
			'fields' => array($this->alias . '.id'),
			'conditions' => array($this->alias . '.title' => $timezoneStr)
		));
		
		if ($timezone) {
			return $timezone[$this->alias]['id'];
		} else {
			return false;
		}
	}
	
	function selectList() {
		$result = $this->find('all');
		$return = array();
		foreach($result as $row) {
			$row = $row[$this->alias];
			$titles = explode('/', $row['title']);
			if (count($titles) == 1) {
				$title = $row['title'];
				$category = '';
			} else {
				$category = array_shift($titles);
				$title = implode('/', $titles);
			}
			if (!empty($row['abbr'])) {
				$category = 'Shortcuts';
				$title = $row['abbr'];
			}
			$return[$category][$row['id']] = $title;
		}
		return $return;
	}
	/*
	function generate() {
		$config = $this->getDataSource()->config;
		$PDO = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'].';charset=utf8;', $config['login'], $config['password']);
		$timezones = $PDO->query('SELECT
				TimeZoneName.Time_zone_id,
				TimeZoneName.Name,
				TimeZoneType.Offset
			FROM mysql.time_zone_name AS TimeZoneName
				JOIN mysql.time_zone_transition_type AS TimeZoneType ON TimeZoneType.Time_zone_id = TimeZoneName.Time_zone_id
			WHERE TimeZoneType.Abbreviation = "GMT"
			

	}
	*/
}
