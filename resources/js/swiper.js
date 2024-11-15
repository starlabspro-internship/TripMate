import 'swiper/css/bundle';
import Swiper from 'swiper/bundle';

const swiper = new Swiper('.swiper', {
    loop: false,
    spaceBetween: 25,
    grabCursor: true,
    slidesPerView: 3,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
    },
});


swiper.on('slideChange', function () {

    if (swiper.isEnd) {
        swiper.slideTo(0);
    }
});
