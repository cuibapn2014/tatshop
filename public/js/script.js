$(window).on('load', function (event) {
    $('body').removeClass('preloading');
    $('.load').fadeOut("fast");
});

$(document).ready(() => {
    var update = document.getElementsByClassName("update-cart");
    var amount = document.getElementsByClassName("amount");
    for (let i = 0; i < update.length; i++) {
        $(".update-cart:eq(" + i + ")").on("click", (e) => {
            e.preventDefault();
            $('div#notice').css("display", "block");
            updateCart(document.getElementById("amount_" + i).getAttribute('data-id'), document.getElementById("amount_" + i).value);
        });
    }
});

window.oncontextmenu = function () {
    return true;
}

updateCart = ($id, $qty) => {
    $.get("updateCart/" + $id + "/" + $qty, (data) => {
    });
    setTimeout(() => {
        window.location.reload();
    }, 3000);
}

var f = 1;
document.getElementById("minus").addEventListener("click", function (event) {
    event.preventDefault();
    if (f > 1) {
        --f;
    }
    document.getElementById("amount").value = f;
});

document.getElementById("plus").addEventListener("click", function (event) {
    event.preventDefault();
    if (f < 10) {
        ++f;
    }
    document.getElementById("amount").value = f;
});

function closeMenu() {
    var menu = document.getElementById('menu');
    var display = document.getElementById('display');
    menu.style.width = "0";
    display.style.marginLeft = "0px";
    display.style.width = "100%";
}

function openMenu() {
    var menu = document.getElementById('menu');
    var display = document.getElementById('display');
    menu.style.width = "350px";
    display.style.marginLeft = "350px";
}

function changeImg(smallImg) {
    var showImg = document.getElementById('img');
    showImg.src = smallImg.src;
}

function closeNotice() {
    document.getElementById('notice').style.display = "none";
}

function Img(num) {
    var img = document.getElementsByClassName('thumbnail');
    img[num].style.opacity = "1";
    img[num].style.zIndex = "100";
}

function outImg(num) {
    var img = document.getElementsByClassName('thumbnail');
    img[num].style.opacity = "0";
}

