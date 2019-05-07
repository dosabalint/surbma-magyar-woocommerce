jQuery(document).ready(function($){

	if(typeof surbma_hc_postcodes != 'undefined' && $('.woocommerce-checkout #billing_postcode').length){
		var $postcodeField = $('.woocommerce-checkout #billing_postcode');
		var $cityField = $('.woocommerce-checkout #billing_city');
		var cityFieldTouched = false;

		// If city is manually added, don't change it.
		$cityField.keyup(function() {
			cityFieldTouched = true;
		});

		$postcodeField.on('input change focusout keyup', function(){
			var postcode = parseInt($postcodeField.val());
			var cityIndex = surbma_hc_postcodes.indexOf(postcode);
			var city = surbma_hc_cities[cityIndex];
			if($postcodeField.val().length == 4 && cityIndex > -1 && ($cityField.val() == '' || !cityFieldTouched) && surbma_hc_postcodes[cityIndex+1] != postcode){
				$cityField.val( city );
			}
		});
	}

});
