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
		<div class="cell small-12 medium-7 large-9 small-order-2 conten_project_body">
	
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

		<div class="cell small-12 medium-5 small-order-1 large-3 oeuvre-header">

	
    		<h1 class="_TitleOU" ><?php the_title(); ?></h1>
    		<?php if( get_field('project_code') ):?>
    			<span class="_CatOU"><?php the_field('project_code'); ?> <br></span>
    		<?php endif;?>
    	</div>

    	<div class="cell small-12 medium-5 large-3 small-order-3 text-description-overflow">



    		<?php if( get_field('project_status') ):?>

    			<a class="button-shop oeuvre <?php echo filter_var( mytranslate_force(get_field("project_status"),"en"), FILTER_SANITIZE_URL);?>" href="mailto:fb@francescobertele.net">

    				<?php 
    				if ( mytranslate_force(get_field('project_status'),"en") == "activable"){ 
    					echo  wpm_translate_string( "[:en]Activate[:it]Attiva[:]", $language = '' ); }

    				elseif (mytranslate_force(get_field('project_status'),"en") == "sold"){ 
    					echo  wpm_translate_string( "[:en]Sold[:it]Venduto[:]", $language = '' ); }

    				elseif (mytranslate_force(get_field('project_status'),"en") == "on sale"){ 
    					echo  wpm_translate_string( "[:en]on sale[:it]In vendita[:]", $language = '' ); }
    				?>
    					

    				</a>

    		<?php endif;?>



        <a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>

		<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink();?>&text=Check%20this%20out:" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
        

	<!-- SCHEDA -->
	<?php if( get_field('project_corpus') ):?>

    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><br><br>CORPUS:<br><?php the_field('project_corpus'); ?></p>

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


    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]CULTURAL DEFINITION[:it]DEFINIZIONE CULTURALE[:]", $language = '' ); ?>:

        <?php if( get_field('project_edition') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Edition[:it]Edizione[:]", $language = '' ); ?>: <?php the_field('project_edition'); ?> <?php endif;?>

       	<?php if( get_field('project_co-authors') ):?>  <br>../<?php echo  wpm_translate_string( "[:en]Co-authors[:it]Coautori[:]", $language = '' ); ?>: <a class="projects-link" href="<?php echo(get_field('project_co-authors')['url']); ?>" target="_blank"><?php echo(get_field('project_co-authors')); ?></a> <?php endif;?>

        <?php if( get_field('project_sitetimes') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Site/times[:it]Siti/date[:]", $language = '' ); ?>: <?php the_field('project_sitetimes'); ?> <?php endif;?>
    </p>
    
    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]TECHNICAL DATA[:it]DATI TECNICI[:]", $language = '' ); ?>:

    	<?php $type = get_field('project_object_type');
			if( $type ): ?>
			 <br>../<?php echo  wpm_translate_string( "[:en]Object[:it]Oggetto[:]", $language = '' ); ?>:  
			    <?php foreach( $type as $type_i ): ?>
			        <?php echo mytranslate($type_i) ; ?>
			    <?php endforeach; ?>
			</p>
			<?php endif;?>




        <?php if( get_field('project_matter_technique') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Matter and technique[:it]Materiali e tecnica[:]", $language = '' ); ?>: <?php the_field('project_matter_technique'); ?> <?php endif;?>
        <?php if( get_field('project_measures_other') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Measures[:it]Misure[:]", $language = '' ); ?>: <?php the_field('project_measures_other'); ?> <?php endif;?>
        <?php if( get_field('project_measures_weight') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Weight[:it]Peso[:]", $language = '' ); ?>: <?php the_field('project_measures_weight'); ?><?php endif;?>

    </p>

    <?php if( get_field('project_description') ):?> <p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]DESCRIPTION[:it]DESCRIZIONE[:]", $language = '' ); ?>: <?php the_field('project_description'); ?> </p> <?php endif;?>
    
  

  	<p class="_BodyText" style="border-bottom: 1px dashed #FFF;"><?php echo  wpm_translate_string( "[:en]THEMES[:it]TEMI[:]", $language = '' ); ?>:

  		<?php $project_items = array("project_specificity | specificità","project_body | corpo","project_breath | respiro","project_imagination | immaginazione","project_identity | identità");

  		foreach ($project_items as $project_item):
  			$project_theme = get_field(mytranslate_force($project_item,"en"));
  			$keyword = preg_split("/[\_]+/", "hypertext language, $project_item");
			
			if( $project_theme ): ?>
				<br>../<?php echo "#".ucwords(mytranslate($keyword[1])); ?>:

				<?php foreach( $project_theme as $theme_field ): ?>
			        <?php echo mytranslate($theme_field)." "; ?>
			    <?php endforeach; ?>


			<?php endif; ?>

  		<?php endforeach; ?>

  	</p>


    <p class="_BodyText" ><?php echo  wpm_translate_string( "[:en]SOURCES AND DOCUMENTS[:it]FONTI E DOCUMENTI[:]", $language = '' ); ?>:
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




        <?php if( get_field('project_pdf') ):?> <br>../<?php echo  wpm_translate_string( "[:en]Presentation[:it]Presentazione[:]", $language = '' ); ?> [pdf]: <a target="_blank" class="customfollow-icon download" href="<?php echo get_field('project_pdf')['url']; ?>"><?php echo get_field('project_pdf')['filename']; ?></a> <?php endif;?>

        </p>




        <?php if( get_field('project_bibliography') ):?> <p>../<?php echo  wpm_translate_string( "[:en]Bibliography[:it]Bibliografia[:]", $language = '' ); ?>: <?php the_field('project_bibliography'); ?></p>  <?php endif;?>
        <?php if( get_field('project_exhibition') ):?> <p><br>../<?php echo  wpm_translate_string( "[:en]Exhibition[:it]Esibizioni[:]", $language = '' ); ?>: <?php the_field('project_exhibition'); ?> </p><?php endif;?>
		<?php if( get_field('project_collection') ):?> <p><br>../<?php echo  wpm_translate_string( "[:en]Collection[:it]Collezzione[:]", $language = '' ); ?>: <?php echo mytranslate(get_field('project_collection')); ?> </p><?php endif;?>
    
    <p class="_BodyText" style="border-bottom: 1px dashed #FFF;">   
    </p>


    
</div>






	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
