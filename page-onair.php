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

$filter_items = array("project_corpus","project_status","project_object_type","project_specificity","project_body","project_breath","project_imagination","project_identity");

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



			<div id="sort-filter">
    			<h1>Onair  <span class="section-subtitle">[active productions]</span></h1>
			</div>
		<div class="onair_flow">
	
			<?php

			$args = array(
						'post_type' => 'progetto',
						'cat' => 14,
        				'post_status' => 'publish',
        				'orderby' => 'title', 
        				'order' => 'ASC', 
			);

			$custom_query = new WP_Query( $args );



			// The Loop!
			if ($custom_query->have_posts()):
				
				
			    ?>

			    <div class="main-carousel">
			    
			   		<?php
			   			$i=1;
			   			$count = $custom_query->found_posts;

			   			while ($custom_query->have_posts()) {
			   			     $custom_query->the_post();



								$img_caption = $i.'/'.$count;
								$img_url = fly_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail-medium-for-interface' )['src'];
								?>
								
								<img class="carousel-cell" onclick="location.href=' <?php echo get_permalink();?>';" src="<?php echo $img_url;?>" alt="<?php echo get_the_title();?>" data-number="<?php echo $img_caption ; ?>" />
								<?php





			   			    $i++;


			   			     

			   			}

			 ?> </div>

			 <div>
			 	<p class="main-carousel-caption">
			 		<span class="caption title">Title</span>
			 		<span class="caption number">1/1</span>
			 	</p>
			 </div>



			<?php		
			endif
			?>


		</div>
		



		<div class="">
			<a class="general-button" href="/ask#become-a-trustee">TRUST IT</a>
		</div>

			



		

		</main><!-- #main -->


<?php

get_footer();

