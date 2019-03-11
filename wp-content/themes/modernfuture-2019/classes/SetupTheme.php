<?php 

class SetupTheme{
	public static function _init(){
		show_admin_bar( false );
		add_action( 'after_setup_theme', 'SetupTheme::after_setup_theme' );
		add_action( 'wp_enqueue_scripts', 'SetupTheme::wp_enqueue_scripts' );
		add_action( 'init', 'SetupTheme::init' );
		add_action( 'admin_init', 'SetupTheme::remove_epk_page_supports' );
	}
	public static function remove_epk_page_supports() {
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
	public static function init(){
		SetupTheme::clean_head();
		register_nav_menu( 'main-nav', 'Main Navigation' );
	}
	public static function after_setup_theme(){
		add_theme_support( 'html5' );
		add_theme_support( 'post-thumbnails' );	
	}
	public static function wp_enqueue_scripts(){
		SetupTheme::register_styles();
		SetupTheme::enqueue_styles();
		SetupTheme::register_javascript();
		SetupTheme::enqueue_javascript();	
	}
	private static function clean_head(){
		// removes generator tag
		remove_action( 'wp_head' , 'wp_generator' );
		// removes dns pre-fetch
		remove_action( 'wp_head', 'wp_resource_hints', 2 );
		// removes weblog client link
		remove_action( 'wp_head', 'rsd_link' );
		// removes windows live writer manifest link
		remove_action( 'wp_head', 'wlwmanifest_link');	
	}
	private static function enqueue_javascript(){
		wp_enqueue_script( 'theme' );
	}
	private static function enqueue_styles(){
		wp_enqueue_style( 'theme' );
	}

	private static function register_javascript(){
		wp_register_script( 'theme', get_template_directory_uri() . '/build/js/build.js', null, false, true );
	}

	private static function register_styles(){
		wp_register_style( 'theme', get_template_directory_uri() . '/build/css/build.css' );
	}
}

SetupTheme::_init();

?>