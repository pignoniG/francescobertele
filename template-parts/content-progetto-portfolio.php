<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */



?>
<div class="portfolio_project_box cell small-12 medium-10 large-8 inside large-offset-2 medium-offset-1">
	<div class="grid-x">
	<div class="title-line cell small-12 medium-12 large-12 "onclick="location.href=' <?php echo get_permalink();?>';">
	    <h3 class="ouvre_project" ><?php echo get_the_title();?></h3>

	    <h4> <?php the_field('project_code');?> </h4>
	</div>
	
	<div class="cell small-12 medium-10 medium-offset-1 large-offset-0 large-6 ">
		<?php 
		if( has_post_thumbnail()){
			$tumbnail_url = fly_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail-hd-for-interface' )['src'];
			echo '<img src="'. $tumbnail_url.'">';
		}

		?>
	</div>
	<div class="cell small-12 medium-10 medium-offset-1 large-6 large-offset-0 description-box">
		<p class="">
		 <?php 
		 if (get_field('project_description_short')) {
		 	the_field('project_description_short');
		 	
		} elseif (get_field('project_description')) {
			the_field('project_description');
		} 

			 ?></p>




	</div>
	<div class="pro-links cell small-12 medium-12 large-12">

	<a href="<?php echo get_permalink();?>">> <?php echo  wpm_translate_string( "[:en]Project Datasheet[:it]
	Scheda tecnica[:]", $language = '' ); ?></a>
	

	<a href="./oeuvre/?force=True#filter=.project_corpus_<?php echo myUrlEncode (filter_var(get_field("project_corpus")[0], FILTER_SANITIZE_URL)) ?>
	">> <?php echo  wpm_translate_string( "[:en]Related Objects[:it] Oggetti correlati[:]", $language = '' ); ?></a>
	</div> 
</div>

</div>
	
	





	








