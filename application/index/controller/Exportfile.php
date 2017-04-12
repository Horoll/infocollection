<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/4/10
 * Time: 8:01
 */

namespace app\index\controller;
use think\Controller;

vendor('phpoffice.phpexcel.Classes.PHPExcel');
vendor('phpoffice.phpword.src.PhpWord.PhpWord');
vendor('phpoffice.phpword.src.PhpWord.TemplateProcessor');
class Exportfile extends controller
{
    public function exportWord(){
        $form = input('get.form');
        $id = input('get.id');
        $result = db($form)->where('id',$id)->find();
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('public/formmoudle/'.$form.'.docx');
        foreach ($result  as $key=>$value){
            $templateProcessor->setValue($key, (string)$value);
        }

//        $PHPWord = new \PhpOffice\PhpWord\PhpWord();
        //导出word
        $fileName = uniqid();
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        $templateProcessor->saveAs('php://output');
    }

    public function exportExcel(){
        $taskid = input('get.taskid');
        $schoolid = input('get.schoolid');
        $table_moudle = db('task')->where('id',$taskid)->find();
        if(!$table_moudle){
            $this->error('任务不存在');
        }
        $table_moudle = explode('<&>',$table_moudle['table_moudle']);
        array_pop($table_moudle);

        $result = db('table_data')
            ->where('school_id',$schoolid)
            ->where('task_id',$taskid)
            ->select();
        if(!$result){
            $this->error('结果不存在');
        }

        $data = [];
        foreach ($result as $value){
            $row = explode('<&>',$value['table_data']);
            array_pop($row);
            array_push($data,$row);
        }

        $objPHPExcel = new \PHPExcel();

        //设置sheet
        $objPHPExcel->setActiveSheetIndex(0);

        //从A到Z，添加到一个数组中
        $letters = [];
        foreach (range('A','Z') as $letter){
            array_push($letters,$letter);
        }

        //设置第一行（表格对应项名称）
        $i = 0;
        foreach ($table_moudle as $cellname){
            if($i>25){
                $letters[$i] = 'A'.$letters[$i];
            }
            //设置列宽
            $col_width = mb_strlen($cellname)*2+5;
            $col_width = $col_width<10?10:$col_width;
            $objPHPExcel->getActiveSheet(0)->getColumnDimension($letters[$i])->setWidth($col_width);
            //赋值
            $objPHPExcel->getActiveSheet(0)->setCellValue($letters[$i].'1', $cellname);
            $i++;
        }

        //赋值数据
        $row_num = 2;
        foreach($data as $row){
            $col_num = 0;
            foreach ($row as $cell){
                $objPHPExcel->getActiveSheet(0)->setCellValue($letters[$col_num].$row_num, $cell);
                $col_num++;
            }
            $row_num++;
        }

        // 输出Excel表格到浏览器下载
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.uniqid().'.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
}