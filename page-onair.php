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
    			<h1 class="title">Onair  <span class="section-subtitle"> <?php echo  wpm_translate_string( "[:en]active productions[:it]produzioni in corso[:]", $language = '' ); ?> </span></h1>
			</div>
		<div class="onair_flow">
	
			<?php

			$args = array(
						'post_type' => 'progetto',
						'cat' => 14,
        				'post_status' => 'publish',
        				'meta_key'	  => 'project_date',
						'orderby'	  => 'meta_value',
						'order'		  => 'DESC'
			);

			$custom_query = new WP_Query( $args );



			// The Loop!
			if ($custom_query->have_posts()):
				
				
			    ?>

			    <div class="main-carousel">
			    

			 		<?php
			 			$i=1;
			   			$count = $custom_query->found_posts;
			   			while ($custom_query->have_posts()) {
			   			     	$custom_query->the_post();
								$img_caption = $i.'/'.$count;
								$img_url = fly_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail-medium-for-interface' )['src'];
								?>
								
								<a  style="background-image: url(<?php echo $img_url;?>); " class="carousel-cell" href="<?php echo get_permalink();?>"  data-alt="<?php echo get_the_title();?>" data-number="<?php echo $img_caption ; ?>" ></a>
								<?php
			   			    $i++;}
			   		?> 
			</div>

			 <div>
			 	<p class="main-carousel-caption _BodyText">
			 		<span class="caption title">Title</span>
			 		<span class="caption number">1/1</span>
			 	</p>
			 </div>



			<?php		
			endif
			?>


		</div>
		



		<div class="onair_button">
			<a class="general-button braketed" id="onair-ask_trustee" ><?php echo  wpm_translate_string( "[:en]Become a Trustee[:it]Produci[:]", $language = '' ); ?></a>
		</div>



<div id="onair-trust-container-dimmer" class="modal_control"></div>
<div id="onair-trust-container" >
	<a class="close-modal modal_control">×</a>
    <div id="">

    	<h1 class="_TitleOU"><?php echo  wpm_translate_string( "[:en]Trustee[:it]Produci[:]", $language = '' ); ?></h1>



    	<div class=" _BodyText _BodyText_no_spaces" style="color: #FFF; ">
   			<?php if (wpm_get_language()=="it") {the_field('ask_trustee',190); }?>	
  			<?php if (wpm_get_language()=="en") {the_field('ask_trustee',190); }?>	
  		</div>
  		

    </div>


 </div>


		

		</main><!-- #main -->


<?php

get_footer();

