<?php
use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');

	$sellerCode = "0391";
	$successUrl = "";
	$ipnUrl = "http://localhost:8080/sampleshop/ipn.php";
	$useSandbox = true;

	$checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
	
	$checkoutOrderArray = json_decode($_POST['Items'], true);

	$checkoutOrderItems = array();
	foreach($checkoutOrderArray as $key=>$value)
	{
		$item = new CheckoutItem();
		$checkoutOrderItems[$key] = $item->getFromArray($value);
	}

	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getCartCheckoutUrl($checkoutOptions, $checkoutOrderItems);
	var_dump($checkoutUrl);
	//header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							