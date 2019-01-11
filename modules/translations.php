<?php

// Custom translations
function surbma_hc_custom_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case '' :
			$translated_text = '';
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'surbma_hc_custom_strings', 20, 3 );
