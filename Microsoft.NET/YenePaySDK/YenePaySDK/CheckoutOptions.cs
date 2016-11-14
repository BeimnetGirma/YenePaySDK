using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace YenePaySdk
{
    public class CheckoutOptions
    {
        /// <summary>
        /// Gets or sets the seller code assigned by YenePay for the merchant.
        /// </summary>
        [Required]
        public string SellerCode { get; set; }
        /// <summary>
        /// Gets or sets the unique id assigned for the order being processed.
        /// </summary>
        public string OrderId { get; set; }
        /// <summary>
        /// Gets or sets the URL on the merchant's site that will be used to redirect the buyer when the payment is successfully completed.
        /// </summary>
        public string SuccessReturn { get; set; }
        /// <summary>
        /// Gets or sets the URL on the merchant's site that will be used to redirect the buyer when the payment process is cancelled.
        /// </summary>
        public string CancelReturn { get; set; }
        /// <summary>
        /// Gets or sets the URL endpoint on the merchant's site that will be used to send Instant Payment Notifications
        /// </summary>
        public string IpnUrlReturn { get; set; }
        /// <summary>
        /// Gets or sets the switch used to determine if the operation should be done in the sandbox environment
        /// </summary>
        public bool UseSandbox { get; set; }
        /// <summary>
        /// Gets or sets the checkout process type
        /// </summary>
        public CheckoutType Process { get; set; }

        public CheckoutOptions()
        {
            UseSandbox = false;
            Process = CheckoutType.Cart;
        }

        public CheckoutOptions(CheckoutType process, string sellerCode, string orderId, string successReturn = "", string cancelReturn = "", string ipnUrl = "")
        {
            UseSandbox = false;
            Process = process;
            SellerCode = sellerCode;
            SuccessReturn = successReturn;
            CancelReturn = cancelReturn;
            IpnUrlReturn = ipnUrl;
        }
        public Dictionary<string, string> GetAsKeyValue()
        {
            Dictionary<string, string> dict = new Dictionary<string, string>();
            dict.Add("MerchantId", SellerCode);
            dict.Add("MerchantOrderId", OrderId);
            dict.Add("SuccessReturn", SuccessReturn);
            dict.Add("CancelReturn", CancelReturn);
            dict.Add("IPNUrl", IpnUrlReturn);
            dict.Add("Process", Process.ToString());
            return dict;
        }
    }

    public enum CheckoutType
    {
        Express,
        Cart
    }
}

