<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */


?>

<div class="ask-content grid-x" id="bibliography">

	<div class="cell small-12 medium-12 large-12 ask-separator">
		<h3>
			<?php echo  wpm_translate_string( "[:en]Bibliography[:it]Bibliografia[:]", $language = '' ); ?>
		</h3>
	</div>


	<div class="cell small-12 medium-10 large-8 large-offset-4 medium-offset-2 inside">
			

    <table id="table-bibliography">


			<?php
			$biblio_counter = 1;
			$biblio_data = 0000;

			$args = array(
				'post_type'         => 'progetto',
						'cat' => 12,
					'posts_per_page' => -1,
        				'post_status' => 'publish',
        				'meta_key'			=> 'project_date',
						'orderby'			=> 'meta_value',
						'order'				=> 'DESC'
			);

			$custom_query = new WP_Query( $args );

			// The Loop!
			if ($custom_query->have_posts()) {
				
				
			    ?>
			    
			   		<?php
			   			while ($custom_query->have_posts()) {
			   			     $custom_query->the_post();	

			   			     $biblio_current_data= get_field('project_date');
			   			     $biblio_current_titolo= get_the_title();
			   			     $biblio_current_isbn= get_field('project_isbn');
			   			     
			   			     $biblio_current_link= get_permalink();
			   			     $biblio_current_image = "";
			   			     
			   			     if( has_post_thumbnail()){
									$biblio_current_image = fly_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail-medium-for-interface' )['src'];	
								}

  								?>
								<tr>
    								<td class="col-year"> <?php echo $biblio_current_data; ?></td>
    								<td  class="col-title" data-modal="<?php echo('modal'.get_the_ID() )?>">
    								

        							<a  target="_blank"><?php echo $biblio_current_titolo; ?></a>

        							<?php if( get_field('project_isbn') ):?> <a class="isbn noMobile" target="_blank">ISBN:<?php echo $biblio_current_isbn; ?></a> <?php endif;?>



        							<span class="bilbio_image" style="background-image: url('<?php echo $biblio_current_image; ?>');"></span>



        							<div class="bib_modal" id="<?php echo('modal'.get_the_ID())?>" >
        								<div class="inner_modal">
										    		<a class="close-modal">&times;</a>
										 		 <?php get_template_part( 'template-parts/content-bibliography', get_post_type() );?>
        								</div>

										 
									</div>


  
    								</td>
  								</tr>

							<?php

			   			    
			   			     $biblio_counter++;

			   			}
			   			
			}
			wp_reset_query();
			?>


  


 
		</table>
	</div>




</div>
