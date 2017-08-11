<?php

use YenePay\Models\PDT;
use YenePay\CheckoutHelper;

require_once(__DIR__ .'/lib/sdk/CheckoutHelper.php');
require_once(__DIR__ .'/lib/sdk/Models/PDT.php');

$pdtToken = "YOUR_PDT_KEY_HERE";
$pdtRequestType = "PDT";
$pdtModel = new PDT($pdtToken);
$pdtModel->setUseSandbox(true);
		
if(isset($_GET["TransactionId"]))
	$pdtModel->setTransactionId($_GET["TransactionId"]);
	

$helper = new CheckoutHelper();
$result = $helper->RequestPDT($pdtModel);

if($result['result'] == "SUCCESS"){
	//This means the payment is completed. 
	//You can extract more information of the transaction from the pdtString
	//You can now mark the order as "Paid" or "Completed" here and start the delivery process
}
else{
	//This means the payment is not completed yet.
}

echo $result['result'];

?>
