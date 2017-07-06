<?php
$title="Заголовок страницы";
$keywords="Ключевые слова";
$description="Всякого рода описалово";

$filename_out="./test.html";
$f_out=fopen($filename_out,"w+t") or die("Ошибка при создании файла");

fwrite($f_out,"<HTML>");
fwrite($f_out,"\n"."<HEAD>");
fwrite($f_out,"\n"."<TITLE>".$title."</TITLE>");
fwrite($f_out,"\n"."<META NAME=\"Keywords\" CONTENT=\"".$keywords."\">");
fwrite($f_out,"\n"."<META NAME=\"Description\" CONTENT=\"".$description."\">");
fwrite($f_out,"\n"."</HEAD>");
fwrite($f_out,"\n"."<BODY>");
fwrite($f_out,"\n"."<style>body{padding: 0; margin: 0;}h1,header h2{font-family:Foros-Bold;text-align:center}header,img{width:80%;height:300px;margin:0 0 0 30px}@font-face{font-family:Foros-Bold;src:url(fonts/Foros-Bold.WOFF)}header{display:block;position:relative;background:url(img/bg_pdf_head.jpg) top center no-repeat;padding:100px 0 0;background-size:100%}header h2{font-size:60px;margin:0 auto;display:block}header h2 span{text-transform:uppercase}h1{font-size:320px;margin:0 0 30px 30px;width:80%}img{background:url(img/bg_pdf_head.jpg)}</style>");
fwrite($f_out,"\n"."<header>");
fwrite($f_out,"\n"."<h2><span>Колесников</span><br> Антон Віталіойвич</h2>");
fwrite($f_out,"\n"."</header>");
fwrite($f_out,"\n"."<h1>196</h1>");
fwrite($f_out,"\n"."<img src=\"./img/bg_pdf_footer.jpg\">");
fwrite($f_out,"\n"."</BODY>");
fwrite($f_out,"\n"."</HTML>");
fclose($f_out);



// instantiate and use the dompdf class
