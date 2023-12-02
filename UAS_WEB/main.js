var swiper = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
   
  });

  //swiper
  // var swiper = new Swiper (".coming-container",{
  //   spaceBetween: 20,
  //   loop: true,
  //   autoplay: {
  //     delay:55000,
  //     disableOnInteraction: false,
  //   },
  //   centeredSlides: true,
  //   breakpoint: {
  //     0: {
  //       slidesPerView: 2,
  //     },
  //     568: {
  //       slidesPerView: 3,
  //     },
  //     768: {
  //       slidesPerView: 4,
  //     },
  //     968: {
  //       slidesPerView: 5,
  //     },
  //   },
  // });
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    }, breakpoint: {
          0: {
            slidesPerView: 2,
          },
          568: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 4,
          },
          968: {
            slidesPerView: 5,
          },
        },
  });
