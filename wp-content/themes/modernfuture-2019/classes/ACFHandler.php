<?php
	class ACFHandler{
		public static function init(){
			add_action( 'acf/init', 'ACFHandler::options_page' );
			add_action( 'acf/init', 'ACFHandler::register_fields' );
		}
		public static function options_page(){
			acf_add_options_page(array(
				'page_title' 	=> 'Home Page Settings',
				'menu_title' 	=> 'Home Page Settings',
				'menu_slug' 	=> 'home-page-settings',
				'capability' 	=> 'edit_posts',
				'redirect' 	=> false
			));
		}
		public static function register_fields(){
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
							'value' => get_page_by_path( 'epk', OBJECT, 'page' )->ID,
						),
					),
				),
			));

			acf_add_local_field_group(array(
				'key' => 'group_front_page',
				'title' => '&nbsp;',
				'fields' => array(
					array(
						'key' => 'field_front_page_promoted',
						'label' => 'Promoted Content',
						'name' => 'front_page_promoted',
						'type' => 'repeater',
						'layout' => 'block',
						'button_label' => 'Add Promoted Content',
						'sub_fields' => array(
							array(
								'key' => 'field_front_page_promoted_image',
								'label' => 'Image',
								'name' => 'front_page_promoted_image',
								'type' => 'image',
								'return_format' => 'id',
								'required' => 1,
							),
							array(
								'key' => 'field_front_page_promoted_supertitle',
								'label' => 'Super Title',
								'name' => 'front_page_promoted_supertitle',
								'type' => 'text',
							),
							array(
								'key' => 'field_front_page_promoted_title',
								'label' => 'Title',
								'name' => 'front_page_promoted_title',
								'type' => 'text',
							),
							array(
								'key' => 'field_front_page_promoted_description',
								'label' => 'Description',
								'name' => 'front_page_promoted_description',
								'type' => 'textarea',
								'instructions' => 'KEEP IT BRIEF!!! (250 chars)',
								'new_lines' => 'br',
							),
							array(
								'key' => 'field_front_page_promoted_links',
								'label' => 'Links',
								'name' => 'front_page_promoted_links',
								'type' => 'repeater',
								'button_label' => 'Add Link',
								'sub_fields' => array(
									array(
										'key' => 'field_front_page_promoted_links_link',
										'label' => 'Link',
										'name' => 'front_page_promoted_links_link',
										'type' => 'link',
										'required' => 1,
									),
									array(
										'key' => 'field_front_page_promoted_links_icon',
										'label' => 'Icon (optional)',
										'name' => 'front_page_promoted_links_icon',
										'type' => 'select',
										'ui' => 1,
										'choices' => ACFHandler::get_content_for_icons_select(),
									),
								),
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'home-page-settings',
						),
					),
				),
			));
		}
		public static function get_content_for_icons_select(){
			$icon_slugs = array(
				'-',
				'500px',
				'amazon',
				'adn',
				'android',
				'angellist',
				'apple',
				'bandcamp',
				'behance',
				'behance-square',
				'bitbucket',
				'bitbucket-square',
				'bitcoin',
				'black-tie',
				'bluetooth',
				'bluetooth-b',
				'btc',
				'buysellads',
				'cc-amex',
				'cc-diners-club',
				'cc-mastercard',
				'cc-paypal',
				'cc-stripe',
				'cc-visa',
				'chrome',
				'codepen',
				'codiepie',
				'connectdevelop',
				'contao',
				'css3',
				'dashcube',
				'delicious',
				'deviantart',
				'digg',
				'dribbble',
				'dropbox',
				'drupal',
				'edge',
				'eercast',
				'empire',
				'envira',
				'etsy',
				'expeditedssl',
				'fa',
				'facebook',
				'facebook-f',
				'facebook-official',
				'facebook-square',
				'firefox',
				'first-order',
				'flickr',
				'fonticons',
				'font-awesome',
				'fort-awesome',
				'forumbee',
				'foursquare',
				'free-code-camp',
				'ge',
				'get-pocket',
				'gg',
				'gg-circle',
				'git',
				'git-square',
				'github',
				'github-alt',
				'github-square',
				'gitlab',
				'gittip',
				'glide',
				'glide-g',
				'google',
				'google-plus',
				'google-plus-circle',
				'google-plus-official',
				'google-plus-square',
				'google-wallet',
				'gratipay',
				'grav',
				'hacker-news',
				'houzz',
				'html5',
				'imdb',
				'instagram',
				'internet-explorer',
				'ioxhost',
				'joomla',
				'jsfiddle',
				'lastfm',
				'lastfm-square',
				'leanpub',
				'linkedin',
				'linkedin-square',
				'linode',
				'linux',
				'maxcdn',
				'meanpath',
				'medium',
				'meetup',
				'mixcloud',
				'modx',
				'odnoklassniki',
				'odnoklassniki-square',
				'opencart',
				'openid',
				'opera',
				'optin-monster',
				'pagelines',
				'paypal',
				'pied-piper',
				'pied-piper-alt',
				'pinterest',
				'pinterest-p',
				'pinterest-square',
				'product-hunt',
				'qq',
				'quora',
				'ra',
				'ravelry',
				'rebel',
				'reddit',
				'reddit-alien',
				'reddit-square',
				'renren',
				'safari',
				'scribd',
				'sellsy',
				'share-alt',
				'share-alt-square',
				'shirtsinbulk',
				'snapchat',
				'snapchat-square',
				'simplybuilt',
				'skyatlas',
				'skype',
				'slack',
				'slideshare',
				'soundcloud',
				'spotify',
				'stack-exchange',
				'stack-overflow',
				'steam',
				'steam-square',
				'stumbleupon',
				'stumbleupon-circle',
				'superpowers',
				'telegram',
				'tencent-weibo',
				'themeisle',
				'trello',
				'tripadvisor',
				'tumblr',
				'tumblr-square',
				'twitch',
				'twitter',
				'twitter-square',
				'usb',
				'viacoin',
				'viadeo',
				'viadeo-square',
				'vimeo',
				'vimeo-square',
				'vine',
				'vk',
				'wechat',
				'weibo',
				'weixin',
				'whatsapp',
				'wikipedia-w',
				'windows',
				'wordpress',
				'wpbeginner',
				'wpexplorer',
				'wpforms',
				'xing',
				'xing-square',
				'y-combinator',
				'yahoo',
				'yelp',
				'yc',
				'yoast',
				'youtube',
				'youtube-play',
				'youtube-square',
			);

			$return = array();

			foreach( $icon_slugs as $icon_slug ){
				$return[$icon_slug] = ucwords(str_replace('-', ' ', $icon_slug));
			}

			return $return;
		}
	}

	ACFHandler::init();
?>