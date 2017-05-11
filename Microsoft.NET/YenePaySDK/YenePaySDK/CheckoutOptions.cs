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
        /// Gets or sets the URL on the merchant's site that will be used to redirect the buyer when the payment process fails.
        /// </summary>
        public string FailureReturn { get; set; }
        /// <summary>
        /// Gets or sets the URL on the merchant's site that will be used to redirect the buyer when the payment process is cancelled.
        /// </summary>
        public string CancelReturn { get; set; }
        /// <summary>
        /// Gets or sets the URL endpoint on the merchant's site that will be used to send Instant Payment Notifications
        /// </summary>
        public string IpnUrlReturn { get; set; }
        /// <summary>
        /// the number of days before an order expires for payment;
        /// this is an optional field
        /// </summary>
        public int? ExpiresInDays { get; set; }
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
            Process = CheckoutType.Express;
        }

        public CheckoutOptions(string sellerCode, bool useSandBox)
        {
            SellerCode = sellerCode;
            UseSandbox = useSandBox;
        }

        /// <summary>
        /// Creates a new instance of a CheckoutOptions object with the initial values specified.
        /// This object will be u
        /// </summary>
        /// <param name="sellerCode"></param>
        /// <param name="merchantOrderId"></param>
        /// <param name="process"></param>
        /// <param name="useSandBox"></param>
        /// <param name="expiresInDays"></param>
        /// <param name="successReturn"></param>
        /// <param name="cancelReturn"></param>
        /// <param name="ipnUrl"></param>
        /// <param name="failureUrl"></param>
        public CheckoutOptions(string sellerCode, string merchantOrderId = "", CheckoutType process=CheckoutType.Express, bool useSandBox = false, int? expiresInDays = null, string successReturn = "", string cancelReturn = "", string ipnUrl = "", string failureUrl = "")
        {
            UseSandbox = useSandBox;
            Process = process;
            SellerCode = sellerCode;
            SuccessReturn = successReturn;
            CancelReturn = cancelReturn;
            IpnUrlReturn = ipnUrl;
            FailureReturn = failureUrl;
            ExpiresInDays = expiresInDays;
            OrderId = merchantOrderId;
        }
        public Dictionary<string, string> GetAsKeyValue()
        {
            Dictionary<string, string> dict = new Dictionary<string, string>();
            dict.Add("MerchantId", SellerCode);
            dict.Add("MerchantOrderId", OrderId);
            dict.Add("SuccessUrl", SuccessReturn);
            dict.Add("CancelUrl", CancelReturn);
            dict.Add("IPNUrl", IpnUrlReturn);
            dict.Add("FailureUrl", FailureReturn);
            dict.Add("Process", Process.ToString());
            if (ExpiresInDays.HasValue)
                dict.Add("ExpiresInDays", ExpiresInDays.Value.ToString());
            return dict;
        }
    }

    public enum CheckoutType
    {
        Express,
        Cart
    }
}

