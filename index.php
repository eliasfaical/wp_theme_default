<?php get_header(); ?>

	<!-- ### main ### -->
	<main class="bd">
		
		<?php 
			if ( has_post_thumbnail() ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			}
		?>

		<section class="banner-home" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/banner_surf.jpg);">
			<div class="container">
				<div class="title-banner text-center content-section">
					<h2>Envolver para <span>inovar</span></h2>
					<p>Proin fermentum consequat augue non venenatis. Nunc nunc diam, consequat viverra mattis semper, tristique quis urna. Fusce eleifend vitae ipsum.</p>
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>