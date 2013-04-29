<?php
class State extends LocationAppModel {
	var $name = 'State';
	var $actsAs = array('Location.SelectList');
	var $belongsTo = array('Location.Country');
}