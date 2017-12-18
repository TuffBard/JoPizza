$(function(){
    initPaypalButton();
});

/**
* Initialise le bouton paypal avec Stripe
* @return {[type]} [description]
*/
function initPaypalButton(){
    // Create a Stripe client
    var stripe = Stripe('pk_test_CB9CBhMYCjxMmp6fj1oeealm');

    // Create an instance of Elements
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        $(".btn-success").prop("disabled", true);
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                $.ajax({
                    url: "api.php?r=Stripe&p=payment",
                    method: "POST",
                    data: {
                        token: result.token.id,
                        total: $("#total").val()
                    },
                    success: function(data){
                        if(data == "success"){
                            window.location = "index.php?r=paiement&p=success";
                        }
                        $(".result").html(data);
                    },
                    error: function(status, xhr, err){
                        $(".btn-success").prop("disabled", false);
                    }
                });
            }
        });
    });
}
