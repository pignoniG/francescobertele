<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="grid-x">
		<div class="cell content_bib_body">
			<div class="text-description-overflow-bibliography">
		    		<h1 class="_TitleOU" style="border-bottom: 1px solid black;"> <?php the_title(); ?> </h1> 
		    		<?php if( get_field('project_code') ):?><span class="_CatOU"><?php the_field('project_code'); ?> </span> <?php endif;?>
		    		<?php if( get_field('project_isbn') ):?><span class="_CatOU">ISBN: <?php the_field('project_isbn'); ?> </span> <?php endif;?>


		    		 <p class="_BodyText" style="margin-bottom: 10px;"><?php echo  wpm_translate_string( "[:en]RELATED WORK[:it]LAVORI CORRELATI[:]", $language = '' ); ?>:<br>
		
					<?php
						// prepare query args

						$currentID= get_the_ID();
						$argss = array(
						'post_type'         => 'progetto',
						'cat' => 13,
						
						'nopaging' => true,
        				'post_status' => 'publish',
        				'meta_key'			=> 'project_date',
						'orderby'			=> 'meta_value',
						'order'				=> 'DESC'
					);
						
						// Perform the query
	
						$stiposts = get_posts( $argss );

	

						foreach( $stiposts as $stopost ):
						
						
						 if( have_rows('project_bibliography_links', $stopost->ID) ):

        				 	while ( have_rows('project_bibliography_links', $stopost->ID) ) : the_row();
        				 		$bib_id = get_sub_field('project_bibliography_link', $stopost->ID);
        				 		
        				 	
        				 		if ($bib_id == $currentID) {?>

        				 			<a href="<?php echo get_the_permalink( $stopost->ID); ?>"><?php echo get_the_title( $stopost->ID); ?></a>
        				 			<?php
        				 		}
				
    						endwhile;
        				 endif;
						endforeach;						
					?>

					</p>
				

		    		<?php if( get_field('project_exhibition') && !have_rows('project_related_exibitions')  ):?> <p class="_BodyText" style="margin-bottom: 0px;"><?php echo  wpm_translate_string( "[:en]EXHIBITION[:it]ESPOSIZIONE[:]", $language = '' ); ?>:</p><?php the_field('project_exhibition'); ?><?php endif;?>


     				 <?php if( have_rows('project_related_exibitions') ):?> <p>../<?php echo  wpm_translate_string( "[:en]Exhibition[:it]Esposta a[:]", $language = '' ); ?>: 


     				  	<?php 
     				  	while ( have_rows('project_related_exibitions') ) : the_row();
     				  		$exib_id = get_sub_field('project_related_exibition');
     				  		$exib_link =   "./ask/#exhibition?".myUrlEncode (filter_var($exib_id, FILTER_SANITIZE_URL)) ;

     				  		$exib_luogo = get_field('project_luogo',$exib_id);
     				  		$exib_date = get_field('project_date',$exib_id);
     				

     				  		 ?> 	<br><a href=" <?php echo $exib_link; ?>"> <?php 
     				  		 
     				 		 echo  get_the_title($exib_id).", ".$exib_luogo.". ".$exib_date;
     
     				 		  ?> 	</a> <?php 
    					endwhile;
     				  ?></p>  

     				<?php endif;?>





		    		<?php if( get_field('project_publisher') ):?> <p class="_BodyText" style="margin-bottom: 0px;"><?php echo  wpm_translate_string( "[:en]PUBLISHER[:it]EDITORE[:]", $language = '' ); ?>:</p><?php the_field('project_publisher'); ?><?php endif;?>
		<?php if( get_field('project_links') || get_field('project_files')  ):?> <p class="_BodyText" ><?php echo  wpm_translate_string( "[:en]SOURCES AND REFERENCE DOCUMENTS[:it]FONTI E DOCUMENTI DI RIFERIMENTO[:]", $language = '' ); ?>:
		    	<br>


		    		<?php if( have_rows('project_links') ):
					?> <br>../<?php echo  wpm_translate_string( "[:en]Links[:it]Risorse[:]", $language = '' ); ?>: <?php
		    			// Loop through rows.
		    			while( have_rows('project_links') ) : the_row();
		    				if (!empty(get_sub_field('project_link'))) {
		    					// code...
		    				
						?><a target="_blank" class="projects-link" href="<?php echo get_sub_field('project_link')['url']; ?>"><?php echo get_sub_field ('project_link')['title']; ?></a> <?php
						}
		    			endwhile;
					?>  
				<?php endif ?> 
				<?php if( have_rows('project_files') ):
					?> <br>../<?php echo  wpm_translate_string( "[:en]Files[:it]Documenti[:]", $language = '' ); ?>: <?php
		    			// Loop through rows.
		    			while( have_rows('project_files') ) : the_row();
		    				?><a target="_blank" class="projects-link" href="<?php echo get_sub_field('project_pdf')['url']; ?>"><?php echo get_sub_field ('project_pdf')['filename']; ?></a> <?php
		    			endwhile;?>  
				<?php endif ?> 

		    </p><?php endif;?>
		  
		</div>
 		<h1 class="_TitleOU" style="border-bottom: 1px solid black;"> </h1> 
		</div>


		<div class="cell content_bib_image">

			
			<?php 
			$images = get_field('biblio_gallery');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if( $images ): ?>
			        <?php foreach( $images as $image_id ): ?>
			          
			                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
			           
			        <?php endforeach; ?>
			   
			<?php endif; ?>

		</div>


	</div>






	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
