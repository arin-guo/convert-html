<?php


namespace Guo14903\ConvertOffice;


class Word
{
    function start()
    {
        ob_start();
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">';
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