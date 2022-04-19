export default {
  init () {
    this.DOM = {
      navLinks: document.querySelectorAll('.rm-c-ProjectList-nav li a'),
    };

    this.state = {
      currentProject: this.getSlugFromUrl(this.DOM.navLinks[0].href),
    };

    this.setupNav();
  },

  setupNav () {
    // Setup triggers
    this.DOM.navLinks.forEach( (link) => {
      link.addEventListener('click', this.toggleVisual.bind(this));
    });
  },

  toggleVisual (event) {
    event.preventDefault();
    
    const newSlug = this.getSlugFromUrl(event.currentTarget.href);

    if (this.state.currentProject === newSlug)
      return;

    // Unselect previous project
    this.toggleProject(this.state.currentProject);

    // Select new project
    this.toggleProject(newSlug);
    this.state.currentProject = newSlug;
  },

  toggleProject (slug) {
    const link = document.querySelector(`a[href="#${slug}"]`);
    const project = document.getElementById(slug);

    if (project.dataset.selected) {
      delete link.parentElement.dataset.selected;
      delete project.dataset.selected;
    } else {
      link.parentElement.dataset.selected = 'true';
      project.dataset.selected = 'true';
    }
  },

  getSlugFromUrl (url) {
    return url.split('#')[1];
  },
};
