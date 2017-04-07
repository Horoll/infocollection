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

/**
 * @param string $filedir
 * @return array 返回上传文件的文件名和文件路径
 */
function uploadAttachement($filedir='admin/'){
    //检测文件大小
    if($_FILES['uploadfile']['error']==1 || $_FILES['uploadfile']['error']==2)
        $this->error('文件大小不能超过50M！');
    // 获取表单上传文件
    $file = request()->file('uploadfile');
    if($file){
        // 移动到框架应用根目录/public/uploads/amin 目录下
        $info = $file->validate(['ext'=>'doc,docx,xls,xlsx,rar,zip'])->move(ROOT_PATH . 'public' . DS . 'uploads/'.$filedir);
        if($info){
            $upload_data['attachment_dir']=$filedir.$info->getSaveName();
            $upload_data['attachment_name']=$_FILES['uploadfile']['name'];
            return $upload_data;
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }
    }
}

/**
 * 下载函数
 * @param string $file_url 文件路径
 * @param string $new_name 新的文件名（默认为原名）
 * @return string
 */
function download($file_url,$new_name=''){
    if(!isset($file_url)||trim($file_url)==''){
        return '500';
    }
    if(!file_exists($file_url)){ //检查文件是否存在
        return '404:文件不存在';
    }
    $file_name=basename($file_url);
    $file_type=explode('.',$file_url);
    $file_type=$file_type[count($file_type)-1];
    $file_name=trim($new_name=='')?$file_name:urlencode($new_name);
    $file_type=fopen($file_url,'r'); //打开文件
    //输入文件标签
    header("Content-type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".filesize($file_url));
    header("Content-Disposition: attachment; filename=".$file_name);
    //输出文件内容
    echo fread($file_type,filesize($file_url));
    fclose($file_type);
}