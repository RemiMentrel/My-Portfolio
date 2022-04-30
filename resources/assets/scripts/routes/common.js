export default {
  init() {
    this.setupComponents();
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },

  setupComponents() {
    const availableComponents = ['showHide'];
    const components = document.querySelectorAll('[data-is]');

    if (components.length > 0) {
      for (const component of components) {
        const name = component.dataset.is;

        if (availableComponents.includes(name))
          this[name](component);
      }
    }
  },

  showHide(element) {
    const toggler = element.querySelector('[data-show-hide="toggler"]');
    const content = element.querySelector('[data-show-hide="content"]');

    toggler.addEventListener('click', () => {
      const state = !(element.dataset.shown === 'true');
      element.dataset.shown = state;
      toggler.dataset.shown = state;
      content.dataset.shown = state;
    });
  },
};
