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



get_header(); ?>

		<main id="main" class="site-main" role="main">
		<div class="grid-x grid_portfolio">
	
			<?php

		$args = array(
			'post_type'         => 'progetto',
			'cat' => 13,
						
			'nopaging' => true,
        	'post_status' => 'publish',

        	'meta_query' => array(
   			     'relation' => 'AND',
   			     'filter' => array(
   			         'key' => 'project_corpus_parent',
   			         'value' => true,
   			     ),
   			     'order' => array(
   			         'key' => 'project_date',
   			     )
   			 ),
        	 'orderby' => array(
        		'order' => 'DESC'
    		),	
		);
			$custom_query = new WP_Query( $args );
			// The Loop!
			if ($custom_query->have_posts()) {
			    ?>
			   		<?php
			   			while ($custom_query->have_posts()) {
			   			     $custom_query->the_post();	
			   			     include(locate_template('template-parts/content-progetto-portfolio.php'));
			   			     $progetti_counter++;
			   	}		
			}
			?>
		</div>

		<div class="filter_bar">
			<div id="sort-filter">
    <h1 class="title">Portfolio  <span class="section-subtitle">
      <?php echo  wpm_translate_string( "[:en]artist portfolio[:it]portfolio d'artista[:]", $language = '' ); ?>
    </span></h1>
  <!-- Filter Div -->

</div>

		</div>

		</main><!-- #main -->


<?php




get_footer();

