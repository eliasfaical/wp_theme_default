<?php 
	
	$args = array(
		'post_type' => 'servico',
		'order'		=> 'asc'
	);

	$my_query = new WP_Query( $args );

	if ( $my_query->have_posts() ) :
		while ( $my_query->have_posts() ) : $my_query->the_post();
		
		echo '<div class="box-servicos">
				<div class="col-md-2"><h3>'. get_the_post_thumbnail() .'</h3></div>
				<div class="col-md-10">
					<h3>'. get_the_title() .'</h3>
					'. get_the_content() .'
				</div>
			 </div>';

		endwhile;
	endif;
	
	wp_reset_query();