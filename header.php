<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Panda note</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjp.css">
<link href="<?php echo get_theme_file_uri( '/css/normalize.css' ); ?>" rel="stylesheet" type="text/css">
<?php wp_head(); ?>
</head>

<body>
<header>
  <div class="head-inner">
    <h1 class="head-title"><a href="/"><img src="<?php echo get_theme_file_uri( '/images/title.svg' ); ?>" alt="Panda note" width="180px"/></a></h1>
  </div>
  <div class="menu-section">
    <div class="menu-toggle">
      <div class="one"></div>
      <div class="two"></div>
      <div class="three"></div>
    </div>
    <nav>

  <?php wp_nav_menu(
    array(
		'menu_class' => 'hidden',
        'container' => ul ,
    )
); ?>
    
    </nav>
  </div>
</header>