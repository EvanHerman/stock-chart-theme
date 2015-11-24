(function ($, root, undefined) {
	
	$(function () {
		'use strict';
		
		/**
		*	Initialize the gritter notification in the top right hand corner of the site
		*	@since 1.0
		*/
		var unique_id = $.gritter.add({
			// (string | mandatory) the heading of the notification
			title: 'Welcome to Stock Watch!',
			// (string | mandatory) the text inside the notification
			text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
			// (string | optional) the image to display on the left
			image: localized_data.image_path + '/site-logo.png',
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: true,
			// (int | optional) the time you want it to be alive for before fading out
			time: '',
			// (string | optional) the class name you want to apply to that specific message
			class_name: 'my-sticky-class'
		});
		
		
		jQuery( 'body' ).on( 'submit', '#search-stock-symbols', function() {
			var stock_symbol = jQuery( '.stock-symbol-input' ).val();
			/* Confirm there was something entered */
			if( stock_symbol != '' ) {
				jQuery( '.stock-symbol-lookup-error' ).text( '' );
				get_stock_data( stock_symbol );
			} else {
				jQuery( '.stock-symbol-lookup-error' ).text( 'Please enter a stock symbol in the field above.' );
			}
			// prevent page refresh
			return false;
		});
		
		// return false;
		return false;
	});

})(jQuery, this);


/*
*	Get stock data from the API
*/
function get_stock_data( stock_symbol ) {
	var data = {
		'action': 'retreive_stock_symbol_overview',
		'stock_symbol': stock_symbol,    // We pass php values differently!
		'format': 'json'
	};		
	jQuery( '.stock-symbol-overview' ).children().each( function() {
		jQuery( this ).html( '' );
	});
	// display the preloader
	jQuery( '.stock-symbol-overview' ).prepend( localized_data.preloader_image );
	// run the ajax request to retreive stock data
	jQuery.ajax({
		type: 'GET',
		url: 'http://dev.markitondemand.com/MODApis/Api/v2/Quote/jsonp?symbol=' + stock_symbol.toUpperCase(),
		async: false,
		jsonpCallback: 'jsonCallback',
		contentType: "application/json",
		dataType: 'jsonp',
		success: function( stock_data ) {
			// populate the stock data with returned values
			populate_stock_data( stock_data );	
			console.log( stock_data );
		},
		error: function( error ) {
		   return_stock_symbol_error( error );
		}
	});
}

/*
*	Populate the stock data with retreived data
*	- returns data via API request
*/
function populate_stock_data( stock_data ) {
	// remove the preloader
	jQuery( '.stock-chart-preloader' ).remove();
	// return the error
	if( stock_data.Message && stock_data.Message != '' ) {
		jQuery( '.stock-symbol-name' ).html( '<p class="alert alert-danger">' + stock_data.Message + '</p>' );
		return;
	}
	
	// Fix & find the refresh button a home
	// jQuery( '.stock-symbol-name' ).before( '<i class="fa fa-refresh" data-attr-symbol="' + stock_data.Symbol + '" onclick=populate_stock_data("'+stock_data.Symbol+'");return false;></i>' );
	
	// populate with stock data
	jQuery( '.stock-symbol-name' ).html( '<span class="stock-name">' + stock_data.Name + '</span> <small class="stock-symbol">(' + stock_data.Symbol + ')</small>' );
}

/*
*	Return an error when something goes wrong
*/
function return_stock_symbol_error( stock_error ) {
	// remove the preloader
	jQuery( '.stock-chart-preloader' ).remove();
}