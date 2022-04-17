// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import singleProject from './routes/project';
import postTypeArchiveExperience from './routes/labo';
import category from './routes/labo';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Project page
  singleProject,
  // Labo
  postTypeArchiveExperience,
  category,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
