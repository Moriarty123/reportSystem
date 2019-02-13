<?php

// Include the main TCPDF library (search for installation path).
require_once('./tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR); //ÉèÖÃ´´½¨Õß
$pdf->SetAuthor('Nicola Asuni'); //ÉèÖÃ×÷Õß
$pdf->SetTitle('TCPDF Example 001'); //ÉèÖÃÎÄ¼þµÄtitle
$pdf->SetSubject('TCPDF Tutorial'); //ÉèÖÃÖ÷Ìâ
$pdf->SetKeywords('TCPDF, PDF, example, test, guide'); //ÉèÖÃ¹Ø¼ü´Ê
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128)); //ÉèÖÃÍ·²¿,±ÈÈçheader_logo£¬header_title£¬header_string¼°ÆäÊôÐÔ
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); //ÉèÖÃÒ³Í·×ÖÌå
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); //ÉèÖÃÒ³Î²×ÖÌå
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); //ÉèÖÃÄ¬ÈÏµÈ¿í×ÖÌå
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); //ÉèÖÃmargins ²Î¿¼cssµÄmargins
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER); //ÉèÖÃÒ³Í·margins
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER); //ÉèÖÃÒ³½Åmargins
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); //ÉèÖÃ×Ô¶¯·ÖÒ³
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //ÉèÖÃµ÷ÕûÍ¼Ïñ×ÔÊÊÓ¦±ÈÀý
// set some language-dependent strings (optional) ÉèÖÃÒ»Ð©ÓëÓïÑÔÏà¹ØµÄ×Ö·û´®
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true); //ÉèÖÃÄ¬ÈÏ×ÖÌå×Ó¼¯Ä£Ê½
// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true); //ÉèÖÃ×ÖÌå
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage(); //Ôö¼ÓÒ»¸öÒ³Ãæ
// set text shadow effect  ÉèÖÃÎÄ×ÖÒõÓ°Ð§¹û
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Set some content to print
$html = <<<EOD
<h1>Hello World</h1>
EOD;

/*
 * 
  ´Ë·½·¨ÔÊÐíÒÔ»»ÐÐ·û´òÓ¡ÎÄ±¾¡£
  ËüÃÇ¿ÉÒÔÊÇ×Ô¶¯µÄ£¨Ò»µ©ÎÄ±¾µ½´ïµ¥Ôª¸ñµÄÓÒ±ß½ç£©»òÏÔÊ½£¨Í¨¹ý\ n×Ö·û£©¡£ Êä³öËùÐèµÄÐí¶àµ¥Ôª£¬Ò»¸öµÍÓÚÁíÒ»¸ö¡£
    ÎÄ±¾¿ÉÒÔ¶ÔÆë£¬¾ÓÖÐ»ò¶ÔÆë¡£ µ¥Ôª¸ñ¿é¿ÉÒÔ¿ò¼Ü²¢»æÖÆ±³¾°¡£
 */

// Print text using writeHTMLCell() 
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); //Ê¹ÓÃwriteHTMLCell´òÓ¡ÎÄ±¾
// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'D'); //IÊä³öÔÚä¯ÀÀÆ÷ÉÏ

//============================================================+
// END OF FILE
//============================================================+