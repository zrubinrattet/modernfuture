<?php 


// configure style/script registration/enqueing, menu registration, after_setup_theme filter
show_admin_bar( false );

add_action( 'after_setup_theme', function(){
	add_theme_support( 'html5' );
	add_theme_support( 'post-thumbnails' );
});

add_action( 'init', function(){
	register_nav_menu( 'main-nav', 'Main Navigation');
});

add_action( 'wp_enqueue_scripts', function(){
	register_styles();
	enqueue_styles();
	register_javascript();
	enqueue_javascript();
	localize_theme_directory();		
});

function enqueue_javascript(){
	wp_enqueue_script( 'fancyboxjs' );
	wp_enqueue_script( 'moment' );
	wp_enqueue_script( 'slimscroll' );
	wp_enqueue_script( 'fullpage' );
	wp_enqueue_script( 'theme' );
}
function enqueue_styles(){
	wp_enqueue_style( 'fancyboxcss' );
	wp_enqueue_style( 'fullpage' );
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'theme' );
}

function register_javascript(){
	$js_dir = get_template_directory_uri() . '/build/js';
	wp_register_script( 'theme', $js_dir . '/build.js', array('jquery', 'masonry'));
	wp_register_script( 'slimscroll', $js_dir . '/jquery.slimscroll.min.js', array('jquery'));
	wp_register_script( 'fullpage', $js_dir . '/jquery.fullPage.min.js', array('jquery'));
	wp_register_script( 'moment', '//cdn.rawgit.com/moment/moment/develop/min/moment.min.js');
	wp_register_script( 'fancyboxjs', '//rawgit.com/fancyapps/fancybox/master/dist/jquery.fancybox.js', array('jquery'));
}

function register_styles(){
	$styles_dir = get_template_directory_uri() . '/build/css';
	wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
	wp_register_style( 'theme', $styles_dir . '/build.css' );
	wp_register_style( 'fullpage', 'https://cdn.rawgit.com/alvarotrigo/fullPage.js/master/jquery.fullPage.css');
	wp_register_style( 'fancyboxcss', '//cdn.rawgit.com/fancyapps/fancyBox/master/dist/jquery.fancybox.css');
}

// make theme directory available to javascript
function localize_theme_directory(){
	$site_parameters = array(
		'theme_directory' => get_template_directory_uri()
		);
	wp_localize_script( 'theme', 'SiteParameters', $site_parameters );
}

// require classes
require('classes/instagram.php');
require('classes/youtubevideo.php');
require('classes/acf.php');
require('classes/opengraph.php');

// build theme
function render_genlinks($slug, $title, $post){
	if( have_rows($slug, $post->ID) ): ?>
		<section class="epk-genlinks">
			<h1 class="epk-genlinks-header fade fade-up"><?php echo $title ?></h1>
			<div class="epk-genlinks-grid">
				<?php while( have_rows($slug, $post->ID) ): the_row(); ?>
					<div class="epk-genlinks-grid-item fade fade-up">
						<?php 
						if( !empty(get_sub_field('link')) ): 
							$link = get_sub_field('link')['url'];
							$image;
							if( empty( get_sub_field('bgimage') ) ){
								$graph = OpenGraph::fetch($link);
								$image = !empty($graph->image) ? $graph->image : get_template_directory_uri() . '/library/img/logotext-white.png';
							}
							else{
								$image = get_sub_field('bgimage');
							}
						?>
							<a target="_blank" href="<?php echo get_sub_field('link')['url'] ?>" class="epk-genlinks-grid-item-link" style="background-image: url('<?php echo $image ?>');">
								<div class="epk-genlinks-grid-item-link-title">
									<?php echo get_sub_field('link')['title'] ?>
								</div>
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; 
}

function init_handler(){
	// add Video CPT
	register_post_type('mf_videos', array(
		'labels' => array(
			'name' => 'Videos',
			'singular_name' => 'Video',
			'menu_name' => 'Videos',
			'add_new' => 'Add Video',
			'add_new_item' => 'Add New Video',
			'edit_item' => 'Edit Video',
			'new_item' => 'New Video',
			'view_item' => 'View Video',
			'search_items' => 'Search Videos',
		),
		'menu_icon' => 'dashicons-video-alt3',
		'public' => true,
		'rewrite' => array(
			'slug' => 'videos',
		),
		'menu_position' => 5,
		'supports' => array('title'),
	));
}


add_action('init', 'init_handler');


function remove_epk_page_supports() {

	$post_id;
	
	if( isset($_GET['post']) ){
		$post_id = $_GET['post'];
	}
	else{
		if( isset($_POST['post_ID']) ){
			$post_id = $_POST['post_ID'];
		}
	}
	
	if( empty( $post_id ) ) return;

	$homepgname = get_the_title($post_id);

	if($homepgname == 'EPK'){ 
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'page-attributes');
		remove_post_type_support('page', 'thumbnail');
	}

}

add_action( 'admin_init', 'remove_epk_page_supports' );
?>