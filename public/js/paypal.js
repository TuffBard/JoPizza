$(function(){
    initPaypalButton();
})

function initPaypalButton(){
    paypal.Button.render({

        env: 'production', //'production' Or 'sandbox',

        commit: true, // Show a 'Pay Now' button

        style: {
            color: 'gold',
            size: 'large',
            locale: 'fr_FR',
            shape: 'rect',
            label: 'paypal'
        },

        payment: function(data, actions) {
            /*
             * Set up the payment here
             */
        },

        onAuthorize: function(data, actions) {
            /*
             * Execute the payment here
             */
        },

        onCancel: function(data, actions) {
            /*
             * Buyer cancelled the payment
             */
        },

        onError: function(err) {
            /*
             * An error occurred during the transaction
             */
        }

    }, '#paypal-button');
}
