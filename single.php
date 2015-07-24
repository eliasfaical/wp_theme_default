<?php get_header(); ?>

	<!-- body -->
	<div class="bd">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php 
						if ( have_posts() ) : the_post();
							echo '<h1>'. get_the_title() .'</h1>';
							the_content();
						endif;
					?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>