<?php


namespace Guo14903\ConvertOffice;


use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;

class HtmlConvert
{
    private $phpWord = '';

    public function __construct()
    {
        $this->phpWord = new PhpWord();
    }

    public function toWord($htmlContent, $path, $fullHTML = false)
    {
        try {
            $section = $this->phpWord->addSection();
            Html::addHtml($section, $htmlContent, $fullHTML);
            $objWriter = IOFactory::createWriter($this->phpWord, 'Word2007');
            $objWriter->save($path);
            return $path;
        } catch (Exception $exception) {
            $msg = $exception->getMessage();
            $msg = json_encode($msg);
            return $msg;
        }
    }
}