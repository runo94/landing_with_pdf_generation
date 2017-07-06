<?php
require_once './config.php';

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

$query ="CREATE Table run_people
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(200) NOT NULL,
    age VARCHAR(200) NULL,
    sex VARCHAR(200) NULL,
    email VARCHAR(200) NOT NULL,
    phone VARCHAR(200) NULL
)";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "Создание таблицы прошло успешно";
}

mysqli_close($link);
