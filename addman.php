<?php
require_once './config.php'; // подключаем скрипт
use Dompdf\Dompdf;


if($_POST){

    // подключаемся к серверу
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
              VALUES (NULL, '$username','$age', '$sex', '$email','$phone')";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));


    $id_query ="SELECT MAX(id) FROM run_people ";

    $result = mysqli_query($link, $id_query) or die("Ошибка " . mysqli_error($link));

    $rows = mysqli_num_rows($result); // количество полученных строк


    while ($row = mysqli_fetch_row($result)) {
        $id .= "$row[0]";
    }

    $username_query ="SELECT username FROM `run_people` WHERE id = (select max(id) from run_people)";

    $result = mysqli_query($link, $username_query) or die("Ошибка " . mysqli_error($link));

    $rows = mysqli_num_rows($result); // количество полученных строк


    while ($row = mysqli_fetch_row($result)) {
        $username .= "$row[0]";
    }


    $html = '<html>'
        .'<body>'
        .'<style>header,img{width:80%;height:200px}body,html{padding:0!important;margin:0!important}body{font-family:DejaVu Sans;padding:0;margin:0}h1,header h2{text-align:center}header,img{margin:0 0 0 30px}header{display:block;position:relative;background:url(img/bg_pdf_head.jpg) top center no-repeat;padding:50px 0 0;background-size:100%}header h2{font-size:60px;margin:0 auto;display:block}h1{font-size:203px;margin:0 0 31px 30px;width:80%}span{position:absolute; transform:rotate(90deg); right: 0;}</style>'
        .'<div>'
        .'<header>'
        .'<h2>'. $username .'</h2>'
        .'</header>'
        .'<h1>'.  $id  .'</h1>'
        .'<img src="./img/bg_pdf_footer.jpg">'
        .'</div>'
        .'<span>'
        .'<h3>'.
            '<h2>'. $id .'</h2>'. $username
        .'</h3>'
        .'</span>'
        .' </body>'
        .'</html>';


    $dompdf = new DOMPDF();// Создаем обьект

    $dompdf->loadHtml($html);


    $dompdf->setPaper('A4', 'landscape');


    $dompdf->render();
    $output = $dompdf->output(0);
    file_put_contents("./file.pdf", $output);
    mysqli_close($link);
}


$file = "./file.pdf"; // файл
$mailTo = 'runo1194@gmail.com'; // кому
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
var_dump($result);


?>