<?php 
class LocationSchema extends CakeSchema {
	private $countryData = array(
		array("AF","Afghanistan"),
		array("AL","Albania"),
		array("DZ","Algeria"),
		array("AS","American Samoa"),
		array("AD","Andorra"),
		array("AO","Angola"),
		array("AI","Anguilla"),
		array("AQ","Antarctica"),
		array("AG","Antigua and Barbuda"),
		array("AR","Argentina"),
		array("AM","Armenia"),
		array("AW","Aruba"),
		array("AU","Australia"),
		array("AT","Austria"),
		array("AZ","Azerbaijan"),
		array("BS","Bahamas"),
		array("BH","Bahrain"),
		array("BD","Bangladesh"),
		array("BB","Barbados"),
		array("BY","Belarus"),
		array("BE","Belgium"),
		array("BZ","Belize"),
		array("BJ","Benin"),
		array("BM","Bermuda"),
		array("BT","Bhutan"),
		array("BO","Bolivia"),
		array("BA","Bosnia and Herzegovina"),
		array("BW","Botswana"),
		array("BV","Bouvet Island"),
		array("BR","Brazil"),
		array("IO","British Indian Ocean Territory"),
		array("BN","Brunei Darussalam"),
		array("BG","Bulgaria"),
		array("BF","Burkina Faso"),
		array("BI","Burundi"),
		array("KH","Cambodia"),
		array("CM","Cameroon"),
		array("CA","Canada"),
		array("CV","Cape Verde"),
		array("KY","Cayman Islands"),
		array("CF","Central African Republic"),
		array("TD","Chad"),
		array("CL","Chile"),
		array("CN","China"),
		array("CX","Christmas Island"),
		array("CC","Cocos (Keeling Islands)"),
		array("CO","Colombia"),
		array("KM","Comoros"),
		array("CG","Congo"),
		array("CK","Cook Islands"),
		array("CR","Costa Rica"),
		array("CI","Cote D'Ivoire (Ivory Coast)"),
		array("HR","Croatia (Hrvatska)"),
		array("CU","Cuba"),
		array("CY","Cyprus"),
		array("CZ","Czech Republic"),
		array("DK","Denmark"),
		array("DJ","Djibouti"),
		array("DM","Dominica"),
		array("DO","Dominican Republic"),
		array("TP","East Timor"),
		array("EC","Ecuador"),
		array("EG","Egypt"),
		array("SV","El Salvador"),
		array("GQ","Equatorial Guinea"),
		array("ER","Eritrea"),
		array("EE","Estonia"),
		array("ET","Ethiopia"),
		array("FK","Falkland Islands (Malvinas)"),
		array("FO","Faroe Islands"),
		array("FJ","Fiji"),
		array("FI","Finland"),
		array("FR","France"),
		array("FX","France, Metropolitan"),
		array("GF","French Guiana"),
		array("PF","French Polynesia"),
		array("TF","French Southern Territories"),
		array("GA","Gabon"),
		array("GM","Gambia"),
		array("GE","Georgia"),
		array("DE","Germany"),
		array("GH","Ghana"),
		array("GI","Gibraltar"),
		array("GR","Greece"),
		array("GL","Greenland"),
		array("GD","Grenada"),
		array("GP","Guadeloupe"),
		array("GU","Guam"),
		array("GT","Guatemala"),
		array("GN","Guinea"),
		array("GW","Guinea-Bissau"),
		array("GY","Guyana"),
		array("HT","Haiti"),
		array("HM","Heard and McDonald Islands"),
		array("HN","Honduras"),
		array("HK","Hong Kong"),
		array("HU","Hungary"),
		array("IS","Iceland"),
		array("IN","India"),
		array("ID","Indonesia"),
		array("IR","Iran"),
		array("IQ","Iraq"),
		array("IE","Ireland"),
		array("IL","Israel"),
		array("IT","Italy"),
		array("JM","Jamaica"),
		array("JP","Japan"),
		array("JO","Jordan"),
		array("KZ","Kazakhstan"),
		array("KE","Kenya"),
		array("KI","Kiribati"),
		array("KP","Korea (North) (People's Republic)"),
		array("KR","Korea (South) (Republic)"),
		array("KW","Kuwait"),
		array("KG","Kyrgyzstan (Kyrgyz Republic)"),
		array("LA","Laos"),
		array("LV","Latvia"),
		array("LB","Lebanon"),
		array("LS","Lesotho"),
		array("LR","Liberia"),
		array("LY","Libya"),
		array("LI","Liechtenstein"),
		array("LT","Lithuania"),
		array("LU","Luxembourg"),
		array("MO","Macau"),
		array("MK","Macedonia"),
		array("MG","Madagascar"),
		array("MW","Malawi"),
		array("MY","Malaysia"),
		array("MV","Maldives"),
		array("ML","Mali"),
		array("MT","Malta"),
		array("MH","Marshall Islands"),
		array("MQ","Martinique"),
		array("MR","Mauritania"),
		array("MU","Mauritius"),
		array("YT","Mayotte"),
		array("MX","Mexico"),
		array("FM","Micronesia"),
		array("MD","Moldova"),
		array("MC","Monaco"),
		array("MN","Mongolia"),
		array("MS","Montserrat"),
		array("MA","Morocco"),
		array("MZ","Mozambique"),
		array("MM","Myanmar"),
		array("NA","Namibia"),
		array("NR","Nauru"),
		array("NP","Nepal"),
		array("NL","Netherlands"),
		array("AN","Netherlands Antilles"),
		array("NT","Neutral Zone (Saudia Arabia/Iraq)"),
		array("NC","New Caledonia"),
		array("NZ","New Zealand"),
		array("NI","Nicaragua"),
		array("NE","Niger"),
		array("NG","Nigeria"),
		array("NU","Niue"),
		array("NF","Norfolk Island"),
		array("MP","Northern Mariana Islands"),
		array("NO","Norway"),
		array("OM","Oman"),
		array("PK","Pakistan"),
		array("PW","Palau"),
		array("PA","Panama"),
		array("PG","Papua New Guinea"),
		array("PY","Paraguay"),
		array("PE","Peru"),
		array("PH","Philippines"),
		array("PN","Pitcairn"),
		array("PL","Poland"),
		array("PT","Portugal"),
		array("PR","Puerto Rico"),
		array("QA","Qatar"),
		array("RE","Reunion"),
		array("RO","Romania"),
		array("RU","Russian Federation"),
		array("RW","Rwanda"),
		array("GS","S. Georgia and S. Sandwich Isls."),
		array("KN","Saint Kitts and Nevis"),
		array("LC","Saint Lucia"),
		array("VC","Saint Vincent and The Grenadines"),
		array("WS","Samoa"),
		array("SM","San Marino"),
		array("ST","Sao Tome and Principe"),
		array("SA","Saudi Arabia"),
		array("SN","Senegal"),
		array("SC","Seychelles"),
		array("SL","Sierra Leone"),
		array("SG","Singapore"),
		array("SK","Slovakia (Slovak Republic)"),
		array("SI","Slovenia"),
		array("SB","Solomon Islands"),
		array("SO","Somalia"),
		array("ZA","South Africa"),
		array("SU","Soviet Union (former)"),
		array("ES","Spain"),
		array("LK","Sri Lanka"),
		array("SH","St. Helena"),
		array("PM","St. Pierre and Miquelon"),
		array("SD","Sudan"),
		array("SR","Suriname"),
		array("SJ","Svalbard and Jan Mayen Islands"),
		array("SZ","Swaziland"),
		array("SE","Sweden"),
		array("CH","Switzerland"),
		array("SY","Syria"),
		array("TW","Taiwan"),
		array("TJ","Tajikistan"),
		array("TZ","Tanzania"),
		array("TH","Thailand"),
		array("TG","Togo"),
		array("TK","Tokelau"),
		array("TO","Tonga"),
		array("TT","Trinidad and Tobago"),
		array("TN","Tunisia"),
		array("TR","Turkey"),
		array("TM","Turkmenistan"),
		array("TC","Turks and Caicos Islands"),
		array("TV","Tuvalu"),
		array("UG","Uganda"),
		array("UA","Ukraine"),
		array("AE","United Arab Emirates"),
		array("UK","United Kingdom (Great Britain)"),
		array("US","United States"),
		array("UY","Uruguay"),
		array("UM","US Minor Outlying Islands"),
		array("UZ","Uzbekistan"),
		array("VU","Vanuatu"),
		array("VA","Vatican City State (Holy See)"),
		array("VE","Venezuela"),
		array("VN","Viet Nam"),
		array("VG","Virgin Islands (British)"),
		array("VI","Virgin Islands (US)"),
		array("WF","Wallis and Futuna Islands"),
		array("EH","Western Sahara"),
		array("YE","Yemen"),
		array("YU","Yugoslavia"),
		array("ZR","Zaire"),
		array("ZM","Zambia"),
		array("ZW","Zimbabwe"),
		array("M","US Military Base"),
	);
	private $stateData = array(
		'US' => array(
			array("AK","Alaska"),
			array("AL","Alabama"),
			array("AR","Arkansas"),
			array("AZ","Arizona"),
			array("CA","California"),
			array("CO","Colorado"),
			array("CT","Connecticut"),
			array("DC","Washington, DC"),
			array("DE","Delaware"),
			array("FL","Florida"),
			array("GA","Georgia"),
			array("HI","Hawaii"),
			array("IA","Iowa"),
			array("ID","Idaho"),
			array("IL","Illinois"),
			array("IN","Indiana"),
			array("KS","Kansas"),
			array("KY","Kentucky"),
			array("LA","Louisiana"),
			array("MA","Massachusetts"),
			array("MD","Maryland"),
			array("ME","Maine"),
			array("MI","Michigan"),
			array("MN","Minnesota"),
			array("MO","Missouri"),
			array("MS","Mississippi"),
			array("MT","Montana"),
			array("NC","North Carolina"),
			array("ND","North Dakota"),
			array("NE","Nebraska"),
			array("NH","New Hampshire"),
			array("NJ","New Jersey"),
			array("NM","New Mexico"),
			array("NV","Nevada"),
			array("NY","New York"),
			array("OH","Ohio"),
			array("OK","Oklahoma"),
			array("OR","Oregon"),
			array("PA","Pennsylvania"),
			array("RI","Rhode Island"),
			array("SC","South Carolina"),
			array("SD","South Dakota"),
			array("TN","Tennessee"),
			array("TX","Texas"),
			array("UT","Utah"),
			array("VA","Virginia"),
			array("VT","Vermont"),
			array("WA","Washington"),
			array("WI","Wisconsin"),
			array("WV","West Virginia"),
			array("WY","Wyoming"),
		),
		'CA' => array(
			array("AB","Alberta"),
			array("BC","British Columbia"),
			array("MB","Manitoba"),
			array("NB","New Brunswick"),
			array("NF","Newfoundland"),
			array("NS","Nova Scotia"),
			array("NT","Northwest Territories"),
			array("NU","Nunavut"),
			array("ON","Ontario"),
			array("PE","Prince Edward Island"),
			array("PQ","Quebec"),
			array("SK","Saskatchewan"),
			array("YT","Yukon"),
		),
		'M' => array(
			array("AA","Armed Forces Americas"),
			array("AE","Armed Forces Europe"),
		)
	);

	private $timezoneData = array(
		array("1","America/Adak",NULL,"","0.00"),
		array("2","America/Anchorage","(GMT-09:00) Alaska Time","","0.00"),
		array("3","America/Anguilla",NULL,"","0.00"),
		array("4","America/Antigua",NULL,"","0.00"),
		array("5","America/Araguaina","(GMT-03:00) Araguaina","","0.00"),
		array("6","America/Argentina/Buenos_Aires","(GMT-03:00) Buenos Aires","","-3.00"),
		array("7","America/Argentina/Catamarca",NULL,"","0.00"),
		array("8","America/Argentina/ComodRivadavia",NULL,"","0.00"),
		array("9","America/Argentina/Cordoba",NULL,"","0.00"),
		array("10","America/Argentina/Jujuy",NULL,"","0.00"),
		array("11","America/Argentina/La_Rioja",NULL,"","0.00"),
		array("12","America/Argentina/Mendoza",NULL,"","0.00"),
		array("13","America/Argentina/Rio_Gallegos",NULL,"","0.00"),
		array("14","America/Argentina/Salta",NULL,"","0.00"),
		array("15","America/Argentina/San_Juan",NULL,"","0.00"),
		array("16","America/Argentina/San_Luis",NULL,"","0.00"),
		array("17","America/Argentina/Tucuman",NULL,"","0.00"),
		array("18","America/Argentina/Ushuaia",NULL,"","0.00"),
		array("19","America/Aruba",NULL,"","0.00"),
		array("20","America/Asuncion","(GMT-03:00) Asuncion","","0.00"),
		array("21","America/Atikokan",NULL,"","0.00"),
		array("22","America/Atka",NULL,"","0.00"),
		array("23","America/Bahia","(GMT-03:00) Salvador","","0.00"),
		array("24","America/Barbados","(GMT-04:00) Barbados","","0.00"),
		array("25","America/Belem","(GMT-03:00) Belem","","0.00"),
		array("26","America/Belize","(GMT-06:00) Belize","","0.00"),
		array("27","America/Blanc-Sablon",NULL,"","0.00"),
		array("28","America/Boa_Vista","(GMT-04:00) Boa Vista","","0.00"),
		array("29","America/Bogota","(GMT-05:00) Bogota","","0.00"),
		array("30","America/Boise",NULL,"","0.00"),
		array("31","America/Buenos_Aires",NULL,"","0.00"),
		array("32","America/Cambridge_Bay",NULL,"","0.00"),
		array("33","America/Campo_Grande","(GMT-03:00) Campo Grande","","0.00"),
		array("34","America/Cancun","(GMT-05:00) America Cancun","","0.00"),
		array("35","America/Caracas","(GMT-04:30) Caracas","","-4.00"),
		array("36","America/Catamarca",NULL,"","0.00"),
		array("37","America/Cayenne","(GMT-03:00) Cayenne","","0.00"),
		array("38","America/Cayman","(GMT-05:00) Cayman","","0.00"),
		array("39","America/Chicago","(GMT-06:00) Central Time","Central Time","-4.00"),
		array("40","America/Chihuahua",NULL,"","0.00"),
		array("41","America/Coral_Harbour",NULL,"","0.00"),
		array("42","America/Cordoba",NULL,"","0.00"),
		array("43","America/Costa_Rica","(GMT-06:00) Costa Rica","","0.00"),
		array("44","America/Cuiaba","(GMT-03:00) Cuiaba","","0.00"),
		array("45","America/Curacao","(GMT-04:00) Curacao","","0.00"),
		array("46","America/Danmarkshavn","(GMT+00:00) Danmarkshavn","","0.00"),
		array("47","America/Dawson",NULL,"","0.00"),
		array("48","America/Dawson_Creek","(GMT-07:00) Mountain Time - Dawson Creek","","0.00"),
		array("49","America/Denver","(GMT-07:00) Mountain Time","Mountain Time","-7.00"),
		array("50","America/Detroit",NULL,"","0.00"),
		array("51","America/Dominica",NULL,"","0.00"),
		array("52","America/Edmonton","(GMT-07:00) Mountain Time - Edmonton","","0.00"),
		array("53","America/Eirunepe",NULL,"","0.00"),
		array("54","America/El_Salvador","(GMT-06:00) El Salvador","","0.00"),
		array("55","America/Ensenada",NULL,"","0.00"),
		array("56","America/Fort_Wayne",NULL,"","0.00"),
		array("57","America/Fortaleza","(GMT-03:00) Fortaleza","","0.00"),
		array("58","America/Glace_Bay",NULL,"","0.00"),
		array("59","America/Godthab","(GMT-03:00) Godthab","","0.00"),
		array("60","America/Goose_Bay",NULL,"","0.00"),
		array("61","America/Grand_Turk","(GMT-04:00) Grand Turk","","0.00"),
		array("62","America/Grenada",NULL,"","0.00"),
		array("63","America/Guadeloupe",NULL,"","0.00"),
		array("64","America/Guatemala","(GMT-06:00) Guatemala","","0.00"),
		array("65","America/Guayaquil","(GMT-05:00) Guayaquil","","0.00"),
		array("66","America/Guyana","(GMT-04:00) Guyana","","0.00"),
		array("67","America/Halifax","(GMT-04:00) Atlantic Time - Halifax","","0.00"),
		array("68","America/Havana","(GMT-05:00) Havana","","0.00"),
		array("69","America/Hermosillo","(GMT-07:00) Mountain Time - Hermosillo","","0.00"),
		array("70","America/Indiana/Indianapolis",NULL,"","0.00"),
		array("71","America/Indiana/Knox",NULL,"","0.00"),
		array("72","America/Indiana/Marengo",NULL,"","0.00"),
		array("73","America/Indiana/Petersburg",NULL,"","0.00"),
		array("74","America/Indiana/Tell_City",NULL,"","0.00"),
		array("75","America/Indiana/Vevay",NULL,"","0.00"),
		array("76","America/Indiana/Vincennes",NULL,"","0.00"),
		array("77","America/Indiana/Winamac",NULL,"","0.00"),
		array("78","America/Indianapolis",NULL,"","0.00"),
		array("79","America/Inuvik",NULL,"","0.00"),
		array("80","America/Iqaluit","(GMT-05:00) Eastern Time - Iqaluit","","0.00"),
		array("81","America/Jamaica","(GMT-05:00) Jamaica","","0.00"),
		array("82","America/Jujuy",NULL,"","0.00"),
		array("83","America/Juneau",NULL,"","-9.00"),
		array("84","America/Kentucky/Louisville",NULL,"","0.00"),
		array("85","America/Kentucky/Monticello",NULL,"","0.00"),
		array("86","America/Knox_IN",NULL,"","0.00"),
		array("87","America/La_Paz","(GMT-04:00) La Paz","","0.00"),
		array("88","America/Lima","(GMT-05:00) Lima","","0.00"),
		array("89","America/Los_Angeles","(GMT-08:00) Pacific Time","Pacific Time","-8.00"),
		array("90","America/Louisville",NULL,"","0.00"),
		array("91","America/Maceio","(GMT-03:00) Maceio","","0.00"),
		array("92","America/Managua","(GMT-06:00) Managua","","0.00"),
		array("93","America/Manaus","(GMT-04:00) Manaus","","0.00"),
		array("94","America/Marigot",NULL,"","0.00"),
		array("95","America/Martinique","(GMT-04:00) Martinique","","0.00"),
		array("96","America/Matamoros",NULL,"","0.00"),
		array("97","America/Mazatlan","(GMT-07:00) Mountain Time - Chihuahua, Mazatlan","","0.00"),
		array("98","America/Mendoza",NULL,"","0.00"),
		array("99","America/Menominee",NULL,"","0.00"),
		array("100","America/Merida",NULL,"","0.00"),
		array("101","America/Mexico_City","(GMT-06:00) Central Time - Mexico City","","-6.00"),
		array("102","America/Miquelon","(GMT-03:00) Miquelon","","0.00"),
		array("103","America/Moncton",NULL,"","0.00"),
		array("104","America/Monterrey",NULL,"","0.00"),
		array("105","America/Montevideo","(GMT-03:00) Montevideo","","0.00"),
		array("106","America/Montreal",NULL,"","0.00"),
		array("107","America/Montserrat",NULL,"","0.00"),
		array("108","America/Nassau","(GMT-05:00) Nassau","","0.00"),
		array("109","America/New_York","(GMT-05:00) Eastern Time","Eastern Time","-5.00"),
		array("110","America/Nipigon",NULL,"","0.00"),
		array("111","America/Nome",NULL,"","0.00"),
		array("112","America/Noronha","(GMT-02:00) Noronha","","0.00"),
		array("113","America/North_Dakota/Center",NULL,"","0.00"),
		array("114","America/North_Dakota/New_Salem",NULL,"","0.00"),
		array("115","America/Ojinaga",NULL,"","0.00"),
		array("116","America/Panama","(GMT-05:00) Panama","","0.00"),
		array("117","America/Pangnirtung",NULL,"","0.00"),
		array("118","America/Paramaribo","(GMT-03:00) Paramaribo","","0.00"),
		array("119","America/Phoenix","(GMT-07:00) Mountain Time - Arizona","","0.00"),
		array("120","America/Port-au-Prince","(GMT-05:00) Port-au-Prince","","0.00"),
		array("121","America/Port_of_Spain","(GMT-04:00) Port of Spain","","0.00"),
		array("122","America/Porto_Acre",NULL,"","0.00"),
		array("123","America/Porto_Velho","(GMT-04:00) Porto Velho","","0.00"),
		array("124","America/Puerto_Rico","(GMT-04:00) Puerto Rico","","0.00"),
		array("125","America/Rainy_River",NULL,"","0.00"),
		array("126","America/Rankin_Inlet",NULL,"","0.00"),
		array("127","America/Recife","(GMT-03:00) Recife","","0.00"),
		array("128","America/Regina","(GMT-06:00) Central Time - Regina","","0.00"),
		array("129","America/Resolute",NULL,"","0.00"),
		array("130","America/Rio_Branco","(GMT-05:00) Rio Branco","","0.00"),
		array("131","America/Rosario",NULL,"","0.00"),
		array("132","America/Santa_Isabel",NULL,"","0.00"),
		array("133","America/Santarem",NULL,"","0.00"),
		array("134","America/Santiago","(GMT-03:00) Santiago","","0.00"),
		array("135","America/Santo_Domingo","(GMT-04:00) Santo Domingo","","0.00"),
		array("136","America/Sao_Paulo","(GMT-02:00) Sao Paulo","","0.00"),
		array("137","America/Scoresbysund","(GMT-01:00) Scoresbysund","","0.00"),
		array("138","America/Shiprock",NULL,"","0.00"),
		array("139","America/St_Barthelemy",NULL,"","0.00"),
		array("140","America/St_Johns","(GMT-03:30) Newfoundland Time - St. Johns","","-3.50"),
		array("141","America/St_Kitts",NULL,"","0.00"),
		array("142","America/St_Lucia",NULL,"","0.00"),
		array("143","America/St_Thomas",NULL,"","0.00"),
		array("144","America/St_Vincent",NULL,"","0.00"),
		array("145","America/Swift_Current",NULL,"","0.00"),
		array("146","America/Tegucigalpa","(GMT-06:00) Central Time - Tegucigalpa","","0.00"),
		array("147","America/Thule","(GMT-04:00) Thule","","0.00"),
		array("148","America/Thunder_Bay",NULL,"","0.00"),
		array("149","America/Tijuana","(GMT-08:00) Pacific Time - Tijuana","","0.00"),
		array("150","America/Toronto","(GMT-05:00) Eastern Time - Toronto","","0.00"),
		array("151","America/Tortola",NULL,"","0.00"),
		array("152","America/Vancouver","(GMT-08:00) Pacific Time - Vancouver","","0.00"),
		array("153","America/Virgin",NULL,"","0.00"),
		array("154","America/Whitehorse","(GMT-08:00) Pacific Time - Whitehorse","","0.00"),
		array("155","America/Winnipeg","(GMT-06:00) Central Time - Winnipeg","","0.00"),
		array("156","America/Yakutat",NULL,"","0.00"),
		array("157","America/Yellowknife","(GMT-07:00) Mountain Time - Yellowknife","","0.00")
	);

	public function before($event = array()) {
		$db = ConnectionManager::getDataSource($this->connection);
		$db->cacheSources = false;
		return true;
	}

	public function after($event = array()) {
		if (isset ($event['create'])) {
			switch ($event['create']) {
				case 'states':
					$this->insertStates();
				break;
				case 'countries':
					$this->insertCountries();
				break;
				case 'timezones':
					$this->insertTimezones();
				break;
			}
		}
	}

	public $countries = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);
	public $states = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'lat_min' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,7'),
		'lat_max' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,7'),
		'lon_min' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,7'),
		'lon_max' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,7'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);
	public $timezones = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'label' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'abbr' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'offset' => array('type' => float, 'null' => false, 'default' => '0.00', 'length' => '10,7'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);
	
	private function insertCountries() {
		$Country = ClassRegistry::init('Location.Country');
		$Country->create();
		$data = array();
		foreach ($this->countryData as $country) {
			list($id, $title) = $country;
			$data[] = compact(array('id', 'title'));
		}
		return $Country->saveAll($data);
	}
	
	private function insertStates() {
		$State = ClassRegistry::init('Location.State');
		$State->create();
		$data = array();
		foreach ($this->stateData as $country_id => $countryStates) {
			foreach ($countryStates as $state) {
				list($id, $title) = $state;
				$data[] = compact('country_id', 'id', 'title');
			}
		}
		return $State->saveAll($data);
	}
	
	private function insertTimezones() {
		$Timezone = ClassRegistry::init('Location.Timezone');
		$Timezone->create();
		$data = array();
		foreach ($this->timezoneData as $timezone) {
			list($id, $title, $abbr) = $timezone;
			$data[] = compact(array('id', 'title', 'abbr'));
		}
		return $Timezone->saveAll($data);
	}
}
