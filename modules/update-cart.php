<?php

// https://gist.github.com/mikaelz/f41e29c6a99a595602e4
function surbma_hc_cart_update_qty_script() {
	if( is_cart() ) { ?>
<script>
	jQuery('div.woocommerce').on('change', '.qty', function() {
		jQuery("[name='update_cart']").removeAttr('disabled');
		jQuery("[name='update_cart']").trigger("click");
	});
</script>
<?php }
}
add_action( 'wp_footer', 'surbma_hc_cart_update_qty_script' );
