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
		<div class="cell content_bib_body">

			<div class="text-description-overflow-bibliography">

		    <h1 class="_TitleOU" style="border-bottom: 1px solid black;"> <?php the_title(); ?> </h1>

		    

		    <?php if( get_field('project_code') ):?><span class="_CatOU"><?php the_field('project_code'); ?> </span><br> <?php endif;?>

		    <?php if( get_field('project_isbn') ):?><span class="_CatOU">ISBN:<?php the_field('project_isbn'); ?> </span><br> <?php endif;?>



		    <?php if( get_field('project_related') ):
		    	$featured_post = get_field('project_related');

		    	$permalink = get_permalink( $featured_post->ID );
        		$title = get_the_title( $featured_post->ID );


		    	?> <p class="_BodyText" style="margin-bottom: 0px;"><?php echo  wpm_translate_string( "[:en]RELATED WORK[:it]LAVORI CORRELATI[:]", $language = '' ); ?>:<br>
		    <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
		    </p><?php endif;?>



		    <?php if( get_field('project_exhibition') ):?> <p class="_BodyText" style="margin-bottom: 0px;"><?php echo  wpm_translate_string( "[:en]EXHIBITION[:it]ESPOSIZIONE[:]", $language = '' ); ?>:</p><?php the_field('project_exhibition'); ?><?php endif;?>


		    <?php if( get_field('project_publisher') ):?> <p class="_BodyText" style="margin-bottom: 0px;"><?php echo  wpm_translate_string( "[:en]PUBLISHER[:it]EDITORE[:]", $language = '' ); ?>:</p><?php the_field('project_publisher'); ?><?php endif;?>



		    <?php if( get_field('project_links') || get_field('project_files')  ):?> <p class="_BodyText" ><?php echo  wpm_translate_string( "[:en]SOURCES AND REFERENCE DOCUMENTS[:it]FONTI E DOCUMENTI DI RIFERIMENTO[:]", $language = '' ); ?>:
		    	<br><a href="https://www.nctmelarte.it/wp-content/uploads/2020/04/nctm-Francesco-Bertel%C3%A8.pdf" class="customfollow-icon 		download" target="_blank">#link_1</a>
		    </p><?php endif;?>
		  
		</div>


		</div>


		<div class="cell content_bib_image">
		</div>


	</div>






	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
