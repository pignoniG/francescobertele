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

	<div class="text-description-overflow-onair">

    	<h1 class="_TitleOU" style="border-bottom: 1px solid black;"><?php the_title(); ?>

    		<?php if( get_field('project_code') ):?> <span class="_CatOU cat-n"> <?php the_field('project_code'); ?> </span> <?php endif;?>
    	</h1>


        <div class="details-container-onair">
            <div id="c-left-onair"></div><div id="c-right-onair"></div>
                <div class="w3-light-grey w3-tiny">
                <div class="w3-container w3-green" style="width:<?php the_field('project_progress'); ?>%"><?php the_field('project_progress'); ?>%</div>
                </div>
            <a class="button-shop onair" href="mailto:fb@francescobertele.net?subject=Trust <?php the_title(); ?>">Trust it</a>
            <a class="button-shop onair more onair-show" id="onair-more">More info</a>
            <a class="button-shop onair more onair-hide">Less info</a>
                <div class="share-it">
                    <a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
		            <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=Check%20this%20out:" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
                    <a style="vertical-align:bottom;" href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.example.com%2Fblog%2Fphotography-website-redesign%2F&description=Photography+Website+Redesign" onclick="__gaTracker('send', 'event', 'outbound-article', 'https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.example.com%2Fblog%2Fphotography-website-redesign%2F&amp;description=Photography+Website+Redesign', '');" data-pin-do="buttonPin" data-pin-count="beside"></a>
                </div>
        </div>
</div>

<div id="onair-description-container">
    <div id="onair-description-container-leftcolumn">
        <p class="_BodyText sources" style="border-bottom: 1px dashed #797979;">SOURCES AND REFERENCE DOCUMENTS:


    	    
    	 <?php if( have_rows('project_pdfs') ):

			?> <br>../Documents: <?php
		    // Loop through rows.
		    while( have_rows('project_pdfs') ) : the_row();

		    	?><a target="_blank" class="description-links" href="<?php echo get_sub_field('project_pdf')['url']; ?>"><?php echo (get_sub_field('project_pdf')['filename']); ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 


    	 <?php if( have_rows('project_images') ):

			?> <br>../Images: <?php
		    // Loop through rows.
		    while( have_rows('project_images') ) : the_row();

		    	?><a target="_blank" class="description-links" href="<?php echo get_sub_field('project_image')['url']; ?>"><?php echo (get_sub_field('project_image')['title']); ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 

		<?php if( have_rows('project_videos') ):

			?> <br>../Videos: <?php
		    // Loop through rows.
		    while( have_rows('project_videos') ) : the_row();

		    	?><a target="_blank" class="description-links" href="<?php echo get_sub_field('project_video')['url']; ?>"><?php echo get_sub_field('project_video')['title']; ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 



    	</p>
    	<div class="status-p-onair">


    		<?php
    		$status = get_field('project_bar_status');
			if( $status ): ?>
			<p class="_BodyText"><span class="_CatOU">Status</span> 
			    <?php foreach( $status as $status_i ): ?>
			        <?php echo wpm_translate_string($status_i) ; ?>
			    <?php endforeach; ?>
			</p>
			<?php endif; 

			$looking = get_field('project_bar_looking');
			if( $looking ): ?>
			<p class="_BodyText"><span class="_CatOU">Looking for</span> 
			    <?php foreach( $looking as $status_i ): ?>
			        <?php echo  wpm_translate_string($status_i) ; ?>
			    <?php endforeach; ?>
			</p>
			<?php endif; ?>



        </div>
    </div>

    <?php if( get_field('project_abstract') ):?>  

    	<p class="_BodyText abstract" style="border-bottom: 1px dashed #797979;">
		ABSTRACT:<br>
    		<?php the_field('project_abstract'); ?>

    	 </p> <?php endif;?>
</div>
	<div class="grid-x grid-padding-x align-center">
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

	


    	

	</div>





	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
