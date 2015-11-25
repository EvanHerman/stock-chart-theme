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
		
		/*
		*	Stock symbol lookup
		*/
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
	/* Clear the hml */
	jQuery( '.stock-symbol-overview' ).children().each( function() {
		jQuery( this ).html( '' );
	});
	/* Hide the overview table */
	jQuery( '.stock-data-table' ).hide();
	/* display the preloader */
	jQuery( '.stock-symbol-overview' ).prepend( localized_data.preloader_image );
	/* Setup the data */
	var data = {
		'action': 'retreive_stock_symbol_overview',
		'stock_symbol': stock_symbol.toUpperCase(),    // We pass php values differently!
		'format': 'json'
	};	
	// run the ajax request to retreive stock data
	jQuery.post( localized_data.ajax_url, data, function(response) {
		populate_stock_data( response );
	});
}

/*
*	Populate the stock data with retreived data
*	- returns data via API request
*/
function populate_stock_data( stock_data ) {
	// console.log( stock_data );
	
	/* Remove the preloader */
	jQuery( '.stock-chart-preloader' ).remove();
	
	/* Parse & store stock data */
	var stock_data = JSON.parse( stock_data );
	var quote_data = stock_data['query']['results']['quote'];
	var diagnostic_data = stock_data['query']['diagnostics'];
		
	/* Check for any errors first & return them */
	if( quote_data['Ask'] == null ) {
		jQuery( '.stock-symbol-lookup-error' ).html( '<p class="alert alert-danger">Invalid stock symbol "' + jQuery( '.stock-symbol-input' ).val().toUpperCase() +'". Please try again.</p>' )
		return;
	}
	
	// Fix & find the refresh button a home
	// jQuery( '.stock-symbol-name' ).before( '<i class="fa fa-refresh" data-attr-symbol="' + stock_data.Symbol + '" onclick=populate_stock_data("'+stock_data.Symbol+'");return false;></i>' );
	
	// if the found stock is already on a watch list, display the remove from watch list button
	is_stock_on_watch_list( quote_data['symbol'], quote_data );
	
	/* populate with stock data */
	jQuery( '.stock-symbol-name' ).html( '<span class="stock-name">' + quote_data['Name'] + '</span> <small class="stock-symbol">(' + quote_data['symbol'] + ')</small>' );
	
	/* populate with stock change data */
	var change = quote_data['Change'];
	var percent_change = quote_data['PercentChange'];
	var change_class = ( percent_change.replace( '%', '' ) >= 0 ) ? 'positive-price-increase' : 'negative-price-increase'
	var arrow_indicator = ( change_class == 'positive-price-increase' ) ? 'fa fa-arrow-up' : 'fa fa-arrow-down';

	jQuery( '.stock-change' ).html( '<span class="first-section"><i class="' + arrow_indicator + '"></i> ' + money_format.format( quote_data['Ask'] ) + '<small class="currency-text">' + quote_data['Currency'] + '</small></span><section class="change-data"><span class="change-value">' + change.trim() + '</span> <span class="change-percent"><span class="' + change_class + '">' + percent_change.trim() + '</span></span></section>' );
		
	/* Populate the data table */
	var data_table = jQuery( '.stock-data-table' );
	jQuery( '.stock-data-table' ).find( '.stock-symbol-ask' ).text( money_format.format( quote_data['Ask'] ) );
	jQuery( '.stock-data-table' ).find( '.stock-symbol-bid' ).text( money_format.format( quote_data['Bid'] )  );
	jQuery( '.stock-data-table' ).find( '.stock-symbol-day-high' ).text( money_format.format( quote_data['DaysHigh'] ) );
	jQuery( '.stock-data-table' ).find( '.stock-symbol-day-low' ).text( money_format.format( quote_data['DaysLow'] ) );
		
	/* Show the table */
	data_table.show();
	
	/* Populate the date/time this data was retreived */
	jQuery( '.stock-data-retreived' ).text( 'Date Retrieved: ' + moment( stock_data['query']['created'] ).format( 'MMM Do, YYYY at hh:mm:ss' ) );
}

/*
*	On initial load of our 'Stock Search', check if this stock is already on our watch list or not
*/
function is_stock_on_watch_list( stock_symbol, quote_data ) {
	/* Setup the data */
	var data = {
		'action': 'is_stock_on_watch_list',
		'stock_symbol': stock_symbol,    // We pass php values differently!
	};	
	// run the ajax request to retreive stock data
	jQuery.post( localized_data.ajax_url, data, function(response) {
		// if the found stock is already on a watch list, display the remove from watch list button
		if( response === 'true' ) {
			// populate the remove from watch list button
			jQuery( '.manage-watch-list-button' ).html ('<button type="button" class="btn btn-warning btn-sm add-to-watch-list" data-attr-symbol="' + quote_data['symbol'] + '" onclick="removeStockFromWatchList( \''+quote_data['symbol']+'\', this );return false;"><i class="fa fa-times"></i> Remove from Watch List</button>' );
		} else {
			// populate the add to watch list button
			jQuery( '.manage-watch-list-button' ).html ('<button type="button" class="btn btn-primary btn-sm add-to-watch-list" data-attr-symbol="' + quote_data['symbol'] + '" onclick="addStockToWatchList( \''+quote_data['symbol']+'\', this );return false;"><i class="fa fa-eye"></i> Add to Watch List</button>' );
		}
	});
}

/*
*	Add stock to watch list
*	- Take the current stock symbol and add it to the current users watch list
*/
function addStockToWatchList( stock_symbol, clicked_button ) {
	/*
	*	Add stock to watch list
	*/
	var data = {
		'action': 'add_stock_to_watch_list',
		'stock_symbol': stock_symbol, 
	};	
	// run the ajax request to retreive stock data
	jQuery.post( localized_data.ajax_url, data, function(response) {
		jQuery( clicked_button ).removeClass( 'btn btn-primary' ).addClass( 'btn btn-warning' ).html( '<i class="fa fa-times"></i> Remove from Watch List' ).removeClass( 'add-to-watch-list' ).addClass( 'remove-from-watch-list' ).attr( 'onclick', 'removeStockFromWatchList("'+stock_symbol+'", this)' );
		console.log( response );
	});
}

/*
*	Remove stock from watch list
*	- Remove the given stock from the watch list
*/
function removeStockFromWatchList( stock_symbol, clicked_button ) {
	/*
	*	Remove stock from watch list
	*/
	var data = {
		'action': 'remove_stock_from_watch_list',
		'stock_symbol': stock_symbol, 
	};	
	// run the ajax request to retreive stock data
	jQuery.post( localized_data.ajax_url, data, function(response) {
		jQuery( clicked_button ).removeClass( 'btn btn-warning' ).addClass( 'btn btn-primary' ).html( '<i class="fa fa-eye"></i> Add to Watch List' ).removeClass( 'remove-from-watch-list' ).addClass( 'add-to-watch-list' ).attr( 'onclick', 'addStockToWatchList("'+stock_symbol+'",this)' );
	});
}

/*
*	Return an unformatted value in the proper money value format
*/
var money_format = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
  minimumFractionDigits: 2,
});