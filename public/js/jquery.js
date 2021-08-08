$(document).ready(function () {
    $('#btnAdd').click(function (event) {
        event.preventDefault();
        $('#photo').append('<input class="form-control mt-2" type="text" name="image[]" placeholder="Nhập link hình ảnh"/>');
    });
    $('#btnSize').click(function (event) {
        event.preventDefault();
        $('#size').append('<input class="form-control mt-2" type="text" name="size[]"/>');
    });

    $('#btnColor').click(function (event) {
        event.preventDefault();
        $('#color').append('<input class="form-control mt-2" type="text" name="color[]"/>');
    });

    $(window).scroll(function (event) {
        var body = $('html,body').scrollTop();
        if (body > 20) {
            $('.navbar').addClass('fade-In');
        } else {
            $('.navbar').removeClass('fade-In');
        }
    });

    $("div#back-top").hide();
    $(window).scroll(function (event) {
        var body = $('html,body').scrollTop();
        if (body > 700) {
            $("div#back-top").show(1000);
        } else {
            $("div#back-top").hide(1000);
        }
    });

    $("div#back-top").on("click", function () {
        $("html,body").scrollTop(0);
    });
});

$(document).ready(function ($) {
    $('#_product').keyup(function (event) {
        var product = $('#_product').val();
        $.get('ajaxAdmin/' + product, function (data) {
            $('#__product').html(data);
        });
    });
});

$(document).ready(function ($) {
    $('#_product').change(function (event) {
        var product = $('#_product').val();
        $.get('ajaxAdmin/' + product, function (data) {
            $('#__product').html(data);
        });
    });
});

$(document).ready(function () {
    $('#cate').change(function (event) {
        var cate = $('#cate').val();
        $.get("ajaxCategory/" + cate,(data) => {
            $('#sub_category').html(data);
        });
    });
    $.get('ajaxCategory/' + $('#cate').val(), (data) => {
        $('#sub_category').html(data);
    });
});
