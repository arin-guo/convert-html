<?php


namespace Gsdata\ConvertOffice;


use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;

class HtmlConvert
{
    private $htmlContent = '';
    private $phpWord = '';

    public function __construct($htmlContent)
    {
        $this->htmlContent = $htmlContent;
        $this->phpWord = new PhpWord();
    }

    public function toWord($path)
    {
        try {
            $section = $this->phpWord->addSection();
            Html::addHtml($section, $this->htmlContent, true);
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