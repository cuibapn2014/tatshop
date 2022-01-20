$(document).ready(() => {
    var minus = document.querySelectorAll(".minus");
    var plus = document.querySelectorAll(".plus");
    var amount = document.querySelectorAll(".amount");
    for (let i = 0; i < minus.length; i++) {
        let qty = amount[i].value;
        minus[i].addEventListener("click", (e) => {
            e.preventDefault();
            if (qty > 1) {
                --qty;
            }
            amount[i].value = qty;
        });
        plus[i].addEventListener("click", (e) => {
            e.preventDefault();
            if (qty < 10) {
                ++qty;
            }
            amount[i].value = qty;
        });
    }
});

$(document).ready(() => {
    var form = $('#bills');
    var cod = $('#cod');
    var vnpay = $('#vnpay');
    cod.change(() => {
        if (cod.is(":checked")) {
            form.attr('action', 'cart');
        }
    });
    vnpay.change(() => {
        if (vnpay.is(":checked")) {
            form.attr('action', 'payments-online');
        }
    });
});

$(document).ready(() => {
    const search = $('#search');
    const form = $('#search-form');
    const close = $('.close-search');
    search.click((e) => {
        e.preventDefault();
        form.fadeIn();
    });
    close.click(() => {
        form.fadeOut();
    });
    form.click((e) => {
        if(e.target == document.getElementById('search-form'))
        form.fadeOut();
    });
});

$(document).ready(() => {
    const nev = $('.nevigate');
    const navbar = $('#nevigation');
    const close = $('.close-nav');
    nev.click((e) => {
        e.preventDefault();
        navbar.css('left','0');
    });
    close.click(() => {
        navbar.css('left','-100%');
    });
});

$(document).ready(() => {
    let cartIcon = $('.cart');
    let cartDetail = $('.cart-detail');
    let close = $('.close-cart-detail');
    cartIcon.click(() => {
        cartDetail.addClass("show");
        cartDetail.removeClass("hide");
    });
    close.click(() => {
        cartDetail.removeClass("show");
        cartDetail.addClass("hide");
    });
    $('.btn-pay').click(() => {
        window.location = "cart";
    });
});