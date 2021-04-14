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

    	<h1 class="_TitleOU" style="border-bottom: 1px solid white;"><?php the_title(); ?>
    		<?php if( get_field('project_code') ):?> <span class="_CatOU cat-n"> <?php the_field('project_code'); ?> </span> <?php endif;?>
    	</h1>


        <div class="details-container-onair">
            
                <div class="w3-light-grey w3-tiny">
                <div class="w3-container w3-green" style="width:<?php the_field('project_progress'); ?>%"><?php the_field('project_progress'); ?>%</div>
                </div>

                <a class="general-button braketed" href="mailto:fb@francescobertele.net?subject=Trust-<?php the_field('project_code'); ?>-<?php the_title(); ?>">

                	<?php echo  wpm_translate_string( "[:en]Trust it[:it]Finanzia[:]", $language = '' ); ?></a>

                <a class="general-button braketed modal_control" id="onair-more" >

                	<?php echo  wpm_translate_string( "[:en]More info[:it]Più Informazioni[:]", $language = '' ); ?></a>

            
    
           
                <div class="share-it">
                    <a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>

					<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink();?>&text=<?php echo  wpm_translate_string( "[:en]Check%20this%20out[:it]Dai%20un'occhiata%20a%20questo[:]", $language = '' ); ?>:" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
                </div>
        </div>
</div>

<div id="onair-description-container-dimmer" class="modal_control"></div>
<div id="onair-description-container" >
	<a class="close-modal modal_control">×</a>
    <div id="onair-description-container-leftcolumn">

    	<div class="status-p-onair">


    		<?php
    		$status = get_field('project_bar_status');
			if( $status ): ?>
			<p class="_BodyText"><span class="_CatOU"><?php echo  wpm_translate_string( "[:en]Status[:it]Stato[:]", $language = '' ); ?></span> 
			    <?php foreach( $status as $status_i ): ?>
			        <?php echo mytranslate($status_i) ; ?>
			    <?php endforeach; ?>
			</p>
			<?php endif; 

			$looking = get_field('project_bar_looking');
			if( $looking ): ?>
			<p class="_BodyText"><span class="_CatOU"><?php echo  wpm_translate_string( "[:en]Looking for[:it]In cerca di[:]", $language = '' ); ?></span> 
			    <?php foreach( $looking as $status_i ): ?>
			        <?php echo  mytranslate($status_i) ; ?>
			    <?php endforeach; ?>
			</p>
			<?php endif; ?>



        </div>

        
        <p class="_BodyText sources" style="border-bottom: 1px dashed #797979;"><?php echo  wpm_translate_string( "[:en]SOURCES AND REFERENCE DOCUMENTS[:it]FONTI E DOCUMENTI DI RIFERIMENTO[:]", $language = '' ); ?>:


    	    
    	 <?php if( have_rows('project_pdfs') ):

			?> <br>../Documents: <?php
		    // Loop through rows.
		    while( have_rows('project_pdfs') ) : the_row();

		    	?><a target="_blank" class="description-links" href="<?php echo get_sub_field('project_pdf')['url']; ?>"><?php echo (get_sub_field('project_pdf')['filename']); ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 


    	 <?php if( have_rows('project_images') ):

			?> <br>../<?php echo  wpm_translate_string( "[:en]Images[:it]Immagini[:]", $language = '' ); ?>: <?php
		    // Loop through rows.
		    while( have_rows('project_images') ) : the_row();

		    	?><a target="_blank" class="description-links" href="<?php echo get_sub_field('project_image')['url']; ?>"><?php echo (get_sub_field('project_image')['title']); ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 

		<?php if( have_rows('project_videos') ):

			?> <br>../<?php echo  wpm_translate_string( "[:en]Videos[:it]Video[:]", $language = '' ); ?>: <?php
		    // Loop through rows.
		    while( have_rows('project_videos') ) : the_row();

		    	?><a target="_blank" class="description-links" href="<?php echo get_sub_field('project_video')['url']; ?>"><?php echo get_sub_field('project_video')['title']; ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 



    	</p>
    	
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
