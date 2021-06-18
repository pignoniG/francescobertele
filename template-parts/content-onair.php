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

                <a class="general-button braketed " id="onair-trust">

                	<?php echo  wpm_translate_string( "[:en]Trust it[:it]Finanzia[:]", $language = '' ); ?></a>

                <a class="general-button braketed " id="onair-more" >

                	<?php echo  wpm_translate_string( "[:en]More info[:it]Più Informazioni[:]", $language = '' ); ?></a>

            
    
           
                <div class="share-it">
                    <a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>

					<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink();?>&text=<?php echo  wpm_translate_string( "[:en]Check%20this%20out[:it]Dai%20un'occhiata%20a%20questo[:]", $language = '' ); ?>:" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
                </div>
        </div>
</div>


<div id="onair-trust-container-dimmer" class="modal_control"></div>
<div id="onair-trust-container" >
	<a class="close-modal modal_control">×</a>
    <div id="onair-trust-container-leftcolumn">

    	<h1 class="_TitleOU"><?php echo  wpm_translate_string( "[:en]Trust contact form[:it]Modulo di contatto finanziamento[:]", $language = '' ); ?></h1>


   	<div class="status-p-onair">


    		<?php
    		$production_cost = get_field('project_production_cost');
			if( $production_cost ): ?>
			<p class="_BodyText"><span class="_CatOU"><?php echo  wpm_translate_string( "[:en]Total production cost[:it]Costo totale di produzione[:]", $language = '' ); ?></span> 
			    <?php  echo $production_cost ;  ?>
			</p>
			<?php endif; 

			$informativa = get_field('project_informativa');
			if( $informativa ): ?>
			<p class="_BodyText"><span class="_CatOU"><?php echo  wpm_translate_string( "[:en]Disclosure[:it]Informativa[:]", $language = '' ); ?></span> 
			    <?php  echo $informativa ;  ?>
			</p>
			<?php endif; ?>

			

		</div>
			<?php
			$slots = get_field('project_slots');
			if( $slots ): ?>

				<p class="_BodyText sources" style="border-bottom: 1px dashed #797979;"><?php echo  wpm_translate_string( "[[:en]AVAILABLE SLOTS[:it]SLOTS DISPONIBILI[:]", $language = '' ); ?>:
			
				
				    <?php foreach( $slots as $slot): ?>
				      <br>  <?php echo mytranslate($slot) ; ?> 
				    <?php endforeach; ?>
				 </p>
				
			
			<?php endif; ?>

        </div>



        <?php the_field('disclaimer_onair',549); ?>
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
			    <?php 
				$first  = True;  
				foreach( $status as $status_i ):
			        if ($first){$first = False;}
				else{ echo ", " ; }
				echo (mytranslate($status_i)) ;
			    	endforeach;
				echo (".") ;?>
			</p>
			<?php endif; 

			$looking = get_field('project_bar_looking');
			if( $looking ): ?>
			<p class="_BodyText"><span class="_CatOU"><?php echo  wpm_translate_string( "[:en]Looking for[:it]In cerca di[:]", $language = '' ); ?></span> 
			
			<?php 
				$first  = True;  
				foreach( $looking as $status_i ):
					if ($first){$first = False;}
					else{ echo ", " ; }
			      		echo (mytranslate($status_i)) ; 
				endforeach; 
				echo (".") ;?>
				
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
