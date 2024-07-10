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
     
            // ...
       
	GLOBAL $project_title;
	
	$this->SetTopMargin(10);
    // Logo

    if (!$this->skipHeader) {
    // Arial bold 15
        $this->imageUniformToFill("https://www.francescobertele.net/logo.png", 195, 10,10, 10, "C");//$alignment "B", "T", "L", "R", "C"
    }// Arial bold 15
    $this->SetFont('foundersmono','',16);
    
    $project_title = html_entity_decode($project_title );
    $project_title = str_replace("&#039;","'",$project_title);
    
    //$project_title = str_replace("&#8217;","’",$project_title);
    $project_title = iconv('utf-8', 'cp1252', $project_title);

	//$project_title =htmlspecialchars_decode($project_title);
    if (!$this->skipHeader) {
	   $this->WriteHTML($project_title);}
	$this->SetFont('foundersmono','',10);

	$this->TextWithDirection(200,115,$_SERVER['REMOTE_ADDR']." _ ".date("m/d/y") ,'D');

	GLOBAL $project_id;
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('foundersmono','',10);
    // Page number
    if (!$this->skipHeader) {
        $this->WriteHTML("<a target='_blank' href=".get_permalink($project_id).">".get_permalink($project_id)."</a>");
    }$this->SetY(10);
     
}

// Page footer
function Footer()
{
	
}
}








$projects=array(44,45);
$projects=$_REQUEST['project'];
$projects= preg_split('/,/', $projects); 
$pdf->skipHeader = true;
$pdf = new PDF();
$pdf->AddFont('foundersmono','','founders-grotesk-mono-web-regular.php');

$file_title = date("m.d.y"); 
$filecounter=0;  

//front
   

    $pdf->SetTopMargin(0);
    $pdf->AddPage();
    $pdf->SetFont('foundersmono','',10);

    $images = get_field('portfolio_rear_cover');

 


   $tumbnail_url = fly_get_attachment_image_src( $images[rand(0,count($images))],'ultra-hd-for-pdf' )['src'];


   
    $pdf->imageUniformToFill($tumbnail_url, -15, 0,240, 297, "C");//$alignment "B", "T", "L", "R", "C"
    $pdf->imageUniformToFill("https://francescobertele.net/wp-content/uploads/2022/10/logo.png", 100, 143-10,20, 20, "C");//$alignment "B", "T", "L", "R", "C"


//front



    $pdf->AddPage();
    $pdf->SetTopMargin(0);
    $pdf->SetRightMargin(30);
    $pdf->SetTopMargin(30);

    
        if( get_field('portfolio_biography',190) ):
            $pdf->SetFont('foundersmono','',16);


            $pdf->Write(5,"\n\n".wpm_translate_string( "[:en]Biography[:it]Biografia[:]", $language = '' ).": \n");
            $pdf->Write(5,"\n");
            $pdf->SetFont('foundersmono','',10);
    

            $text=  get_field('portfolio_biography',190);
            //$text=  iconv('utf-8', 'cp1252', $text);

            $text = iconv('utf-8', 'cp1252', $text);


            //$text =mb_convert_encoding($text, "HTML-ENTITIES", "ISO-8859-1");

            //$text = htmlspecialchars_decode($text );
            
            //$text = str_replace("&#8217;","'",$text);
            //$text = str_replace("&#039;","'",$text);
    
    
            //
            
    
                


                


            $pdf->WriteHTML($text);

        endif;


//front
 $pdf->skipHeader = false;

foreach ($projects as $project_id) {
	if( has_category('oeuvre',$project_id) ){
		
		$filecounter=$filecounter+1;
		// code...
	

	$project_title= get_the_title( $project_id);

	
	
	
	
	
	if( has_post_thumbnail($project_id)){
		$pdf->SetTopMargin(10);
		$pdf->AddPage();
		
		$pdf->SetFont('foundersmono','',10);

		$tumbnail_url = fly_get_attachment_image_src( get_post_thumbnail_id($project_id),'hd-for-pdf' )['src'];


		$pdf->imageUniformToFill($tumbnail_url, 10, 25,175, 240, "C");//$alignment "B", "T", "L", "R", "C"

		


	}

	
		$pdf->AddPage();
		
		$pdf->SetFont('foundersmono','',10);
		$pdf->SetRightMargin(30);
		$pdf->SetTopMargin(30);




		$pdf->Write(5,"\n\n");
		if( get_field('project_code',$project_id) ):
			$pdf->Write(5,"\n".get_field('project_code',$project_id));
		endif;

		if( get_field('project_corpus',$project_id) ):
			$pdf->Write(5,"\nCORPUS: ".iconv('utf-8', 'cp1252', implode(", ",get_field('project_corpus',$project_id))));
            $pdf->Write(5,"\n");
       
            $pdf->SetFont('','U');

            $pdf->WriteHTML("<a stile='text-decoration:underline' target='_blank' href=".wpm_translate_url( get_page_link(74), $language = '' )."/?force=True#filter=.project_corpus_".myUrlEncode (filter_var(get_field("project_corpus",$project_id)[0], FILTER_SANITIZE_URL)).">../".wpm_translate_string( "[:en]Related Objects[:it] Oggetti correlati[:]", $language = '' )."</a>");
            $pdf->SetFont('','');
		endif;


		if( have_rows('project_keywords',$project_id) ):
	
			$string = wpm_translate_string( "[:en]KEYWORD[:it]PAROLE CHIAVE[:]", $language = '' ).": ";
	
			while( have_rows('project_keywords',$project_id) ) : 
				the_row();
			
			    $string = $string."#".get_sub_field('project_keyword')." ";
			       
			endwhile;
			$pdf->Write(5,"\n\n".iconv('utf-8', 'cp1252', $string));
		endif;
	
			$pdf->Write(5,"\n\n".wpm_translate_string( "[:en]CULTURAL DEFINITION[:it]DEFINIZIONE CULTURALE[:]", $language = '' ).":");
	
	
	
		if( get_field('project_edition',$project_id) ):
			$pdf->Write(5,"\n../".wpm_translate_string( "[:en]Edition[:it]Edizione[:]", $language = '' ).": ".iconv('utf-8', 'cp1252', get_field('project_edition',$project_id)));
		endif;
	
		if( get_field('project_sitetimes',$project_id) ):
			$pdf->Write(5,"\n../".wpm_translate_string( "[:en]Site/times[:it]Siti/date[:]", $language = '' ).": ".iconv('utf-8', 'cp1252', get_field('project_sitetimes',$project_id)));
		endif;
	
		if( get_field('project_co-authors',$project_id) ):
			$pdf->Write(5,"\n../".wpm_translate_string( "[:en]Co-authors[:it]Coautori[:]", $language = '' ).": ");
			$pdf->WriteHTML(iconv('utf-8', 'cp1252', get_field('project_co-authors',$project_id)));
		endif;
	
		$pdf->Write(5,"\n\n".wpm_translate_string( "[:en]TECHNICAL DATA[:it]DATI TECNICI[:]", $language = '' ).":");
	
	
		if( get_field('project_object_type',$project_id)): 
			$string = "../".wpm_translate_string( "[:en]Object[:it]Oggetto[:]", $language = '' ).": ";
				
				 
			foreach( get_field('project_object_type',$project_id) as $type_i ): 
				$string =$string.$type_i." ";
			endforeach;
				$pdf->Write(5,"\n".iconv('utf-8', 'cp1252', mytranslate($string)));
		endif;
	
		if( get_field('project_matter_technique',$project_id) ):

			
			$pdf->Write(5,"\n../".wpm_translate_string( "[:en]Matter and technique[:it]Materiali e tecnica[:]", $language = '' ).": ".iconv('utf-8', 'cp1252',get_field('project_matter_technique',$project_id)));
		endif;
	
		if( get_field('project_measures_weight',$project_id) ):
			$pdf->Write(5,"\n../".wpm_translate_string( "[:en]Weight[:it]Peso[:]", $language = '' ).": ".iconv('utf-8', 'cp1252', get_field('project_measures_weight',$project_id)));
		endif;
	
		if( get_field('project_measures',$project_id) ):
			$pdf->Write(5,"\n../".wpm_translate_string( "[:en]Measures[:it]Misure[:]", $language = '' ).": ".iconv('utf-8', 'cp1252', get_field('project_measures',$project_id)));
		endif;
	
		if( get_field('project_description',$project_id) ):
			$pdf->Write(5,"\n\n".wpm_translate_string( "[:en]DESCRIPTION[:it]DESCRIZIONE[:]", $language = '' ).": \n");
			
			$text=  get_field('project_description',$project_id);
            //$text=  iconv('utf-8', 'cp1252', $text);

            $text = iconv('utf-8', 'cp1252', $text);

            // $text =mb_convert_encoding($text, "HTML-ENTITIES", "ISO-8859-1");

            //$text = htmlspecialchars_decode($text );
            
            //$text = str_replace("&#8217;","'",$text);
            //$text = str_replace("&#039;","'",$text);
    
    
            //
            
    
                


                


			$pdf->WriteHTML($text);

		endif;

		if( get_field('project_collection',$project_id) ):
			$pdf->Write(5,"\n\n".wpm_translate_string( "[:en]Collection[:it]Collezione[:]", $language = '' ).": ".mytranslate(get_field('project_collection',$project_id)));
		endif;
	
	
	}
	};
	
if ($filecounter==1) {
	$file_title = "export_".$project_title."_".date("m_d_y"); 
}
else{
	$file_title = "export_".wpm_translate_string( "[:en]collection_[:it]collezione_[:]", $language = '' ).date("m_d_y"); 

}
    

 $pdf->SetFillColor(255);
 $pdf->skipHeader = true;
 $pdf->AddPage();

    $pdf->SetTopMargin(0);
    $pdf->SetRightMargin(30);
    $pdf->SetTopMargin(0);


    
        if( get_field('portfolio_cv',190) ):
            $pdf->SetFont('foundersmono','',16);

            $pdf->Write(5,"\n\n".wpm_translate_string( "[:en]Curriculum Vitae[:it]Curriculum Vitae[:]", $language = '' ).": \n");
            $pdf->Write(5,"\n");
            $pdf->SetFont('foundersmono','',10);
            

            $text=  get_field('portfolio_cv',190);
            //$text=  iconv('utf-8', 'cp1252', $text);

            $text = iconv('utf-8', 'cp1252', $text);


            //$text =mb_convert_encoding($text, "HTML-ENTITIES", "ISO-8859-1");

            //$text = htmlspecialchars_decode($text );
            
            //$text = str_replace("&#8217;","'",$text);
            //$text = str_replace("&#039;","'",$text);
    
    
            //
            
    
                


                


            $pdf->WriteHTML($text);

        endif;

    $pdf->SetTopMargin(0);
    $pdf->AddPage();

   
    $pdf->imageUniformToFill("https://francescobertele.net/wp-content/uploads/2022/10/f_portfolio_cover_rear.jpg", -15, 0,240, 297, "C");//$alignment "B", "T", "L", "R", "C"

    $pdf->SetXY(0 , 230);
    $pdf->SetLeftMargin(80);
    $pdf->SetAutoPageBreak(true, 0);
    $pdf->SetFont('foundersmono','',6);
    $pdf->SetTextColor(10,10,10);
    
    $pdf->Write(3,"cntcts\nwww > https://francescobertele.net//\nig  > @franz_sella\nt   > https://t.me/f_nius\nem  > fb@francescobertele.net\nph  > +39 379 2164533");
    $pdf->SetXY(0 , 282.8);
    $pdf->SetLeftMargin(25);
    $pdf->Write(5,"P.IVA 03687100135");
    $pdf->SetLeftMargin(55);
    $pdf->SetTextColor(255,15,15);
    $pdf->Write(5,"f' archive ");
     $pdf->SetTextColor(10,10,10);
    $pdf->Write(5,"portfolio is licensed under CC BY-NC-SA 4.0");






$pdf->Output("I",$file_title.".pdf");
?>
