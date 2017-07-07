<?php

use YenePay\Models\IPN;
use YenePay\CheckoutHelper;

require_once(__DIR__ .'/lib/sdk/CheckoutHelper.php');
require_once(__DIR__ .'/lib/sdk/Models/IPN.php');

$ipnModel = new IPN();
$ipnModel->setUseSandbox(true);
if(isset($_POST["TotalAmount"]))
	$ipnModel->setTotalAmount($_POST["TotalAmount"]);
if(isset($_POST["BuyerId"]))
	$ipnModel->setBuyerId($_POST["BuyerId"]);
if(isset($_POST["BuyerName"]))
	$ipnModel->setBuyerName($_POST["BuyerName"]);
if(isset($_POST["TransactionFee"]))
	$ipnModel->setTransactionFee($_POST["TransactionFee"]);
if(isset($_POST["MerchantOrderId"]))
	$ipnModel->setMerchantOrderId($_POST["MerchantOrderId"]);
if(isset($_POST["MerchantId"]))
	$ipnModel->setMerchantId($_POST["MerchantId"]);
if(isset($_POST["MerchantCode"]))
	$ipnModel->setMerchantCode($_POST["MerchantCode"]);
if(isset($_POST["TransactionId"]))
	$ipnModel->setTransactionId($_POST["TransactionId"]);
if(isset($_POST["Status"]))
	$ipnModel->setStatus($_POST["Status"]);
if(isset($_POST["StatusDescription"]))
	$ipnModel->setStatusDescription($_POST["StatusDescription"]);
if(isset($_POST["Currency"]))
	$ipnModel->setCurrency($_POST["Currency"]);
if(isset($_POST["Signature"]))
	$ipnModel->setSignature($_POST["Signature"]);


$helper = new CheckoutHelper();
if ($helper->isIPNAuthentic($ipnModel))
	echo 'Success!';
else
	echo 'Fail';
?>
