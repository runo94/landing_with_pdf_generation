<?php
require_once './dompdf/autoload.inc.php';
require_once './config.php';


use Dompdf\Dompdf;

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$id_query ="SELECT MAX(id) FROM run_people ";

$result = mysqli_query($link, $id_query) or die("Ошибка " . mysqli_error($link));

    $rows = mysqli_num_rows($result); // количество полученных строк


    while ($row = mysqli_fetch_row($result)) {
        $id .= "$row[0]";
    }

$name_query ="SELECT name FROM `run_people` WHERE id = (select max(id) from run_people)";

$result = mysqli_query($link, $name_query) or die("Ошибка " . mysqli_error($link));

$rows = mysqli_num_rows($result); // количество полученных строк


while ($row = mysqli_fetch_row($result)) {
    $name .= "$row[0]";
}


$html = '<html>'
        .'<body>'
        .'<style>header,img{width:80%;height:200px}body,html{padding:0!important;margin:0!important}body{font-family:DejaVu Sans;padding:0;margin:0}h1,header h2{text-align:center}header,img{margin:0 0 0 30px}header{display:block;position:relative;background:url(img/bg_pdf_head.jpg) top center no-repeat;padding:50px 0 0;background-size:100%}header h2{font-size:60px;margin:0 auto;display:block}h1{font-size:203px;margin:0 0 31px 30px;width:80%}</style>'
        .'<header>'
        .'<h2>'. $name .'</h2>'
        .'</header>'
        .'<h1>'.  $id  .'</h1>'
        .'<img src="./img/bg_pdf_footer.jpg">'
        .' </body>'
        .'</html>';


$dompdf = new DOMPDF();// Создаем обьект

$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'landscape');


$dompdf->render();
$output = $dompdf->output(0);
file_put_contents("./file.pdf", $output);