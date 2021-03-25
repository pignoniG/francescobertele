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
		<div class="cell medium-12 large-12">
			

    <table id="table-bibliography">


			<?php
			$biblio_counter = 1;
			$biblio_data = 0000;

			$args = array(
				'post_type'         => 'progetto',
						'cat' => 12,
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
			   			     $biblio_current_link= get_permalink();
			   			     $biblio_current_image = "";
			   			     
			   			     if( has_post_thumbnail()){
									$biblio_current_image = fly_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail-medium-for-interface' )['src'];	
								}

  								?>
								<tr>
    								<td class="col-year"> <?php echo $biblio_current_data; ?></td>
    								<td class="col-title">

        							<a onclick=" myPopup ('<?php echo $biblio_current_link; ?>', 'web', 650, 450);" target="_blank"  data-hoverimageid="396" data-hoverimage="<?php echo $biblio_current_mage; ?>"><?php echo $biblio_current_titolo; ?></a>
  
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