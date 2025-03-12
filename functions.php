<?php
/**
 * Theme functions and definitions
 */

// Theme setup
function aj_square_setup() {
    // Add support for various theme features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'aj-square'),
    ));

    // Register widget area (sidebar)
    register_sidebar(array(
        'name' => __('Main Sidebar', 'aj-square'),
        'id' => 'main-sidebar',
        'description' => __('Widgets added here will appear in the main sidebar.', 'aj-square'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('after_setup_theme', 'aj_square_setup');


// Enqueue scripts and styles
function aj_square_scripts() {
    // Enqueue styles
    wp_enqueue_style('aj-square-style', get_stylesheet_uri());
    wp_enqueue_style('aj-square-custom', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
    wp_enqueue_style('aj-square-custom-css', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0');
    // Enqueue the latest version of Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', array(), '4.6.2');

    // Enqueue Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css', array(), '1.5.0');

    // Enqueue custom styles
    wp_enqueue_style('aj-portfolio-style', get_stylesheet_uri());
    wp_enqueue_style('aj-portfolio-animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0.0');
    wp_enqueue_style('aj-portfolio-custom', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');

    // Deregister the default jQuery included with WordPress
    wp_deregister_script('jquery');
    
    // Enqueue jQuery from Google CDN
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', true);

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '4.6.2', true);

    // Enqueue custom script
    wp_enqueue_script('aj-portfolio-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.1.0', true);

    // Enqueue GeminiAI script and localize
    if (is_page_template('page-generative-ai.php')) {
        wp_enqueue_script('chatbot-script', get_template_directory_uri() . 'assets/js/chatbot.js', array(), null, true);
    }

}
add_action('wp_enqueue_scripts', 'aj_square_scripts');


// Elementor compatibility
function aj_square_elementor_support() {
    // Add theme support for Elementor
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'aj_square_elementor_support');

// Define content width for Elementor compatibility
if (!isset($content_width)) {
    $content_width = 1140; // Change to the maximum width of your content
}

// Excerpt Function
function excerpt($num) {
    global $post; // Add global $post to access the global post object

    $limit = $num + 1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . " <a href='" . get_permalink($post->ID) . "' class='readmore'>Read More &raquo;</a>"; // Corrected class attribute usage

    echo $excerpt;
}

/*Show Time and Read Time*/
// Function to calculate reading time
function get_reading_time($post_id) {
    $content = get_post_field('post_content', $post_id); // Get post content
    $word_count = str_word_count(strip_tags($content)); // Count words
    $reading_time = ceil($word_count / 200); // Assuming an average reading speed of 200 words per minute

    return $reading_time;
}

// Function to display time ago in a readable format
function time_ago($post_id) {
    $post_time = get_post_time('U', true, $post_id); // Get the post time in Unix timestamp
    $time_difference = time() - $post_time;

    if ($time_difference < 1) {
        return 'Just now';
    }

    $time_units = array(
        12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60      => 'month',
        7 * 24 * 60 * 60       => 'week',
        24 * 60 * 60           => 'day',
        60 * 60                => 'hour',
        60                     => 'minute',
        1                      => 'second'
    );

    foreach ($time_units as $unit => $unit_name) {
        if ($time_difference < $unit) continue;
        $number_of_units = floor($time_difference / $unit);
        return $number_of_units . ' ' . $unit_name . (($number_of_units > 1) ? 's' : '') . ' ago';
    }
}

// Theme setup function (optional but recommended)

/* Custom Pagination */
function pagination($pages = '', $range = 4){ 
    $showitems = ($range * 2)+1;        
	global $paged;     
	if(empty($paged)) $paged = 1;      
	if($pages == ''){         
		global $wp_query;         
		$pages = $wp_query->max_num_pages;         
		if(!$pages){$pages = 1;}
	}
	if(1 != $pages){
		echo "<div class=\"pagination\"><span>Page No- ".$paged." of ".$pages."</span>";
		
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
		
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";             
				}
		} 
		if ($paged < $pages && $showitems < $pages) 
			echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next Page &rsaquo;</a>";           if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last Page &raquo;</a>";
		echo "</div>\n";
	}}

/*-----------------------------------------------------------------------------------------
                                Custom Nav Widget
-----------------------------------------------------------------------------------------*/
function register_header_widget_area() {
    register_sidebar(array(
        'name'          => __('Header Widget Area', 'text_domain'),
        'id'            => 'header-widget-area',
        'before_widget' => '<div class="custom-header-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'register_header_widget_area');


// Register Upper Footer Widget Area
function aj_square_register_upper_footer() {
    register_sidebar(array(
        'name'          => __('Upper Footer', 'aj-square'),
        'id'            => 'upper-footer',
        'before_widget' => '<div class="upper-footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'aj_square_register_upper_footer');

// Register an Upper Footer Theme Location
function aj_square_register_upper_footer_location() {
    register_nav_menus(array(
        'upper-footer' => __('Upper Footer', 'aj-square')
    ));
}
add_action('after_setup_theme', 'aj_square_register_upper_footer_location');
