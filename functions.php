<?php

require_once get_template_directory() . '/inc/class-scripts.php';
require_once get_template_directory() . '/inc/class-menus.php';
require_once get_template_directory() . '/inc/class-gutenberg-setup.php';
require_once get_template_directory() . '/inc/class-gutenberg-helpers.php';
require_once get_template_directory() . '/inc/class-theme-styles.php';

$scripts = new RWD\Scripts();
$menus = new RWD\Menus();
$gutenbergSetup = new RWD\GutenbergSetup();

/* Blocks
=============================================*/

foreach (glob(get_template_directory() . '/inc/blocks/*.php') as $file) {
    require_once $file;
}

/* Ajax Forms
=============================================*/

require_once get_stylesheet_directory() . '/classes/ajax-forms/class-base-form-handler.php';
require_once get_stylesheet_directory() . '/classes/ajax-forms/class-form-book-a-call.php';

new \RWD\AjaxForms\BookACallFormHandler();

/* CPTs
=============================================*/

require_once get_stylesheet_directory() . '/classes/cpts/class-cpt-services.php';

/* Other Functions
=============================================*/

function dd($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die();
}

function getMeta($name, $image = false)
{
    if($image) {
        return wp_get_attachment_image($name);
    }

    return get_post_meta(get_the_ID(), $name, true);
}

add_theme_support( 'post-thumbnails' );

function getCats($postId)
{
    $cats = get_the_category($postId);
    $arr = [];
    foreach ($cats as $cat) {
        $arr[] = $cat->name;
    }
    return $arr;
}

function getCatID($postId)
{
    $cat = get_the_category($postId);
    if(count($cat) > 0) {
        return $cat[0]->term_id;
    }
    return '';
}

function getCatName($postId)
{
    $cat = get_the_category($postId);
    if(count($cat) > 0) {
        return $cat[0]->name;
    }
    return '';
}

function getSkills($postId)
{
    $cats = get_the_terms( get_the_ID(), 'skill' );
    $arr = [];

    if($cats) {
        foreach ($cats as $cat) {
            $arr[] = $cat->name;
        }
    }

    return $arr;
}

function get_related_posts($postID, $limit)
{
    return get_posts(array(
        'limit' => $limit,
        'post__not_in' => array( $postID ),
        'category' => getCatID($postID)
    ));
}

function rwd_enable_widgets() {

    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id'   => 'sidebar',
            'description'   => 'Here you can add widgets to the main sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 id="widget-heading">',
            'after_title'   => '</h5>'
    ));

}

add_action('widgets_init','rwd_enable_widgets');

function wp_pagination() {
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	) );
}

function createBreadcrumbs($links) {
  $breadcrumbHTML = '';

  foreach ($links as $link) {
    // If it's the last link, don't make it a link
    if (next($links)) {
      $breadcrumbHTML .= '<a href="' . $link['href'] . '" class="rwd-breadcrumb-link">' . $link['text'] . '</a>';
      $breadcrumbHTML .= '<span class="rwd-breadcrumb-arrow">&#8250;</span>';
    } else {
      $breadcrumbHTML .= '<span class="rwd-breadcrumb-link">' . $link['text'] . '</span>';
    }
    
  }

  return '<nav class="rwd-breadcrumb">' . $breadcrumbHTML . '</nav>';
}

add_filter('the_content', 'wpautop');
add_filter('the_excerpt', 'wpautop');

include('classes/RwdTheme.php');
$rwdTheme = new RwdTheme();

function rwd_allow_svg_uploads($mime_types) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'rwd_allow_svg_uploads');

?>
