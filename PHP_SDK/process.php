<?php
require 'lib/sdk/checkoutHelper.php';

define("SELLER_CODE", "0391");
define("SUCCESS_URL", "");
define("IPN_URL", "");
define("USE_SANDBOX", true);

	$checkoutOptions = new checkoutOptions(SELLER_CODE, USE_SANDBOX);
	
	$checkoutOrderItem = new checkoutItem($_POST["ItemName"], $_POST["UnitPrice"], $_POST["Quantity"]);
	$checkoutOrderItem  -> ItemId = $_POST["ItemId"];
	$checkoutOrderItem  -> DeliveryFee = $_POST["DeliveryFee"];
	$checkoutOrderItem  -> Tax1 = $_POST["Tax1"];
	$checkoutOrderItem  -> Tax2 = $_POST["Tax2"];
	$checkoutOrderItem  -> Discount = $_POST["Discount"];
	$checkoutOrderItem  -> HandlingFee = $_POST["HandlingFee"];
	
	$checkoutHelper = new checkoutHelper();
	$checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
	var_dump($checkoutUrl);
	//header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							