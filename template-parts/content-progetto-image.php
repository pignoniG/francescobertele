<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele
 */






$local_filter_items= array();
$filter_count = 0;

foreach ($filter_items as $filter_item) {

	

	$current_field =  get_field($filter_item);

		if (is_array($current_field)){

			foreach ($current_field as $current_field_sing) {
			$san_filter = filter_var( $filter_item."_".mytranslate_force($current_field_sing,"en"), FILTER_SANITIZE_URL);
			$san_filter =myUrlEncode ($san_filter);

			array_push($global_filter_items[$filter_count],$san_filter);
			array_push($global_filter_items_h[$filter_count],mytranslate($current_field_sing));
			array_push($local_filter_items,$san_filter);
			}
		}
		else{	
			$san_filter= filter_var( $filter_item."_".mytranslate_force($current_field,"en"), FILTER_SANITIZE_URL);
			$san_filter =myUrlEncode ($san_filter);
			array_push($global_filter_items[$filter_count],$san_filter);
			array_push($global_filter_items_h[$filter_count],mytranslate($current_field));
			array_push($local_filter_items,$san_filter);
		}

		$global_filter_items[$filter_count] = array_unique($global_filter_items[$filter_count], SORT_STRING);
		$global_filter_items_h[$filter_count] = array_unique($global_filter_items_h[$filter_count], SORT_STRING);

		$filter_count = $filter_count+1;
	
}


?>


<div class="ouvre_project_box <?php echo implode( " ", $local_filter_items ); ?>" onclick="location.href=' <?php echo get_permalink();?>';" > 


	<div class="title-line">
	    <h3 href="/hic-sunt-dracones-corpus" class="ouvre_project"><?php echo get_the_title();?></h3>

	    <h4> <?php the_field('project_code');?> </h4>
	</div>


	<?php 
	if( has_post_thumbnail()){
		$tumbnail_url = fly_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail-medium-for-interface' )['src'];
		echo '<img src="'. $tumbnail_url.'">';
	}
	?>

	   
<div class="pro-deets">
	  <div class="tag-list">
	    <span>
	    	
		    <?php $project_themes_items = array("project_specificity","project_body","project_breath","project_imagination","project_identity");
		
  				foreach ($project_themes_items as $project_item):
  					$project_theme = get_field($project_item);
  					$keyword = preg_split("/[\_]+/", "hypertext language, $project_item");
					
					if( $project_theme ): ?>
						<?php /** echo "../".ucwords($keyword[1]);*/  
						?>
		
						<?php foreach( $project_theme as $theme_field ): 

							$item_filter = filter_var( $project_item."_".mytranslate_force($theme_field,"en"), FILTER_SANITIZE_URL);
							?>

							<snip class="theme_item <?php echo $item_filter; ?>"><?php echo("#".mytranslate($theme_field)); ?></snip>
					       	
					    <?php endforeach; ?>
		
		
					<?php endif; ?>
		
  				<?php endforeach; ?>


	   
	    	
		   
			<?php
			
			// Check rows exists.
			if( have_rows('project_keywords') ):
			
			    // Loop through rows.
			    while( have_rows('project_keywords') ) : the_row();
			
			        // Load sub field value.
			        $sub_value = get_sub_field('project_keyword');
			        ?><snip class="keyword_item"><?php echo($sub_value); ?></snip>
			
			
			     <?php endwhile;
			
			// No value.
			else :
			    // Do something...
			endif; ?>
		
	    </span>
	    
	  </div>
	</div> 

</div>						
					
	





	








