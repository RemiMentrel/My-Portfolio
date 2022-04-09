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

    this.slider = new Swiper( this.DOM.featuredList, {
      loop: true,
      slidesPerView: 1,    
      speed: 700,
      spaceBetween: 22,
      navigation: {
        prevEl: '[data-slider="prev"]',
        nextEl: '[data-slider="next"]',
      },
    });
  },
};
