<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */
get_header(); ?>

		<main id="main" class="site-main" role="main">

			<div id="sort-filter" class="">
    			<h1 class="title">Ask <span class="ask-nav noDesktop arrowed">Themes</span></h1>


				   <button class="accordion braketed ask-tab"  data-targhet="#biography"
				   data-textnav="<?php echo  wpm_translate_string( "[:en]Biography[:it]Biografia[:]", $language = '' ); ?>">
  					<?php echo  wpm_translate_string( "[:en]Biography[:it]Biografia[:]", $language = '' ); ?>
				  </button>
				  <button class="accordion braketed ask-tab"  data-targhet="#themes"
    			  data-textnav="<?php echo  wpm_translate_string( "[:en]Themes[:it]Temi[:]", $language = '' ); ?>">
  					<?php echo  wpm_translate_string( "[:en]Themes[:it]Temi[:]", $language = '' ); ?>
				  </button>

				  <button class="accordion braketed ask-tab"  data-targhet="#bibliography"
				  data-textnav="<?php echo  wpm_translate_string( "[:en]Bibliography[:it]Bibliografia[:]", $language = '' ); ?>">
  					<?php echo  wpm_translate_string( "[:en]Bibliography[:it]Bibliografia[:]", $language = '' ); ?>
				  </button>

				<?php  /*<button class="accordion braketed ask-tab"  data-targhet="#exhibition"
				  data-textnav="<?php echo  wpm_translate_string( "[:en]Exhibition[:it]Esposizioni[:]", $language = '' ); ?>">
  					<?php echo  wpm_translate_string( "[:en]Exhibition[:it]Esposizioni[:]", $language = '' ); ?>
				  </button>

		

     					<button class="accordion braketed ask-tab"  data-targhet="#press"
				   data-textnav="<?php echo  wpm_translate_string( "[:en]Press releases[:it]Rassegna stampa[:]", $language = '' ); ?>">
  					<?php echo  wpm_translate_string( "[:en]Press releases[:it]Rassegna stampa[:]", $language = '' ); ?>
				  </button>

					*/?>
		


     			

				
			</div>


			
			
			<div class="ask-content grid-x" id="biography">
				<div class="cell small-12 medium-12 large-12 ask-separator">
					<h3 id="">
						<?php echo  wpm_translate_string( "[:en]Biography[:it]Biografia[:]", $language = '' ); ?>
					</h3>
				</div>
  				<div class="cell small-12 medium-10 large-8 inside large-offset-4 medium-offset-2">
				
					<?php if (wpm_get_language()=="it") {the_field('ask_biography'); }?>	
  					<?php if (wpm_get_language()=="en") {the_field('ask_biography'); }?>	
				</div>

			</div>
			<?php  include(locate_template('template-parts/content-ask-themes.php')); ?>


			<?php  include(locate_template('template-parts/content-ask-bibliography.php')); ?>
	
			<?php 	  /*include(locate_template('template-parts/content-ask-exhibition.php'));*/  ?>


			<?php 	  /*

 				<div class="ask-content grid-x" id="press">
				<div class="cell small-12 medium-12 large-12 ask-separator">
					<h3 id="">
						<?php echo  wpm_translate_string( "[:en]Press releases[:it]Rassegna stampa[:]", $language = '' ); ?>
					</h3>
				</div>
  				<div class="cell small-12 medium-10 large-8 inside large-offset-4 medium-offset-2">
				
					<?php if (wpm_get_language()=="it") {the_field('ask_press'); }?>	
  					<?php if (wpm_get_language()=="en") {the_field('ask_press'); }?>	
				</div>

			</div>
			*/  ?>


		</main><!-- #main -->


<?php

get_footer();
