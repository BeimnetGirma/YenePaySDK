'use strict';


var ypco = require('yenepaysdk');

var sellerCode = "0012", //"YOUR_YENEPAY_SELLER_CODE",
    successUrlReturn = "http://localhost:3000/Home/PaymentSuccessReturnUrl", //"YOUR_SUCCESS_URL",
    ipnUrlReturn = "http://localhost:3000/Home/IPNDestination", //"YOUR_IPN_URL",
    cancelUrlReturn = "", //"YOUR_CANCEL_URL",
    failureUrlReturn = "", //"YOUR_FAILURE_URL",
    pdtToken = "PAujBC2Ej1WZaM", // "YOUR_PDT_KEY_HERE",
    useSandbox = true; //false;
    

exports.CheckoutExpress = function(req, res) {
  var merchantOrderId = '12-34'; //"YOUR_UNIQUE_ID_FOR_THIS_ORDER";  //can also be set null
  var expiresInDays = 2; //"NUMBER_OF_DAYS_BEFORE_THE_ORDER_EXPIRES"; //setting null means it never expires
  var checkoutOptions = ypco.checkoutOptions(sellerCode, merchantOrderId, ypco.checkoutType.Express, useSandbox, expiresInDays, successUrlReturn, cancelUrlReturn, ipnUrlReturn, failureUrlReturn);
  var checkoutItem = req.body;
  var url = ypco.checkout.GetCheckoutUrlForExpress(checkoutOptions, checkoutItem);
  res.redirect(url);
};

exports.CheckoutCart = function(req, res) {
  var merchantOrderId = 'AB-CD'; //"YOUR_UNIQUE_ID_FOR_THIS_ORDER";  //can also be set null
  var expiresInDays = 2; //"NUMBER_OF_DAYS_BEFORE_THE_ORDER_EXPIRES"; //setting null means it never expires
  var checkoutOptions = ypco.checkoutOptions(sellerCode, merchantOrderId, ypco.checkoutType.Cart, useSandbox, expiresInDays, successUrlReturn, cancelUrlReturn, ipnUrlReturn, failureUrl);
  var data = req.body;
  var checkoutItems = data.Items;

  //set order level fees like discount, handling fee, tax and delivery fee here
  var totalItemsDeliveryFee = 100;
  var totalItemsDiscount = 50;
  var totalItemsHandlingFee = 30;
  var totalPrice = 0, totalTax1 = 0, totalTax2 = 0;
  checkoutItems.forEach(function(element) {
    totalPrice += element.UnitPrice * element.Quantity;
  });
  totalItemsTax1 = 0.15*totalPrice;
  totalItemsTax2 = 0.02*totalPrice;
  ///////////////////////////////////////////////////////////////

  checkoutOptions.SetOrderFees(totalItemsDeliveryFee, totalItemsDiscount, totalItemsHandlingFee, totalItemsTax1, totalItemsTax2);
  var url = ypco.checkout.GetCheckoutUrlForCart(checkoutOptions, checkoutItems);
  res.json({ "redirectUrl" : url });
};

exports.IPNDestination = function(req, res) {
  var ipnModel = req.body;
  ypco.checkout.IsIPNAuthentic(ipnModel, useSandbox).then((ipnStatus) => {
    //This means the payment is completed
    //You can now mark the order as "Paid" or "Completed" here and start the delivery process
    res.json({"IPN Status": ipnStatus});
  })
  .catch((err) => {
    res.json({ "Error" : err });
  });;
};

exports.PaymentSuccessReturnUrl = function(req, res) {
  var params = req.query;
  var pdtRequestModel = new ypco.pdtRequestModel(pdtToken, params.TransactionId, true);
  ypco.checkout.RequestPDT(pdtRequestModel).then((pdtString) => {
    //This means the payment is completed. 
    //You can extract more information of the transaction from the pdtString
    //You can now mark the order as "Paid" or "Completed" here and start the delivery process
    res.redirect('/');
  })
  .catch((err) => {
    //This means the payment is not completed yet.
    res.redirect('/');
  });;
};
