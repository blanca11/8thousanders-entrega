document.addEventListener('DOMContentLoaded', function () {
const btnSi = document.querySelector('.js-btn-si');
const btnNo = document.querySelector('.js-btn-no');

const contentYes = document.getElementById('content-yes');
const contentNo = document.getElementById('content-no');

// Función de scroll con offset superior
function scrollWithOffset(element, offset = 120) {
    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.scrollY - offset;

    window.scrollTo({
    top: offsetPosition,
    behavior: "smooth"
    });
}

function showYes() {
    contentYes.classList.remove('serv-hidden');
    contentNo.classList.add('serv-hidden');

    // Scroll con offset
    scrollWithOffset(contentYes);
}

function showNo() {
    contentNo.classList.remove('serv-hidden');
    contentYes.classList.add('serv-hidden');

    // Scroll con offset
    scrollWithOffset(contentNo);
}

btnSi.addEventListener('click', function (e) {
    e.preventDefault();
    showYes();
});

btnNo.addEventListener('click', function (e) {
    e.preventDefault();
    showNo();
});
});