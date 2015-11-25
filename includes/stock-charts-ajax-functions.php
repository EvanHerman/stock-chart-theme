<?php 
/*
* 	All AJAX functionality to run for our stocks
*/

/* Define a constant for our API requests */
if( ! defined( 'YAHOO_BASE_URL' ) ) {
	define( 'YAHOO_BASE_URL', 'http://query.yahooapis.com/v1/public/yql' );
}	

// Handle stock lookup
add_action( 'wp_ajax_retreive_stock_symbol_overview', 'retreive_stock_symbol_overview_callback' );
function retreive_stock_symbol_overview_callback() {
	$stock_symbol = $_POST['stock_symbol'];
	$yql_query = 'select * from yahoo.finance.quotes where symbol in ("' . $stock_symbol . '")';  
	$yql_query_url = YAHOO_BASE_URL . "?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22" . $stock_symbol . "%22)%0A%09%09&format=json&diagnostics=true&env=http%3A%2F%2Fdatatables.org%2Falltables.env&callback=";
	// remote request
	$retreive_response = wp_remote_get( $yql_query_url );
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

// Check if the given stock exists on our watch list or not
add_action( 'wp_ajax_is_stock_on_watch_list', 'is_stock_on_watch_list_callback' );
function is_stock_on_watch_list_callback() {
	global $current_user;
    get_currentuserinfo();
	$stock_symbol = $_POST['stock_symbol'];
	$watch_list_array = get_user_stock_watch_list();
	$key_position = array_search( $stock_symbol, $watch_list_array );
	echo ( $key_position > '-1' ) ? 'true' : 'false';
	wp_die();
}

// Handle Adding a stock to a watch list
add_action( 'wp_ajax_add_stock_to_watch_list', 'add_stock_to_watch_list_callback' );
function add_stock_to_watch_list_callback() {
	global $current_user;
    get_currentuserinfo();
	$stock_symbol = $_POST['stock_symbol'];
	$watch_list_array = get_user_stock_watch_list();
	// confirm the key does not already exist
	$key_position = array_search( $stock_symbol, $watch_list_array );
	if( ! $key_position ) {
		// push the stock symbol into our array
		$watch_list_array[] = $stock_symbol;
		update_user_meta( $current_user->ID, 'user_stock_watch_list', json_encode( $watch_list_array ) );
	}
}

// Handle Removing a stock from our watch list
add_action( 'wp_ajax_remove_stock_from_watch_list', 'remove_stock_from_watch_list_callback' );
function remove_stock_from_watch_list_callback() {
	global $current_user;
    get_currentuserinfo();
	$stock_symbol = $_POST['stock_symbol'];
	$watch_list_array = get_user_stock_watch_list();
	// push the stock symbol into our array
	$key_position = array_search( $stock_symbol, $watch_list_array );
	// if the stock was found, remove it
	if( $key_position > '-1' ) {
		unset( $watch_list_array[$key_position] );
		return update_user_meta( $current_user->ID, 'user_stock_watch_list', json_encode( $watch_list_array ) );
	}
}

// Return the current users 'Stock Watch List'
function get_user_stock_watch_list() {
	global $current_user;
    get_currentuserinfo();
	$stock_watch_list = get_user_meta( $current_user->ID, 'user_stock_watch_list', true );
	$watch_list_array = ( $stock_watch_list ) ? $stock_watch_list : '';
	return json_decode( $watch_list_array, true );
}