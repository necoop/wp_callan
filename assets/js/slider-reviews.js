const swiperRewiews = new Swiper('.swiper-rewiews', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 3,
    spaceBetween: 20,
    slidesPerGroup: 1,
    // If we need pagination
    // pagination: {
    //   el: '.swiper-pagination',
    // },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-reviews-next',
      prevEl: '.swiper-reviews-prev',
    },
  
    // And if we need scrollbar
    // scrollbar: {
    //   el: '.swiper-scrollbar',
    // },

    breakpoints:{
      0: {
        slidesPerView: 1,
      },
      767: {
        slidesPerView: 2,
      },
    //   991: {
    //     slidesPerView: 3,
    //   },
      1199: {
        slidesPerView: 3,
      },
    },
  });
