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

get_header();





?>

<div class="logo_cover">


<svg class="logo-home" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 50 78.12" enable-background="new 0 0 50 78.12" xml:space="preserve">
<path fill="#FF0000" d="M48.16,3.5h-7.12c-0.25,0-0.49,0.14-0.62,0.35l-3.77,6.46c-0.13,0.22-0.13,0.5,0,0.72
	c0.13,0.22,0.37,0.36,0.62,0.36l4.57,0c0.19,0,0.38-0.08,0.51-0.21l6.32-6.46c0.2-0.21,0.26-0.51,0.15-0.78
	C48.71,3.67,48.45,3.5,48.16,3.5"/>
<path fill="none" stroke="#FF0000" stroke-width="4.6108" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="27" d="
	M32.55,4.15l-0.89-0.28C28.72,3.2,25.71,3.09,22.8,3.5c-2.91,0.42-5.72,1.35-8.21,2.79C5.68,11.42,1.13,21.81,3.52,31.57
	c0.92,3.79,2.86,7.03,4.9,10.46c0.37,0.62,0.75,1.26,1.12,1.9L23.42,67.8l3.86,6.63"/>
</svg>





<p class="_BodyText text-home" >
<?php echo  wpm_translate_string( "[:en]artist’s official website [:it]sito web ufficiale dell'artista [:]", $language = '' ); ?>
</p>




</div>

	 <script type="text/javascript">

	 	var homeBackgrounds = [<?php 
	 		
			$images = get_field('home_images');
			if( $images ): 
				$i=0;
				
				foreach( $images as $image ):
					$tumbnail_url = fly_get_attachment_image_src( $image,'hd-for-interface' )['src'];

					if ($i>0) {echo (',');}
			    	echo '"'.$tumbnail_url.'"' ;
			    	$i=$i+1;
				endforeach;
			endif;?>];

		var homeBackground = homeBackgrounds[Math.floor(Math.random() * homeBackgrounds.length)];
		document.body.style.backgroundImage = "url("+homeBackground+")";
	 </script>
	<main id="primary" class="site-main">
	</main><!-- #main -->

<?php

get_footer();


