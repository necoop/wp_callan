const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 4,
    spaceBetween: 30,
    slidesPerGroup: 1,
    // If we need pagination
    // pagination: {
    //   el: '.swiper-pagination',
    // },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },

    breakpoints:{
      0: {
        slidesPerView: 1,
      },
      767: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
      1199: {
        slidesPerView: 4,
      },
    },
  });
