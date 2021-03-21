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

			<div id="sort-filter">
    			<h1 class="title">Ask</h1>

    			  <button class="accordion braketed ask-tab"  data-targhet="#themes">
  					<?php echo  wpm_translate_string( "[:en]Themes[:it]Temi[:]", $language = '' ); ?>
				  </button>
				   <button class="accordion braketed ask-tab"  data-targhet="#biography">
  					<?php echo  wpm_translate_string( "[:en]Biography[:it]Biografia[:]", $language = '' ); ?>
				  </button>
				  <button class="accordion braketed ask-tab"  data-targhet="#become-a-trustee">
  					<?php echo  wpm_translate_string( "[:en]Trustee[:it]Fiduciario[:]", $language = '' ); ?>
				  </button>
				  <button class="accordion braketed ask-tab"  data-targhet="#bibliography">
  					<?php echo  wpm_translate_string( "[:en]Bibliography[:it]Bibliografia[:]", $language = '' ); ?>
				  </button>
				  <button class="accordion braketed ask-tab"  data-targhet="#artistic_dir">
  					<?php echo  wpm_translate_string( "[:en]Artistic direction[:it]Direzione artistica[:]", $language = '' ); ?>
				  </button>

			</div>

			<?php  include(locate_template('template-parts/content-ask-themes.php')); ?>

			<div class="ask-content grid-x" id="biography">
  					<div class="cell medium-12 large-8">
						<?php the_field('ask_biography'); ?>
					</div>

			</div>
			<div class="ask-content grid-x" id="become-a-trustee">
  					<div class="cell medium-12 large-8">
						<?php the_field('ask_trustee'); ?>
					</div>

			</div>

			<?php  include(locate_template('template-parts/content-ask-bibliography.php')); ?>

			<div class="ask-content grid-x" id="artistic_dir">
  					<div class="cell medium-12 large-6">
  						<?php the_field('ask_ad'); ?>	
  						</div>
			</div>



		</main><!-- #main -->


<?php

get_footer();

