import Swiper, { Navigation, Pagination, EffectCreative } from 'swiper';

export default {
  init () {
    this.DOM = {
      featuredList: document.querySelector('.rm-c-Home-featured-list'),
    };

    this.setupSlider();
  },

  setupSlider () {
    this.DOM.featuredList.querySelector('ul').classList.add('swiper-wrapper');
    const slides = this.DOM.featuredList.querySelectorAll('li');
    for (const item of slides) {
      item.classList.add('swiper-slide');
    }

    this.slider = new Swiper( this.DOM.featuredList.querySelector('ul').parentElement, {
      modules: [Navigation, Pagination, EffectCreative],
      effect: 'creative',
      creativeEffect: {
        limitProgress: slides.length,
        prev: {
          opacity: 0.6,
          translate: ['-108%', 0, -50],
        },
        next: {
          opacity: 0.6,
          translate: ['108%', 0, -50],
        },
      },
      slidesPerView: 1,
      centeredSlides: true,
      speed: 700,
      spaceBetween: 22,
      pagination: {
        el: '[data-slider="pagination"]',
      },
      navigation: {
        prevEl: '[data-slider="prev"]',
        nextEl: '[data-slider="next"]',
      },
    });
  },
};
