<?php
require 'enums.php';

class checkoutOptions
{
	var $SellerCode;
	var $Process;
	var $MerchantOrderId;
	var $ExpiresInDays;
	var $IPNUrl;
	var $SuccessUrl;
	var $FailureUrl;
	var $CancelUrl;
	var $UseSandbox;

	function __construct()
	{
		$a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
	}
	
	function __construct0()
	{
		echo 'calling checkoutoptions';
		$this->UseSandbox = false;
        $this->Process = CheckoutType::Express;
	}
	
	function __construct2($sellerCode, $useSandbox)
	{
		$this->UseSandbox = $useSandbox;
		$this->SellerCode = $sellerCode;
        $this->Process = CheckoutType::Express;
	}
	
	function __construct9($sellerCode, $process, $merchantOrderId, $expiresInDays, $ipnUrl, $successUrl, $failureUrl, $cancelUrl, $useSandbox)
	{
		$this->UseSandbox = $useSandbox;
		$this->SellerCode = $sellerCode;
        $this->Process = $process;
		$this->MerchantOrderId = $merchantOrderId;
		$this->ExpiresInDays = $expiresInDays;
		$this->IPNUrl = $ipnUrl;
		$this->SuccessUrl = $successUrl;
		$this->FailureUrl = $failureUrl;
		$this->CancelUrl = $cancelUrl;
	}
	
	function getAsKeyValue()
	{
		$dictionary = array(
			"Process" => $this->Process,
			"MerchantId" => $this->SellerCode,
			"MerchantOrderId" => $this->MerchantOrderId,
			"SuccessUrl" => $this->SuccessUrl,
			"CancelUrl" => $this->CancelUrl,
			"IPNUrl" => $this->IPNUrl,
			"FailureUrl" => $this->FailureUrl
		);
		if(isset($this->ExpiresInDays))
			$dictionary["ExpiresInDays"] = $this->ExpiresInDays;
		return $dictionary;
	}

	function isvalid()
	{
		
 		if(!isset($Process) && isset($SellerCode))
 			{
 				return true;
 			}
	}
}
?>