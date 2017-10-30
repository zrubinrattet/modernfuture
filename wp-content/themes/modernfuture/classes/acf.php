<?php 
	
	class ACFHandler{
		public static function _init(){
			add_action('acf/init', 'ACFHandler::build_fields');
		}	
		public static function build_fields(){

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
						'layout' => 'row',
						'sub_fields' => array(
							array(
								'key' => 'field_zc0v9usdihdas',
								'type' => 'link',
								'label' => 'Press Link',
								'name' => 'link',
								'instructions' => 'Add the name of the article title and it\'s URL here',
							),
						),
					),
					array(
						'key' => 'field_0ads9iohczvc',
						'label' => 'Music Links',
						'type' => 'repeater',
						'name' => 'epk-musiclinks',
						'button_label' => 'Add New Music Link',
						'layout' => 'row',
						'sub_fields' => array(
							array(
								'key' => 'field_zc0xv9oihaswea',
								'type' => 'link',
								'label' => 'Music Link',
								'name' => 'link',
								'instructions' => 'Add the name of the song/service title and it\'s URL here',
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
						'layout' => 'row',
						'sub_fields' => array(
							array(
								'key' => 'field_cz0oisadhfandas',
								'type' => 'link',
								'label' => 'Link',
								'name' => 'link',
								'instructions' => 'Add the name of the link title and it\'s URL here',
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