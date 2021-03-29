<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */


?>

<div class="ask-content grid-x" id="themes">
	<div class="cell small-12 large-4 ask-sidebar">


		<?php
		if( have_rows('ask_themes') ):
		    while( have_rows('ask_themes') ) : the_row();

		    	$targhet_filtered= filter_var( "#sidebar_".get_sub_field('ask_theme_title'), FILTER_SANITIZE_URL);
	
		        ?>

		        	<button class="accordion braketed ask-sidebar noMedium"  data-targhet="<?php echo $targhet_filtered; ?>">
					<?php echo get_sub_field('ask_theme_title'); ?>
					</button>
				<?php
		
		    endwhile;

		endif;
		?>


	</div>


	 <?php
		if( have_rows('ask_themes') ):
		    while( have_rows('ask_themes') ) : the_row();
		    	$targhet_filtered= filter_var( "sidebar_".get_sub_field('ask_theme_title'), FILTER_SANITIZE_URL);
	
		        ?>

		        

					<div class="cell small-12 large-12 noDesktop" >
							<button class="accordion braketed ask-sidebar noMobile"  data-targhet="<?php echo "#".$targhet_filtered; ?>">
							<?php echo get_sub_field('ask_theme_title'); ?>
							</button>
						
					</div>


		        	<div class="cell small-12 large-8 grid-x ask-themes" id="<?php echo $targhet_filtered; ?>">

		        		<?php

		        		if( have_rows('ask_theme_subs') ):

					while( have_rows('ask_theme_subs') ) : the_row();

						 ?>
		        					<div class="cell small-12  medium-3 large-3 sub_title">
		        						<p><?php echo get_sub_field('ask_theme_sub_title');?></p>
		        					</div>
		        					<div class="cell small-12  medium-9 large-9 sub_desc">
		        						<?php echo get_sub_field('ask_theme_sub_desc'); ?>
		        					</div>
		        				<?php
						

    						endwhile;
						endif;



		        		?>
					</div>

				<?php
		
		    endwhile;

		endif;
	?>


	

</div>