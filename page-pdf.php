<?php
require('fpdf/fpdf.php');

$project_title;
$project_id;


class PDF extends FPDF
{


    const DPI = 300;
    const MM_IN_INCH = 25.4;
    const A4_HEIGHT = 297;
    const A4_WIDTH = 210;

     /**
     * Resize et fit une image image
     *
     * @param string $imgPath
     * @param integer $x
     * @param integer $y
     * @param integer $containerWidth
     * @param integer $containerHeight
     * @param string $alignment
     * @return void
     */
    public function imageUniformToFill(string $imgPath, int $x = 0, int $y = 0, int $containerWidth = 210, int $containerHeight = 297, string $alignment = 'C')
    {
        list($width, $height) = $this->resizeToFit($imgPath, $containerWidth, $containerHeight);

        if ($alignment === 'R')
        {
            $this->Image($imgPath, $x+$containerWidth-$width, $y+($containerHeight-$height)/2, $width, $height);
        }
        else if ($alignment === 'B')
        {
            $this->Image($imgPath, $x, $y+$containerHeight-$height, $width, $height);
        }
        else if ($alignment === 'C')
        {
            $this->Image($imgPath, $x+($containerWidth-$width)/2, $y+($containerHeight-$height)/2, $width, $height);
        }
        else
        {
            $this->Image($imgPath, $x, $y, $width, $height);
        }
    }
    
    /**
     * Convertit des pixels en mm
     *
     * @param integer $val
     * @return integer
     */
    protected function pixelsToMm(int $val) : int
    {
        return (int)(round($val * $this::MM_IN_INCH / $this::DPI));
    }

    /**
     * Convertit des mm en pixels
     *
     * @param integer $val
     * @return integer
     */
    protected function mmToPixels(int $val) : int
    {
        return (int)(round($this::DPI * $val / $this::MM_IN_INCH));
    }

    /**
     * Resize une image
     *
     * @param string $imgPath
     * @param integer $maxWidth en mm
     * @param integer $maxHeight en mm
     * @return int[]
     */
    protected function resizeToFit(string $imgPath, int $maxWidth = 210, int $maxHeight = 297) : array
    {
        list($width, $height) = getimagesize($imgPath);
        $widthScale = $this->mmtopixels($maxWidth) / $width;
        $heightScale = $this->mmToPixels($maxHeight) / $height;
        $scale = min($widthScale, $heightScale);
        return array(
            $this->pixelsToMM($scale * $width),
            $this->pixelsToMM($scale * $height)
        );
    }

protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,0);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

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
	
	$this->SetTopMargin(10);
    // Logo
    $this->imageUniformToFill("https://www.francescobertele.net/logo.png", 195, 10,10, 10, "C");//$alignment "B", "T", "L", "R", "C"
    // Arial bold 15
    $this->SetFont('Courier','B',16);
	
	$this->WriteHTML( utf8_decode($project_title));
	$this->SetFont('Courier','',10);

	$this->TextWithDirection(200,150,$_SERVER['REMOTE_ADDR'],'U');

	GLOBAL $project_id;
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Courier','',10);
    // Page number

    $this->WriteHTML("<a href=".get_permalink($project_id).">".get_permalink($project_id)."</a>");
    $this->SetY(10);
}

// Page footer
function Footer()
{
	
}
}









$projects=array(44,45);
$projects=$_REQUEST['project'];
$projects= preg_split('/,/', $projects); 

$pdf = new PDF();

$file_title = date("m.d.y"); 
$filecounter=0;     

foreach ($projects as $project_id) {
	if( has_category('oeuvre',$project_id) ){
		
		$filecounter=$filecounter+1;
		// code...
	

	$project_title= get_the_title( $project_id);

	
	
	
	
	
	if( has_post_thumbnail($project_id)){
		$pdf->SetTopMargin(10);
		$pdf->AddPage();
		
		$pdf->SetFont('Courier','',10);

		$tumbnail_url = fly_get_attachment_image_src( get_post_thumbnail_id($project_id),'hd-for-pdf' )['src'];


		$pdf->imageUniformToFill($tumbnail_url, 10, 25,175, 240, "C");//$alignment "B", "T", "L", "R", "C"
		


	}

	
		$pdf->AddPage();
		
		$pdf->SetFont('Courier','',10);
		$pdf->SetRightMargin(30);
		$pdf->SetTopMargin(30);




		$pdf->Write(5,"\n\n");
		if( get_field('project_code',$project_id) ):
			$pdf->Write(5,"\n".get_field('project_code',$project_id));
		endif;

		if( get_field('project_corpus',$project_id) ):
			$pdf->Write(5,"\nCORPUS: ".utf8_decode(implode(", ",get_field('project_corpus',$project_id))));
		endif;
	
		if( have_rows('project_keywords',$project_id) ):
	
			$string = "KEYWORDS: ";
	
			while( have_rows('project_keywords',$project_id) ) : 
				the_row();
			
			    $string = $string."#".get_sub_field('project_keyword')." ";
			       
			endwhile;
			$pdf->Write(5,"\n\n".utf8_decode($string));
		endif;
	
			$pdf->Write(5,"\n\nCULTURAL DEFINITION:");
	
	
	
		if( get_field('project_edition',$project_id) ):
			$pdf->Write(5,"\n../Edition: ".utf8_decode(get_field('project_edition',$project_id)));
		endif;
	
		if( get_field('project_sitetimes',$project_id) ):
			$pdf->Write(5,"\n../Site/times: ".utf8_decode(get_field('project_sitetimes',$project_id)));
		endif;
	
		if( get_field('project_co-authors',$project_id) ):
			$pdf->Write(5,"\n../Co-authors: ");
			$pdf->WriteHTML(utf8_decode(get_field('project_co-authors',$project_id)));
		endif;
	
		$pdf->Write(5,"\n\nTECHNICAL DATA:");
	
	
		if( get_field('project_object_type',$project_id)): 
			$string = "../Object ";
				
				 
			foreach( get_field('project_object_type',$project_id) as $type_i ): 
				$string =$string.$type_i." ";
			endforeach;
				$pdf->Write(5,"\n".utf8_decode(mytranslate($string)));
		endif;
	
		if( get_field('project_matter_technique',$project_id) ):

			
			$pdf->Write(5,"\n../Matter and technique: ".utf8_decode(get_field('project_matter_technique',$project_id)));
		endif;
	
		if( get_field('project_measures_weight',$project_id) ):
			$pdf->Write(5,"\n../Weight: ".utf8_decode(get_field('project_measures_weight',$project_id)));
		endif;
	
		if( get_field('project_measures_other',$project_id) ):
			$pdf->Write(5,"\n../Measures: ".utf8_decode(get_field('project_measures_other',$project_id)));
		endif;
	
		if( get_field('project_description',$project_id) ):
			$pdf->Write(5,"\n\nDESCRIPTION: \n");
			
			$text=  utf8_decode(get_field('project_description',$project_id));
			$pdf->WriteHTML($text);

		endif;

		if( get_field('project_collection',$project_id) ):
			$pdf->Write(5,"\n\nCOLLECTION: ".mytranslate(get_field('project_collection',$project_id)));
		endif;
	
	
	}
	};
	
if ($filecounter==1) {
	$file_title = "export_".$project_title."_".date("m.d.y"); 
}
else{
	$file_title = "export_"."collection_".date("m.d.y"); 

}
    

$pdf->Output("I",$file_title);
?>
