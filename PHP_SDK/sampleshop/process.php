<?php

use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');

define("SELLER_CODE", "0391");
define("SUCCESS_URL", "");
define("IPN_URL", "http://localhost:8080/sampleshop/ipn.php");
define("USE_SANDBOX", false);

	$checkoutOptions = new CheckoutOptions(SELLER_CODE, USE_SANDBOX);
	
	$checkoutOrderItem = new CheckoutItem($_POST["ItemName"], $_POST["UnitPrice"], $_POST["Quantity"]);
	$checkoutOrderItem  -> ItemId = $_POST["ItemId"];
	$checkoutOrderItem  -> DeliveryFee = $_POST["DeliveryFee"];
	$checkoutOrderItem  -> Tax1 = $_POST["Tax1"];
	$checkoutOrderItem  -> Tax2 = $_POST["Tax2"];
	$checkoutOrderItem  -> Discount = $_POST["Discount"];
	$checkoutOrderItem  -> HandlingFee = $_POST["HandlingFee"];
	
	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
	//var_dump($checkoutUrl);
	header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							