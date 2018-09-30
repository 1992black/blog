<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form method="post" action="" enctype="multipart/form-data">
         <h3>导入Excel表：</h3><input  type="file" name="file_stu" />
           <input type="submit"  value="导入" />
</form>

<?php

/** Include PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    if (! empty ( $_FILES ['file_stu'] ['name'] )) {
    $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
    $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
    $file_type = $file_types [count ( $file_types ) - 1];
     /*判别是不是.xls文件，判别是不是excel文件*/
     if (strtolower ( $file_type ) != "xls")          
    {
          $this->error ( '不是Excel文件，重新上传' );
     }
    /*设置上传路径*/
     $savePath = 'uploads/Excel/';
     echo $savePath;
    /*以时间来命名上传的文件*/
     $str = date ( 'Ymdhis' ); 
     $file_name = $str . "." . $file_type;
     /*是否上传成功*/
     if (! copy ( $tmp_file, $savePath . $file_name )) 
      {
          echo ( '上传失败' );
      }
      //echo 'upload finish';
    /*
       *对上传的Excel数据进行处理生成编程数据,这个函数会在下面第三步的ExcelToArray类中
      注意：这里调用执行了第三步类里面的read函数，把Excel转化为数组并返回给$res,再进行数据库写入
    */
   $objPHPExcel = PHPExcel_IOFactory::load($savePath . $file_name); // 文档名称
   echo 'read excel finish<br>';
   $rowSize = $objPHPExcel->getActiveSheet()->getHighestRow().'<br>';
   $columnSize = $objPHPExcel->getActiveSheet()->getHighestColumn().'<br>';
   // echo $objPHPExcel->getActiveSheet()->getCell('B5')->getCalculatedValue().'<br />';
   
   $str_write = date ( 'Ymdhis' ); 
   $file_name_write = $str_write . "." . $file_type;
   $objPHPExcel_write = PHPExcel_IOFactory::load($savePath . $file_name_write); // 文档名称
   $objPHPExcel_write = new PHPExcel();

    // Set document properties
    $objPHPExcel_write->getProperties()->setCreator("Maarten Balliauw")
                             ->setLastModifiedBy("Maarten Balliauw")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");
                             
   for ($row = 2; $row <= 5; $row++) {
        $value = $objPHPExcel->getActiveSheet()->getCell('A'.$row)->getCalculatedValue().'<br>';
        $url='http://apis.map.qq.com/ws/geocoder/v1/?address='.$value.'&key=5DHBZ-MDYWO-PBQWV-SCZTY-3NHG5-3KBJV';
        // echo $url;
        $html = file_get_contents($url);
        $json_value = json_decode($html, true);
        $lat = $json_value['result']['location']['lat'];
        $lng = $json_value['result']['location']['lng'];
        // var_dump($json_value['result']['location']);
        echo $row. ' '. $value.' '.$lat.' '.$lng.'<br>';
        $objPHPExcel_write->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $value)
            ->setCellValue('B'.$row, $lat)
            ->setCellValue('C'.$row, $lng);
    }
    // $objPHPExcel_write->setActiveSheetIndex(0)
            // ->setCellValue('A1', 'Hello')
            // ->setCellValue('B2', 'world!')
            // ->setCellValue('C1', 'Hello')
            // ->setCellValue('D2', 'world!');
    $objPHPExcel_write->getActiveSheet()->setTitle('Location');
    $objPHPExcel_write->setActiveSheetIndex(0);
    
    // Redirect output to a client’s web browser (Excel2007)
    // header('Content-Type: application/vnd.ms-excel');
    // header('Content-Disposition: attachment;filename="01simple.xlsx"');
    // header('Cache-Control: max-age=0');
    header('Pragma:public');
    Header("Content-type: application/octet-stream;charset=utf-8");
    // header('Content-Type:application/x-msexecl;name="01simple.xls"');
    header("Content-Type: application/download");
    header("Content-Disposition:inline;filename=\"01simple.xls\"");

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel_write, 'Excel5');
    $objWriter->save('php://output');
    exit;
    // readfile($'/Downloads/Excel/' + date ( 'Ymdhis' ) + '.xls'); 
}
?>