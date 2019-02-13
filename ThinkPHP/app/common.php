<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//显示PDF文件
function pdf($html='<h1 style="color:red">hello word</h1>'){
    // Include the main TCPDF library (search for installation path).
	require_once('../vendor/tcpdf/tcpdf.php');
	// Vendor('TCPDF.tcpdf')
	$pdf = new TCPDF();

	$pdf->AddPage();
	$txt = "<h1>hello world</h1>";

	$pdf->WriteHTML($txt);

	$pdf->Output('minimal.pdf', 'I');
	exit();//不可删除，否则显示乱码
}

function GuidePdf($content)
{
	require_once('../vendor/tcpdf/tcpdf.php');

	//实例化tcpdf
	//页面方向（P =肖像，L =景观）、测量（mm）、页面格式
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	//设置字体
	$pdf->SetFont('msyh', '', 16);

	//设置文档信息
	$pdf->SetCreator('Helloweba');
	$pdf->SetAuthor('yueguangguang');
	$pdf->SetTitle('Welcome to helloweba.com!');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, PHP');


	$pdf->SetHeaderData("logo.jpg", 60, '计算机学院实验指导', '');
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	//设置边距
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

	//设置页眉和页脚信息
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER); //设置默认标题数据       
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	//设置自动换页
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	//设置图片缩放比例
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	//添加一个页面
	$pdf->AddPage();
	//添加页面标记
	$pdf->setPageMark();

	//设置标题
	$title = <<<EOD
	<h2>标题</h2>
EOD;

	//写入内容
	$pdf->writeHTML($content, true, false, false, false, '');
	//最后一页
	$pdf->lastPage();
	//显示PDF文件，默认是I：在浏览器中打开，D：下载，F：在服务器生成pdf ，S：只返回pdf的字符串
	$pdf->Output(date('Y-m-d') . '.pdf', 'I');

	exit();
}