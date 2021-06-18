<?php
require('fpdf/fpdf.php');


$project_id= $_REQUEST['post'];
$project_title= get_the_title( $project_id);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Courier','B',16);

$pdf->Cell(40,10,$project_title);

$pdf->SetFont('Courier','',10);
$pdf->SetY(90);


	if( has_post_thumbnail($project_id)){
		$tumbnail_url = fly_get_attachment_image_src( get_post_thumbnail_id($project_id),'thumbnail-medium-for-interface' )['src'];

		$pdf->Image($tumbnail_url,10,30,90,0,'jpg');
	}

	if( get_field('project_corpus',$project_id) ):
		$pdf->Write(5,"CORPUS: ".implode(", ",get_field('project_corpus',$project_id)));
	endif;

	if( have_rows('project_keywords',$project_id) ):

		$string = "KEYWORDS: ";

		while( have_rows('project_keywords',$project_id) ) : 
			the_row();
		
		    $string = $string."#".get_sub_field('project_keyword')." ";
		       
		endwhile;
		$pdf->Write(5,"\n\n".$string);
	endif;

		$pdf->Write(5,"\n\nCULTURAL DEFINITION:");



	if( get_field('project_edition',$project_id) ):
		$pdf->Write(5,"\n../Edition: ".get_field('project_edition',$project_id));
	endif;

	if( get_field('project_sitetimes',$project_id) ):
		$pdf->Write(5,"\n../Site/times: ".get_field('project_sitetimes',$project_id));
	endif;

	if( get_field('project_co-authors',$project_id) ):
		$pdf->Write(5,"\n../Co-authors: ".get_field('project_co-authors',$project_id));
	endif;

	$pdf->Write(5,"\n\nTECHNICAL DATA:");


	if( get_field('project_object_type',$project_id)): 
		$string = "../Object ";
			
			 
		foreach( get_field('project_object_type',$project_id) as $type_i ): 
			$string =$string.$type_i." ";
		endforeach;
			$pdf->Write(5,"\n".mytranslate($string));
	endif;

	if( get_field('project_matter_technique',$project_id) ):
		
		$pdf->Write(5,"\n../Matter and technique: ".get_field('project_matter_technique',$project_id));
	endif;

	if( get_field('project_measures_weight',$project_id) ):
		$pdf->Write(5,"\n../Weight: ".get_field('project_measures_weight',$project_id));
	endif;

	if( get_field('project_measures_other',$project_id) ):
		$pdf->Write(5,"\n../Measures: ".get_field('project_measures_other',$project_id));
	endif;

	if( get_field('project_description',$project_id) ):
		$pdf->Write(5,"\n\nDESCRIPTION: \n".get_field('project_description',$project_id));
	endif;





















$pdf->Output("I",$project_title);
?>
