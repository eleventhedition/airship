<!doctype html>  

<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '-', true, 'right' ); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php $favicon = of_get_option('favicon'); if ($favicon) { ?>
<link rel="shortcut icon" href="<?php echo of_get_option('favicon'); ?>">
<?php } else { ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico">
<?php } ?>
<?php $icon1 = of_get_option('icon1'); if ($icon1) { ?>
<link rel="apple-touch-icon" href="<?php echo of_get_option('icon1'); ?>">
<?php } else { ?>
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon.png">
<?php } ?>
<?php $icon2 = of_get_option('icon2'); if ($icon2) { ?>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo of_get_option('icon2'); ?>">
<?php } else { ?>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-72x72.png">
<?php } ?>
<?php $icon3 = of_get_option('icon3'); if ($icon3) { ?>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo of_get_option('icon3'); ?>">
<?php } else { ?>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-touch-icon-114x114.png">
<?php } ?>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script><![endif]--> 

<?php wp_head(); ?>

<?php $css = of_get_option('css'); if ($css) { ?>
<style>
<?php echo of_get_option('css'); ?> 
</style>
<?php } ?>
</head>

<body <?php body_class(); ?>>

<div class="container">
    <div class="row remove-bottom">
    	<header role="banner">
            <div class="mobile-only">
                <div id="mobile-open"><img src="<?php echo get_template_directory_uri(); ?>/images/nav/menu_open.svg" width="30" height="30" alt="Open Menu" title="Open Menu" /></div>
                <div id="mobile-close"><img src="<?php echo get_template_directory_uri(); ?>/images/nav/menu_close.svg" alt="Close Menu" title="Close Menu" /></div>
                <div id="mobile-overlay">
                    <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container_id' => 'main-menu-mobile', 'menu_id' => 'mobile-menu', 'menu_class' => 'menu', 'depth' => '1',)); ?>
                </div>
            </div>
            <a href="<?php echo home_url(); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
            </a>
    	</header>

    	<div class="sixteen columns screen-only">
            <div class="section remove-top">
      		        <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container_id' => 'main-menu', 'menu_id' => 'screen-menu', 'menu_class' => 'menu', 'depth' => '1',)); ?>
            </div>
        </div>

        <div class="sixteen columns half-bottom" id="shop-menu">
            <?php wp_nav_menu(array('theme_location' => 'shop-menu', 'container_id' => 'category-menu', 'menu_class' => 'sub-menu', 'depth' => '1')); ?>
        </div>
    </div>