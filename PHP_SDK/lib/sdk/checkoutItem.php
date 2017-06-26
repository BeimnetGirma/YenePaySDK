<?php
class checkoutItem
{
	var $ItemId;
	var $ItemName;
	var $UnitPrice;
	var $Quantity;
	var $DeliveryFee;
	var $Tax1;
	var $Tax2;
	var $Discount;
	var $HandlingFee;
	
	function __construct()
	{
		$a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
	}
	
	function __construct3($itemName, $price, $quantity)
	{
		$this->ItemName = $itemName;
		$this->UnitPrice = $price;
		$this->Quantity = $quantity;
	}
	
	function __construct9($itemId, $itemName, $price, $quantity, $deliveryFee, $tax1, $tax2, $discount, $handlingFee)
	{
		$this->ItemId = $itemId;
		$this->ItemName = $itemName;
		$this->UnitPrice = $price;
		$this->Quantity = $quantity;
		$this->DeliveryFee = $deliveryFee;
		$this->Tax1 = $tax1;
		$this->Tax2 = $tax2;
		$this->Discount = $discount;
		$this->HandlingFee = $handlingFee;
	}
	
	public function getAsKeyValue($dictionary)
	{
		if(!isset($dictionary))
			$dictionary = array();
		$dictionary["ItemId"] = $this->ItemId;
		$dictionary["ItemName"] = $this->ItemName;
		$dictionary["UnitPrice"] = $this->UnitPrice;
		$dictionary["Quantity"] = $this->Quantity;
		if(isset($Discount))
			$dictionary["Discount"] = $this->Discount;
		if(isset($HandlingFee))
			$dictionary["HandlingFee"] = $this->HandlingFee;
		if(isset($Shipping))
			$dictionary["Shipping"] = $this->Shipping;
		if(isset($Tax1))
			$dictionary["Tax1"] = $this->Tax1;
		if(isset($Tax2))
			$dictionary["Tax2"] = $this->Tax2;
		return $dictionary;
	}
	
	public function getFromArray($itemArray)
	{
		$this->ItemId = $itemArray["ItemId"];
		$this->ItemName = $itemArray["ItemName"];
		$this->UnitPrice = $itemArray["UnitPrice"];
		$this->Quantity = $itemArray["Quantity"];
		if(isset($itemArray["DeliveryFee"]))
			$this->DeliveryFee = $itemArray["DeliveryFee"];
		if(isset($itemArray["Tax1"]))
			$this->Tax1 = $itemArray["Tax1"];
		if(isset($itemArray["Tax2"]))
			$this->Tax2 = $itemArray["Tax2"];
		if(isset($itemArray["Discount"]))
			$this->Discount = $itemArray["Discount"];
		if(isset($itemArray["HandlingFee"]))
			$this->HandlingFee = $itemArray["HandlingFee"];
		return $this;
	}
}
?>