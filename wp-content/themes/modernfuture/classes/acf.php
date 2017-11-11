<?php 
	
	class ACFHandler{
		public static function _init(){
			add_action('acf/init', 'ACFHandler::build_fields');
		}	
		public static function build_fields(){

			acf_add_options_page(array(
				/* (string) The title displayed on the options page. Required. */
				'page_title' => 'Options',
				
				/* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
				'menu_title' => '',
				
				/* (string) The slug name to refer to this menu by (should be unique for this menu). 
				Defaults to a url friendly version of menu_slug */
				'menu_slug' => 'mf-options',
				
				/* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
				Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
				'capability' => 'edit_posts',
				
				/* (int|string) The position in the menu order this menu should appear. 
				WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
				Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
				Defaults to bottom of utility menu items */
				'position' => false,
				
				/* (string) The slug of another WP admin page. if set, this will become a child page. */
				'parent_slug' => '',
				
				/* (string) The icon class for this menu. Defaults to default WordPress gear.
				Read more about dashicons here: https://developer.wordpress.org/resource/dashicons/ */
				'icon_url' => false,
				
				/* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists). 
				If set to false, this parent page will appear alongside any child pages. Defaults to true */
				'redirect' => true,
				
				/* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2'). 
				Defaults to 'options'. Added in v5.2.7 */
				'post_id' => 'options',
				
				/* (boolean)  Whether to load the option (values saved from this options page) when WordPress starts up. 
				Defaults to false. Added in v5.2.8. */
				'autoload' => false,
			));

			acf_add_local_field_group(array (
				'key' => 'group_59f654063f012',
				'title' => 'Videos',
				'fields' => array (
					array (
						'key' => 'field_56df59b9d0c00',
						'label' => 'URL',
						'name' => 'url',
						'type' => 'text',
						'instructions' => 'MUST BE A YOUTUBE URL eg: https://www.youtube.com/watch?v=U8pXf9idEQY',
					),
					array (
						'key' => 'field_56e08d882bf1f',
						'label' => 'Placeholder',
						'name' => 'placeholder',
						'type' => 'image',
						'instructions' => 'Must be a 1:1 width/height ratio',
						'preview_size' => 'thumbnail',
						'return_format' => 'url',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'mf_videos',
						),
					),
				),
			));

			acf_add_local_field_group(array(
				'key' => 'group_98ocvzhasdf',
				'title' => ' ',
				'fields' => array(
					array(
						'key' => 'field_ocinzcvnadhf',
						'label' => 'Bio', 
						'name' => 'bio',
						'type' => 'wysiwyg',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'mf-options',
						),
					),
				),
			));

			acf_add_local_field_group(array(
				'key' => 'group_08czovihzcvuigd',
				'title' => ' ',
				'fields' => array(
					array(
						'key' => 'field_89cohiadsuhf',
						'label' => 'Banner',
						'type' => 'image',
						'return_format' => 'url',
						'name' => 'banner',
					),
					array(
						'key' => 'field_98coivzhvydsf',
						'label' => 'Bio',
						'type' => 'wysiwyg',
						'name' => 'epk-bio',
					),
					array(
						'key' => 'field_iuochzvjadsf2',
						'label' => 'Press Quote Projects',
						'type' => 'repeater',
						'name' => 'epk-pqprojects',
						'instructions' => 'Each project will be expressed on the front-end in the order it appears here. Think of each project as an aggregation of selected text from press surrounding a particular release (album, single etc.).',
						'button_label' => 'Add New Press Quote Project', 
						'layout' => 'row',
						'sub_fields' => array(
							array(
								'key' => 'field_08covizhuas',
								'label' => 'Header',
								'type' => 'text',
								'name' => 'header',
							),
							array(
								'key' => 'field_co8vzhdsuaf',
								'label' => 'Subheader',
								'type' => 'textarea',
								'name' => 'subheader',
							),
							array(
								'key' => 'field_o8cyzvichxiasdf',
								'label' => 'Image',
								'type' => 'image',
								'name' => 'image',
								'return_format' => 'url',
								'preview_size' => 'thumbnail',
							),
							array(
								'key' => 'field_89coiuvzocnasd',
								'label' => 'Press Quotes',
								'type' => 'repeater',
								'name' => 'press-quotes',
								'button_label' => 'Add New Press Quote',
								'sub_fields' => array(
									array(
										'key' => 'field_09cuz8oihdsaf',
										'label' => 'Quote',
										'type' => 'textarea',
										'name' => 'quote',
										'instructions' => 'Do NOT surround in quotes!',
									),
									array(
										'key' => 'field_0c8ioczxvouhsadf',
										'label' => 'Publication',
										'type' => 'text',
										'name' => 'publication',
										'instructions' => 'Billboard, Spin, OkPlayer etc.',
									),
									array(
										'key' => 'field_c0ozihcvxoihsad',
										'label' => 'URL of Article',
										'type' => 'url',
										'name' => 'url'
									),
								),
								'layout' => 'row',
							),
						),
					),	
					array(
						'key' => 'field_c09vzohcsda',
						'label' => 'Press Links',
						'type' => 'repeater',
						'name' => 'epk-presslinks',
						'button_label' => 'Add New Press Link',
						'sub_fields' => array(
							array(
								'key' => 'field_zc0v9usdihdas',
								'type' => 'link',
								'label' => 'Press Link',
								'name' => 'link',
								'instructions' => 'Add the name of the article title and it\'s URL here',
							),
							array(
								'key' => 'field_8ioczvduhasdf',
								'label' => 'Background Image Override',
								'type' => 'image',
								'name' => 'bgimage',
								'return_format' => 'url',
								'instructions' => 'If left blank the URL entered in the link field will be parsed for an OpenGraph image tag and use the MF logo as a fallback. Adding an image to this field overrides this behavior.',
							),
						),
					),
					array(
						'key' => 'field_0ads9iohczvc',
						'label' => 'Music Links',
						'type' => 'repeater',
						'name' => 'epk-musiclinks',
						'button_label' => 'Add New Music Link',
						'sub_fields' => array(
							array(
								'key' => 'field_zc0xv9oihaswea',
								'type' => 'link',
								'label' => 'Music Link',
								'name' => 'link',
								'instructions' => 'Add the name of the song/service title and it\'s URL here',
							),
							array(
								'key' => 'field_98foahifdsdafsh',
								'label' => 'Background Image Override',
								'type' => 'image',
								'name' => 'bgimage',
								'return_format' => 'url',
								'instructions' => 'If left blank the URL entered in the link field will be parsed for an OpenGraph image tag and use the MF logo as a fallback. Adding an image to this field overrides this behavior.',
							),
						),
					),
					array(
						'key' => 'field_09vcuzihodufa',
						'label' => 'Video Links',
						'type' => 'repeater',
						'name' => 'epk-videolinks',
						'button_label' => 'Add New Video Link',
						'layout' => 'row',
						'sub_fields' => array(
							array(
								'key' => 'field_0cv9oidhfouhz',
								'type' => 'oembed',
								'label' => 'Video Link',
								'name' => 'link',
							),
						),
					),
					array(
						'key' => 'field_poizxcvh8a23asdf',
						'label' => 'Other Links',
						'type' => 'repeater',
						'name' => 'epk-otherlinks',
						'button_label' => 'Add New Other Link',
						'sub_fields' => array(
							array(
								'key' => 'field_cz0oisadhfandas',
								'type' => 'link',
								'label' => 'Link',
								'name' => 'link',
								'instructions' => 'Add the name of the link title and it\'s URL here',
							),
							array(
								'key' => 'field_adpoahf08hoiafdh',
								'label' => 'Background Image Override',
								'type' => 'image',
								'name' => 'bgimage',
								'return_format' => 'url',
								'instructions' => 'If left blank the URL entered in the link field will be parsed for an OpenGraph image tag and use the MF logo as a fallback. Adding an image to this field overrides this behavior.',
							),
						),
					),
					array(
						'key' => 'field_98vohizcuhasdf',
						'label' => 'Photos',
						'type' => 'gallery',
						'name' => 'epk-photos',
					),
					array(
						'key' => 'field_cvioznahfda',
						'label' => 'Logos Zip',
						'type' => 'file',
						'name' => 'epk-logos',
					),
					array(
						'key' => 'field_a80ehifoiasdfj',
						'label' => 'Album Artwork Zip',
						'type' => 'file',
						'name' => 'epk-albumartwork',
					),
					array(
						'key' => 'field_09czvhoidsaf',
						'label' => 'Contact Info',
						'type' => 'wysiwyg',
						'name' => 'epk-contactinfo',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'page',
						),
						array(
							'param' => 'page',
							'operator' => '==',
							'value' => 28,
						),
					),
				),
			));

		}
	}

	ACFHandler::_init();

?>