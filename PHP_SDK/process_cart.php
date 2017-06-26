<?php
require 'lib/sdk/checkoutHelper.php';

	$sellerCode = "0391";
	$successUrl = "";
	$ipnUrl = "";
	$useSandbox = true;

	$checkoutOptions = new checkoutOptions($sellerCode, $useSandbox);
	
	$checkoutOrderArray = json_decode($_POST['Items'], true);

	$checkoutOrderItems = array();
	foreach($checkoutOrderArray as $key=>$value)
	{
		$item = new checkoutItem();
		$checkoutOrderItems[$key] = $item->getFromArray($value);
	}

	$checkoutHelper = new checkoutHelper();
	$checkoutUrl = $checkoutHelper -> getCartCheckoutUrl($checkoutOptions, $checkoutOrderItems);
	//var_dump($checkoutUrl);
	header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							