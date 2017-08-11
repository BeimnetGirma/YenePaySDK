<?php

use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');

	$sellerCode = "YOUR_YENEPAY_SELLER_CODE";
	$successUrl = "YOUR_SUCCESS_URL";
	$ipnUrl = "YOUR_IPN_URL";
	$successUrlReturn = "http://localhost:81/sampleshop/success.php"; //"YOUR_SUCCESS_URL";
	$useSandbox = true;
	
	$checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
	$checkoutOptions -> setTotalItemsDeliveryFee(30);
	
	$data = json_decode(file_get_contents('php://input'), true);
	$checkoutOrderArray = $data['Items'];

	$checkoutOrderItems = array();
	foreach($checkoutOrderArray as $key=>$value)
	{
		$item = new CheckoutItem();
		$checkoutOrderItems[$key] = $item->getFromArray($value);
	}

	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getCartCheckoutUrl($checkoutOptions, $checkoutOrderItems);

	$obj = array("redirectUrl" => $checkoutUrl);
	$result = json_encode($obj);
	header("Content-type: application/json");
	echo $result;
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							