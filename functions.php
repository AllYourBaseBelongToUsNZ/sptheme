<?php
function bootstap_style(){
  
  wp_enqueue_style('bootstrap_css',get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('custom_styles',get_template_directory_uri() . '/style.css');
  //wp_enqueue_style('font_styles',get_template_directory_uri() . '/styles/fonts.css');
}
	add_action(wp_enqueue_scripts,'bootstap_style');

function enqueue_js() {
	
	global $wp_scripts;
	
	wp_register_script('html5_shiv','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js','','',false);
	
	wp_register_script('respond_js','https://oss.maxcdn.com/respond/1.4.2/respond.min.js','','',false);
	//only use these scripts in older versions of I.E
	$wp_scripts->add_data('html5_shiv','conditional','lt IE 9');
	$wp_scripts->add_data('respond_js','conditional','lt IE 9');
	
	wp_enqueue_script('js_files',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'',true);wp_enqueue_script('js_theme',get_template_directory_uri().'/js/theme.js',array('jquery','js_files'),'',true);
	
}

	add_action('wp_enqueue_scripts','enqueue_js');
	//hide the wp admin bar
	add_filter('show_admin_bar','__return_false');
	
	//allow custom theme menu's
	add_theme_support('menus');
	add_theme_support('post-thumbnails');

	function register_menus(){	
		register_nav_menus(
			array(
			'header-menu' =>_('Header Menu')
			)
		);
	}
	
	add_action('init','register_menus');
	
	function create_widget($name,$id,$description){
	
		register_sidebar(array(
		'name' => __($name),
		'id' => $id,
		'description' =>__($description),
		'before_widget'=> '<div class="widget">',
		'after_widget'=> '</div>',
		'before_title'=> '<h3>',
		'after_title' => '</h3>'
		
	));
	
 }
 
	create_widget('Front Page Left', 'front-left','Display on the left of the homepage');
	create_widget('Front Page Centre', 'front-centre','Display on the left of the homepage');
	create_widget('Front Page Right', 'front-right','Display on the left of the homepage');
	create_widget('Page Sidebar', 'page','Display on the sidebar on the sidebar page');
	create_widget('Blog Sidebar', 'blog','Display on the sidebar on the blog page');
  
      function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Oswald');
            wp_enqueue_style( 'googleFonts');
        }
    
    add_action('wp_print_styles', 'load_fonts');
	
?>