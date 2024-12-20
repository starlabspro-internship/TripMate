import 'swiper/css/bundle';
import Swiper from 'swiper/bundle';

const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 28,
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: false,
        },
        425: {
            slidesPerView: 2,
            spaceBetween: 20,
            centeredSlides: false,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 28,
            centeredSlides: true,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 32,
        },
    },
});

