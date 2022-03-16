const field = document.querySelector('.field-invoice');
const close = document.querySelector('.close-search-invoice');
const open = document.querySelectorAll('.search-invoice');
const btn = document.querySelector('.btn-search-invoice');
const strEnter = document.querySelector('.enter-invoice');

let display = (pos) => {
    open[pos].addEventListener('click', e => {
        e.preventDefault();
        field.classList.remove('d-none');
    });
}

close.addEventListener('click', e => {
    e.preventDefault();
    field.classList.add('d-none');
});

btn.onclick = e => {
    e.preventDefault();
    let invoice = strEnter.value;
    window.location = "invoice/" + invoice;
} 

display(0);
display(1);