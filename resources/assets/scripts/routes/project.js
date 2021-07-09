import Swiper from 'swiper/bundle';

export default {
  init () {
    this.DOM = {
      sliderContainer: document.querySelector('[data-slider="container"]'),
      sliderWrapper: document.querySelector('[data-slider="wrapper"]'),
      sliderPagination: document.querySelector('[data-slider="pagination"]'),
      sliderPrev: document.querySelector('[data-slider="prev"]'),
      sliderNext: document.querySelector('[data-slider="next"]'),
      slides: document.querySelectorAll('[data-slider="slide"]'),
    };

    this.setupSlider();
  },

  setupSlider () {
    // Prepare classes before setup
    this.DOM.sliderContainer.classList.add('swiper-container');
    this.DOM.sliderWrapper.classList.add('swiper-wrapper');
    this.DOM.slides.forEach(slide => {
      slide.classList.add('swiper-slide');
    });

    // Setup slider
    this.slider = new Swiper( this.DOM.sliderContainer, {
      slidesPerView: 1,    
      speed: 700,
      spaceBetween: 20,
      pagination: {
        el: '[data-slider="pagination"]',
      },
      navigation: {
        prevEl: '[data-slider="prev"]',
        nextEl: '[data-slider="next"]',
      },
      breakpoints: {
        // when window width is >= 320px
        769: {
          spaceBetween: 100,
        },
      },
    });
  },
};
