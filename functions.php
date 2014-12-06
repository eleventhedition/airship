<?php if ( ! defined( 'ABSPATH' ) ) exit; /* Exit if accessed directly */

add_action( 'after_setup_theme', 'airship_theme_setup' );

function airship_theme_setup() {
  /* Add theme support for automatic feed links. */ 
  add_theme_support( 'automatic-feed-links' );

  /* Add theme support for post thumbnails (featured images). */
  add_theme_support( 'post-thumbnails' );

  /* Add custom image sizes. */
  add_image_size( 'small-thumb', 520, 450, true );

  if ( ! isset( $content_width ) ) { $content_width = 960; }

  add_theme_support( 'post-formats', array( 'gallery' ) );

  /* Add theme support for custom backgrounds. */
  add_theme_support( 'custom-background' );

  $args = array(
    'flex-width'    => true,
    'width'         => 330,
    'flex-height'    => true,
    'height'        => 163,
    'default-image' => get_template_directory_uri() . '/images/header/logo.svg',
  );
  add_theme_support( 'custom-header', $args );

  /* Add your nav menus function to the 'init' action hook. */
  add_action( 'init', 'airship_register_menus' );

  /* Add your sidebars function to the 'widgets_init' action hook. */
  add_action( 'widgets_init', 'airship_register_sidebars' );

  /* Add custom jQuery function to the 'init' action hook. */
  add_action( 'wp_enqueue_scripts', 'airship_jquery' );

  /* Load CSS files on the 'wp_enqueue_scripts' action hook. */
  add_action( 'wp_enqueue_scripts', 'airship_load_styles' );

  /* Load JavaScript files on the 'wp_enqueue_scripts' action hook. */
  add_action( 'wp_enqueue_scripts', 'airship_load_scripts' );

  /* Add remove_head_links function to the 'init' action hook. */
  add_action( 'init', 'airship_remove_head_links' );

  /* Add editor styles function to the 'init' action hook. */
  add_action( 'init', 'airship_add_editor_styles' );

  /* Allow SVG to allowed upload mimes */
  add_filter('upload_mimes', 'airship_upload_mimes');

  /* Custom excerpt length */
  add_filter( 'excerpt_length', 'airship_excerpt_length', 999 );

  /* Add Powered by Wordpress link. */
  add_action( 'wordpress_footer', 'airship_powered_by_wordpress' );

  /* Remove the Wordpress generator tag */
  remove_action('wp_head', 'wp_generator');

  /* WooCommerce support */
  add_theme_support( 'woocommerce' );

  require_once( get_template_directory() . '/inc/airship-acf.php' );
  require_once( get_template_directory().'/inc/airship-plugin-activation.php' );
  require_once( get_template_directory().'/inc/wp-updates-theme.php' ); new WPUpdatesThemeUpdater_839( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );
  
  if (function_exists( 'is_woocommerce' )) { require_once( get_template_directory() . '/inc/airship-woocommerce.php' ); }
}

function airship_register_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu', 'airship' ),
      'shop-menu' => __( 'Shop Menu', 'airship' )
    )
  );
}

function airship_register_sidebars() {
  /* Register dynamic sidebars using register_sidebar() here. */
  register_sidebar(array(
    'name' => 'Footer',
    'id'   => 'airship_footer',
    'description'   => 'Footer Widget Area',
    'before_widget' => '<div class="widget section">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));
}

function airship_jquery() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', '' );
  wp_enqueue_script( 'jquery' );
}

function airship_load_styles()
{
  wp_enqueue_style( 'style-name', get_stylesheet_uri() );
  wp_register_style( 'custom-style', get_template_directory_uri() . '/js/carousel/flexslider.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'custom-style' );
}

function airship_load_scripts() {
  /* Enqueue custom Javascript here using wp_enqueue_script(). */
  wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/carousel/jquery.flexslider-min.js', array('jquery'), '2.2.0', true);
  wp_enqueue_script('twitter', get_template_directory_uri() . '/js/twitter.js', array(), '', true);
  wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js', 'jquery', '', true);
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true);
  wp_enqueue_script('svg', get_template_directory_uri() . '/js/svg.js', array('jquery'), '', true);

  if( is_page_template('contact.php') and (!of_get_option('contact_form')) ){
    wp_enqueue_script('infieldlabel', get_template_directory_uri() . '/js/jquery.infieldlabel.min.js', array('jquery'), '', true);
    wp_enqueue_script('validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '', true);
    wp_enqueue_script('verif', get_template_directory_uri() . '/js/verif.js', array('jquery'), '', true);
    wp_enqueue_script('infield', get_template_directory_uri() . '/js/infield.js', array('jquery'), '', true);
  }

  /* Load the comment reply JavaScript. */
  if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
    wp_enqueue_script( 'comment-reply' );
}

function airship_remove_head_links() {
  /* Removes unneccesary header links */
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
}

function airship_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}

if(!function_exists('airship_comment')) :
/**
 * Display a comment
 * 
 * @param $comment The comment
 * @param $args The arguments
 * @param $depth The depth
 */
function airship_comment($comment, $args, $depth){
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
    <div class="comment-wrapper">
      <?php $type = get_comment_type($comment->comment_ID); ?>
      <?php if($type == 'comment') : ?>
      <div class="avatar-container">
        <?php echo get_avatar(get_comment_author_email(), $depth == 1 ? 60 : 45) ?>
      </div>
      <?php endif; ?>
  
      <div class="comment-container">
        <?php if($depth <= $args['max_depth']) : ?>
          <?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])) ?>
        <?php endif; ?>
  
        <div class="info">
          <span class="author"><?php comment_author_link() ?></span>
          <span class="date"><?php comment_date() ?></span>
        </div>
  
        <div class="comment-content content">
          <?php comment_text() ?>
        </div>
      </div>
  
      <div class="clear"></div>
    </div>
  <?php
}
endif;

function airship_upload_mimes ( $existing_mimes=array() ) {
  // add the file extension to the array
  $existing_mimes['svg'] = 'mime/type';
  $existing_mimes['ico'] = 'mime/type';
  // call the modified list of extensions
  return $existing_mimes;
}

function airship_excerpt_length( $length ) {
  return 20;
}

function airship_powered_by_wordpress() {
  ?>
  <p class="powered">Powered By <a href="http://wordpress.org/" target="_blank" title="Powered By WordPress">WordPress</a></p>
  <?php
}


/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

/* 
 * Note: Options Typography is a child theme of Options Framework Theme
 * So all the functions from the parent theme are also inherited
 */
 
 /**
 * Returns an array of system fonts
 * Feel free to edit this, update the font fallbacks, etc.
 */

function options_typography_get_os_fonts() {
  // OS Font Defaults
  $os_faces = array(
    'Arial, sans-serif' => 'Arial',
    'Cambria, Georgia, serif' => 'Cambria',
    'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
    'Georgia, serif' => 'Georgia',
    '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
    'Tahoma, Geneva, sans-serif' => 'Tahoma',
    'montserratregular, sans-serif' => 'Montserrat Regular',
    'montserratbold, sans-serif' => 'Montserrat Bold'
  );
  return $os_faces;
}

/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */

function options_typography_get_google_fonts() {
  // Google Font Defaults
  $google_faces = array(
    'Droid Serif, serif' => 'Droid Serif',
    'Open Sans, sans-serif' => 'Open Sans',
    'Roboto, sans-serif' => 'Roboto',
    'Oswald, sans-serif' => 'Oswald',
    'Pacifico, cursive' => 'Pacifico',
    'PT Sans, sans-serif' => 'PT Sans',
    'Ubuntu, sans-serif' => 'Ubuntu',
    'Lato, sans-serif' => 'Lato',
    'Raleway, sans-serif' => 'Raleway',
    'Source Sans Pro, sans-serif' => 'Source Sans Pro'
  );
  return $google_faces;
}

/* 
 * Outputs the selected option panel styles inline into the <head>
 */
 
function options_typography_styles() {
  
  // It's helpful to include an option to disable styles.  If this is selected
  // no inline styles will be outputted into the <head>
  
  if ( !of_get_option( 'disable_styles' ) ) {
    $output = '';
    $input = '';
    
    if ( of_get_option( 'menu_font' ) ) {
      $output .= options_typography_font_styles( of_get_option( 'menu_font' ) , '#menu li a');
    }

    if ( of_get_option( 'body_font' ) ) {
      $output .= options_typography_font_styles( of_get_option( 'body_font' ) , 'body');
    }
    
    if ( of_get_option( 'header_font' ) ) {
      $output .= options_typography_font_styles( of_get_option( 'header_font' ) , 'h1,h2,h3,h4,h5,h6');
    }

    if ( of_get_option( 'large_font' ) ) {
      $output .= options_typography_font_styles( of_get_option( 'large_font' ) , '.intro p');
    }

    if ( of_get_option( 'testimonial_quote' ) ) {
      $output .= options_typography_font_styles( of_get_option( 'testimonial_quote' ) , '.quote p');
    }
    
    if ( of_get_option( 'testimonial_author' ) ) {
      $output .= options_typography_font_styles( of_get_option( 'testimonial_author' ) , '.by');
    }

    if ( of_get_option( 'link_color' ) ) {
      $output .= 'a {color:' . of_get_option( 'link_color' ) . '}';
    }
    
    if ( of_get_option( 'link_hover_color' ) ) {
      $output .= 'a:hover {color:' . of_get_option( 'link_hover_color' ) . '}';
    }
    
    if ( of_get_option( 'google_font' ) ) {
      $input = of_get_option( 'google_font' );
      $output .= options_typography_font_styles( of_get_option( 'google_font' ) , '.google-font');
    }
    
    if ( $output != '' ) {
      $output = "\n<style>\n" . $output . "</style>\n";
      echo $output;
    }
  }
}
add_action('wp_head', 'options_typography_styles');

/* 
 * Returns a typography option in a format that can be outputted as inline CSS
 */
 
function options_typography_font_styles($option, $selectors) {
    $output = $selectors . ' {';
    $output .= ' color:' . $option['color'] .'; ';
    $output .= 'font-family:' . $option['face'] . '; ';
    $output .= 'font-size:' . $option['size'] . '; ';
    $output .= '}';
    $output .= "\n";
    return $output;
}

/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
 
if ( !function_exists( 'options_typography_google_fonts' ) ) {
  function options_typography_google_fonts() {
    $all_google_fonts = array_keys( options_typography_get_google_fonts() );
    // Define all the options that possibly have a unique Google font
    $google_font = of_get_option('google_font', false);
    $google_mixed = of_get_option('google_mixed', false);
    $google_mixed_2 = of_get_option('google_mixed_2', false);
    // Get the font face for each option and put it in an array
    $selected_fonts = array(
      $google_font['face'],
      $google_mixed['face'],
      $google_mixed_2['face'] );
    // Remove any duplicates in the list
    $selected_fonts = array_unique($selected_fonts);
    // Check each of the unique fonts against the defined Google fonts
    // If it is a Google font, go ahead and call the function to enqueue it
    foreach ( $selected_fonts as $font ) {
      if ( in_array( $font, $all_google_fonts ) ) {
        options_typography_enqueue_google_font($font);
      }
    }
  }
}

add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

/**
 * Enqueues the Google $font that is passed
 */

function options_typography_enqueue_google_font($font) {
  $font = explode(',', $font);
  $font = $font[0];
  // Certain Google fonts need slight tweaks in order to load properly
  // Like our friend "Raleway"
  if ( $font == 'Raleway' )
    $font = 'Raleway:100';
  $font = str_replace(" ", "+", $font);
  wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}

?>