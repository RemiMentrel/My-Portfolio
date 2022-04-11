import Swiper from 'swiper/bundle';

export default {
  init () {
    this.DOM = {
      featuredList: document.querySelector('.rm-c-Home-featured-list'),
    };

    this.setupSlider();
  },

  setupSlider () {
    this.DOM.featuredList.querySelector('ul').classList.add('swiper-wrapper');
    // eslint-disable-next-line
    for (const item of this.DOM.featuredList.querySelectorAll('li')) {
      item.classList.add('swiper-slide');
    }

    this.slider = new Swiper( this.DOM.featuredList.querySelector('ul').parentElement, {
      slidesPerView: 1,
      loop: false,
      speed: 700,
      spaceBetween: 22,
      navigation: {
        prevEl: '[data-slider="prev"]',
        nextEl: '[data-slider="next"]',
      },
      breakpoints: {
        768: {
          effect: 'coverflow',
          coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 80,
            modifier: 1,
            slideShadows: true,
          },
          spaceBetween: 44,
        },
      },
    });
  },
};
