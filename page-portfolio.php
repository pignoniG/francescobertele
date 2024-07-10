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
		$id_list= "";

	
			$custom_query = new WP_Query( $args );
			// The Loop!
			if ($custom_query->have_posts()) {
				 $progetti_counter = 0;
			    ?>
			   		<?php
			   			while ($custom_query->have_posts()) {
			   			     $custom_query->the_post();	
			   			     include(locate_template('template-parts/content-progetto-portfolio.php'));
			   			     $progetti_counter++;
			   			     $id_list=$id_list.get_the_ID().",";
					
			   	}		
			}



			
			?>
		</div>

		<div class="filter_bar">
			<div id="sort-filter">
    <h1 class="title">Portfolio  <span class="section-subtitle">
      <?php echo  wpm_translate_string( "[:en]artist portfolio[:it]portfolio d'artista[:]", $language = '' ); ?>
    </span></h1>
    <button type="button"  onclick="window.open('<?php echo  wpm_translate_string( "[:en]https://francescobertele.net/pdf/?project=[:it]https://francescobertele.net/it/pdf/?project=[:]", $language = '' );  echo $id_list?>', '_blank')" class="braketed accordion portfolio" id="btn-expt_portfolio">
    <?php echo  wpm_translate_string( "[:en]Download[:it]Scarica[:]", $language = '' ); ?> <span class="noMedium"><?php echo  wpm_translate_string( "[:en] Portfolio[:it] Portfolio[:]", $language = '' ); ?></span></button>
    


  <!-- Filter Div -->

</div>

		</div>

		</main><!-- #main -->


<?php 


get_footer();

