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
    								<td  class="col-title" data-open="<?php echo('modal'.get_the_ID() )?>">
    								

        							<a  target="_blank"><?php echo $biblio_current_titolo; ?></a>
        							<a  target="_blank"><?php echo $biblio_current_isbn; ?></a>
        							<span style="background-image: url('<?php echo $biblio_current_image; ?>');"></span>



        							<div class="reveal" id="<?php echo('modal'.get_the_ID())?>" data-reveal>
										<h1>Awesome. I Have It.</h1>
										  <p class="lead">Your couch. It is mine.</p>
										  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
										  <button class="close-button" data-close aria-label="Close modal" type="button">
										    <span aria-hidden="true">&times;</span>
										  </button>
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