<?php
class ipnModel
{
	var $TotalAmount;
	var $BuyerId;
	var $BuyerName;
	var $TransactionFee;
	var $MerchantOrderId;
	var $MerchantId;
	var $MerchantCode;
	var $TransactionId;
	var $Status;
	var $StatusDescription;
	var $Currency;
	var $PaymentMethod;
	var $Signature;
	var $UseSandbox;
	
	function __construct()
	{

	}
	
	public function getAsKeyValue()
	{
		$dictionary = array();
		if(isset($this->TotalAmount))
			$dictionary["TotalAmount"] = $this->TotalAmount;
		if(isset($this->BuyerId))
			$dictionary["BuyerId"] = $this->BuyerId;
		if(isset($this->BuyerName))
			$dictionary["BuyerName"] = $this->BuyerName;
		if(isset($this->TransactionFee))
			$dictionary["TransactionFee"] = $this->TransactionFee;
		if(isset($this->MerchantOrderId))
			$dictionary["MerchantOrderId"] = $this->MerchantOrderId;
		if(isset($this->MerchantId))
			$dictionary["MerchantId"] = $this->MerchantId;
		if(isset($this->MerchantCode))
			$dictionary["MerchantCode"] = $this->MerchantCode;
		if(isset($this->TransactionId))
			$dictionary["TransactionId"] = $this->TransactionId;
		if(isset($this->Status))
			$dictionary["Status"] = $this->Status;
		if(isset($this->StatusDescription))
			$dictionary["StatusDescription"] = $this->StatusDescription;
		if(isset($this->Currency))
			$dictionary["Currency"] = $this->Currency;
		if(isset($this->PaymentMethod))
			$dictionary["PaymentMethod"] = $this->PaymentMethod;
		if(isset($this->Signature))
			$dictionary["Signature"] = $this->Signature;
		if(isset($this->UseSandbox))
			$dictionary["UseSandbox"] = $this->UseSandbox;
		
		return $dictionary;
	}
}

?>