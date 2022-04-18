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
	<div id="c-right"><p id="ip-log"> <?php  echo $_SERVER['REMOTE_ADDR'];?></p></div>

</div>


<div class="menu-buttons">

    <span id="about" class="about left" onclick="openNav()"></span>

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



        <div class="sidenav-description">

            <a target="_blank" href="https://www.instagram.com/franz_sella/"> <i class="fab fa-instagram"></i></a>
            <a target="_blank" href="https://www.youtube.com/channel/UCwK35sNDRUZGncY8VFtbLWw/videos?view_as=subscriber"> <i class="fab fa-youtube-square"></i></a>
            <a target="_blank" href="https://vimeo.com/franzsella"> <i class="fab fa-vimeo-v"></i></a>
            <a target="_blank" href="https://t.me/f_nius"> <i class="fab fa-telegram"></i></a>
            <!-- <a target="_blank" href="https://fbnonportfolio.blogspot.com/"> <i class="far fa-newspaper"></i></a> -->
            <a target="_blank" href="https://pensierif.blogspot.com/"> 


      
                <!-- Generator: Adobe Illustrator 24.3.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 100 81.17" style="enable-background:new 0 0 100 81.17;" xml:space="preserve">
                <path d="M97.86,51.88c-1.8-6.96-3.56-13.93-5.33-20.91L88.78,16.2l-5.15,1.05c1.11,7.11,2.54,14.25,3.92,21.16
                    c1.35,6.73,2.73,13.68,3.82,20.57l-0.19,0.37c-2.13,4.19-5.26,6.88-9.57,8.21c-2.92,0.9-6.19,1.32-10.34,1.28
                    c-6.15-0.04-12.87-0.65-21.15-1.91c-7.8-1.19-15.84-2.85-24.58-5.08c1.77-1.72,3.53-3.44,5.29-5.16
                    c5.21-5.09,10.6-10.36,15.97-15.44C59.24,29.49,72.13,18.1,83.09,8.51c0.64-0.56,1.04-0.81,1.44-0.9c1.25-0.28,2.37-1.41,2.67-2.7
                    c0.36-1.57-0.71-2.61-1.07-2.96l-0.08-0.08l0.04,0.04l-2.02-0.94h-4.61l-5.56,0.19c-4.34,0.1-8.68,0.2-13.02,0.28l-2.59,0.04
                    c-8.62,0.15-17.54,0.3-26.33,0.92c-2.93,0.21-5,1.53-6.17,3.94l-0.06,0.12c-0.76,1.57-1.48,3.05-2.28,4.5
                    c-1.61,2.91-3.24,5.8-4.88,8.7l-2.11,3.74c-0.1,0.18-0.2,0.37-0.29,0.55l-0.1,0.19l3.7,3.46c0.77-0.46,1.2-1.05,1.5-1.52l2.22-3.51
                    c2.1-3.33,4.21-6.66,6.33-9.98c0.21-0.33,0.38-0.48,0.42-0.51c1.3-0.71,2.39-1.25,3.49-1.61c3.58-1.16,7.35-1.44,11.34-1.74
                    l1.08-0.08c3.28-0.25,6.73-0.44,10.23-0.55c3.2-0.1,6.47-0.14,9.64-0.17c-0.13,0.15-0.27,0.3-0.4,0.45
                    c-1.57,1.76-3.18,3.58-4.85,5.25C53.49,21,45.56,28.33,36.57,36.09c-5.73,4.94-11.48,9.85-17.23,14.76c-2.93,2.5-5.86,5-8.78,7.5
                    c-1.44,1.23-3.06,1.83-4.9,1.81c-2.98,0-3.33,2.5-3.36,2.79c-0.19,1.79,1.01,3.37,2.83,3.74c0.59,0.12,1.13,0.14,1.56,0.15l0.15,0
                    c5.15,0.18,9.25,0.58,12.93,1.26c7.05,1.31,14.18,2.8,21.07,4.25c3.14,0.66,6.28,1.34,9.42,2.02c4.68,1.02,9.51,2.07,14.29,3.02
                    c3.46,0.69,6.73,1.03,9.88,1.03c1.3,0,2.58-0.06,3.84-0.17c4.65-0.42,8.59-2.16,11.71-5.15c2.34-2.25,4.3-4.98,6.16-8.59
                    c0.85-1.65,0.7-3.23,0.59-4.38c-0.01-0.09-0.01-0.17-0.02-0.26c0.24-0.62,0.47-1.23,0.67-1.83l0.27-0.78
                    C98.27,55.51,98.34,53.74,97.86,51.88z"/>
                </svg>

            </a>
            <a target="_blank" href="https://twitter.com/franzsella"> <i class="fab fa-twitter"></i></a>
        
        
          
     </div>       



<div id="myBanner" class="banner ">
    <a class="close-modal" onclick="closeBan()" >×</a>
        <div id="container-disclaimer" class="">
            
            
            <a class="customfollow-icon mail" target="_blank" href="mailto:fb@francescobertele.net">
                <i class="far fa-envelope"></i>
            </a>
            <br>
            <p class="_BodyText" style="text-align:center;">francesco bertelé 
             <?php echo  wpm_translate_string( "[:en]official website [:it]sito web ufficiale [:]", $language = '' ); ?>
            | P.IVA: 03687100135 | f’ archive <?php echo date("Y"); ?></p>
            <p class="_BodyText" style="text-align:center;">
                 <?php echo  wpm_translate_string( "[:en]web design and development by [:it]web design e sviluppo di [:]", $language = '' ); ?>
                 <a style="text-decoration:underline;" target="_blank" href="https://www.simone-ellero.eu/">simone ellero</a> e <a style="text-decoration:underline;" target="_blank" href="https://giovannipignoni.com/">giovanni pignoni</a> <br> 
                  <?php echo  wpm_translate_string( "[:en]copy by [:it]copy di [:]", $language = '' ); ?>
                  <a style="text-decoration:underline;" target="_blank" href="https://www.instagram.com/gaiascrivecose/">gaia greco</a>.

            </p>
            <br>
            <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                <i class="fab fa-creative-commons" aria-hidden="true"></i>
                <i class="fab fa-creative-commons-by"aria-hidden="true"></i>
                <i class="fab fa-creative-commons-nc" aria-hidden="true"></i>
                <i class="fab fa-creative-commons-sa" aria-hidden="true"></i>

            </a>
            <br>
            <img style="width:100px;" src="https://worldbeyondwar.org/wp-content/uploads/2014/06/pledgesigner.jpg">
		</div>
</div>
<div id="banner-dimmer" href="#" onclick="closeBan()" class="">&nbsp;</div>

<?php wp_footer(); ?>

</body>
</html>
