<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package francescobertele
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			if (has_category("oeuvre")) {
				get_template_part( 'template-parts/content-oeuvre', get_post_type() );
			}

			elseif (has_category("onair")) {
				get_template_part( 'template-parts/content-onair', get_post_type() );
			}

			elseif (has_category("bibliography")) {
				get_template_part( 'template-parts/content-bibliography', get_post_type() );
			}

			


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
