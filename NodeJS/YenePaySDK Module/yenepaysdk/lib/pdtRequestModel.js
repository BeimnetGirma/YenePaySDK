'use strict';

module.exports = function(pdtToken, transactionId, useSandbox = false)
    {
        var self = this;
        self.RequestType = "PDT";
        self.PdtToken = pdtToken;
        self.TransactionId = transactionId;
        self.UseSandbox = useSandbox;

        self.GetPDTDictionary = function()
        {            
            var dic = {
                RequestType: self.RequestType,
                PdtToken: self.PdtToken,
                TransactionId: self.TransactionId
            };
            return dic;
        }
    }