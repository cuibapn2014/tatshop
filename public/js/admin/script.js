const options = document.querySelectorAll(".option-filter");
const tips = document.querySelector('.tips');
let item = document.querySelectorAll(".item-bill");

// console.log(options);

filterOrder = status => {
    options[status].addEventListener('click', () => {
        Toastify({
            text: "Lọc đơn hàng thành công!",
        }).showToast();
        item.forEach(data => {
            if (data.getAttribute('data-status') != options[status].getAttribute('data-status')) {
                data.classList.add('d-none');
            } else {
                data.classList.remove('d-none');
            }
        })
    });
}

window.addEventListener('click', (e) => {
    if (e.target == document.querySelector('.container')) {
        item.forEach(data => {
            data.classList.remove('d-none');
        })
    }
})

show = () => {
    setTimeout(() => {
        tips.style.opacity = "1";
    }, 1500);
}

hide = () => {
    setTimeout(() => {
        tips.style.opacity = "0";
        setTimeout(() => tips.classList.add("d-none"), 1000);
    }, 5000);
}
filterOrder(0);
filterOrder(1);
filterOrder(2);
show();
hide();

$(document).ready(() => {
    const customer = $("input.customer-input");
    customer.keyup((e) => {
        let keyword = customer.val().toLowerCase();
        item.forEach(data => {
            let title = data.getAttribute('data-customer').toLowerCase();
            if (!title.includes(keyword)) data.classList.add('d-none');
            else data.classList.remove('d-none');
        })
    });
});