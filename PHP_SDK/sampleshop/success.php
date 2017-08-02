<?php

use YenePay\Models\PDT;
use YenePay\CheckoutHelper;

require_once(__DIR__ .'/lib/sdk/CheckoutHelper.php');
require_once(__DIR__ .'/lib/sdk/Models/PDT.php');

$pdtToken = "YOUR_PDT_KEY_HERE";
$pdtRequestType = "PDT";
$pdtModel = new PDT();
$pdtModel->setRequestType($pdtRequestType)
		->setPDTToken($pdtToken)
		->setUseSandbox(true);
		
if(isset($_GET["TransactionId"]))
	$pdtModel->setTransactionId($_GET["TransactionId"]);

$helper = new CheckoutHelper();
$result = $helper->RequestPDT($pdtModel);
//request status
var_dump($result['result']);
//payment status
var_dump($result['Status']);
?>
