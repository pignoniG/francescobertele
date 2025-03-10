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
		    		<?php

				// Check rows exists.
				if( have_rows('project_related_list') ):

					?> <p class="_BodyText" style="margin-bottom: 10px;"><?php echo  wpm_translate_string( "[:en]RELATED WORK[:it]LAVORI CORRELATI[:]", $language = '' ); ?>:<br>
					<?php

			
			    		// Loop through rows.
			    		while( have_rows('project_related_list') ) : the_row();
			
			       			// Load sub field value.
			        		$featured_post = get_sub_field('project_related');
			        		$permalink = get_permalink( $featured_post->ID );
        					$title = get_the_title( $featured_post->ID );
        					?><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
			   		<?php endwhile;?>

					</p>
				<?php endif;?>


		    		<?php if( get_field('project_exhibition') ):?> <p class="_BodyText" style="margin-bottom: 0px;"><?php echo  wpm_translate_string( "[:en]EXHIBITION[:it]ESPOSIZIONE[:]", $language = '' ); ?>:</p><?php the_field('project_exhibition'); ?><?php endif;?>
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
