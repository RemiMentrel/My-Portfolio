<?php

// Get page title if doesn't exist
if(empty($page_title)) {
    $page_title = 'Rémi Mentrel';
}

// Get menu theme if doesn't exist
if(empty($menu_theme)) {
    $menu_theme = 'dark';
}


function getPageName () {
    return basename($_SERVER['PHP_SELF'], '.php');
}

function getAssetsDir () {
    return (getPageName() === 'index') ? '/assets/' : '../assets/';
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $page_title ?></title>
        <meta charset="UTF-8">
        <meta content="width=device-width;initial-scale=1.0; maximum-scale=1.0; user-scalable=1;" name="viewport" />
        <link href="<?php echo getAssetsDir() ?>images/Logo PORTFOLIO.ico" rel="icon">
        <link href="<?php echo getAssetsDir() ?>css/global.css" rel="stylesheet">
        <link href="<?php echo getAssetsDir() ?>fonts/Montserrat-Regular.ttf" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&family=Playfair+Display&family=Source+Serif+Pro&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">  
    </head>


    <body class="<?php echo getPageName() ?>">
        <header class="rm-c-Header">
          <nav class="rm-c-Menu" data-theme="<?php echo $menu_theme ?>">
            <ul class="rm-c-Menu-list">                
              <li class="rm-c-Menu-item"><a href="/index.php">accueil</a></li>
              <li class="rm-c-Menu-item"><a href="/index.php#projects">réalisations</a></li>
              <li class="rm-c-Logo">
                <a href="/index.php"><img src="<?php echo getAssetsDir() ?>icons/logo<?php if($menu_theme !== 'dark') { echo '-b'; } ?>.svg" alt="logo"></a>
                <h1 class="rm-u-a11yhidden">Titre principal</h1>
              </li>
              <li class="rm-c-Menu-item"><a href="/pages/biography.php">biographie</a></li>
              <li class="rm-c-Menu-item"><a href="/pages/contact.php">contact</a></li>
            </ul>
          </nav>
        </header>