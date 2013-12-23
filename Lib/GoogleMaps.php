<?php
/**
 * GoogleMaps Utility
 * By: Jamie Clark
 * 12/20/2013
 *
 * Used to utilize the GoogleMaps API
 *
 **/
class GoogleMaps {
	public static function &getInstance() {
		static $instance = array();
		if (!$instance) {
			$instance[0] = new GoogleMaps();
		}
		return $instance[0];
	}

	public static function isPoBox($address) {
		return preg_match('/^p[\.\s]*o[\.\s]*(?:box)?[\s]*[\d]+/i', $address);
	}
	
	/**
	 * Checks if address is a valid address, either a PO BOX or geocodable
	 *
	 * @param string $address The address to check
	 *
	 * @return bool True if valid, false if not
	 **/
	public static function validate($address) {
		$self =& GoogleMaps::getInstance();

		//Skips validating PO Boxes
		if ($self->isPoBox($address)) {
			return true;
		}
		$geocode = $self->geocode($address);
		return !empty($geocode);
	}
	
	/**
	 * Polls Google Maps API to get longitude, latitude and accuracty of an address
	 * 
	 * @param string $address The address to check
	 *
	 * @return Array|bool An array of longitude, latitude and location type
	 **/
	public static function geocode($address, $googleKey = null) {
		$address = urlencode(urldecode($address));
		
		//v.3
		$sensor = 'false';
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?' . http_build_query(compact('address', 'sensor'));
		
		if (!empty($_SESSION['gmap_cache'][$url])) {
			$fileContents = $_SESSION['gmap_cache'][$url];
		} else {
			if (function_exists('curl_init')) {
				$ch = curl_init();
				$timeout = 5; // set to zero for no timeout
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$fileContents = curl_exec($ch);
				curl_close($ch);
			}
		}
		$json = json_decode($fileContents);
		$results = $json->results;
		
		if (!empty($json) && $json->status == 'OK') {
			$geo = $results[0]->geometry;
			$accuracy = $geo->location_type;
			if (in_array($accuracy, array('ROOFTOP', 'RANGE_INTERPOLATED'))) {
				$lat = $geo->location->lat;
				$lon = $geo->location->lng;
				$_SESSION['gmap_cache'][$url] = $fileContents;
				return compact('lat', 'lon', 'accuracy');
			}
		}
		return false;
	}
}