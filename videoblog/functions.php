<?php
// Create a helper function for easy SDK access.
function vid_fs() {
    global $vid_fs;

    if ( ! isset( $vid_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $vid_fs = fs_dynamic_init( array(
            'id'                  => '891',
            'slug'                => 'videoblog',
            'type'                => 'theme',
            'public_key'          => 'pk_1d3c6101e163dd036a56d6cb6c165',
            'is_premium'          => false,
            'has_premium_version' => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
        ) );
    }

    return $vid_fs;
}

// Init Freemius.
vid_fs();

/**
 * Videoblog functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Videoblog
 */

if ( ! function_exists( 'videoblog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function videoblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Videoblog, use a find and replace
	 * to change 'videoblog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'videoblog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 175, 120, true );
	
	// Featured Post Main Thumbnail on the front page & single page template
	add_image_size( 'videoblog-large-thumbnail', 240, 340, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'videoblog' ),
		'secondary'	=> esc_html__( 'Secondary Menu', 'videoblog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

    add_theme_support( 'custom-logo', array(
	   'height'      => 50,
	   'width'       => 300,
	   'flex-width'  => true,
	   'flex-height' => true,
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', videoblog_fonts_url() ) );
	add_action( 'customize_controls_print_styles', 'videoblog_customizer_stylesheet' );

}
endif; // videoblog_setup
add_action( 'after_setup_theme', 'videoblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function videoblog_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'videoblog_content_width', 720 );

}
add_action( 'after_setup_theme', 'videoblog_content_width', 0 );

if ( ! function_exists( 'videoblog_new_excerpt_length' ) && ! is_admin() )  {

	/* Custom Excerpt Length
	==================================== */

	function videoblog_new_excerpt_length($length) {
		return 30;
	}

	add_filter('excerpt_length', 'videoblog_new_excerpt_length');
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function videoblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'videoblog' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'This is the main sidebar area that appears on all pages', 'videoblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 1', 'videoblog' ),
		'id'            => 'sidebar-footer-1',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 245px.', 'videoblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 2', 'videoblog' ),
		'id'            => 'sidebar-footer-2',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 245px.', 'videoblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 3', 'videoblog' ),
		'id'            => 'sidebar-footer-3',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 245px.', 'videoblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 4', 'videoblog' ),
		'id'            => 'sidebar-footer-4',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 245px.', 'videoblog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

}
add_action( 'widgets_init', 'videoblog_widgets_init' );


if ( ! function_exists( 'videoblog_fonts_url' ) ) :
/**
 * Register Google fonts for Videoblog.
 *
 * Create your own videoblog_fonts_url() function to override in a child theme.
 *
 * @since Videoblog 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function videoblog_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'videoblog' ) ) {
		$fonts[] = 'Roboto:300,400,500,700';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'videoblog' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function videoblog_scripts() {

	wp_enqueue_style( 'videoblog-style', get_stylesheet_uri() );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.1' );

	wp_enqueue_script(
		'jquery-slicknav',
		get_template_directory_uri() . '/js/jquery.slicknav.min.js',
		array('jquery'),
		null
	);

	wp_enqueue_script(
		'jquery-superfish',
		get_template_directory_uri() . '/js/superfish.min.js',
		array('jquery'),
		null
	);

	wp_register_script( 'videoblog-scripts', get_template_directory_uri() . '/js/videoblog.js', array( 'jquery' ), '20170211', true );

	/* Contains the strings used in our JavaScript file */
	$videoblogStrings = array (
		'slicknav_menu_home' => _x( 'HOME', 'The main label for the expandable mobile menu', 'videoblog' )
	);

	wp_localize_script( 'videoblog-scripts', 'videoblogStrings', $videoblogStrings );

	wp_enqueue_script( 'videoblog-scripts' );

	// Loads our default Google Webfont
	wp_enqueue_style( 'videoblog-webfonts', videoblog_fonts_url(), array(), null, null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'videoblog_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load plugin enhancement file to display admin notices.
 */
require get_template_directory() . '/inc/plugin-enhancements.php';

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Videoblog 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function videoblog_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'videoblog_widget_tag_cloud_args' );

/**
 *Start of edit JMMM
*/
/*
 * Create New Custom Type and Custom Fields
 * Jologs Movie Info
 */
add_action('init', 'jologs_movie_register');
//add_action( 'init', 'jologs_create_post_type' );
function jologs_movie_register() {
	$labels = array(
		'name' => _x('Jologs Movie', 'post type general name'),
		'singular_name' => _x('Jologs Movie Item', 'post type singular name'),
		'add_new' => _x('Add New Movie Info', 'portfolio item'),
		'add_new_item' => __('Add New Movie Item'),
		'edit_item' => __('Edit Movie Item'),
		'new_item' => __('New Movie Item'),
		'view_item' => __('View Movie Item'),
		'search_items' => __('Search Movie Information'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
//		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'jologs_movie' , $args );    
}

register_taxonomy("Movie Type", array("jologs_movie"), array("hierarchical" => true, "label" => "Movie Types", "singular_label" => "Movie Type", "rewrite" => true));

function admin_initiate_textboxes(){
  add_meta_box("year_completed-meta", "Year Shown", "year_shown", "jologs_movie", "side", "low");
  add_meta_box("other_video_info_meta", "Additional Movie Info", "other_video_info_meta", "jologs_movie", "normal", "low");
}
add_action("admin_init", "admin_initiate_textboxes");

function year_shown(){
  global $post;
  $custom = get_post_custom($post->ID);
  $year_shown = $custom["year_shown"][0];
  ?>
  <label>Year:</label>
  <input name="year_shown" value="<?php echo $year_shown; ?>" />
  <?php
}
 
function other_video_info_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $video_description = $custom['video_description'][0];
  $dlink = $custom['dlink'][0];
  $director = $custom["director"][0];
  $writers = $custom["writer"][0];
  $casts = $custom["casts"][0];
  ?>
  <p><label>Video Description:</label><br/><?php wp_editor( $video_description, 'video_description' );?></p>
  <p><label>Download Link:</label><br />
  <input name="dlink" value="<?php echo $dlink; ?>"></p>
  <p><label>Director:</label><br />
  <input name="director" value="<?php echo $director; ?>"></p>
  <p><label>Writers:</label><br />
  <input name="writer" value="<?php echo $writers; ?>"></p>
  <p><label>Casts:</label><br />
  <input name="casts" value="<?php echo $casts; ?>"></p>
  <?php
}

add_action('save_post', 'save_details');
function save_details(){
  global $post;
 
  update_post_meta($post->ID, "year_shown", $_POST["year_shown"]);
  update_post_meta($post->ID, "video_description", $_POST['video_description']);
  update_post_meta($post->ID, "dlink", $_POST["dlink"]);    
  update_post_meta($post->ID, "director", $_POST["director"]);
  update_post_meta($post->ID, "writer", $_POST["writer"]);
  update_post_meta($post->ID, "casts", $_POST["casts"]);
}

add_action("manage_posts_custom_column",  "jologs_movie_custom_columns");
add_filter("manage_edit-jologs_movie_columns", "jologs_movie_edit_columns");
 
function jologs_movie_edit_columns($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />",
    "title" => "Jologs Movie Title",
    "video_description" => "Description",
    "year" => "Year Shown",
    "movie_type" => "Movie Type",
  );
 
  return $columns;
}
function jologs_movie_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "video_description":
      $custom = get_post_custom();
      echo wp_trim_words( $custom["video_description"][0], 25, '...' );
      break;
    case "year":
      $custom = get_post_custom();
      echo $custom["year_shown"][0];
      break;
    case "movie_type":
      echo get_the_term_list($post->ID, 'Movie Type', '', ', ','');
      break;
  }
}

function get_post_type_categs($post_type) {
    $customPostTaxonomies = get_object_taxonomies($post_type);

    if(count($customPostTaxonomies) > 0)
    {
         foreach($customPostTaxonomies as $tax)
         {
             $args = array(
                  'orderby' => 'name',
                  'show_count' => 0,
                  'pad_counts' => 0,
                  'hierarchical' => 1,
                  'taxonomy' => $tax,
                  'title_li' => ''
                );

             wp_list_categories( $args );
         }
    }    
}
/*
 * Create New Custom Type and Custom Fields
 * Anime Movie Info
 */
add_action('init', 'jologs_anime_register');
//add_action( 'init', 'jologs_create_post_type' );
function jologs_anime_register() {
	$labels = array(
		'name' => _x('Jologs Anime', 'post type general name'),
		'singular_name' => _x('Jologs Anime Item', 'post type singular name'),
		'add_new' => _x('Add New Anime Info', 'portfolio item'),
		'add_new_item' => __('Add New Anime Item'),
		'edit_item' => __('Edit Anime Item'),
		'new_item' => __('New Anime Item'),
		'view_item' => __('View Anime Item'),
		'search_items' => __('Search Anime Information'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'jologs_anime' , $args );    
}

register_taxonomy("Anime Type", array("jologs_anime"), array("hierarchical" => true, "label" => "Anime Types", "singular_label" => "Anime Type", "rewrite" => true));

function admin_initiate_anime_textboxes(){
  add_meta_box("other_anime_info_meta", "Additional Anime Info", "other_anime_info_meta", "jologs_anime", "normal", "low");
}
add_action("admin_init", "admin_initiate_anime_textboxes");

function other_anime_info_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $video_anime_description = $custom['video_anime_description'][0];
  ?>
  <p><label>Description:</label><br/><?php wp_editor( $video_anime_description, 'video_anime_description' );?></p>
<?php
}
add_action('save_post', 'save_anime_details');

function save_anime_details(){
  global $post;
 
  update_post_meta($post->ID, "video_anime_description", $_POST['video_anime_description']);
}

add_action("manage_posts_anime_custom_column",  "jologs_anime_custom_columns");
add_filter("manage_edit-jologs_anime_columns", "jologs_anime_edit_columns");
 
function jologs_anime_edit_columns($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />",
    "title" => "Anime Title",
    "video_anime_description" => "Description",
    "anime_type" => "Anime Type",
  );
 
  return $columns;
}
function jologs_anime_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "video_anime_description":
      $custom = get_post_custom();
      echo wp_trim_words( $custom["video_anime_description"][0], 25, '...' );
      break;
    case "anime_type":
      echo get_the_term_list($post->ID, 'Anime Type', '', ', ','');
      break;
  }
}


//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
	global $post;
	$default_image="https://jologs.com/wp-content/uploads/2017/07/jologs_movie_site.jpg";
	if ( !is_singular()) { //if it is not a post or a page
		echo '<meta name="description" content="Jologs Movie Site - Watch Free Openload Movies in High Quality. Definitely HD, fast and easy with free download link.">';
		echo '<meta name="keywords" content="jologs film, movie film, jologs movie, jologs in english, jologs words, ano ang jologs, jologs full movie, jologs movie watch online, jologs meaning">';
	} else {        
        $custom = get_post_custom();            
        //echo '<meta property="fb:admins" content="YOUR USER ID"/>';
        echo '<meta name="description" content="'.get_the_title().' Story and Plot: '.$custom["video_description"][0].'"/>';
        echo '<meta name="keywords" content="'.get_the_title().','.get_the_title().' movie'.','.get_the_title().' mp4'.','.get_the_title().' hdrip'.'"/>';
        echo '<meta property="og:title" content="' . get_the_title() . ' (' . $custom["year_shown"][0].') | Jologs Movie Site"/>';
        echo '<meta property="og:type" content="video.movie"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="https://jologs.com"/>';
        echo '<meta property="og:description" content="'.$custom["video_description"][0].'"/>';
	}
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
        //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
        echo '<meta property="og:image:width" content="' . $thumbnail_src[1] .'" />';
        echo '<meta property="og:image:height" content="' . $thumbnail_src[2] .'" />';                
	}
    if (is_home()) {
        echo '<meta property="og:title" content="' . get_the_title() . ' | Jologs Movie Site"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="https://jologs.com"/>';
        echo '<meta property="og:description" content="Jologs Movie Site, home of HD and Clear Copy Filipino and American Movies"/>';
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

//to remove admin wp logo
add_action('admin_bar_menu','remove_wp_logo',999);
function remove_wp_logo($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
}

//custom footer
function remove_footer_admin() {
    echo '&copy; 2017 - Jologs Movie Site';
}
add_filter('admin_footer_text','remove_footer_admin');

function post_remove ()      //creating functions post_remove for removing menu item
{ 
    remove_menu_page('edit.php');    
    if ( current_user_can( 'editor' ) ) {
        remove_menu_page('index.php');
        remove_menu_page('edit.php?post_type=page');
    }
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call

//add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
//
//function wpse_136058_debug_admin_menu() {
//
//    echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
//}

add_action('admin_menu', 'rrh_change_post_links');
function rrh_change_post_links() {
	global $menu;
	$menu[6] = $menu[26];
	$menu[26] = $menu[6];
	unset($menu[26]);
}

//http://wordpress.stackexchange.com/a/27529
function change_role_name() {
    global $wp_roles;

    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    //You can list all currently available roles like this...
    //$roles = $wp_roles->get_names();
    //print_r($roles);

    //You can replace "administrator" with any other role "editor", "author", "contributor" or "subscriber"...
    $wp_roles->roles['editor']['name'] = 'Jologs Movie Uploader';
    $wp_roles->role_names['editor'] = 'Jologs Movie Uploader';           
}
add_action('init', 'change_role_name');

//http://wordpress.stackexchange.com/a/177359
function remove_dashboard_widgets () {

  remove_meta_box('dashboard_quick_press','dashboard','side'); //Quick Press widget
  remove_meta_box('dashboard_recent_drafts','dashboard','side'); //Recent Drafts
  remove_meta_box('dashboard_primary','dashboard','side'); //WordPress.com Blog
  remove_meta_box('dashboard_secondary','dashboard','side'); //Other WordPress News
  remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
  remove_meta_box('dashboard_plugins','dashboard','normal'); //Plugins
  remove_meta_box('dashboard_right_now','dashboard', 'normal'); //Right Now
  remove_meta_box('rg_forms_dashboard','dashboard','normal'); //Gravity Forms
  remove_meta_box('dashboard_recent_comments','dashboard','normal'); //Recent Comments
  remove_meta_box('icl_dashboard_widget','dashboard','normal'); //Multi Language Plugin
  //remove_meta_box('dashboard_activity','dashboard', 'normal'); //Activity
  //remove_action('welcome_panel','wp_welcome_panel');

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}

function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url('.get_bloginfo('template_directory').'/images/login_logo.png) !important;background-size:184px!important;height:64px!important;width:184px!important; }
</style>';
}
add_action('login_head', 'custom_loginlogo');

/**
 * 07-05-2017
 * @param $template
 * @return searched values (movies with custom type jologs_movie)
**/
function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'jologs_movie' )   
  {
    return locate_template('archive.php');
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');
