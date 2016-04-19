<?php
/**
 * DT Next wordpress theme
 *
 * @package Wordpress
 * @subpackage Base
 * @since  Base v1.0
 *
 *
 * DT Next theme works in WordPress 4.0+ or later.
 */


// Register Theme Features
function dtnext()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

  // Add theme support for document Title tag
  add_theme_support( 'title-tag' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

  //custom post-thumbnail for base
	if ( function_exists( 'add_theme_support' ) ) {
    	set_post_thumbnail_size( 250, 250, true ); // default Post Thumbnail dimensions (cropped)
	    // additional image sizes
	    // delete the next line if you do not need additional image sizes
	    //add_image_size( 'category-thumb', 334, 214 );
	}

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

  // Remove admin menu bar
	add_filter('show_admin_bar', '__return_false');

}
add_action( 'after_setup_theme', 'dtnext' );


/**
 * Enqueue scripts and styles.
 */
function base_scripts() {
	// font-family: 'Lora', serif;
 // font-family: 'Nunito', sans-serif;
		wp_enqueue_style( 'font-lora', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' );
		wp_enqueue_style( 'font-nunito', '//fonts.googleapis.com/css?family=Nunito:400,700,300' );

	//base css
		wp_enqueue_style( 'base-style', get_stylesheet_uri() );

	// Load the html5 shiv.
		wp_enqueue_script( 'base-html5', get_template_directory_uri() . '/js/html5.js');
		wp_script_add_data( 'base-html5', 'conditional', 'lt IE 9' );

	//jquery
		wp_enqueue_script( 'base-jquery', get_template_directory_uri() . '/js/jquery2.js', true );

	//matchHeight
		wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', true );

	//less
		//wp_enqueue_script( 'less', get_template_directory_uri() . '/js/less.js', true );

	//functions
		wp_enqueue_script( 'base-functions', get_template_directory_uri() . '/js/functions.js', true );

	// //comment
	// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 		wp_enqueue_script( 'comment-reply' );
	// 	}

}
add_action( 'wp_enqueue_scripts', 'base_scripts' );


/** START - ADD LESS TO WORDPRESS - http://eckstein.id.au  **/
add_action( 'wp_head' , 'itsb_lesscss' );
function itsb_lesscss() {
?>
     <link rel="stylesheet/less" type="text/css" href="<?php echo bloginfo('url'); ?>/wp-content/themes/dtnext/css/style.less">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.3.0/less-1.3.0.min.js" type="text/javascript"></script>
<?php
}
/** END - ADD LESS TO WORDPRESS  **/

/**
 * Widget
 */
	function base_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar_name', 'base' ),
			'id'            => 'sidebar_id',
			'description'   => __( 'sidebar_description', 'base' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',

		) );

	}
	add_action( 'widgets_init', 'base_widgets_init' );

/**
 * Menu
 */
// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'base' ),
		'footer' => __( 'Footer Menu', 'base' ),
		'social'  => __( 'Social Links Menu', 'base' ),
	) );

// Register Custom Post Type
	require get_template_directory() . '/inc/custom-post.php';

// Register Custom Post Type for Portfolio Page
	// require get_template_directory() . '/inc/meta-box.php';

/**
 * Sticky Post
 */
  //Display just the first sticky post, if none return the last post published:
  	$args = array(
  		'posts_per_page' => 1,
  		'post__in'  => get_option( 'sticky_posts' ),
  		'ignore_sticky_posts' => 1
  	);
  	$query = new WP_Query( $args );

/**
 * SVG
 */
	//svg upload in media
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
	}

//for all expcerpt
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function disable_wp_emojicons() {
   // all actions related to emojis
   remove_action( 'admin_print_styles', 'print_emoji_styles' );
   remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
   remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
   remove_action( 'wp_print_styles', 'print_emoji_styles' );
   remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
   remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
   remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
   // filter to remove TinyMCE emojis
   add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
 }
 add_action( 'init', 'disable_wp_emojicons' );
 function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
/* Minifies HTML */
/* (source: http://www.intert3chmedia.net/2011/12/minify-html-javascript-css-without.html) */
class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = false;
	protected $info_comment = true;
	protected $remove_comments = true;
	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);
		$savings = ($raw-$compressed) / $raw * 100;
		$savings = round($savings, 2);
		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			$content = $token[0];
			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;
					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;
						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}
			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}
			$html .= $content;
		}
		return $html;
	}
	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);
		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}
	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}
		return $str;
	}
}
function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}
function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
// remove update notifications for everybody except admin users
       global $user_login;
       get_currentuserinfo();
       if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
        add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
        add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
       }


			 /* Hide WP version strings from scripts and styles
			  * @return {string} $src
			  * @filter script_loader_src
			  * @filter style_loader_src
			  */
			 function fjarrett_remove_wp_version_strings( $src ) {
			      global $wp_version;
			      parse_str(parse_url($src, PHP_URL_QUERY), $query);
			      if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
			           $src = remove_query_arg('ver', $src);
			      }
			      return $src;
			 }
			 add_filter( 'script_loader_src', 'fjarrett_remove_wp_version_strings' );
			 add_filter( 'style_loader_src', 'fjarrett_remove_wp_version_strings' );
			 /* Hide WP version strings from generator meta tag */
			 function wpmudev_remove_version() {
			 return '';
			 }
			 add_filter('the_generator', 'wpmudev_remove_version');
			 // Adapted from https://gist.github.com/toscho/1584783
			 add_filter( 'clean_url', function( $url )
			 {
			     if ( FALSE === strpos( $url, '.js' ) )
			     { // not our file
			         return $url;
			     }
			     // Must be a ', not "!
			     return "$url' async='async";
			 }, 11, 1 );



?>
