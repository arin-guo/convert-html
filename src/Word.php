<?php


namespace CarlGq\ConvertOffice;


class Word
{
    function start()
    {
        ob_start();
        header( 'Content-Type: application/msword' );
//        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
//xmlns:w="urn:schemas-microsoft-com:office:word"
//xmlns="http://www.w3.org/TR/REC-html40">';

        print "<html xmlns:v=\"urn:schemas-microsoft-com:vml\"";
        print "xmlns:o=\"urn:schemas-microsoft-com:office:office\"";
        print "xmlns:w=\"urn:schemas-microsoft-com:office:word\"";
        print "xmlns=\"http://www.w3.org/TR/REC-html40\">";
        print "<xml>
     <w:WordDocument>
      <w:View>Print</w:View>
      <w:DoNotHyphenateCaps/>
      <w:PunctuationKerning/>
      <w:DrawingGridHorizontalSpacing>9.35 pt</w:DrawingGridHorizontalSpacing>
      <w:DrawingGridVerticalSpacing>9.35 pt</w:DrawingGridVerticalSpacing>
     </w:WordDocument>
    </xml>
    ";
    }

    function save($path)
    {
        echo '</html>';
        $data = ob_get_contents();
        ob_end_clean();
        $this->writeFile($path, $data);
    }

    function writeFile($path, $data)
    {
        $fp = fopen($path, 'wb');
        fwrite($fp, $data);
        fclose($fp);
    }
}