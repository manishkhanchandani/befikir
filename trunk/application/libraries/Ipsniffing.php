<?php

/**
 * @uses The function is used for IP Sniffing
 * 		 (i.e. to track the user location from the IP of the system used).
 *
 * @pattern Singleton
 
 */
class Ipsniffing
{
	/**
	 * @var remoteAddress
	 * @type string
	 */
	var $remoteAddress = '';

	/**
	 * @var objResult
	 * @type object SimpleXMLElement
	 */
	var $objResult = '';

	/**
	 * @var ipSniffed
	 * @type boolean
	 * @scope static
	 * @default false
	 */
	var $ipSniffed = false;

	/**
	 * @var countryName
	 * @type string
	 */
	var $countryName = '';

	/**
	 * @var countryCode
	 * @type string
	 */
	var $countryCode = '';

	/**
	 * @var $regionName
	 * @type string
	 */
	var $regionName = '';

	/**
	 * @var cityName
	 * @type string
	 */
	var $cityName = '';

	/**
	 * @uses Constructor to the class IPSniffing
	 */
	function __construct()
	{
	}

	/**
	 * @uses use CURL for calling the API functionality.
	 * @param string url for calling the API functionality.
	 * @return void
	 */
	function sendURL($strAPIURL)
	{
		// Initialisation
		$ch = curl_init();

		// Set parameters
		curl_setopt($ch, CURLOPT_URL, $strAPIURL);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);

		// Return a variable instead of posting it directly
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Active the POST method
		curl_setopt($ch, CURLOPT_POST, 1);

		// Request
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		// execute the connexion
		$xmlResult = curl_exec($ch);

		// Close it
		curl_close($ch);

		// no response
		if (($xmlResult == '') || (strlen($xmlResult) < 2))
		{
			die ("CURL execution failed. Kindly check your firewall permissions");
		}

		$tmp = explode(';', $xmlResult);
		$this->objResult = new stdClass();
		$this->objResult->IP = $tmp[2];
		$this->objResult->CountryCode = $tmp[3];
		$this->objResult->CountryName = $tmp[4];
		$this->objResult->RegionName = $tmp[5];
		$this->objResult->City = $tmp[6];
		$this->objResult->Zipcode = $tmp[7];
		$this->objResult->Latitude = $tmp[8];
		$this->objResult->Longitude = $tmp[9];
	}

	/**
	 * @uses main function in this class for IP Sniffing.
	 * @param void
	 * @return void
	 */
	function sniffIP($remote_addr)
	{
		if ($this->ipSniffed == false && $remote_addr !== '127.0.0.1')
		{
			$this->remoteAddress = $remote_addr;
			$strAPIURL = 'http://api.ipinfodb.com/v3/ip-city/?key=0b3b2f8bd9f606ba8032ef0b9fbe054041788fb0f9d7c21214cd050a9b561845&ip='.strval($this->remoteAddress);

			// clean the url for API call.
			//$strAPIURL = str_replace(" ", "%20", $strAPIURL);
			//$strAPIURL = str_replace("-", "%20", $strAPIURL);

			// make a call to api an fetch result.
			$this->sendURL($strAPIURL);

			// check for data and set the flag if ok. //, 'SimpleXMLElement'
			if (is_object($this->objResult) && (strval($this->objResult->CountryName) != '') && (strval($this->objResult->City) != ''))
			{
				$this->countryName = strval($this->objResult->CountryName);
				$this->countryCode = strval($this->objResult->CountryCode);
				$this->cityName = strval($this->objResult->City);
				$this->regionName = strval($this->objResult->RegionName);
				$this->Zipcode = strval($this->objResult->Zipcode);
				$this->Latitude = strval($this->objResult->Latitude);
				$this->Longitude = strval($this->objResult->Longitude);
				$this->ipSniffed = true;
			}

			return $this->objResult;
		}
	}// End of function.

}// End of class.
?>
