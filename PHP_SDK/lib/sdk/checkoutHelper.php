<?php

include ('lib/sdk/checkoutItem.php');
include ('lib/sdk/checkoutOptions.php');
require '/vendor/autoload.php';

class checkoutHelper 
{
	// const CHECKOUTBASEURL_PROD = "https://checkout.yenepay.com/Home/Process/";
	// const CHECKOUTBASEURL_SANDBOX = "https://test.yenepay.com/Home/Process/";
	// const IPNVERIFYURL_PROD = "https://endpoints.yenepay.com/api/verify/ipn/";
	// const IPNVERIFYURL_SANDBOX = "https://testapi.yenepay.com/api/verify/ipn/";
	// const PDTURL_PROD = "https://endpoints.yenepay.com/api/verify/pdt/";
	// const PDTURL_SANDBOX = "https://testapi.yenepay.com/api/verify/pdt/";
	
	const CHECKOUTBASEURL_PROD = "http://localhost/checkout/Home/Process/";
	const CHECKOUTBASEURL_SANDBOX = "http://localhost:8084/checkout/Home/Process/";
	const IPNVERIFYURL_PROD = "http://localhost/etpay.api/api/verify/ipn";
	const IPNVERIFYURL_SANDBOX = "http://localhost:8084/api/api/verify/ipn";
	const PDTURL_PROD = "http://localhost/etpay.api/api/verify/pdt/";
	const PDTURL_SANDBOX = "http://localhost:8084/api/api/verify/pdt/";

	//public $checkoutOrderDto;
			
	function __construct()
	{

	}

	function getSingleCheckoutUrl($checkoutOptions, $item)
	{
		// get the checkoutOptions as key-value pair array
		$optionsDict = $checkoutOptions -> getAsKeyValue();
		
		// get the checkout items as key-value pair added with the checkoutOptions array
		$queryString = $item -> getAsKeyValue($optionsDict);
		$queryString = http_build_query($queryString);
		if(isset($checkoutOptions -> UseSandbox) && $checkoutOptions -> UseSandbox)
			return self :: CHECKOUTBASEURL_SANDBOX . '?' . $queryString;
		return self :: CHECKOUTBASEURL_PROD . '?' . $queryString;
	}
	
	function getCartCheckoutUrl($checkoutOptions, $items)
	{
		// get the checkoutOptions as key-value pair array
		$optionsDict = $checkoutOptions -> getAsKeyValue();
		
		// get the checkout items as key-value pair added with the checkoutOptions array
		for($i=0; $i<count($items); $i++)
		{
			var_dump($items[$i]);
			$itemsDict = $items[$i]->getAsKeyValue(null);
			foreach($items as $key => $value)
			{
				$optionsDict["Items[".$i."]".$key] = $value;
			}
		}

		$queryString = http_build_query($optionsDict);
		if(isset($checkoutOptions -> UseSandbox) && $checkoutOptions -> UseSandbox)
			return self :: CHECKOUTBASEURL_SANDBOX . $queryString;
		return self :: CHECKOUTBASEURL_PROD . '?' . $queryString;
	}

	function isIPNAuthentic($ipnModel)
	{
		//get ipnmodel dictionary
		$ipnDict = $ipnModel->getAsKeyValue();
		$ipnUrl = $ipnModel->UseSandbox ? self::IPNVERIFYURL_SANDBOX : self::IPNVERIFYURL_PROD;
		$headers = array('Content-Type' => 'application/json');
		Requests::register_autoloader();
		$response = Requests::post($ipnUrl, $headers, json_encode($ipnDict));

		if($response->status_code == 200)
			return true;
		return false;
	}
}
?>