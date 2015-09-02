<?php
$handle = opendir('./');
while (false !== ($file = readdir($handle))){
    if (pathinfo('./'.$file)['extension'] == 'htm') {
        $content = file_get_contents('./'.$file);
        $content = iconv('GB2312', 'UTF-8', $content);
        if ($content !== false) {
            $content = str_replace('charset=gb2312', 'charset=UTF-8', $content);
            $statu = file_put_contents('./'.$file, $content);
            if ($statu != false) {
                echo $file."success\n";
            }
        } else {
            echo "iconv fair\n";
        }
    }
}