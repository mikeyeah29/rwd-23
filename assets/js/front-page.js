
console.log('YEAHH');

jQuery(document).ready(function() {
    AOS.init();
});

// window.addEventListener('load', AOS.refresh);

window.addEventListener('scroll', function () {
    var header = document.querySelector('header');
    var scroll_threshold = 100; // (window.innerHeight - 200)
    if (window.scrollY > scroll_threshold) {
        header.classList.add('has-scrolled');
    } else {
        header.classList.remove('has-scrolled');
    }
});
