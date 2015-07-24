<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="<?php echo get_template_directory_uri(); ?>/humans.txt" />

	<!-- title -->
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></title>
	
	<!-- google font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Noto+Serif:400,400italic' rel='stylesheet' type='text/css'>
	
	<!-- favicon -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<!-- ### header ### -->
	<header class="hd">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<h1 class="title-site">
          				<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
          			</h1>
				</div>
				
				<div class="col-xs-6">
					<a href="#" title="Menu" class="ico-nav pull-right">
						<span class="bt-menu">Menu</span>
						<div class="c-hamburger c-hamburger--htx">
							<span>Toggle menu</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</header>