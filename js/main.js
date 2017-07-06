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

jQuery(document).ready(function($){
    $("#uplForm").submit(function() { //устанавливаем событие отправки для формы с id=form
        var form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "./addman.php",
            data: form_data,
            success: function() {
                //код в этом блоке выполняется при успешной отправке сообщения
                alert("Ваше сообщение отпрвлено!");
            }
        });
    });
    $("#uplForm").submit(function() {
        $.ajax({
            type: "POST",
            url: './create-pdf.php'
        });
    });
});