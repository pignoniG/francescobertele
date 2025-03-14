<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */



?>




<div class="section scrollablebox" id="<?php echo $indexport ;?>" >



	<?php 
		if( has_post_thumbnail()){
			$tumbnail_url = fly_get_attachment_image_src( get_post_thumbnail_id(),'hd-for-interface' )['src'];
		
		}

		?>

	
	<div class="image-box"  style="background-image: url(<?php echo $tumbnail_url; ?> );">
		<div class="title-line">
			<a href="<?php echo get_permalink();?>">
		
	    	<h3 class="ouvre_project" ><?php echo get_the_title();?></h3></a>
	    	<h4> <?php the_field('project_code');?> </h4>
		</div>


		
	
		


	</div>

</div>	
<?php $indexport = $indexport +1 ;?>
<div class="section project-info scrollablebox" id="<?php echo $indexport ;?>">

	<div class="title-line ">
	   <a href="<?php echo get_permalink();?>">
		
	    	<h3 class="ouvre_project" ><?php echo get_the_title();?></h3></a>
	    <h4> <?php the_field('project_code');?> </h4>
	</div>
	


	<div class="description-box">
		<p class="">
		 <?php 
		 if (get_field('project_description_short')) {
		 	the_field('project_description_short');
		 	
		} elseif (get_field('project_description')) {
			the_field('project_description');
		} 

			 ?></p>

	</div>

	<div class="pro-links">


	

	<a href="<?php echo wpm_translate_url( get_page_link(74), $language = '' );?>/?force=True#filter=.project_corpus_<?php echo myUrlEncode (filter_var(get_field("project_corpus")[0], FILTER_SANITIZE_URL)) ?>
	">> <?php echo  wpm_translate_string( "[:en]Related Objects[:it] Oggetti correlati[:]", $language = '' ); ?></a>
	</div> 

	
	

</div>

	




	








