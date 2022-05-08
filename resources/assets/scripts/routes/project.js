import Swiper, { Navigation, Pagination } from 'swiper';

export default {
  init () {
    this.DOM = {
      anchors: this.getAnchors(),
      detailSlider: document.querySelector('.rm-c-ProjectDetail'),
      popin: document.querySelector('.rm-c-Popin'),
      popinMask: document.querySelector('.rm-c-Popin-mask'),
      popinTriggers: document.querySelectorAll('[data-popin-trigger]'),
    };

    this.state = {
      popinOpened: false,
    }

    this.setupProjectNav();
    this.setupDetailSlider();
    this.setupPopin();

    setTimeout( () => {
      document.documentElement.dataset.projectLoaded = 'true';
    }, 3000);
  },

  getAnchors () {
    let anchorsClean = [];
    const anchors = document.querySelectorAll('a[href*="#"]');

    for (const anchor of anchors) {
      if (!this.getAnchorTarget(anchor))
        continue;
      
      anchorsClean.push(anchor);
    }

    return anchorsClean;
  },

  setupProjectNav () {
    for (let currentAnchor of this.DOM.anchors) {
      currentAnchor.addEventListener('click', (event) => {
        event.preventDefault();
            
        // Hide previous displayed
        for (const anchor of this.DOM.anchors) { 
          if (anchor.parentElement.dataset.selected) {
            delete anchor.parentElement.dataset.selected;
            delete this.getAnchorTarget(anchor).dataset.shown;
          }
        }

        // Show the one wanted
        const currentSlug = this.getSlugFromUrl(currentAnchor.getAttribute('href'));
        if (!currentAnchor.closest('.rm-c-Tabs'))
          currentAnchor = document.querySelector(`.rm-c-Tabs a[href="#${currentSlug}"]`);
        
        currentAnchor.parentElement.dataset.selected = true;
        this.getAnchorTarget(currentAnchor).dataset.shown = true;
      });
    }
  },

  setupDetailSlider () {
    const DOM = {
      container: this.DOM.detailSlider.querySelector('[data-slider="container"]'),
      wrapper: this.DOM.detailSlider.querySelector('[data-slider="wrapper"]'),
      pagination: this.DOM.detailSlider.querySelector('[data-slider="pagination"]'),
      prev: this.DOM.detailSlider.querySelector('[data-slider="prev"]'),
      next: this.DOM.detailSlider.querySelector('[data-slider="next"]'),
      slides: this.DOM.detailSlider.querySelectorAll('[data-slider="slide"]'),
    };

    // Prepare classes before setup
    DOM.container.classList.add('swiper-container');
    DOM.wrapper.classList.add('swiper-wrapper');
    DOM.slides.forEach(slide => {
      slide.classList.add('swiper-slide');
    });

    // Setup slider
    this.slider = new Swiper( DOM.container, {
      modules: [Navigation, Pagination],
      slidesPerView: 1,    
      speed: 800,
      spaceBetween: 40, 
      pagination: {
        el: DOM.pagination,
      },
      navigation: {
        prevEl: DOM.prev,
        nextEl: DOM.next,
      },
      breakpoints: {
        991: {
          spaceBetween: 100,
          speed: 1200,
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
        this.hidePopin();
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
    this.DOM.popin.querySelector('.rm-c-Gallery[data-shown="true"]').setAttribute('data-shown', 'false');
  },

  setupGallery(gallery) {
    gallery.setAttribute('data-shown', 'true');

    const galleryID = gallery.getAttribute('id').split('#')[0];

    const DOM = {
      container: gallery.querySelector('[data-slider="container"]'),
      wrapper: gallery.querySelector('[data-slider="wrapper"]'),
      pagination: gallery.querySelector(`[data-slider="pagination_${galleryID}"]`),
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

    new Swiper( DOM.container, {
      modules: [Navigation, Pagination],
      slidesPerView: 1,    
      speed: 700,
      spaceBetween: 0,
      pagination: {
        el: DOM.pagination,
      },
      navigation: {
        prevEl: DOM.prev,
        nextEl: DOM.next,
      },
    });
  },

  getAnchorTarget (anchor) {
    return document.getElementById(this.getSlugFromUrl(anchor.getAttribute('href')));
  },

  getSlugFromUrl (url) {
    return url.split('#')[1];
  },
};
