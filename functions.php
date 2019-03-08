<?php 
/* Child Theme functions are called first, then parent theme functions. */

// On login screen, replaces WP logo with Georgia Southern logo
add_action("login_head", "custom_login_logo");

function custom_login_logo() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('http://cms.georgiasouthern.edu/~gsu/web_templates/CORE/images/wpthemes/wplogin-gsu-logo.png') no-repeat scroll center top transparent;
		height: 200px;
		width: 300px;
	}
	.login #backtoblog a {display:none;}
	</style>
	";
}

// Add Custom Header support
function custom_header_support() {
$args = array(
	'width'         => 500,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'custom_header_support' );

// Show featured image in feed - to aide parsing image for GSU Homepage
function featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'small', array( 'style' => 'float:left; margin:0 10px 10px 0;' ) );
            $content = $output . $content;
        }
    }
    return $content;
}
add_filter( 'the_content', 'featured_image_in_feed' );
add_filter( 'the_content_feed', 'featured_image_in_feed' );
add_filter( 'the_excerpt_rss', 'featured_image_in_feed' );

// remove version info from head and feeds
add_filter('the_generator', 'digwp_complete_version_removal');
function digwp_complete_version_removal() {
	return '';
}

// Register a Sidebar/Widgetized area for the Featured Story in the Header
add_action( 'widgets_init' , 'register_custom_sidebars' );

function register_custom_sidebars() {
register_sidebar(array(
  'name' => __( 'Featured Story in Header' ),
  'id' => 'right-sidebar',
  'description' => __( 'Use a text or image widget to add the Featured Story that will be displayed to the right of the magazine&#34;s masthead.' ),
  'before_widget' => '<div class="sidebar-widget %2$s">',
  'after_widget'  => '</div>',
  'before_title' => '<h3 class="featTitle">',
  'after_title' => '</h3>'
));
}
?>