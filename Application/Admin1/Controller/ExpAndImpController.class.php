<?php
namespace Admin\Controller;
use Think\Controller;
class ExpAndImpController extends AuthController {
	public function exportExcel($expTitle,$expCellName,$expTableData){
		ob_clean();
		$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
		$fileName = $_SESSION['account'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
		$cellNum = count($expCellName);
		$dataNum = count($expTableData);
		vendor('PHPExcel.PHPExcel','','.php');
		vendor('PHPExcel.PHPExcel.IOFactory','','.php');
		vendor('PHPExcel.PHPExcel.Writer.Excel2007','','.php');
		$objPHPExcel = new \PHPExcel();
		$cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
		
		//设置表头	
		$key = ord("A");
		foreach($expCellName as $v){
			$colum = chr($key);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
			$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($colum)->setAutoSize(true);
			$key += 1;
		}
		$column = 2;
		$objActSheet = $objPHPExcel->getActiveSheet();		
		foreach($expTableData as $key => $rows){ //行写入
			$span = ord("A");
			foreach($rows as $keyName=>$value){// 列写入
				$j = chr($span);
				$objActSheet->setCellValue($j.$column, $value);
				$objActSheet->getStyle($j.$column)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
				if($keyName=='result'){
				    $objActSheet->getStyle($j.$column)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
				    if($value=='fail')
                        $objActSheet->getStyle($j.$column)->getFill()->getStartColor()->setARGB("C00000");
				    else if($value=='pass')
				        $objActSheet->getStyle($j.$column)->getFill()->getStartColor()->setARGB("008000");
				    else if($value=='N/A')
				        $objActSheet->getStyle($j.$column)->getFill()->getStartColor()->setARGB("D8D8D8");
				}				    
				$span++;
			}
			$column++;
		}
		
		header('pragma:public');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8');
		header("Content-Disposition:attachment;filename=$fileName.xlsx");//attachment新窗口打印inline本窗口打印
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	public function ExpTestcase(){
		$xlsName  = "task_case";
        $dbnames  = M('task_case')->getDbFields();
        $xlsData=M('task_case')->where('id>0')->select();
        $this->exportExcel($xlsName,$dbnames,$xlsData);
	}
	
	public function upload()
	{
		header("Content-Type:text/html;charset=utf-8");
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('xls', 'xlsx');// 设置附件上传类
		$upload->savePath  =      '/'; // 设置附件上传目录
		// 上传文件
		$info   =   $upload->uploadOne($_FILES['excelData']);
		$filename = './Uploads'.$info['savepath'].$info['savename'];
		$exts = $info['ext'];
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			$this->table_import($filename, $exts);
		}
	}
	
	protected function table_import($filename, $exts='xls',$table='testcase')
	{
		$name_lists=M($table)->getDbFields();
		vendor('PHPExcel.PHPExcel','','.php');
		vendor('PHPExcel.PHPExcel.IOFactory','','.php');		
		if($exts == 'xls'){
			vendor('PHPExcel.PHPExcel.Reader.Excel5','','.php');
			$PHPReader=new \PHPExcel_Reader_Excel5();
		}else if($exts == 'xlsx'){
			vendor('PHPExcel.PHPExcel.Reader.Excel2007','','.php');
			$PHPReader=new \PHPExcel_Reader_Excel2007();
		}		
	
		//载入文件
		$PHPExcel=$PHPReader->load($filename);
		$currentSheet=$PHPExcel->getSheet(0);
		$allColumn=$currentSheet->getHighestColumn();
		$allRow=$currentSheet->getHighestRow();
				
		for($currentRow=2;$currentRow<=$allRow;$currentRow++){
			$data=array();
			for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
				$address=$currentColumn.$currentRow;
				$cell =$currentSheet->getCell($address)->getValue();
				$cellname=$currentSheet->getCell($currentColumn.'1')->getValue();
				$data[$cellname]=$cell;
			}
			if($data['CaseName']!=''){
				$result=M($table)->add($data);
			}
		}
		$this->display('testcase/list');
	}
	function imp(){
		$this->display('ExpAndImp');
		} 
			 	
}
?>