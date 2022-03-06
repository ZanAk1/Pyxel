<?php
	
	class Functions{
		public function __construct(){
			//Theme Setting
			$this -> theme_setup();
			//Adding Actions
			$this -> add_actions();
		}
	
	public function theme_setup(){

		//Default background Image
		$default_image = get_template_directory_uri().'/img/bg.png';
		add_theme_support('custom-background', array('default-image', $default_image));

		//Feed Links Support
		add_theme_support('automatic-feed-link');

		//Post-Thumbnails
		add_theme_support('post-thumbnails');
		add_image_size('homepage-thumbnails', 500, 220, true);

		//Support for Custom Header Image
		add_theme_support('custom-header');
	}


	/**
	*Adding different actions
	*/
	public function add_actions(){
		//Register sidebar
		add_action('widgets-init', array($this, 'register_sidebar'));

		//Page Title, include title within <title></title>
		add_filter('wp_title', array($this, 'page-title'));

		//Custom Excerpt Length
		add_filter('excerpt_length', array($this, 'excerpt_length'));
	}



	//Page Title
	public static function page_title ($title, $sep = ' -'){
		global $page, $paged;
		
		if(is_feed())
		return $title;

	$site_description = get_bloginfo('description');

	$filtered_title = $title .get_bloginfo('name');
	$filtered_title .= (! empty ($site_description) && (is_home() || is_front_page())) ? $sep . $site_description : '';
	$filtered_title .= (2 <= $paged || 2 <= $page) ? $sep . sprintf(__ ('Page %s', 'gazpo'), max ($paged, $page)) : '';

	return $filtered_title;
	}


	public static function the_author (){
	$link = get_author_posts_url( get_the_author_meta( 'ID'));
	echo '<a href=" '. $link .'">' .get_the_author() . '</a>';
}


//Content Excerpt
public static function excerpt_length ( $length) {

		//Default value . (hardcoded)
	return 30;
}

//Excerpt
//Write <?php echo get_excerpt(); in file to get excerpt 

public function get_excerpt(){
	$excerpt = get_the_content();
  $excerpt = substr( $excerpt, 0, 70); //Only display 50 characters of excerpt
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'... <div class="readbtn"><a href="'.get_the_permalink().'" class="btn btn-primary">Read More</a></div>';
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = preg_replace(" ([.*?])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  return $excerpt;
}
}

//Enqueue ACF here
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-settings',
		'icon_url' => 'dashicons-admin-generic',
		'position' => '25'
		),
	acf_add_options_page(array(
		'page_title' => 'Page Settings',
		'menu_title' => 'Page Settings',
		'menu_slug' => 'page-settings',
		'icon_url' => 'dashicons-edit-page',
		'position' => '26'
		))

);

}
