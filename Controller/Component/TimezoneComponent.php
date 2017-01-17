<?php
App::uses('Component', 'Controller');

class TimezoneComponent extends Component {
	public $name = 'Timezone';
	public $components = array('Session');
	
	public $controller;
	
	public function startup(Controller $controller) {
		$this->controller = $controller;
		//$this->set();
		return true;
	}
	
	public function setId($timezoneId) {
		$Timezone = ClassRegistry::init('Location.Timezone');
		$result = $Timezone->findById($timezoneId);
		if (!empty($result)) {
			return $this->set($result['Timezone']['title'],$result['Timezone']['offset']);
		}
		return false;
	}
	
	public function set($timezone, $timezoneOffset) {
		$Timezone = ClassRegistry::init('Location.Timezone');

		date_default_timezone_set($timezone);
		putenv("TZ=$timezone");
		try {
			$Timezone->getDataSource()->execute('SET time_zone = "'.$timezone.'"');
		} catch (Exception $e) {
			
		}
		
		if (isset($this->controller)) {
			$this->controller->set(compact('timezone'));
			$this->controller->set(compact('timezoneOffset'));
		}
	}	
}