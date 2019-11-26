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
}