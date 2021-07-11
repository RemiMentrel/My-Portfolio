import Swiper from 'swiper/bundle';

export default {
  init () {
    this.DOM = {
      mainSlider: document.querySelector('.rm-c-ProjectDetail'),
      popin: document.querySelector('.rm-c-Popin'),
      popinMask: document.querySelector('.rm-c-Popin-mask'),
      popinTriggers: document.querySelectorAll('[data-popin-trigger]'),
    };

    this.state = {
      popinOpened: false,
    }

    this.setupMainSlider();
    this.setupPopin();
  },

  setupMainSlider () {
    const DOM = {
      container: this.DOM.mainSlider.querySelector('[data-slider="container"]'),
      wrapper: this.DOM.mainSlider.querySelector('[data-slider="wrapper"]'),
      pagination: this.DOM.mainSlider.querySelector('[data-slider="pagination"]'),
      prev: this.DOM.mainSlider.querySelector('[data-slider="prev"]'),
      next: this.DOM.mainSlider.querySelector('[data-slider="next"]'),
      slides: this.DOM.mainSlider.querySelectorAll('[data-slider="slide"]'),
    };

    // Prepare classes before setup
    DOM.container.classList.add('swiper-container');
    DOM.wrapper.classList.add('swiper-wrapper');
    DOM.slides.forEach(slide => {
      slide.classList.add('swiper-slide');
    });

    // Setup slider
    this.slider = new Swiper( DOM.container, {
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

  setupPopin () {
    // Setup triggers
    this.DOM.popinTriggers.forEach( (trigger) => {
      trigger.addEventListener('click', this.showPopin.bind(this));
    });

    this.DOM.popinMask.addEventListener('click', this.hidePopin.bind(this));

    document.addEventListener('keydown', (event) => {
      if(event.key === 'Escape' && this.state.popinOpened) {
        this.hidePopin.bind(this); // Todo: debug why not working
      }
    });
  },

  showPopin (event) {
    this.state.popinOpened = true;

    const trigger = event.currentTarget;
    const galleryID = trigger.getAttribute('data-popin-trigger');
    const galleries = document.querySelectorAll('.rm-c-Gallery');
    const gallerySelected = document.querySelector('#' + galleryID);

    this.DOM.popin.setAttribute('data-display', 'true');

    galleries.forEach((gallery) => {
      gallery.setAttribute('data-shown', 'false');
    });
  
    this.setupGallery(gallerySelected);
  },

  hidePopin () {
    this.state.popinOpened = false;
    this.DOM.popin.setAttribute('data-display', 'false');
  },

  setupGallery(gallery) {
    gallery.setAttribute('data-shown', 'true');

    const galleryID = gallery.getAttribute('id').split('#')[0];

    const DOM = {
      container: gallery.querySelector('[data-slider="container"]'),
      wrapper: gallery.querySelector('[data-slider="wrapper"]'),
      pagination: gallery.querySelector('[data-slider="pagination"]'),
      prev: gallery.querySelector('[data-slider="prev"]'),
      next: gallery.querySelector('[data-slider="next"]'),
      slides: gallery.querySelectorAll('[data-slider="slide"]'),
    };
    
    // Prepare classes before setup
    DOM.container.classList.add('swiper-container');
    DOM.wrapper.classList.add('swiper-wrapper');
    DOM.slides.forEach(slide => {
      slide.classList.add('swiper-slide');
    });

    this.popinSlider = new Swiper( DOM.container, {
      slidesPerView: 1,    
      speed: 700,
      spaceBetween: 0,
      pagination: {
        el: `[data-slider="pagination_${galleryID}"]`,
      },
      navigation: {
        prevEl: '[data-slider="prev"]',
        nextEl: '[data-slider="next"]',
      },
    });
  },
};
