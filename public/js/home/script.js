$(document).ready(() => {
    const display = $('.display-poster');
    const close = $('#close-poster');
    document.querySelector("#close-poster").style.cursor = "pointer";
    setTimeout(() => {
        display.fadeIn();
    },1500);

    close.click(() => {
        display.fadeOut();
    });

    $(window).click((e) => {
        if(e.target == display[0]) display.fadeOut();
    });
})


