<?php

use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');

	$sellerCode = "YOUR_YENEPAY_SELLER_CODE";
	$successUrl = "YOUR_SUCCESS_URL";
	$ipnUrl = "YOUR_IPN_URL";
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

	header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							