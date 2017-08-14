<?php

use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');

define("SELLER_CODE", "YOUR_YENEPAY_SELLER_CODE");
define("SUCCESS_URL", "YOUR_SUCCESS_URL");
define("CANCEL_URL", "YOUR_CANCEL_URL");
define("IPN_URL", "YOUR_IPN_URL");
define("USE_SANDBOX", true);

	$checkoutOptions = new CheckoutOptions(SELLER_CODE, USE_SANDBOX);
	$checkoutOptions -> setSuccessUrl(SUCCESS_URL);
	$checkoutOptions -> setCancelUrl(CANCEL_URL);
	$checkoutOptions -> setIPNUrl(IPN_URL);
	
	$checkoutOrderItem = new CheckoutItem($_POST["ItemName"], $_POST["UnitPrice"], $_POST["Quantity"]);
	if(isset($_POST["ItemId"]))
	{
		$checkoutOrderItem  -> setId($_POST["ItemId"]);
	}
	if(isset($_POST["DeliveryFee"]))
	{
		$checkoutOrderItem  -> setDeliveryFee($_POST["DeliveryFee"]);
	}
	if(isset($_POST["Tax1"]))
	{
		$checkoutOrderItem  -> setTax1($_POST["Tax1"]);
	}
	if(isset($_POST["Tax2"]))
	{
		$checkoutOrderItem  -> setTax2($_POST["Tax2"]);
	}
	if(isset($_POST["Discount"]))
	{
		$checkoutOrderItem  -> setDiscount($_POST["Discount"]);
	}
	if(isset($_POST["HandlingFee"]))
	{
		$checkoutOrderItem  -> setHandlingFee($_POST["HandlingFee"]);
	}
	
	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);

	header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							