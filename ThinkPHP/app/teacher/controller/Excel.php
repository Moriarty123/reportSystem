<?php
namespace app\teacher\controller;

use think\Controller;
use think\Db;
use think\Log;

use app\common\controller\Common;

use app\teacher\model\Teacher as teacherModel;
use app\teacher\model\Elective as electiveModel;

class Excel extends Common
{
	public function index()
	{
		$time = time();

		$xlsData = Db::table('goods')->select();
        //这里引入PHPExcel文件注意路径修改
		vendor("PHPExcel");                                     
		vendor("PHPExcel.Writer.Excel5");
		vendor("PHPExcel.Writer.Excel2007");
		vendor("PHPExcel.IOFactory");

		//创建PHPExcel对象
		$objExcel = new \PHPExcel();                   
		$objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
		$objActSheet = $objExcel->getActiveSheet();
		$key = ord("A");

		//设置表头
		$letter =explode(',',"A,B,C");
		$arrHeader = array('货物号','货物名','数量');
		$lenth =  count($arrHeader);

		//表头赋值
		for($i = 0;$i < $lenth;$i++) {
			$objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
		};


		foreach($xlsData as $k=>$v){
			$k +=2;
			$objActSheet->setCellValue('A'.$k, $v['no']);
			$objActSheet->setCellValue('B'.$k, $v['name']);
			$objActSheet->setCellValue('C'.$k, $v['num']);
			$objActSheet->getRowDimension($k)->setRowHeight(20);
		}
		$width = array(20,20,15);
       	//设置表格的宽度
		$objActSheet->getColumnDimension('A')->setWidth($width[0]);
		$objActSheet->getColumnDimension('B')->setWidth($width[1]);
		$objActSheet->getColumnDimension('C')->setWidth($width[2]);


		$outfile = "货物清单表.xls";
		ob_end_clean();
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition:inline;filename="'.$outfile.'"');
		header("Content-Transfer-Encoding: binary");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
       	$objWriter->save('php://output');    //这里直接导出文件

   }

   	//实验课程导出
   	public function courseExcel()
	{
		//0.测试
		Log::record("实验课程导出", "notice");

		$time = time();

    	//1.获取账号
    	$account = session('account');

    	//2.获取该账号教师的实验课程
    	$teacherModel = new teacherModel();

    	$where = "teacherNo = '$account'";

    	$courseList = $teacherModel	->course()
			    				    ->where($where)
			    				    ->select();

        //这里引入PHPExcel文件注意路径修改
		vendor("PHPExcel");                                     
		vendor("PHPExcel.Writer.Excel5");
		vendor("PHPExcel.Writer.Excel2007");
		vendor("PHPExcel.IOFactory");

		//创建PHPExcel对象
		$objExcel = new \PHPExcel();                   
		$objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
		$objActSheet = $objExcel->getActiveSheet();
		$key = ord("A");

		//设置表头
		$letter =explode(',',"A,B,C,D,E,F,G,H");
		$arrHeader = array("课程编号", "课程名称", "任课老师", "任课班级", "任课时间", "课程类型", "实验课时", "考查方式");
		$lenth =  count($arrHeader);

		//表头赋值
		for($i = 0;$i < $lenth;$i++) {
			$objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
		};


		foreach($courseList as $k=>$v){
			$k +=2;
			$objActSheet->setCellValue('A'.$k, $v['courseNo']);
			$objActSheet->setCellValue('B'.$k, $v['courseName']);
			$objActSheet->setCellValue('C'.$k, $v['teacherName']);
			$objActSheet->setCellValue('D'.$k, $v['courseGrade'].'级'.$v['courseMajor'].$v['courseClass'].'班');
			$objActSheet->setCellValue('E'.$k, $v['openTime']);
			$objActSheet->setCellValue('F'.$k, $v['courseNature']);
			$objActSheet->setCellValue('G'.$k, $v['coursePeriod']);
			$objActSheet->setCellValue('H'.$k, $v['examType']);
			$objActSheet->getRowDimension($k)->setRowHeight(20);
		}
		$width = array(15, 20, 30, 40, 50);
       	//设置表格的宽度
		$objActSheet->getColumnDimension('A')->setWidth($width[0]);
		$objActSheet->getColumnDimension('B')->setWidth($width[3]);
		$objActSheet->getColumnDimension('C')->setWidth($width[0]);
		$objActSheet->getColumnDimension('D')->setWidth($width[3]);
		$objActSheet->getColumnDimension('E')->setWidth($width[1]);
		$objActSheet->getColumnDimension('F')->setWidth($width[1]);
		$objActSheet->getColumnDimension('G')->setWidth($width[0]);
		$objActSheet->getColumnDimension('H')->setWidth($width[1]);


		$outfile = "实验课程表.xls";
		ob_end_clean();
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition:inline;filename="'.$outfile.'"');
		header("Content-Transfer-Encoding: binary");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
       	$objWriter->save('php://output');    //这里直接导出文件

   }

    //实验课程导出
   	public function studentExcel()
	{
		//0.测试
		Log::record("学生名单导出", "notice");

		$time = time();

    	//1.获取账号
    	$account = session('account');
    	$courseNo = input('get.courseNo');

    	//2.获取课程学生列表
        $electiveModel = new electiveModel();

        $where = "a.courseNo = '$courseNo'";
        $studentList = $electiveModel   ->where($where)
                                        ->alias('a')
                                        ->join('teacher b', 'a.teacherNo = b.teacherNo')
                                        ->join('student c', 'a.studentNo = c.studentNo')
                                        ->join('course d', 'a.courseNo = d.courseNo')
			    				    	->select();

        //这里引入PHPExcel文件注意路径修改
		vendor("PHPExcel");                                     
		vendor("PHPExcel.Writer.Excel5");
		vendor("PHPExcel.Writer.Excel2007");
		vendor("PHPExcel.IOFactory");

		//创建PHPExcel对象
		$objExcel = new \PHPExcel();                   
		$objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
		$objActSheet = $objExcel->getActiveSheet();
		$key = ord("A");

		//设置表头
		$letter =explode(',',"A,B,C,D,E,F,G,H");
		$arrHeader = array("课程编号", "课程名称", "学号", "学生姓名", "性别", "年级", "专业班级");
		$lenth =  count($arrHeader);

		//表头赋值
		for($i = 0;$i < $lenth;$i++) {
			$objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
		};


		foreach($studentList as $k=>$v){
			$k +=2;
			$objActSheet->setCellValue('A'.$k, $v['courseNo']);
			$objActSheet->setCellValue('B'.$k, $v['courseName']);
			$objActSheet->setCellValue('C'.$k, $v['studentNo']);
			$objActSheet->setCellValue('D'.$k, $v['studentName']);
			$objActSheet->setCellValue('E'.$k, $v['sex']);
			$objActSheet->setCellValue('F'.$k, $v['grade']);
			$objActSheet->setCellValue('G'.$k, $v['major'].$v['classes'].'班');
			$objActSheet->getRowDimension($k)->setRowHeight(20);
		}
		$width = array(15, 20, 30, 40, 50);
       	//设置表格的宽度
		$objActSheet->getColumnDimension('A')->setWidth($width[0]);
		$objActSheet->getColumnDimension('B')->setWidth($width[3]);
		$objActSheet->getColumnDimension('C')->setWidth($width[0]);
		$objActSheet->getColumnDimension('D')->setWidth($width[0]);
		$objActSheet->getColumnDimension('E')->setWidth($width[0]);
		$objActSheet->getColumnDimension('F')->setWidth($width[0]);
		$objActSheet->getColumnDimension('G')->setWidth($width[3]);



		$outfile = "学生名单.xls";
		ob_end_clean();
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition:inline;filename="'.$outfile.'"');
		header("Content-Transfer-Encoding: binary");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
       	$objWriter->save('php://output');    //这里直接导出文件

   }

}
