<?php
class Country extends LocationAppModel {
	var $name = 'Country';
	var $actsAs = array('Location.SelectList');
	var $hasMany = array('Location.State');
}