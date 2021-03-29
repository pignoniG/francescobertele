<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package francescobertele
 */

?>

</div><!-- #page -->



<div class="clip-mask">
	<div id="c-left"><p id="mouse-log"></p></div>
	<div id="c-right"><p id="ip-log"></p></div>

</div>


<div class="menu-buttons">

    <span id="about" class="about left" onclick="openNav()">#</span>

    <span class="center">
    <!-- 

        
        
        <a class="braketed home" href="<?php echo wpm_translate_url( home_url(), $language = '' );?>">Ho</a> -->
        <a class="braketed onair" href="<?php echo wpm_translate_url( get_page_link(80), $language = '' );?>">On</a>
        <span class="hidden-onair">ONAIR</span>
        <a class="braketed oeuvre" href="<?php echo wpm_translate_url( get_page_link(74), $language = '' );?>">Oe</a>
        <span class="hidden-oeuvre">OEUVRE</span>
        <a class="braketed ask" href="<?php echo wpm_translate_url( get_page_link(190), $language = '' );?>">sK</a>
        <span class="hidden-ask">ASK</span>
        <!-- <a class="braketed mad" href="<?php echo wpm_translate_url( get_page_link(), $language = '' );?>">AD</a> -->


    </span>
    <span class="noMedium">

    <?php if ( function_exists ( 'wpm_language_switcher') ) wpm_language_switcher ('list', 'name'); ?>
    </span>

    <span id="disclaimer" class="disclaimer right" onclick="openBan()">
       <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 78.12" enable-background="new 0 0 50 78.12" xml:space="preserve">
        <path fill="#FF0000" d="M48.16,3.5h-7.12c-0.25,0-0.49,0.14-0.62,0.35l-3.77,6.46c-0.13,0.22-0.13,0.5,0,0.72
    c0.13,0.22,0.37,0.36,0.62,0.36l4.57,0c0.19,0,0.38-0.08,0.51-0.21l6.32-6.46c0.2-0.21,0.26-0.51,0.15-0.78
    C48.71,3.67,48.45,3.5,48.16,3.5"></path>
        <path fill="none" stroke="#FF0000" stroke-width="4.6108" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="27" d="
    M32.55,4.15l-0.89-0.28C28.72,3.2,25.71,3.09,22.8,3.5c-2.91,0.42-5.72,1.35-8.21,2.79C5.68,11.42,1.13,21.81,3.52,31.57
    c0.92,3.79,2.86,7.03,4.9,10.46c0.37,0.62,0.75,1.26,1.12,1.9L23.42,67.8l3.86,6.63"></path>
        </svg>
    </span>
</div> 

<!-- <div id="mySidenav" class="sidenav" style="height: 200px;">

        <div class="sidenav-description">
            <a target="_blank" href="https://www.instagram.com/franz_sella/" class="fa fa-instagram"></a>
            <a target="_blank" href="https://www.youtube.com/channel/UCwK35sNDRUZGncY8VFtbLWw/videos?view_as=subscriber" class="fa fa-youtube"></a>
            <a target="_blank" href="https://vimeo.com/franzsella" class="fa fa-vimeo"></a>
            <a target="_blank" href="https://t.me/f_nius" class="fa fa-telegram"></a>
            <a class="customfollow-icon news" target="_blank" href="https://fbnonportfolio.blogspot.com/">
            <img src="https://francescobertele.net/wp-content/uploads/2020/11/news.png"></a>
            <a class="customfollow-icon pensieri" target="_blank" href="https://pensierif.blogspot.com/">
            <img src="https://francescobertele.net/wp-content/uploads/2020/11/pensieri-blogspot.png"></a>
            <a target="_blank" href="https://twitter.com/franzsella" class="fa fa-twitter"></a>
           
     </div>       
</div>
-->
<div id="myBanner" class="banner ">
        <div id="container-disclaimer" class="">
            
            
            <a class="customfollow-icon mail" target="_blank" href="mailto:fb@francescobertele.net">
                <i class="far fa-envelope"></i>
            </a>
            <br>
            <p class="_BodyText" style="text-align:center;">francesco bertelé 
             <?php echo  wpm_translate_string( "[:en]official website [:it]sito web ufficiale [:]", $language = '' ); ?>
            | P.IVA: 03687100135 | f’ archive 2021</p>
            <p class="_BodyText" style="text-align:center;">
                 <?php echo  wpm_translate_string( "[:en]web design and development by [:it]web design e sviluppo di [:]", $language = '' ); ?>
                 <a style="text-decoration:underline;" href="https://www.simone-ellero.eu/">simone ellero</a></p>
            <br>
            <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                <i class="fab fa-creative-commons" aria-hidden="true"></i>
                <i class="fab fa-creative-commons-by"aria-hidden="true"></i>
                <i class="fab fa-creative-commons-nc" aria-hidden="true"></i>
                <i class="fab fa-creative-commons-sa" aria-hidden="true"></i>

            </a>
		</div>
</div>
<div id="banner-dimmer" href="#" onclick="closeBan()" class="">&nbsp;</div>

<?php wp_footer(); ?>

</body>
</html>
