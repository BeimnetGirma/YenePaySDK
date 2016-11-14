using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using YenePaySdk;

namespace SampleShopApplication.Controllers
{
    public class HomeController : Controller
    {
        private CheckoutOptions checkoutoptions;

        public HomeController()
        {
            checkoutoptions = new CheckoutOptions();
            checkoutoptions.SellerCode = "ZJCWWWRB";
            checkoutoptions.CancelReturn = "";
            checkoutoptions.IpnUrlReturn = "";
            checkoutoptions.SuccessReturn = "";
            checkoutoptions.UseSandbox = false;
        }

        //
        // GET: /Home/
        public ActionResult Index()
        {
            return View();
        }

        /// <summary>
        /// Handles the Express checkout type which allows buying a single item from your site or online store
        /// </summary>
        [HttpPost]
        public void CheckoutExpress()
        {
            checkoutoptions.Process = CheckoutType.Express;
            var itemId = Request.Form["ItemId"];
            var itemName = Request.Form["ItemName"];
            var unitPrice = decimal.Parse(Request.Form["UnitPrice"]);
            var quantity = int.Parse(Request.Form["Quantity"]);
            var discount = decimal.Parse(Request.Form["Discount"]);
            var shippingFee = decimal.Parse(Request.Form["Shipping"]);
            var handlingFee = decimal.Parse(Request.Form["HandlingFee"]);
            var tax1 = decimal.Parse(Request.Form["Tax1"]);
            var tax2 = decimal.Parse(Request.Form["Tax2"]);

            CheckoutItem checkoutitem = new CheckoutItem(itemId, itemName, unitPrice, quantity, discount, shippingFee, handlingFee, tax1, tax2);
            var url = CheckoutHelper.GetCheckoutUrl(checkoutoptions, checkoutitem);
            Response.Redirect(url);
        }

        [HttpGet]
        public ActionResult Cart()
        {
            return View();
        }

        /// <summary>
        /// Handles the Cart checkout type which allows buying multiple items at once from your site or online store
        /// </summary>
        /// <param name="Items">A list of Items selected by your customer</param>
        /// <returns>A JSON object containing the checkout payment URL which you can use to redirect a customer to YenePay's payment processing site</returns>
        [HttpPost]
        public ActionResult CheckoutCart(List<CheckoutItem> Items)
        {
            checkoutoptions.Process = CheckoutType.Cart;
            var url = CheckoutHelper.GetCheckoutUrl(checkoutoptions, Items);
            return Json(new { redirectUrl = url });

        }


    }
}
