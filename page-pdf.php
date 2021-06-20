<?php
require('fpdf/fpdf.php');

$project_title;
$project_id;


class PDF extends FPDF
{



function TextWithDirection($x, $y, $txt, $direction='R')
{
    if ($direction=='R')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',1,0,0,1,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    elseif ($direction=='L')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',-1,0,0,-1,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    elseif ($direction=='U')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',0,1,-1,0,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    elseif ($direction=='D')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',0,-1,1,0,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    else
        $s=sprintf('BT %.2F %.2F Td (%s) Tj ET',$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}

function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
{
    $font_angle+=90+$txt_angle;
    $txt_angle*=M_PI/180;
    $font_angle*=M_PI/180;

    $txt_dx=cos($txt_angle);
    $txt_dy=sin($txt_angle);
    $font_dx=cos($font_angle);
    $font_dy=sin($font_angle);

    $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}

// Page header
function Header()
{
	GLOBAL $project_title;
	GLOBAL $project_id;

    // Logo
    $this->imageUniformToFill("https://www.francescobertele.net/logo.png", 195, 10,10, 10, "C");//$alignment "B", "T", "L", "R", "C"
    // Arial bold 15
    $this->SetFont('Courier','B',16);
	
	$this->Cell(40,10,$project_title);
	$this->SetFont('Courier','',10);

	$this->TextWithDirection(200,150,$_SERVER['REMOTE_ADDR'],'U');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}









$projects=array(44,45);
$projects=$_REQUEST['project'];
$projects= preg_split('/,/', $projects); 

$pdf = new PDF();










foreach ($projects as $project_id) {
	if( has_category('oeuvre',$project_id) ){
		// code...
	

	$project_title= get_the_title( $project_id);

	
	
	
	
	
	if( has_post_thumbnail($project_id)){
		$pdf->AddPage();
		
		$pdf->SetFont('Courier','',10);

		$tumbnail_url = fly_get_attachment_image_src( get_post_thumbnail_id($project_id),'thumbnail-medium-for-interface' )['src'];


		$pdf->imageUniformToFill($tumbnail_url, 10, 25,175, 240, "C");//$alignment "B", "T", "L", "R", "C"
		


	}

	
		$pdf->AddPage();
		$pdf->SetFont('Courier','B',16);
	
		$pdf->Cell(40,10,$project_title);
		$pdf->SetFont('Courier','',10);



	
	
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
	
	
	}
	};
	


$pdf->Output("I",$project_title);
?>
