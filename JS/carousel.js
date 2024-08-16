const swiper = new Swiper('.swiper', {

    


    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // Scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },

    // Autoplay
    /* autoplay: {
        delay: 1000,
    }, */

    // Rewind effect (from last to first)
    rewind: true,

    slidesPerView: 1,

});