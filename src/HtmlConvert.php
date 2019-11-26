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
            $this->checkPath($path);

            $word = new Word();
            $word->start();

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
            $htmlContent = "<meta charset=\"UTF-8\">" . $htmlContent;

            $oriPath = $this->checkPath($path);
            $tempHtml = $oriPath . '/' . md5(time() . mt_rand(1, 1000000)) . '.html';
            file_put_contents($tempHtml, $htmlContent);

            $wkhtmltopdfPath = \h4cc\WKHTMLToPDF\WKHTMLToPDF::PATH;

            $cmd = "{$wkhtmltopdfPath} {$tempHtml} {$path}";

            exec($cmd);

            unlink($tempHtml);
        } catch (\Exception $exception) {
            $msg = $exception->getMessage();
            $msg = json_encode($msg);
            return $msg;
        }
    }

    private function checkPath($path)
    {
        $oriPath = dirname($path);
        if (!is_dir($oriPath)) {
            mkdir($oriPath, 0777, true);
        }
        return $oriPath;
    }
}