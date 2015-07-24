<?php get_header(); ?>

	<!-- ### main ### -->
	<main class="bd">

		<!--
		# Posttype: banner
		# Cria um banner com a marcação do getbootstrap
		-->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php
					$args  = array( 'post_type'	=> 'banner' );
					$query = new WP_Query( $args );

			    	while ( $query->have_posts() ) : $query->the_post();

			    	$active = ( $query->current_post == 0 ) ? 'active' : '' ;

			    	echo '<div class="item '. $active .'">
						    '. get_the_post_thumbnail() .'
						    <div class="carousel-caption">
						    	'. get_the_content() .'
						    </div>
						</div>';
			    	endwhile;
			    	wp_reset_postdata();
			    ?>
		  	</div>

			<?php 
				$data_slide = $query->post_count;

				echo '<ol class="carousel-indicators">';
					for ( $i = 0; $i < $data_slide; $i++ ) {
						$data_i = ( $i == 0 ) ? 'active' : '' ;
						echo '<li data-target="#carousel-example-generic" data-slide-to="'. $i .'" class="'. $data_i .'"></li>';
					}
				echo '</ol>';
			?>

			<div class="passador">
				<a class="btn-prev" href="#carousel-example-generic" role="button" data-slide="prev">Prev</a>
				<a class="btn-next" href="#carousel-example-generic" role="button" data-slide="next">Next</a>
			</div>
		</div>
		<!--
		# fim do banner
		-->

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="bd-box">
						<div class="row">
							<?php
								if ( have_posts() ) : the_post();
									the_content();
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main>

<?php get_footer(); ?>