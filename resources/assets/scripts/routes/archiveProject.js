export default {
  init () {
    this.DOM = {
      navLinks: document.querySelectorAll('.rm-c-ProjectList-nav li a'),
      visualsContainer: document.querySelector('.rm-c-ProjectList-visual'),
    };

    this.state = {
      currentProject: this.getSlugFromUrl(this.DOM.navLinks[0].href),
    };

    this.setupNav();
  },

  setupNav () {
    // Setup triggers
    this.DOM.navLinks.forEach( (link) => {
      link.addEventListener('click', this.handleUpdateVisual.bind(this));
    });

    // const root = document.querySelector(':root');
    let timer;
    this.DOM.visualsContainer.scrollTop = 0;
    this.DOM.visualsContainer.addEventListener('scroll', () => {
      clearTimeout(timer);
      // root.dataset.projectUpdating = true;
      // root.style.removeProperty('--project-color');
      //Renew timer
      timer = setTimeout(() => {
        for (const visual of this.DOM.visualsContainer.children) {
          if (this.isElementInViewport(visual)) {
            this.updateVisual(visual.id);
            break;
          }
        }
      }, 10);
    });
  },

  handleUpdateVisual (event) {
    event.preventDefault();
    
    const newSlug = this.getSlugFromUrl(event.currentTarget.href);
    this.updateVisual(newSlug);
  },

  updateVisual (newSlug) {
    if (this.state.currentProject === newSlug)
      return;

    // Unselect previous project
    this.toggleProject(this.state.currentProject);

    // Select new project
    this.toggleProject(newSlug);
    this.state.currentProject = newSlug;
  },

  toggleProject (slug) {
    const root = document.querySelector(':root');
    const link = document.querySelector(`a[href="#${slug}"]`);
    const project = document.getElementById(slug);
    const selected = project.dataset.selected;

    root.dataset.projectUpdating = true;

    if (selected) {
      delete link.parentElement.dataset.selected;
      delete project.dataset.selected;
    }

    const delay = (window.innerWidth < 992) ? 200 : 800;
    setTimeout(() => {
      if (!selected) {
        link.parentElement.dataset.selected = 'true';
        project.dataset.selected = 'true';
        root.style.setProperty('--project-color', link.dataset.color);
      }

      root.dataset.projectUpdating = false;
    }, delay);
  },

  getSlugFromUrl (url) {
    return url.split('#')[1];
  },

  isElementInViewport (element) {
    var rect = element.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /* or $(window).height() */
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */
    );
  },
};
