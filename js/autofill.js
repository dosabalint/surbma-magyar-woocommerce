jQuery(document).ready(function($){

	if(typeof surbma_hc_postcodes != 'undefined' && $('.woocommerce-checkout #billing_postcode').length){
		var $postcodeField = $('.woocommerce-checkout #billing_postcode');
		var $cityField = $('.woocommerce-checkout #billing_city');
		var cityFieldTouched = false;

		// If city is manually added, don't change it.
		$cityField.keyup(function() {
			cityFieldTouched = true;
		});

		$postcodeField.on('change keyup', function(){
			var postcode = parseInt($postcodeField.val());
			var cityIndex=-1;
			var city = '';
			if (!isNaN(postcode)) { 
				cityIndex = surbma_hc_postcodes.indexOf(postcode);
				if (cityIndex>=0) {
					city=surbma_hc_cities[cityIndex];
				}
				if (1000<=postcode && postcode<=9999 && city.length>0) {
					$cityField.val(city);
					cityFieldTouched = false;
				}
			}
		});
	}

});
