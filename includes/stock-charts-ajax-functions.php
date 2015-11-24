<?php 
/*
* 	All AJAX functionality to run for our stocks
*/

if( ! defined( 'MARKIT_ON_DEMAND_LOOKUP_URL' ) ) {
	define( 'MARKIT_ON_DEMAND_LOOKUP_URL', 'http://dev.markitondemand.com/MODApis/Api/v2/Quote/jsonp?symbol=MSFT' );
}	

// Handle stock lookup
add_action( 'wp_ajax_retreive_stock_symbol_overview', 'retreive_stock_symbol_overview_callback' );
function retreive_stock_symbol_overview_callback() {
	$retreive_response = wp_remote_get( MARKIT_ON_DEMAND_LOOKUP_URL . '&callback=populate_symbol_overview' );
	// check for error
	if( is_wp_error( $retreive_response ) ) {
		echo $retreive_response->getMessage();
	}
	// retreive body
	$response_body = wp_remote_retrieve_body( $retreive_response );
	// check for error
	if( is_wp_error( $response_body ) ) {
		echo $response_body->getMessage();
	}
	wp_send_json( $response_body );
	wp_die();
}

