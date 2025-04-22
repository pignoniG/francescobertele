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
		    		<h1 class="_TitleOU" style="border-bottom: 1px solid black;"> <?php the_title(); ?> <?php if( get_field('project_luogo') ):?><span class="_CatOU"><?php echo get_field('project_luogo'); ?> </span> <?php endif;?></h1> 



		    		<?php if( get_field('project_code') ):?><span class="_CatOU"><?php the_field('project_code'); ?> </span> <?php endif;?>

         <?php if( get_field('project_curator')  ):?> <p><?php echo  wpm_translate_string( "[:en]CURATOR[:it]CURATELA[:]", $language = '' ); ?>:  
         	<span class="_CatOU"><?php echo get_field('project_curator'); ?> </span></p><?php endif;?>

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
						
						
						 if( have_rows('project_exhibition_links', $stopost->ID) ):

        				 	while ( have_rows('project_exhibition_links', $stopost->ID) ) : the_row();
        				 		$bib_id = get_sub_field('project_exhibition_link', $stopost->ID);
        				 		
        				 	
        				 		if ($bib_id == $currentID) {?>

        				 			<a href="<?php echo get_the_permalink( $stopost->ID); ?>"><?php echo get_the_title( $stopost->ID); ?></a>
        				 			<?php
        				 		}
				
    						endwhile;
        				 endif;
						endforeach;						
					?>

					</p>
				


         <?php if( have_rows('project_edition')  ):?> <p><?php echo  wpm_translate_string( "[:en]EDITION[:it]EDITION[:]", $language = '' ); ?>: 


         	<?php 
         	while ( have_rows('project_edition') ) : the_row();
         		$bib_id = get_sub_field('project_biblio');

         		echo $bib_link;
         		$bib_link =   "./ask/#bibliography?".myUrlEncode (filter_var($bib_id, FILTER_SANITIZE_URL)) ;
         		$bib_isbn = "isbn: ".get_field('project_isbn',$bib_id);
         		$bib_date = get_field('project_date',$bib_id);
         		$bib_publisher = get_field('project_publisher',$bib_id);
         		

         		 ?> 	<br><a href=" <?php echo $bib_link; ?>"> <?php 
         		 
        		 echo  get_the_title($bib_id)." [".$bib_date." ".$bib_isbn."]";
     
        		  ?> 	</a> <?php 
    		endwhile;
         ?></p>  

     	<?php endif;?>




	
		  
		</div>
 		<h1 class="_TitleOU" style="border-bottom: 1px solid black;"> </h1> 
		</div>


		<div class="cell content_bib_image">

			
			<?php 
			$images = get_field('exibition_gallery');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if( $images ): ?>
			        <?php foreach( $images as $image_id ): ?>
			          
			                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
			           
			        <?php endforeach; ?>
			   
			<?php endif; ?>

		</div>


	</div>






	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
