<?php
include('lib/sdk/checkoutHelper.php');
include('lib/sdk/ipnModel.php');

$ipnModel = new ipnModel();
$ipnModel->UseSandbox = true;
if(isset($_POST["TotalAmount"]))
	$ipnModel->TotalAmount = $_POST["TotalAmount"];
if(isset($_POST["BuyerId"]))
	$ipnModel->BuyerId = $_POST["BuyerId"];
if(isset($_POST["BuyerName"]))
	$ipnModel->BuyerName = $_POST["BuyerName"];
if(isset($_POST["TransactionFee"]))
	$ipnModel->TransactionFee = $_POST["TransactionFee"];
if(isset($_POST["MerchantOrderId"]))
	$ipnModel->MerchantOrderId = $_POST["MerchantOrderId"];
if(isset($_POST["MerchantId"]))
	$ipnModel->MerchantId = $_POST["MerchantId"];
if(isset($_POST["MerchantCode"]))
	$ipnModel->MerchantCode = $_POST["MerchantCode"];
if(isset($_POST["TransactionId"]))
	$ipnModel->TransactionId = $_POST["TransactionId"];
if(isset($_POST["Status"]))
	$ipnModel->Status = $_POST["Status"];
if(isset($_POST["StatusDescription"]))
	$ipnModel->StatusDescription = $_POST["StatusDescription"];
if(isset($_POST["Currency"]))
	$ipnModel->Currency = $_POST["Currency"];
if(isset($_POST["PaymentMethod"]))
	$ipnModel->PaymentMethod = $_POST["PaymentMethod"];
if(isset($_POST["Signature"]))
	$ipnModel->Signature = $_POST["Signature"];
$helper = new checkoutHelper();
if ($helper->isIPNAuthentic($ipnModel))
	echo 'Success!';
else
	echo 'Fail';
?>
