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

	public static $_validLocationTypes = array('ROOFTOP', 'RANGE_INTERPOLATED');
	public static $_validMailingTypes = array('street_address', 'street_number', 'postal_code');
	public static $_validMappingTypes = array('street_address', 'street_number', 'intersection');

	const MAPPING = 1;
	const MAILING = 2;
	
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
	public static function validate($address, $type = null) {
		$geocode = self::geocode($address, true);
		if (empty($geocode)) {
			return false;
		}
		if (!empty($type)) {
			if ($type == self::MAILING) {
				return $geocode['mailing_valid'];
			} else if ($type == self::MAPPING) {
				return $geocode['mapping_valid'];
			}
		}
		return $geocode['all_valid'];
	}
	
	/**
	 * Polls Google Maps API to get longitude, latitude and accuracty of an address
	 * 
	 * @param string $address The address to check
	 *
	 * @return Array|bool An array of longitude, latitude and location type
	 **/
	public static function geocode($address, $validate = null) {
		$address = str_replace(array(' & '), array(' and '), html_entity_decode($address));
		//$address = urlencode(urldecode($address));
		
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

		if (empty($json)) {
			CakeLog::error("Could not retrieve map coordinates: $url");
			return false;
		}
		
		$results = $json->results;
		if (!empty($json) && $json->status == 'OK') {
			$validCount = 0;
			$validCheck = array(
				self::MAILING => array('valid' => false, 'types' => self::$_validMailingTypes),
				self::MAPPING => array('valid' => false, 'types' => self::$_validMappingTypes),
			);
			$components = $results[0]->address_components;
			foreach ($components as $component) {
				foreach ($component->types as $type) {
					foreach ($validCheck as $key => $vals) {
						if (!$validCheck[$key]['valid'] && in_array($type, $vals['types'])) {
							$validCheck[$key]['valid'] = true;
							$validCount++;
						}
					}
				}
			}
			if ($validCount) {
				$_SESSION['gmap_cache'][$url] = $fileContents;
				$return = array(
					'lat' => $results[0]->geometry->location->lat,
					'lon' => $results[0]->geometry->location->lng,
					//'accuracty' => $geo->location->lng,
					'mailing_valid' => $validCheck[self::MAILING]['valid'],
					'mapping_valid' => $validCheck[self::MAPPING]['valid'],
					'all_valid' => ($validCount == count($validCheck)),
				);
				return $return;
			}
		}
		return false;
	}
}