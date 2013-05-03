<?php
App::uses('Component', 'Controller');

class TimezoneComponent extends Component {
	var $name = 'Timezone';
	var $components = array('Session');
	
	var $controller;
	
	var $User;
	
	function startup(Controller $controller) {
		if (!empty($controller->User)) {
			$this->User = $controller->User;
		} else {
			$this->User = ClassRegistry::init('User');
		}
		$this->controller = $controller;
		
		$this->set();
		return true;
	}
	
	function set($reset = false) {
		if (!empty($this->User) && $this->Session->check('Auth.User.timezone_id')) {
			$tzResult = $this->User->Timezone->read(null,$this->Session->read('Auth.User.timezone_id'));
			if ($reset || !empty($tzResult)) {
				$timezone = $tzResult['Timezone']['title'];
				$timezoneOffset = $tzResult['Timezone']['offset'];

				setMysqlConnect();

				date_default_timezone_set($timezone);
				mysql_query('SET time_zone = '.$timezoneOffset.'');
			
				$this->controller->set(compact('timezone'));
				$this->controller->set(compact('timezoneOffset'));
			}
		}
	}
}