<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пробіг УПЛ</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <div class="col-lg-12"> <p>15 липня 2017  •  м. Одеса</p></div>
        <div class="col-lg-12"><h1>Пробіг УПЛ</h1></div>
        <div class="col-lg-12">
            <div class="big_info_text">
                <p>
                    Довгоочікуваний марафон на 2,5 км в Одесі <br> за підтримкою адміністрації міста <br> та Української Прем'єр-Ліги.
                </p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="small_info_text">
                <span>Чемпіонат України з футболу наближається, приєднуйся до грандіозної спортивної події вже зараз.<br> Спорт — це життя, тож до поки ти біжиш, ти живеш!</span>
            </div>
        </div>
        <div class="col-lg-12">
                <span class="popup_btn">
                    Зареєструватись
                </span>
        </div>
    </header>
</div>
<div class="black_string container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-3 imageholder">
                        <img src="./img/placeholder.png">
                    </div>
                    <div class="col-lg-9">
                        <p><span>Місце збору</span><br>
                            Парк Шевченка, пам’ятник Т. Шевченку</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="row" style="justify-content: flex-end;">
                    <div class="col-lg-3 imageholder">
                        <img src="./img/calendar.png">
                    </div>
                    <div class="col-lg-5">
                        <p><span>Дата</span><br>
                            15 липня 2017 р.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row" style="justify-content: flex-end;">
                    <div class="col-lg-3 imageholder" >
                        <img src="./img/clock.png">
                    </div>
                    <div class="col-lg-5">
                        <p><span>Початок</span><br>
                            08:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="partners">
        <div class="row">
            <div class="col-lg-12">
                <h3>Партнери</h3>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-2 col-md-6 logo">
                <img src="./img/Coat_of_Arms_of_Odesa_Oblast.png">
            </div>
            <div class="col-lg-2 col-md-6 logo">
                <img src="./img/Coat_of_Arms_of_Odessa.png">
            </div>
            <div class="col-lg-2 col-md-6 logo">
                <img src="./img/UPLlogo.png">
                <p>
                    Організатор
                </p>
            </div>
            <div class="col-lg-2 col-md-6 logo">
                <img src="./img/New_Balance_logo.svg">
                <p>
                    Генеральний партнер
                </p>
            </div>
            <div class="col-lg-2 col-md-12 logo last">
                <img src="./img/Computools_logo_vert.png">
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</div>
<div class="container-fluid map">
    <div class="row">
        <div class="disable_map" style="z-index: 99; position: absolute; display: block; width:100%; height: 512px;"></div>
        <iframe src="https://snazzymaps.com/embed/1366" width="100%" height="512px" style="border:none; z-index: 9; position: relative"></iframe>
    </div>
</div>

<div class="container-fluid contacts">
    <h3>Контакти</h3>
    <p>Україна, 01133, м.Київ, <br>пров. Лабораторний, 7-А</p>
    <p>тел. +38 044 521 06 99,<br>факс +38 044 521 06 98</p>
    <a href="mailto:marketing@fpl.ua">marketing@fpl.ua</a>
</div>
<footer class="container-fluid">

</footer>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="./img/close.png">
        </button>
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Реєстраційна форма учасника пробігу УПЛ</h3>
                    <p>Заповніть поля нижче, щоб отримати номер учасника</p>
                </div>
                <form id="uplForm">
                    <div class="row">
                        <div class="col-lg-12 form_item">
                            <input type="text" name="name" placeholder="ПІБ*" />
                        </div>
                        <div class="col-lg-6 form_item">
                            <input type="text" name="age" placeholder="Вік" />
                        </div>
                        <div class="col-lg-6 form_item">
                            <select name="sex">
                                <option disabled selected hidden  data-default class="Country" value="">Ваша стать</option>
                                <option value="Чоловіча">Чоловіча</option>
                                <option value="Жіноча">Жіноча</option>
                            </select>
                        </div>
                        <div class="col-lg-12 form_item">
                            <input type="text" name="email" placeholder="Email*" />
                        </div>
                        <div class="col-lg-12 form_item">
                            <input type="text" name="phone" placeholder="Мобільний телефон" />
                        </div>
                        <div class="col-lg-12">
                            <span>* — обов’язкові пол</span>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" class="popup_btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript" src="./js/bootstrap.min.js"></script>

<script type="text/javascript" src="./js/main.js"></script>

</body>
</html>
