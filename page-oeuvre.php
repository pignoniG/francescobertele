<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */

$filter_items = array("project_corpus","project_status","project_object_type","project_specificity","project_body","project_breath","project_imagination","project_identity","project_corpus_parent");

$global_filter_items= array();


foreach ($filter_items as $filter_item) {

	$global_filter_item= array(  ) ;

	array_push($global_filter_items, $global_filter_item);
}

$global_filter_items_h= array();


foreach ($filter_items as $filter_item) {

	$global_filter_item= array(  ) ;

	array_push($global_filter_items_h, $global_filter_item);
}


get_header(); ?>

		<main id="main" class="site-main" role="main">
		<div class="ouvre-grid">
	
			<?php

			$args = array(
				'post_type'         => 'progetto',
						'cat' => 13,
        				'post_status' => 'publish',
        				'meta_key'			=> 'project_date',
						'orderby'			=> 'meta_value',
						'order'				=> 'DESC'
			);

			$custom_query = new WP_Query( $args );

			// The Loop!
			if ($custom_query->have_posts()) {
				
				echo $progetti_counter;
			    ?>
			    
			   		<?php
			   			while ($custom_query->have_posts()) {
			   			     $custom_query->the_post();	

			   			     include(locate_template('template-parts/content-progetto-image.php'));
			   			     $progetti_counter++;

			   			}
			   			
			}
			?>


		</div>
		



		<div class="filter_bar">
			<?php
			include(locate_template('template-parts/content-filter-oeuvre.php'));
			?>
			
			

		</div>

			



		

		</main><!-- #main -->


<?php

get_footer();

