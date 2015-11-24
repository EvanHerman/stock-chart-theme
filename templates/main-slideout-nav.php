<?php 
	/* 
	*	Main Navigation, slideout from the left
	*	- Manage the menu from the admin screen
	*
	*/
	global $current_user;
	get_currentuserinfo();
	$user_image = get_avatar( $current_user->user_email, 100, NULL, $current_user->user_firstname . ' avatar', array( 'class' => 'img-circle' ) );
	$user_name = $current_user->user_firstname . ' ' . $current_user->user_lastname;
	$display_image = ( $user_image ) ? $user_image : $user_name;
?>
<!-- ********************************************
		MAIN SIDEBAR MENU
************************************************ -->
<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
	  <!-- sidebar menu start-->
	  <ul class="sidebar-menu" id="nav-accordion">
	  
		 <!--
			<p class="centered"><a href="profile.html"><img src="<?php echo get_template_directory_uri(); ?>/includes/img/site-logo.png" class="img-circle" width="100"></a></p>
		-->
		  
		  <?php if( $user_image ) { ?>	
			 <section class="centered">
				<?php echo $user_image; ?>
			</section>
			 <?php if( $user_name ) { ?>
				<h5 class="centered">
					<?php echo $user_name; ?>
				</h5>
			 <?php } ?>
		  <?php } ?>
			
		  <li class="mt">
			  <a href="index.html" class="active">
				  <i class="fa fa-dashboard"></i>
				  <span>Dashboard</span>
			  </a>
		  </li>

		  <li class="sub-menu">
			  <a href="javascript:;" >
				  <i class="fa fa-desktop"></i>
				  <span>UI Elements</span>
			  </a>
			  <ul class="sub">
				  <li><a  href="general.html">General</a></li>
				  <li><a  href="buttons.html">Buttons</a></li>
				  <li><a  href="panels.html">Panels</a></li>
			  </ul>
		  </li>

		  <li class="sub-menu">
			  <a href="javascript:;" >
				  <i class="fa fa-cogs"></i>
				  <span>Components</span>
			  </a>
			  <ul class="sub">
				  <li class="active"><a  href="calendar.html">Calendar</a></li>
				  <li><a  href="gallery.html">Gallery</a></li>
				  <li><a  href="todo_list.html">Todo List</a></li>
			  </ul>
		  </li>
		  <li class="sub-menu">
			  <a href="javascript:;" >
				  <i class="fa fa-book"></i>
				  <span>Extra Pages</span>
			  </a>
			  <ul class="sub">
				  <li><a  href="blank.html">Blank Page</a></li>
				  <li><a  href="login.html">Login</a></li>
				  <li><a  href="lock_screen.html">Lock Screen</a></li>
			  </ul>
		  </li>
		  <li class="sub-menu">
			  <a href="javascript:;" >
				  <i class="fa fa-tasks"></i>
				  <span>Forms</span>
			  </a>
			  <ul class="sub">
				  <li><a  href="form_component.html">Form Components</a></li>
			  </ul>
		  </li>
		  <li class="sub-menu">
			  <a href="javascript:;" >
				  <i class="fa fa-th"></i>
				  <span>Data Tables</span>
			  </a>
			  <ul class="sub">
				  <li><a  href="basic_table.html">Basic Table</a></li>
				  <li><a  href="responsive_table.html">Responsive Table</a></li>
			  </ul>
		  </li>
		  <li class="sub-menu">
			  <a href="javascript:;" >
				  <i class=" fa fa-bar-chart-o"></i>
				  <span>Charts</span>
			  </a>
			  <ul class="sub">
				  <li><a  href="morris.html">Morris</a></li>
				  <li><a  href="chartjs.html">Chartjs</a></li>
			  </ul>
		  </li>

	  </ul>
	  <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->
