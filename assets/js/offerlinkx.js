(function($){
    "use strict";
    jQuery(document).ready(function($){

        // Add products to cart on click of #offerlinkx-accept-offer-btn button, process using ajax
        jQuery('#offerlinkx-accept-offer-btn').on('click', function(e){
            e.preventDefault();
            var offerlinkx_offer_id = jQuery(this).data('offer-id');
            jQuery.ajax( {
                url: offerlinkxajax.ajaxurl,
                type: 'post',
                data: {
                    action: 'offerlinkx_accept_offer',
                    offerlinkx_nonce: offerlinkxajax.nonce,   // pass the nonce here
                    offerlinkx_offer: offerlinkx_offer_id,
                },
                success( data ) {
                    if ( data ) {
                        var data = jQuery.parseJSON( data );
                        if( data.status == 'success' ){
                            jQuery("#offerlinkx-offer-status-message").html( data.message );
                            jQuery(document.body).trigger('wc_fragment_refresh');
                            jQuery(".single-offer-actions").hide();
                            // settimeout 2 second to redirect
                            setTimeout(function() {
                                window.location.href = data.redirect;
                            }, 2000);
                        } else {
                            alert( data.message );
                        }
                    }
                },
            });
        });
    });
})(jQuery);