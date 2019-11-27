# convert-html
#### 安装, 暂时是dev版, composer安装时需要在最后加上:dev-master
`composer require guo14903/convert-html:dev-master`
#### 使用
`$model = new \Guo14903\ConvertOffice\HtmlConvert();` 
  
  转换word(doc格式)  
`$model->toWord($html, $path);` 
  
  转换pdf  
`$model->toPdf($html,$path);` 
   
`$html`内容是html内容  
`$path`是转换的文件保存位置
  
**转换pdf需要赋予`APP_PATH/vender/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64`执行权限**