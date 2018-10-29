$(document).ready(function() {
    
    $('.zakaz').click(function (event) {
        event.preventDefault();
        $(this).parent().find('form').fadeIn(300);
        $(this).hide();
    });

    $(".main").submit(function () { // перехватываем все при событии отправк

        var form = $(this);

        if (form.children("input[name='name']").val() == "") {
            form.children("input[name='name']").css({'border-color': '#d8512d'});
            setTimeout(function () {
                form.children("input[name='name']").css({'border-color': '#a5a5a5'});
            }, 1000);
        } else if (form.children("input[name='tel']").val() == "") {
            form.children("input[name='tel']").css({'border-color': '#d8512d'});
            setTimeout(function () {
                form.children("input[name='tel']").css({'border-color': '#a5a5a5'});
            }, 1000);
        } else {
            $('#overlay').fadeIn(400);


            console.log("sender");
            var data = form.serializeArray(); // подготавливаем данные
            $.ajax({ // инициализируем ajax запрос
                type: 'POST', // отправляем в POST формате, можно GET
                url: '../ajax_send.php', // путь до обработчика, у нас он лежит в той же папке
                data: data, // данные для отправки
                success: function () { // событие после удачного обращения к серверу и получения ответа
                    $('#modal_form_03')
                        .css('display', 'block')
                        .animate({opacity: 1, top: '40%'}, 200);
                    setTimeout(function () {
                        $('#overlay').fadeOut(400,
                            function () {
                                $('#modal_form_03')
                                    .css('display', 'none')
                                    .animate({opacity: 1, top: '100%'}, 200);
                            });
                    }, 2000);
                    console.log("return");
                }
            });
        }
        return false; // вырубаем стандартную отправку формы
    });
});
