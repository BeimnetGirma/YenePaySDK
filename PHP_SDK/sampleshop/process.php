<?php

use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;

require(__DIR__ .'/lib/sdk/CheckoutHelper.php');

define("SELLER_CODE", "YOUR_YENEPAY_SELLER_CODE");
define("SUCCESS_URL", "YOUR_SUCCESS_URL");
define("IPN_URL", "YOUR_IPN_URL");
define("USE_SANDBOX", true);

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

	header("Location: " . $checkoutUrl);
?>																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							