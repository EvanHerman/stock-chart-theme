<?php
/*
*	Custom Helper Functions for the site
*/

// Enqueue All Scripts & Styles
add_action( 'wp_enqueue_scripts', 'stock_charts_enqueue_base_scripts_and_styles' );
function stock_charts_enqueue_base_scripts_and_styles() {
	// == Styles == //
		// bootstrap base
		wp_register_style( 'bootstrap.css', get_template_directory_uri() . '/includes/css/bootstrap.css', array( 'html5blank' ) );
		wp_enqueue_style( 'bootstrap.css' );
		
		// bootstrap date-picker
		wp_register_style( 'bootstrap-datepicker.css', get_template_directory_uri() . '/includes/js/bootstrap-datepicker/dist/css/bootstrap-datepicker.css', array( 'html5blank' ) );
		wp_enqueue_style( 'bootstrap-datepicker.css' );
		
		// bootstrap date-picker
		wp_register_style( 'daterange-picker.css', get_template_directory_uri() . '/includes/js/bootstrap-daterangepicker/daterangepicker.css', array( 'html5blank' ) );
		wp_enqueue_style( 'daterange-picker.css' );
		
		// font awesome
		wp_register_style( 'font-awesome.css', get_template_directory_uri() . '/includes/font-awesome/css/font-awesome.css', array( 'bootstrap.css' ) );
		wp_enqueue_style( 'font-awesome.css' );
		
		// styles/responsive styles
		wp_register_style( 'stock-chart-styles.css', get_template_directory_uri() . '/includes/css/style.css', array( 'bootstrap.css' ) );
		wp_enqueue_style( 'stock-chart-styles.css' );
		
		wp_register_style( 'stock-chart-responsive-styles.css', get_template_directory_uri() . '/includes/css/style-responsive.css', array( 'stock-chart-styles.css' ) );
		wp_enqueue_style( 'stock-chart-responsive-styles.css' );
		
		// Zabuto Calendar
		wp_register_style( 'zabuto-calendar.css', get_template_directory_uri() . '/includes/css/zabuto_calendar.css', array( 'stock-chart-styles.css' ) );
		wp_enqueue_style( 'zabuto-calendar.css' );
		
		// Gritter
		wp_register_style( 'gritter.css', get_template_directory_uri() . '/includes/js/gritter/css/jquery.gritter.css', array( 'stock-chart-styles.css' ) );
		wp_enqueue_style( 'gritter.css' );
		
		// Lineicons
		wp_register_style( 'lineicons.css', get_template_directory_uri() . '/includes/lineicons/style.css', array( 'stock-chart-styles.css' ) );
		wp_enqueue_style( 'lineicons.css' );
		
		// Colorpicker
		wp_register_style( 'colorpicker.css', get_template_directory_uri() . '/includes/css/colorpicker.css', array( 'stock-chart-styles.css' ) );
		wp_enqueue_style( 'colorpicker.css' );
		
	// == Scripts == //
		wp_enqueue_script( 'jquery' );
		
		// jquery ui custom
		wp_register_script( 'jquery-ui-custom.js', get_template_directory_uri() . '/includes/js/jquery-ui-1.9.2.custom.min.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'jquery-ui-custom.js' );
		
		// fullcalendar
		wp_register_script( 'fullcalendar.js', get_template_directory_uri() . '/includes/js/fullcalendar/fullcalendar.min.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'fullcalendar.js' );
		
		// bootstrap min
		wp_register_script( 'bootstrap.js', get_template_directory_uri() . '/includes/js/bootstrap.min.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'bootstrap.js' );
		
		// dcjq accordion
		wp_register_script( 'jquery.dcjqaccordion.2.7.js', get_template_directory_uri() . '/includes/js/jquery.dcjqaccordion.2.7.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'jquery.dcjqaccordion.2.7.js' );
		
		// scroll to
		wp_register_script( 'jquery.scrollTo.min.js', get_template_directory_uri() . '/includes/js/jquery.scrollTo.min.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'jquery.scrollTo.min.js' );
		
		// nice scroll
		wp_register_script( 'jquery.nicescroll.js', get_template_directory_uri() . '/includes/js/jquery.nicescroll.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'jquery.nicescroll.js' );
		
		// common scripts
		wp_register_script( 'common-scripts.js', get_template_directory_uri() . '/includes/js/common-scripts.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'common-scripts.js' );
		
		// calendar conf events
		wp_register_script( 'calendar-conf-events.js', get_template_directory_uri() . '/includes/js/calendar-conf-events.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'calendar-conf-events.js' );
		
		// gritter 
		wp_register_script( 'gritter.js', get_template_directory_uri() . '/includes/js/gritter/js/jquery.gritter.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'gritter.js' );
		
		// gritter conf 
		wp_register_script( 'gritter-conf.js', get_template_directory_uri() . '/includes/js/gritter-conf.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'gritter-conf.js' );
		
		wp_register_script( 'sparkline.js', get_template_directory_uri() . '/includes/js/jquery.sparkline.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'sparkline.js' );
		
		// sparkline chart 
		wp_register_script( 'sparkline-chart.js', get_template_directory_uri() . '/includes/js/sparkline-chart.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'sparkline-chart.js' );
		
		// zabuto calendar
		wp_register_script( 'zabuto_calendar.js', get_template_directory_uri() . '/includes/js/zabuto_calendar.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'zabuto_calendar.js' );
		
		// bootstrap switch
		wp_register_script( 'bootstrap-switch.js', get_template_directory_uri() . '/includes/js/bootstrap-switch.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'bootstrap-switch.js' );
		
		// bootstrap datepicker
		wp_register_script( 'bootstrap-datepicker.js', get_template_directory_uri() . '/includes/js/bootstrap-datepicker/dist/js/bootstrap-datepicker.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'bootstrap-datepicker.js' );
		
		// bootstrap input mask
		wp_register_script( 'bootstrap-inputmask.js', get_template_directory_uri() . '/includes/js/bootstrap-inputmask/bootstrap-inputmask.min.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'bootstrap-inputmask.js' );
		
		// date.js
		wp_register_script( 'date.js', get_template_directory_uri() . '/includes/js/bootstrap-daterangepicker/date.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'date.js' );
		
		wp_register_script( 'moment.js', get_template_directory_uri() . '/includes/js/bootstrap-daterangepicker/moment.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'moment.js' );
	
		// color picker
		wp_register_script( 'colorpicker.js', get_template_directory_uri() . '/includes/js/colorpicker.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'colorpicker.js' );
		
		// tags input
		wp_register_script( 'daterangepicker.js', get_template_directory_uri() . '/includes/js/bootstrap-daterangepicker/daterangepicker.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'daterangepicker.js' );
		
		// tags input
		wp_register_script( 'tagsinput.js', get_template_directory_uri() . '/includes/js/jquery.tagsinput.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'tagsinput.js' );
		
		// component js
		wp_register_script( 'component.js', get_template_directory_uri() . '/includes/js/form-component.js', array( 'jquery', 'daterangepicker.js', 'tagsinput.js', 'colorpicker.js', 'moment.js', 'date.js' ), 'all', true );
		wp_enqueue_script( 'component.js' );
		
}

// Render the custom navigation
function generate_stock_chart_slideout_navigation() {
	// include the nav template
	require_once get_template_directory() . '/templates/main-slideout-nav.php';
}

// Redirect users who are not logged in
add_action( 'wp_head', 'redirect_logged_out_users' );
function redirect_logged_out_users() {
	global $post;
	if( $post->ID != 10 ) {
		if( ! is_user_logged_in() ) {
			wp_redirect( esc_url( get_permalink( 10 ) ) ); // login page
			exit;
		}
	}
	return;	
}

// Add classes to the body where needed
add_action( 'body_class', 'add_custom_body_class' );
function add_custom_body_class( $classes ) {
	global $post;
	// Login Page
	if( $post->ID == 10 ) {
		$classes[] = 'stock-charts-login-page';
	}
	return $classes;
}

// Add custom Logo above the login page
function add_custom_logo_to_login_form() {
	?>
		<img src="<?php echo get_template_directory_uri(); ?>/includes/img/site-logo.png" class="stock-charts-login-logo" title="Stock Charts Logo">
	<?php
}
add_action( 'login_form_top', 'add_custom_logo_to_login_form' );


/**	
*	Get the homepage watch list container details
*	@since 0.1
*	Note: Instead of looping, we should chain the events and send 1 API request
*/
function get_homepage_watchlist() {
	?><div class="watch-list-interior-container nice-scroll-container"><?php
		$watch_list_array = get_user_stock_watch_list();
		if( ! empty( $watch_list_array ) ) {
			foreach( $watch_list_array as $watched_stock ) {
				$yql_query = 'select * from yahoo.finance.quotes where symbol in ("' . $watched_stock . '")';  
				$yql_query_url = YAHOO_BASE_URL . "?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22" . $watched_stock . "%22)%0A%09%09&format=json&diagnostics=true&env=http%3A%2F%2Fdatatables.org%2Falltables.env&callback=";
				$query = wp_remote_get( $yql_query_url, array( 'timeout' => 120 ) );
				// check and display error if present
				if( is_wp_error( $query ) ) {
					echo $query->getMessage();
					return;
				} else {
					$query_body = json_decode( wp_remote_retrieve_body( $query ), true );
					$stock_name = $query_body['query']['results']['quote']['Name'];
					$stock_symbol = $query_body['query']['results']['quote']['symbol'];
					$current_price = $query_body['query']['results']['quote']['Bid'];
					$percent_change = $query_body['query']['results']['quote']['PercentChange'];
					$change = $query_body['query']['results']['quote']['Change'];
					$change_icon = ( str_replace( '%', '', $change ) >= 0 ) ? '<i class="fa fa-arrow-up"></i>' : '<i class="fa fa-arrow-down"></i>';
					$change_class = ( $change_icon == '<i class="fa fa-arrow-up"></i>' ) ? 'watch-list-increase-price' : 'watch-list-decrease-price';
					?>
						<div class="watched-stock <?php echo $stock_symbol; ?>">
							<div class="desc">
								<h4 class="stock-name"><?php echo $stock_name; ?> </h4>
								<section class="stock-details">
									<span class="stock-current-price">
										<?php echo '$' . number_format( $current_price, 2 ); ?>
									</span>
									<span class="stock-watch-change-container <?php echo $change_class; ?>">
										<?php echo $change_icon . ' ' . $change . ' / ' . $percent_change; ?>
									</span>
								</section>
							</div>
						</div>
					<?php
				}
			}
		} else {
			?>
				<div class="watched-stock">
					<div class="desc">
						<h4 style="text-align:center;" class="no-watch-list-items">No stocks found on your watch list.</h4>
					</div>
				</div>
			<?php
		}
	?></div><?php
}