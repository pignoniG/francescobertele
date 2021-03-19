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
		<div class="cell small-12 medium-8 large-8 conten_project_body">
	
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'francescobertele' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
	
			?>
	
			
		</div>

		<div class="cell small-12 medium-4 large-4 text-description-overflow oeuvre-header">

		<div class="">
    		<h1 class="_TitleOU" style="border-bottom: 1px solid black;"><?php the_title(); ?></h1>
    		<?php if( get_field('project_code') ):?>
    			<span class="_CatOU"><?php the_field('project_code'); ?> <br></span>
    		<?php endif;?>
    	</div>

    	<div class="cell small-12 medium-4 large-4 text-description-overflow">



    		<?php if( get_field('project_status') ):?>

    			<a class="button-shop oeuvre <?php echo filter_var( get_field('project_status'), FILTER_SANITIZE_URL);?>" href="mailto:fb@francescobertele.net"><?php the_field('project_status'); ?></a>
    		<?php endif;?>



        <a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a>
		<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink();?>&text=Check%20this%20out:" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a>
        <a style="vertical-align:bottom;" href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.example.com%2Fblog%2Fphotography-website-redesign%2F&description=Photography+Website+Redesign" onclick="__gaTracker('send', 'event', 'outbound-article', 'https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.example.com%2Fblog%2Fphotography-website-redesign%2F&amp;description=Photography+Website+Redesign', '');" data-pin-do="buttonPin" data-pin-count="beside"></a>
	
	<!-- SCHEDA -->
	<?php if( get_field('project_corpus') ):?>

    <p class="_BodyText" style="border-bottom: 1px dashed #797979;"><br><br>CORPUS:<br><?php the_field('project_corpus'); ?></p>

	<?php endif;?>


	<?php

		// Check rows exists.
		if( have_rows('project_keywords') ):

			?> <p class="_BodyText" style="border-bottom: 1px dashed #797979;">KEYWORD:<br>

			<?php
		
		    // Loop through rows.
		    while( have_rows('project_keywords') ) : the_row();
		
		        // Load sub field value.
		        echo  "#".get_sub_field('project_keyword')." ";
		        // Do something...
		    // End loop.
		    endwhile;
			?> </p> <?php 
		endif

	?>


    <p class="_BodyText" style="border-bottom: 1px dashed #797979;">CULTURAL DEFINITION:

        <?php if( get_field('project_edition') ):?> <br>../Edition: <?php the_field('project_edition'); ?> <?php endif;?>

       	<?php if( get_field('project_co-authors') ):?>  <br>../Co-authors: <a class="projects-link" href="<?php echo(get_field('project_co-authors')['url']); ?>" target="_blank"><?php echo(get_field('project_co-authors')['title']); ?></a> <?php endif;?>

        <?php if( get_field('project_sitetimes') ):?> <br>../Site/times: <?php the_field('project_sitetimes'); ?> <?php endif;?>
    </p>
    
    <p class="_BodyText" style="border-bottom: 1px dashed #797979;">TECHNICAL DATA:
        <?php if( get_field('project_object_type') ):?> <br>../Object: <?php the_field('project_object_type'); ?> <?php endif;?>
        <?php if( get_field('project_matter_technique') ):?> <br>../Matter and technique: <?php the_field('project_matter_technique'); ?> <?php endif;?>
        <?php if( get_field('project_measures_other') ):?> <br>../Measure: <?php the_field('project_measures_other'); ?> <?php endif;?>
        <?php if( get_field('project_measures_weight') ):?> <br>../Weight: <?php the_field('project_measures_weight'); ?> kg <?php endif;?>

    </p>

    <?php if( get_field('project_description') ):?> <p class="_BodyText" style="border-bottom: 1px dashed #797979;">DESCRIPTION: <?php the_field('project_description'); ?> </p> <?php endif;?>
    
  

  	<p class="_BodyText" style="border-bottom: 1px dashed #797979;">THEMES:

  		<?php $project_items = array("project_specificity","project_body","project_breath","project_imagination","project_identity");

  		foreach ($project_items as $project_item):
  			$project_theme = get_field($project_item);
  			$keyword = preg_split("/[\_]+/", "hypertext language, $project_item");
			
			if( $project_theme ): ?>
				<br>../<?php echo "#".ucwords($keyword[1]); ?>:

				<?php foreach( $project_theme as $theme_field ): ?>
			        <?php echo $theme_field." "; ?>
			    <?php endforeach; ?>


			<?php endif; ?>

  		<?php endforeach; ?>

  	</p>


		
				
			    







    
    <p class="_BodyText" style="border-bottom: 1px dashed #797979;">SOURCES AND DOCUMENTS:


    	<?php if( have_rows('project_images') ):

			?> <br>../Images: <?php
		    // Loop through rows.
		    while( have_rows('project_images') ) : the_row();

		    	?><a target="_blank" class="projects-link" href="<?php echo get_sub_field('project_image')['url']; ?>"><?php echo (get_sub_field('project_image')['title']); ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 

		<?php if( have_rows('project_videos') ):

			?> <br>../Videos: <?php
		    // Loop through rows.
		    while( have_rows('project_videos') ) : the_row();

		    	?><a target="_blank" class="projects-link" href="<?php echo get_sub_field('project_video')['url']; ?>"><?php echo get_sub_field('project_video')['title']; ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 


        <?php if( get_field('project_pdf') ):?> <br>../Presentation [pdf]: <a target="_blank" class="customfollow-icon download" href="<?php echo get_field('project_pdf')['url']; ?>"><?php echo get_field('project_pdf')['filename']; ?></a> <?php endif;?>

        <?php if( get_field('project_bibliography') ):?> <br>../Bibliography: <?php the_field('project_bibliography'); ?> <?php endif;?>
        <?php if( get_field('project_exhibition') ):?> <br>../Exhibition: <?php the_field('project_exhibition'); ?> <?php endif;?>
		<?php if( get_field('project_collection') ):?> <br>../Collection: <?php the_field('project_collection'); ?> <?php endif;?>
        
    </p>


    
</div>
</div>





	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
