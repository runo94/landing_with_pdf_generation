<?php
header('Content-type: text/html; charset=utf-8');
require_once 'dompdf/autoload.inc.php';
require_once './config.php'; // подключаем скрипт
use Dompdf\Dompdf;


if($_POST){

    // подключаемся к серверу
//    $mysqli = new mysqli($host, $user, $password, $database, 8081);
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

    // экранирования символов для mysql
    $username = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $age = htmlentities(mysqli_real_escape_string($link, $_POST['age']));
    $sex = htmlentities(mysqli_real_escape_string($link, $_POST['sex']));
    $email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
    $phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));

    // создание строки запроса
    $query ="INSERT INTO run_people (id ,username, age, sex, email, phone)
              VALUES (NULL, '$username','$age', '$sex', '$email','$phone')  ";
    $setutf ="SET NAMES utf8";
    $result = mysqli_query($link,$setutf);
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));


    $id_query ="SELECT MAX(id) FROM run_people ";

    $result = mysqli_query($link, $id_query) or die("Ошибка " . mysqli_error($link));

    $rows = mysqli_num_rows($result); // количество полученных строк

    while ($row = mysqli_fetch_row($result)) {
        $id .= "$row[0]";
    }
    $result = mysqli_query($link,$setutf);

    $id;

    $html = '<html>'
        .'<body>'
        .'<style>span h2,span h3{transform:rotate(270deg)}div,header,span,span h2,span h3{position:relative;display:block}header h2,span h2,span h3{display:block}div,h1,header,img{width:850px}h1,header h2,span h2,span h3{text-align:center}header,img{height:200px;margin:0 0 0 30px}body,html{padding:0!important;margin:0!important}body{font-family:DejaVu Sans;padding:0;margin:0}header{background:url(img/bg_pdf_head.jpg) top center no-repeat;padding:50px 0 0;background-size:100%}header h2{font-size:60px;margin:0 auto}h1{font-size:203px;margin:0 0 31px 30px}div{float:left}span{float:right;background:url(img/bg_pdf_right.jpg) 100% 100% no-repeat;background-size:cover;height:793px;width:220px}span h2{font-size:70px;margin-top:120px}span h3{font-size:30px;margin-top:200px}</style>'
        .'<div>'
        .'<header>'
        .'<h2>'. $username .'</h2>'
        .'</header>'
        .'<h1>'.  $id  .'</h1>'
        .'<img src="./img/bg_pdf_footer.jpg">'
        .'</div>'
        .'<span>'
        .'<h3>'.$username
        .'</h3>'
        .'<h2>'. $id .'</h2>'
//        .'<img src="./img/bg_pdf_right.jpg" width="100%">'
        .'</span>'
        .' </body>'
        .'</html>';


    $dompdf = new DOMPDF();// Создаем обьект

    $dompdf->loadHtml($html);


    $dompdf->setPaper('A4', 'landscape');


    $dompdf->render();
    $output = $dompdf->output(0);
    file_put_contents("./tmp/file.pdf", $output);
    mysqli_close($link);
}

$file = "./tmp/file.pdf"; // файл
$mailTo = 'anton.kolesnikov1994@gmail.com'; // кому
$from = 'runo1194@gmail.com'; // от кого
$subject = "Test file"; // тема письма
$message = "Тестовое письмо с вложением"; // текст письма

$separator = "---"; // разделитель в письме
// Заголовки для письма
$headers = "MIME-Version: 1.0\r\n";
$headers .= "From: $from\nReply-To: $from\n"; // задаем от кого письмо
$headers .= "Content-Type: multipart/mixed; boundary=\"$separator\""; // в заголовке указываем разделитель
// если письмо с вложением
if($file){
    $bodyMail = "--$separator\n"; // начало тела письма, выводим разделитель
    $bodyMail .= "Content-type: text/html; charset='utf-8'\n"; // кодировка письма
    $bodyMail .= "Content-Transfer-Encoding: quoted-printable"; // задаем конвертацию письма
    $bodyMail .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode(basename($file))."?=\n\n"; // задаем название файла
    $bodyMail .= $message."\n"; // добавляем текст письма
    $bodyMail .= "--$separator\n";
    $fileRead = fopen($file, 'r');
    $contentFile = fread($fileRead, filesize($file)); // считываем его до конца
    fclose($fileRead); // закрываем файл
    $bodyMail .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode(basename($file))."?=\n";
    $bodyMail .= "Content-Transfer-Encoding: base64\n"; // кодировка файла
    $bodyMail .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode(basename($file))."?=\n\n";
    $bodyMail .= chunk_split(base64_encode($contentFile))."\n"; // кодируем и прикрепляем файл
    $bodyMail .= "--".$separator ."--\n";
// письмо без вложения
}
$result = mail($mailTo, $subject, $bodyMail, $headers); // отправка письма



?>