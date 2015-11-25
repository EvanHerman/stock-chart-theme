<?php 
/*
*	Template Name: Homepage Template
*/

get_header(); ?>

<section id="main-content" class="site-min-height">

	<!-- header section -->
	<section class="wrapper home-head-wrapper">
		<div class="row mt home-header">
			<div class="col-lg-12">
				<div class="row content-panel">
					<div class="col-md-4 profile-text mt mb centered">
						<div class="right-divider hidden-sm hidden-xs">
							<h4>1922</h4>
							<h6>FOLLOWERS</h6>
							<h4>290</h4>
							<h6>FOLLOWING</h6>
							<h4>$ 13,980</h4>
							<h6>MONTHLY EARNINGS</h6>
						</div>
					</div><!-- --/col-md-4 ---->
					
					<div class="col-md-4 profile-text">
						<h3>Marcel Newman</h3>
						<h6>Main Administrator</h6>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
						<br>
						<p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message</button></p>
					</div><!-- --/col-md-4 ---->
					
					<div class="col-md-4 centered">
						<div class="profile-pic">
								<button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
								<button class="btn btn-theme02">Add</button>
							</p>
						</div>
					</div><!-- --/col-md-4 ---->
				</div><!-- /row -->	   
			</div>
		</div>
	</section>
	<!-- end header section -->
	
	<div class="wrapper sidebar-wrapper">
		<div class="row mt">
		
			<!-- center container -->
			<div class="col-lg-9 main-chart">
				<!-- 2ND ROW OF PANELS -->
					<div class="row">
					
						<!-- TODO PANEL -->
						<div class="col-md-4 col-sm-4 mb watch-list-panel">
							<!-- REVENUE PANEL -->
							<div class="green-panel pn">
								<div class="green-header">
									<h5>
										Watch List 
										<small class="view-watch-list-link"><a href="#">view</a></small>
									</h5>	
								</div>
								<?php get_homepage_watchlist(); ?>
							</div>
						</div><!-- /col-md-4 -->
						
					</div>
			</div>
			
			<!-- right sidebar container -->
			<div class="col-lg-3 ds">
				<h3>Search Stock Symbol</h3>
				<!-- Symbol Lookup -->
				<div class="desc search-stock">
					<p class="description">Enter a stock symbol in the field below to get real time stats.</p>
					<form class="form-inline style-form" id="search-stock-symbols">
						<input type="text" class="form-control stock-symbol-input" placeholder="Enter Symbol">
						<button type="submit" class="btn btn-theme">Sign in</button>	
						<p class="stock-symbol-lookup-error"></p>
					</form>
					
					<!-- stock data -->
					<section class="stock-symbol-overview">	
							
						<h2 class="stock-symbol-name"></h2>
						<!-- populate with data on form submission -->
						
						<section class="stock-change"></section>
												
					</section>
					
					<!-- stock data table -->
					<section class="stock-data-table">
						<!-- add to watch list -->
						<span class="manage-watch-list-button"></span>
						
						<!-- table data -->
						<table class="table table-bordered table-striped table-condensed">
							<thead>
							  <tr>
								  <th>Symbol Overview</th>
								  <th></th>
							  </tr>
							</thead>
							<tr>
								<th>Ask</th>
								<th class="stock-symbol-ask"></th>
							</tr>
							<tbody>
							<tr>
								<td>Bid</td>
								<td class="stock-symbol-bid"></td>
							</tr>
							<tr>
								<td>Days High</td>
								<td class="stock-symbol-day-high"></td>
							</tr>
							<tr>
								<td>Days Low</td>
								<td class="stock-symbol-day-low"></td>
							</tr>
						  </tbody>
					  </table>
					</section>
					
					<p class="stock-data-retreived"></p>
					
				</div>
			</div>
			
		</div>
	</div>
	
</section>

<?php get_footer(); ?>