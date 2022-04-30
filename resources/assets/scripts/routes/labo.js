export default {
  init () {
    this.DOM = {
      miniatures: document.querySelectorAll('.rm-c-ProjectMiniature'),
      popin: document.querySelector('.rm-c-Popin'),
      popinContent: document.querySelector('.rm-c-Popin [data-popin-content]'),
      popinMask: document.querySelector('.rm-c-Popin-mask'),
    };

    this.state = {
      popinOpened: false,
    };

    this.setupPopin();
  },

  setupPopin () {
    // Setup triggers
    this.DOM.miniatures.forEach( (miniature) => {
      miniature.addEventListener('click', this.showPopin.bind(this));
    });

    this.DOM.popinMask.addEventListener('click', this.hidePopin.bind(this));

    document.addEventListener('keydown', (event) => {
      if(event.key === 'Escape' && this.state.popinOpened) {
        this.hidePopin.bind(this); // Todo: debug why not working
      }
    });
  },

  showPopin (event) {
    this.hidePopin();

    const miniature = event.currentTarget;
    const media = miniature.querySelector('figure').cloneNode(true);
    media.classList.add('rm-c-Gallery-image');

    this.DOM.popinContent.appendChild(media);

    document.body.dataset.popinDisplayed = 'true';
    this.DOM.popin.dataset.display = 'true';

    this.state.popinOpened = true;
  },

  hidePopin () {
    this.DOM.popinContent.innerHTML = '';
    this.DOM.popin.dataset.display = 'false';

    delete document.body.dataset.popinDisplayed;

    this.state.popinOpened = false;
  },
};
