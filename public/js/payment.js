function getIdComprador(){
    return PagSeguroDirectPayment.getSenderHash();
}

function getMeioPagamento(valor){
    PagSeguroDirectPayment.getPaymentMethods({
        amount: valor,
        success: function(response) {
            return response;
        },
        error: function(response) {
            return response;
        }
    });
}

function getBandeiraCartao(cardNumber, fn) {
    PagSeguroDirectPayment.getBrand({
        cardBin: cardNumber,
        success: function(response) {
            fn(response);
        },
        error: function(response) {
            fn(response);
        }
    });
}

function getParcelaPorCartao(valorPago, bandeira, fn) {
    PagSeguroDirectPayment.getInstallments({
        amount: valorPago,
        brand: bandeira,
        maxInstallmentNoInterest: 2,
        success: function(response) {
            fn(response);
        },
        error: function(response) {
            fn(response);
        },
        complete: function(response) {
            fn(response);
        }
    });
}