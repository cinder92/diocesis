<?php
/**
 * Midiocesis functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Midiocesis
 */

if ( ! function_exists( 'midiocesis_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function midiocesis_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Midiocesis, use a find and replace
	 * to change 'midiocesis' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'midiocesis', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'midiocesis' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'midiocesis_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'midiocesis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function midiocesis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'midiocesis_content_width', 640 );
}
add_action( 'after_setup_theme', 'midiocesis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function midiocesis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'midiocesis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'midiocesis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'midiocesis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function midiocesis_scripts() {
	//wp_enqueue_style( 'midiocesis-foundation', get_template_directory_uri().'/css/foundation.min.css' );
	wp_enqueue_style('foundation',get_template_directory_uri().'/css/foundation.min.css');
	wp_enqueue_style('icons-css',get_template_directory_uri().'/js/plugins/megamenu/css/ionicons.min.css');
	wp_enqueue_style('megamenu-css',get_template_directory_uri().'/js/plugins/megamenu/css/style.css');
	wp_enqueue_style('flexslider-css',get_template_directory_uri().'/css/flexslider.css');
    wp_enqueue_style('owl-css',get_template_directory_uri().'/js/plugins/owl/owl.carousel.css');
    wp_enqueue_style('venobox-css',get_template_directory_uri().'/js/plugins/venobox/venobox.css');
	wp_enqueue_style( 'midiocesis-style', get_stylesheet_uri() );

	//sticky
	wp_enqueue_script( 'sticky', get_template_directory_uri().'/js/plugins/sticky/jquery.sticky.js', array('jquery'), '0.0.1', true );
	//megamenu
	wp_enqueue_script( 'megamenu', get_template_directory_uri().'/js/plugins/megamenu/js/megamenu.js', array('jquery'), '0.0.1', true );

	//flexslider
	wp_enqueue_script( 'flexslider', get_template_directory_uri().'/js/plugins/flexslider/jquery.flexslider-min.js', array('jquery'), '0.0.1', true );

    //venobox
    wp_enqueue_script( 'venobox', get_template_directory_uri().'/js/plugins/venobox/venobox.min.js', array('jquery'), '0.0.1', true );

    //coutdown
    wp_enqueue_script( 'coutdown', get_template_directory_uri().'/js/plugins/countdown/jquery.countdown.min.js', array('jquery'), '0.0.1', true );

    //owl carousel
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/js/plugins/owl/owl.carousel.min.js', array('jquery'), '0.0.1', true );

	wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array('jquery'), '0.0.1', true );

    //añadir script de google en eventos
   
    wp_enqueue_script( 'maps', 'https://maps.googleapis.com/maps/api/js?v=3', '0.0.1', false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'midiocesis_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
* Post Type : Ubicaciones
**/
add_action( 'init', 'register_posts' );
function register_posts() {
  register_post_type( 'ubicaciones',
    array(
      'labels' => array(
        'name' => __( 'Ubicaciones' ),
        'singular_name' => __( 'Ubicación' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'ubicaciones'),
    )
  );

  register_post_type( 'eventos',
    array(
      'labels' => array(
        'name' => __( 'Eventos' ),
        'singular_name' => __( 'Evento' )
      ),
      'public' => true,
      'supports' => array(
          'title',
          'editor',
          'excerpt',
          'trackbacks',
          'custom-fields',
          'revisions',
          'thumbnail',
          'author',
          'page-attributes',
      ),
      'has_archive' => true,
      'rewrite' => array('slug' => 'eventos'),
    )
  );
}

//megamenu integration

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}
// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's

remove_filter ('the_content',  'wpautop');

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '/';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Inicio';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}

add_action( 'wp_ajax_getEvents', 'getEvents' );
add_action( 'wp_ajax_nopriv_getEvents', 'getEvents' );
//eventos
function getEvents(){
    $args = array(
        'post_type' => 'eventos',
        'posts_per_page' => 12,
        'meta_key' => 'created_at',
        'orderby' => 'meta_value',
        'order' => 'DESC'
    );

    $searchBymonth = (isset($_POST['month']) && $_POST['month'] != "") ? $_POST['month'] : "";

    $query = new WP_Query($args);
    $response = array();
    if($query->have_posts()){

        while($query->have_posts()) : $query->the_post();

        $start = get_post_meta(get_the_ID(),'created_at',true);
        //separar fecha en dia,mes,año
        $time = new DateTime($start);
        $mes = $time->format('M');
        $mesnum = $time->format('m');
        $dianum = $time->format('d');
        $anio = $time->format('Y');
        $dialetras = $time->format('l');
        $hora = $time->format('H:i');

        //validar que se muestren solo los del año en curso

        if($anio >= date('Y')){

            if($searchBymonth != "" && $searchBymonth == $mesnum){
                $registro = array();
                $registro['title'] = get_the_title();
                $registro['mes'] = $mes;
                $registro['link'] = get_the_permalink();
                $registro['dia'] = $dialetras;
                $registro['dianum'] = $dianum;
                $registro['hora'] = $hora;
                array_push($response,$registro);
            }

            if($searchBymonth == "" && $mesnum >= date('m')){
                $registro = array();
                $registro['title'] = get_the_title();
                $registro['mes'] = $mes;
                $registro['link'] = get_the_permalink();
                $registro['dia'] = $dialetras;
                $registro['dianum'] = $dianum;
                $registro['hora'] = $hora;
                array_push($response,$registro);
            }

        }

        endwhile;

    }else{
        $response = array();
    }

    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){
        echo json_encode($response);
        die();
    }else{
        return $response;
    }
}

function getFollowingEvent(){
    $args = array(
        'post_type' => 'eventos',
        'meta_key' => 'created_at',
        'orderby' => 'meta_value',
        'order' => 'DESC'
    );

    $query = new WP_Query($args);
    $response = array();
    if($query->have_posts()){
        while($query->have_posts()) : $query->the_post();

            $start = get_post_meta(get_the_ID(),'created_at',true);

            $time = new DateTime($start);
            $mes = $time->format('M');
            $mesnum = $time->format('m');
            $dianum = $time->format('d');
            $anio = $time->format('Y');
            $dialetras = $time->format('l');
            $hora = $time->format('H:i');

            //mostrar el evento mas cercano del mes actual

            if($mesnum == date('m')){
               $feat_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                if($feat_image == ""){
                    
                    $feat_image = wp_get_attachment_url(get_post_meta(get_the_ID(),'gallery',false)[0]);
                    if($feat_image == ""){
                        $feat_image = get_template_directory_uri().'/img/default.jpg';
                    }
                }

                $registro = array();
                $registro['fecha'] = $anio.'/'.$mesnum.'/'.$dianum;
                $registro['titulo'] = get_the_title();
                $registro['link'] = get_the_permalink();
                $registro['fecha_text'] = $mes.' '.$dianum.', '.$anio;
                $registro['id'] = get_the_ID();
                $registro['content'] = get_the_content();
                $registro['image'] = $feat_image;
                array_push($response,$registro);

            }
        endwhile;
    }

    //devuelve el evento más cercano a la fecha actual
    return $response[0];
}

function getEventDetails($event){
    $start = get_post_meta($event,'created_at',true);
    $location = get_post_meta($event,'location',true);

    $time = new DateTime($start);
    $mes = $time->format('M');
    $mesnum = $time->format('m');
    $dianum = $time->format('d');
    $anio = $time->format('Y');
    $anio2 = $time->format('y');
    $dialetras = $time->format('l');
    $hora = $time->format('H:i');

    $registro = array();
    $registro['fecha'] = $dialetras.' | '.$mes.' '.$dianum.', '.$anio;
    $registro['ubicacion'] = get_the_title($location);
    $registro['hora'] = $hora;
    $registro['dianum'] = $dianum;
    $registro['mesletra'] = $mes;
    $registro['aniodos'] = $anio2;
    $registro['coords'] = get_post_meta($location,'coords',true);

    return $registro;
}

//getNoticias
function getNoticias(){
    $args = array(
        'post_type' => 'post',
        'post_per_page' => -1,
        'category_name' => 'noticias-destacadas'
    );

    $query = new WP_Query($args);
    $response = array();
    if($query->have_posts()){
        while($query->have_posts()) : $query->the_post();

        $feat_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

        if($feat_image == ""){
            
            $feat_image = wp_get_attachment_url(get_post_meta(get_the_ID(),'gallery',false)[0]);
            if($feat_image == ""){
                $feat_image = get_template_directory_uri().'/img/default.jpg';
            }
        }

        $registro = array();
        $registro['titulo'] = get_the_title();
        $registro['link'] = get_the_permalink();
        $registro['image'] = $feat_image;
        $registro['fecha'] = get_the_date();
        array_push($response,$registro);

        endwhile;
    }

    //devuelve el evento más cercano a la fecha actual
    return $response;
}