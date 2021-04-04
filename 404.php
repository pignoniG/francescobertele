<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package francescobertele
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title" style="text-align: center;"><?php esc_html_e( wpm_translate_string( "[:en]Page not found[:it]Pagina non trovata[:]", $language = '' ), 'francescobertele' ); ?></h1>
			</header><!-- .page-header -->

		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
