<?php


namespace Guo14903\ConvertOffice;


class HtmlConvert
{
    public function __construct()
    {
    }

    public function toWord($htmlContent, $path)
    {
        try {
            $word = new Word();
            $word->start();

            //$filename = basename($path);
            //$wordname = iconv('UTF-8', 'GB2312//IGNORE', $filename);

            echo $htmlContent;
            $word->save($path);
            ob_flush();
            flush();
        } catch (\Exception $exception) {
            $msg = $exception->getMessage();
            $msg = json_encode($msg);
            return $msg;
        }
    }

    public function toPdf($htmlContent, $path)
    {
        try {
            //将获取到的html代码存储为临时文件
            $temp = tmpfile();
            fwrite($temp, $htmlContent);

            $wkhtmltopdfPath = \h4cc\WKHTMLToPDF\WKHTMLToPDF::PATH;

            $cmd = "{$wkhtmltopdfPath} {$temp} {$path}";

            exec($cmd);

            fclose($temp);
        } catch (\Exception $exception) {
            $msg = $exception->getMessage();
            $msg = json_encode($msg);
            return $msg;
        }
    }
}