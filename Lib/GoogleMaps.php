<?php
class GoogleMaps {
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