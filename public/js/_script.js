var listImg = document.getElementsByClassName('more-img');
let press = 0;
for (let i = 0; i < listImg.length; i++) {
    listImg[i].style.transition = "0.3s";
    listImg[i].addEventListener('click', (e) => {
        e.preventDefault();
        let id = listImg[i].getAttribute('data-id');
        document.getElementById('img-' + id).src = listImg[i].getAttribute('data-src');
        //document.getElementById('img-' + id).style.transform = "scale(1)";
        listImg[press].style.filter = "brightness(1)";
        listImg[i].style.filter = "brightness(1.3)";
        press = i;
    });
}

