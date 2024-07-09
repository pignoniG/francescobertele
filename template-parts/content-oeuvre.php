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
		<div class="cell small-12 medium-12 large-12 small-order-2 conten_project_body">
	
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

		<div class="cell small-12 medium-12 small-order-1 large-12 oeuvre-header">

			<div class="titleBox">
				
			
	
    		<h1 class="_TitleOU" ><?php the_title(); ?></h1>
    		<?php if( get_field('project_code') ):?>
    			<span class="_CatOU"><?php the_field('project_code'); ?> <br></span>
    		<?php endif;?>
    		</div>


    		<?php if( get_field('project_status') ):?>

    			<?php 
    				if ( mytranslate_force(get_field('project_status'),"en") == "activable"){ 
    					$status = wpm_translate_string( "[:en]Activate[:it]Attiva[:]", $language = '' ); }

    				elseif (mytranslate_force(get_field('project_status'),"en") == "sold"){ 
    					$status = wpm_translate_string( "[:en]Sold[:it]Venduto[:]", $language = '' ); }

    				elseif (mytranslate_force(get_field('project_status'),"en") == "on sale"){ 
    					$status = wpm_translate_string( "[:en]on sale[:it]Acquista[:]", $language = '' ); }
    				?>



    			


    			<a id="button-shop-modal" class="button-shop oeuvre <?php echo filter_var( mytranslate_force(get_field("project_status"),"en"), FILTER_SANITIZE_URL);?>">

    				<?php echo  $status;?>

    			</a>

    		<?php endif;?>

    		  <button class="accordion braketed noMedium" id="datasheet_s" >
			   		<?php echo  wpm_translate_string( "[:en]Show Datasheet[:it] Mostra Scheda[:]", $language = '' ); ?>
			 </button>
			   <button style="display:none;" class="accordion braketed noMedium" id="datasheet_h" >
			   		<?php echo  wpm_translate_string( "[:en]Hide Datasheet[:it] Nascondi Scheda[:]", $language = '' ); ?>
			 </button>

    	</div>

    	<div class="cell small-12 medium-6 large-6 small-order-3 text-description-overflow hidden">





<!--         <a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php/** echo get_permalink(); */?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>

		<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php /**echo get_permalink();?>&text=<?php echo  wpm_translate_string( "[:en]Check%20this%20out[:it]Dai%20un'occhiata%20a%20questo[:]", $language = '' );  */?>:" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
         -->

	<!-- SCHEDA -->
	<?php if( get_field('project_corpus') ):?>

    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><br><br>CORPUS:<br><?php the_field('project_corpus'); ?><br> <a href="<?php echo wpm_translate_url( get_page_link(74), $language = '' );?>/?force=True#filter=.project_corpus_<?php echo myUrlEncode (filter_var(get_field("project_corpus")[0], FILTER_SANITIZE_URL))  ?>
	">../<?php echo  wpm_translate_string( "[:en]Related Objects[:it] Oggetti correlati[:]", $language = '' ); ?></a></p>

    

	<?php endif;?>


	<?php

		// Check rows exists.
		if( have_rows('project_keywords') ):

			?> <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]KEYWORD[:it]PAROLE CHIAVE[:]", $language = '' ); ?>:<br>

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


    <p class="_BodyText" style="margin-bottom: 0;"><?php echo  wpm_translate_string( "[:en]CULTURAL DEFINITION[:it]DEFINIZIONE CULTURALE[:]", $language = '' ); ?>:

        <?php if( get_field('project_edition') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Edition[:it]Edizione[:]", $language = '' ); ?>: <?php the_field('project_edition'); ?> <?php endif;?>

       

        <?php if( get_field('project_sitetimes') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Site/times[:it]Siti/date[:]", $language = '' ); ?>: <?php the_field('project_sitetimes'); ?> <?php endif;?>
   	</p>
   	

        <?php if( get_field('project_co-authors') ):?><p style="margin-bottom: -0px;">../<?php echo  wpm_translate_string( "[:en]Co-authors[:it]Coautori[:]", $language = '' ); ?>: </p> <?php echo(get_field('project_co-authors')); ?>  <?php endif;?>
   

    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"></p>


    
    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]TECHNICAL DATA[:it]DATI TECNICI[:]", $language = '' ); ?>:<?php $type = get_field('project_object_type');
			if( $type ): ?>
			 <br>../<?php echo  wpm_translate_string( "[:en]Object[:it]Oggetto[:]", $language = '' ); ?>:  
			    <?php foreach( $type as $type_i ): ?>
			        <?php echo mytranslate($type_i) ; ?>
			    <?php endforeach; ?>
			
			<?php endif;?>




        <?php if( get_field('project_matter_technique') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Matter and technique[:it]Materiali e tecnica[:]", $language = '' ); ?>: <?php the_field('project_matter_technique'); ?> <?php endif;?>
        
        <?php if( get_field('project_measures') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Measures[:it]Misure[:]", $language = '' ); ?>: <?php the_field('project_measures'); ?> <?php endif;?>

        <?php if( get_field('project_measures_weight') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Weight[:it]Peso[:]", $language = '' ); ?>: <?php the_field('project_measures_weight'); ?><?php endif;?>

    </p>

    <?php if( get_field('project_description') ):?> <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]DESCRIPTION[:it]DESCRIZIONE[:]", $language = '' ); ?>: <?php the_field('project_description'); ?> </p> <?php endif;?>
    
  

  	<p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]THEMES[:it]TEMI[:]", $language = '' ); ?>:

  		<?php $project_items = array("project_specificity | specificità","project_body | corpo","project_breath | respiro","project_imagination | immaginazione","project_identity | identità");

  		foreach ($project_items as $project_item):
  			$project_theme = get_field(mytranslate_force($project_item,"en"));
  			$keyword = preg_split("/[\_]+/", "hypertext language, $project_item");
			
			if( $project_theme ): ?>
				<br>../<?php echo "#".mytranslate($keyword[1]); ?>:

				<?php foreach( $project_theme as $theme_field ): ?>
			        <?php echo mytranslate($theme_field)." "; ?>
			    <?php endforeach; ?>


			<?php endif; ?>

  		<?php endforeach; ?>

  	</p>


    <p class="_BodyText" ><?php echo  wpm_translate_string( "[:en]SOURCES AND DOCUMENTS[:it]FONTI E DOCUMENTI[:]", $language = '' ); ?>:
    	

    	   <?php if( have_rows('project_other_links') ):

			?> <br>../<?php echo  wpm_translate_string( "[:en]Links[:it]Links[:]", $language = '' ); ?>: <?php
		    // Loop through rows.
		    while( have_rows('project_other_links') ) : the_row();

		    	?><a target="_blank" class="projects-link" href="<?php echo get_sub_field('project_other_link')['url']; ?>"><?php echo (get_sub_field('project_other_link')['title']); ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 

    	<?php if( have_rows('project_images') ):

			?> <br>../<?php echo  wpm_translate_string( "[:en]Images[:it]Immagini[:]", $language = '' ); ?>: <?php
		    // Loop through rows.
		    while( have_rows('project_images') ) : the_row();

		    	?><a target="_blank" class="projects-link" href="<?php echo get_sub_field('project_image')['url']; ?>"><?php echo (get_sub_field('project_image')['title']); ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 

		<?php if( have_rows('project_videos') ):

			?> <br>../<?php echo  wpm_translate_string( "[:en]Videos[:it]Video[:]", $language = '' ); ?>: <?php
		    // Loop through rows.
		    while( have_rows('project_videos') ) : the_row();

		    ?><a target="_blank" class="projects-link" href="<?php echo get_sub_field('project_video')['url']; ?>"><?php echo get_sub_field('project_video')['title']; ?></a> <?php

		    endwhile;
			?>  <?php 
		endif ?> 




        <?php if( get_field('project_pdf') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Presentation[:it]Presentazione[:]", $language = '' ); ?> [pdf]: <a target="_blank" class="customfollow-icon download" href="<?php echo get_field('project_pdf')['url']; ?>"><?php echo get_field('project_pdf')['filename']; ?></a> 

        <?php endif;?>

      	<br>../<?php echo  wpm_translate_string( "[:en]Information card[:it]
Scheda informativa[:]", $language = '' ); ?> [pdf]: <a target="_blank" class="customfollow-icon download" href="<?php echo get_permalink(649)."/?project=".get_the_ID(); ?>"><?php echo get_the_title().".pdf"?></a> 

       


        </p>




        <?php if( get_field('project_bibliography') ):?> <p>../<?php echo  wpm_translate_string( "[:en]Bibliography[:it]Bibliografia[:]", $language = '' ); ?>: <?php the_field('project_bibliography'); ?></p>  <?php endif;?>
        <?php if( get_field('project_exhibition') ):?> <p><br>../<?php echo  wpm_translate_string( "[:en]Exhibition[:it]Esposta a[:]", $language = '' ); ?>: <?php the_field('project_exhibition'); ?> </p><?php endif;?>
		<?php if( get_field('project_collection') ):?> <p><br>../<?php echo  wpm_translate_string( "[:en]Collection[:it]Collezione[:]", $language = '' ); ?>: <?php echo mytranslate(get_field('project_collection')); ?> </p><?php endif;?>
    
    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;">   
    </p>

    <div style="height: 90px"></div>


    
</div>

	<div id="oeuvre-buy-container-dimmer" class="modal_control"></div>
					<div id="oeuvre-buy-container" >
						<a class="close-modal modal_control">×</a>
					    <div id="oeuvre-buy-container-leftcolumn">

					    	<h1 class="_TitleOU"><?php echo  wpm_translate_string( "[:en]Purchase contact form[:it]Modulo di contatto acquisti[:]", $language = '' ); ?></h1>

					    	<?php the_field('disclaimer_ouvre_top',549); ?>

   							<div class="status-p-onair">



   								

   								<?php
   								// Check rows exists.
								if( have_rows('project_prices') ):

								    // Loop through rows.
								    while( have_rows('project_prices') ) : the_row();

								        $project_price = get_sub_field('project_price');
								        $project_price_description = get_sub_field('project_price_description');
								        ?>
								        <p class="_BodyText"><span class="_CatOU"><?php echo  $project_price; ?></span> <?php  echo $project_price_description;  ?> </p>
								        
								    <?php endwhile;
								endif;



    							$status_detailed = get_field('project_status_detailed');
								if( $status_detailed ): ?>
								<p class="" style="padding-bottom: 5px;"></p> 
								<p class="_BodyText"><span class="_CatOU"><?php echo  wpm_translate_string( "[:en]Availability[:it]Disponibilità[:]", $language = '' ); ?></span> 
								    <?php  echo mytranslate($status_detailed) ;  ?>
								</p>
								<?php endif; ?>
					

					    	</div>


						</div>

						<p class="" style="padding-bottom: 5px;"></p> 

		
						<?php the_field('disclaimer_ouvre_bottom',549); ?>

	

				</div>
					
					  



	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
