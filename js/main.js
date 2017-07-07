/**
 * Created by Admin on 06.07.2017.
 */

jQuery(document).ready(function ($) {
    $('.popup_btn').click( function () {
        $('#myModal').modal('show');
    });

    $('.disable_map').click(function () {
        $(this).css({'display':'none'})
    })
});


$(document).ready (function()
{
    // блокируем кнопку отправки до того момента, пока все поля не будут проверены
    $("#uplForm").submit('disabled', true);

    // elements содержит количество элементов для валидации
    var elements = $('.validation').length;

    // has содержит количество элементов успешно прощедших валидацию
    var has;

    // при изменении значения поля
    $('.validation').change(function() {

        // формируем массив для отправки на сервер, нас интересуют значение поля и css-классы
        //на сервере массив будет доступен в виде $_POST['validation']['name']['value'] и т.п.
        var name = $(this).attr('name');
        var data = {};
        data['validation[' + name + '][value]'] = $(this).val();
        data['validation[' + name + '][class]'] = $(this).attr('class');

        // делаем ajax-запрос методом POST на текущий адрес, в ответ ждем данные HTML
        var form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "./addman.php",
            dataType: "text/html",
            data: form_data,
            contentType: "application/x-www-form-urlencoded;charset=UTF-8",
            success: function() {
                //код в этом блоке выполняется при успешной отправке сообщения
                alert("Ваше сообщение отпрвлено!");
            }
        });

        // проверяем, все ли поля прошли валидацию (признак - css-класс "ok" у блока сообщения) и разблокируем кнопку отправки на сервер
        has = $('.row:has(div.ok)').length + 1;
        if (has == elements)
        {
            $('.submit').prop('disabled', false);
        }
    });
});