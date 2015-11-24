<?php 
/* Template Name: Login Page */
wp_head(); ?>

<body <?php body_class(); ?>>

	<section id="stock-charts-login">
		<?php wp_login_form( array(
			'echo'           => true,
			'remember'       => true,
			'redirect'       => esc_url( home_url() ),
			'form_id'        => 'loginform',
		) ); ?>
	</section>

</body>
	
<?php wp_footer(); ?>