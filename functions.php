<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

	// Enqueue Scripts and stuff
	function theme_styles(){
		wp_enqueue_style( 'style', get_bloginfo('template_directory') . '/style.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'mainstyles', get_bloginfo('template_directory') . '/css/styles.css', array(), '2.0', 'all' );
    wp_enqueue_style( 'slickcss', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'slickcsstheme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.0', 'all' );
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css'); 
	}
	add_action( 'wp_enqueue_scripts', 'theme_styles');

	function theme_scripts(){
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr-3.5.0.min.js', array(), FALSE, TRUE);
    wp_enqueue_script('plugins', get_template_directory_uri().'/js/plugins.js', array('jquery'), FALSE, TRUE);
    wp_enqueue_script('slickjs', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), FALSE, TRUE);
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), FALSE, TRUE);
    wp_enqueue_script('carousel', get_template_directory_uri().'/js/carousel.js', array('jquery'), FALSE, TRUE);
	}
	add_action( 'wp_enqueue_scripts', 'theme_scripts');
  

	// add theme support for post thumbnails
	add_theme_support( 'post-thumbnails' );
  
  /**
   * Add automatic image sizes
   */
  if ( function_exists( 'add_image_size' ) ) { 
  	add_image_size( 'person', 418, 255, true ); //(cropped)
    add_image_size( 'class', 375, 265, true ); //(cropped)
  }
  
  if( function_exists('acf_add_options_page') ) {
  	//acf_add_options_page();
  }

	// Debug preview with custom fields 
	function add_field_debug_preview($fields){
	   $fields["debug_preview"] = "debug_preview";
	   return $fields;
	}
	add_filter('_wp_post_revision_fields', 'add_field_debug_preview');

	function add_input_debug_preview() {
	   echo '<input type="hidden" name="debug_preview" value="debug_preview">';
	}
	add_action( 'edit_form_after_title', 'add_input_debug_preview' );

	//Register Menus
	function register_my_menus() {
	  register_nav_menus( array(
	  	'main-nav' => 'Main Navigation',
      'footer-nav' => 'Footer Navigation'
	  ) );
	}
	add_action( 'init', 'register_my_menus' );

	//SVG Support
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	// add CSS to WP admin pages
	function custom_admin_head() {
	  $css = '';

	  $css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';

	  echo '<style type="text/css">'.$css.'</style>';
	}
	add_action('admin_head', 'custom_admin_head');
  
 
  
	// add query variable
	function add_query_vars_filter( $vars ){
		$vars[] = "type";
		return $vars;
	}
	add_filter( 'query_vars', 'add_query_vars_filter' );

	
	// add page slug to Body classes
	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );
  
  
	
  
  function substrwords($text, $maxchar, $end='...') {
      if (strlen($text) > $maxchar || $text == '') {
          $words = preg_split('/\s/', $text);      
          $output = '';
          $i      = 0;
          while (1) {
              $length = strlen($output)+strlen($words[$i]);
              if ($length > $maxchar) {
                  break;
              } 
              else {
                  $output .= " " . $words[$i];
                  ++$i;
              }
          }
          $output .= $end;
      } 
      else {
          $output = $text;
      }
      return $output;
  }
  
  
  // stop wordpress removing span tags
  function uncoverwp_tiny_mce_fix( $init )  {
  // html elements being stripped
  $init['extended_valid_elements'] = 'span[*]';

  // pass back to wordpress
  return $init;
  }
  add_filter( 'tiny_mce_before_init', 'uncoverwp_tiny_mce_fix' );
  
  add_action( 'init', function() {
      remove_post_type_support( 'page', 'editor' );
  }, 99);
  
  
  // Add the custom columns to the class post type:
  add_filter( 'manage_class_posts_columns', 'set_custom_edit_class_columns' );
  function set_custom_edit_class_columns($columns) {
      $columns['name'] = __( 'Name', 'your_text_domain' );
      return $columns;
  }

  // Add the data to the custom columns for the class post type:
  add_action( 'manage_class_posts_custom_column' , 'custom_class_column', 10, 2 );
  function custom_class_column( $column, $post_id ) {
      switch ( $column ) {

          case 'name' :
              echo '<a href="/wp-admin/post.php?post=' . $post_id . '&action=edit">' . get_post_meta( $post_id , 'name' , true ) . '</a>'; 
          break;

      }
  }
  
  // Add the custom columns to the alumni post type:
  add_filter( 'manage_alumni_posts_columns', 'set_custom_edit_alumni_columns' );
  function set_custom_edit_alumni_columns($columns) {
      $columns['graduation_year'] = __( 'Graduation Year', 'your_text_domain' );
      return $columns;
  }

  // Add the data to the custom columns for the alumni post type:
  add_action( 'manage_alumni_posts_custom_column' , 'custom_alumni_column', 10, 2 );
  function custom_alumni_column( $column, $post_id ) {
      switch ( $column ) {

          case 'graduation_year' :
              echo '<a href="/wp-admin/post.php?post=' . $post_id . '&action=edit">' . get_post_meta( $post_id , 'graduation_year' , true ) . '</a>'; 
          break;

      }
  }

  

  
?>