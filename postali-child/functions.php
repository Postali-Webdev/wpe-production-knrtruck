<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
	require_once dirname( __FILE__ ) . '/includes/reviews-cpt.php'; // Custom Post Type Testimonials
    //require_once dirname( __FILE__ ) . '/includes/media-mentions-cpt.php'; // Custom Post Type Media Mentions
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
	//require_once dirname( __FILE__ ) . '/includes/social-share.php'; // Social Media Sharing


	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
		wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
		
		wp_register_style( 'google-fonts-heebo', 'https://fonts.googleapis.com/css2?family=Heebo:wght@400;700;900&display=swap', array() );
		wp_enqueue_style('google-fonts-heebo');

        wp_register_style( 'google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap', array() );
		wp_enqueue_style('google-fonts-roboto');

        wp_register_style( 'google-fonts-libre', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap', array() );
		wp_enqueue_style('google-fonts-libre');

        wp_register_style( 'icomoon', 'https://cdn.icomoon.io/152819/KNRTruck/style.css?l21ici', array() );
		wp_enqueue_style('icomoon');
        
		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-scripts');
		
		wp_register_script('slick-slider', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-slider');

		wp_register_script('slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-custom');

		// lightbox script
		wp_register_script('lightbox-scripts', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery'), null, true); 
		wp_enqueue_script('lightbox-scripts');
        

		// ajax script
		if ( is_archive(['post-type-archive-attorneys']) ) {
			// wp_register_script('ajax-scripts', get_stylesheet_directory_uri() . '/assets/js/ajax-scripts.min.js',array('jquery'), null, true); 
			// wp_enqueue_script('ajax-scripts');

			wp_register_script( 'ajax-script', get_stylesheet_directory_uri() . '/assets/js/ajax-scripts.min.js', array('jquery') );
			wp_localize_script( 'ajax-script', 'ajax_filter_attorneys', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
			wp_enqueue_script( 'ajax-script' );
		}

		if ( is_page_template( 'front-page.php' ) ) {

            // Home Page Javascript
            wp_register_script('scrollCue', get_stylesheet_directory_uri() . '/assets/js/scrollCue.min.js', array('jquery'));
            wp_enqueue_script('scrollCue');	
            wp_register_style( 'scrollCue', get_stylesheet_directory_uri() . '/assets/css/scrollCue.css', array() );
		    wp_enqueue_style('scrollCue');	

            wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.min.js', array('jquery'));
            wp_enqueue_script('home-js');	

		}

        if ( is_page_template( 'page-pa-parent.php' ) ) {

            // Home Page Javascript
            wp_register_script('practice-parent', get_stylesheet_directory_uri() . '/assets/js/practice-parent.min.js', array('jquery'));
            wp_enqueue_script('practice-parent');		

		}

		// These scripts should be conditionally enqueued only on page templates where they are needed

		// Smooth Scroll
		// wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
		// wp_enqueue_script('smooth-scroll');
		// wp_register_script('smooth-scroll-settings', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-settings.min.js', array('jquery'));
		// wp_enqueue_script('smooth-scroll-settings');

        // Fitvids
        //wp_register_script('fitvids', get_stylesheet_directory_uri() . '/assets/js/fitvids.min.js',array('jquery'), null, true); 
		//wp_enqueue_script('fitvids');

		// Featherlight JS Call 
		// wp_register_script('featherlight-js', get_stylesheet_directory_uri() . '/assets/js/featherlight.min.js', array('jquery'));
		// wp_enqueue_script('featherlight-js');

	}

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
				'footer-nav' => __( 'Footer Navigation', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Global Settings',
			'menu_title'    => 'Global Settings',
			'menu_slug'     => 'global-settings',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-site', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Awards',
			'menu_title'    => 'Awards',
			'menu_slug'     => 'awards',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

        acf_add_options_page(array(
			'page_title'    => 'Global Schema',
			'menu_title'    => 'Global Schema',
			'menu_slug'     => 'global_schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));

	}

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	// Add Search Bar to Top Nav
	function mainmenu_navsearch($items, $args) {
		if ($args->theme_location == 'header-nav') {
			ob_start();
			?>
			<li class="menu-item menu-item-search search-holder">
				<form class="navbar-form-search" role="search" method="get" action="/">
					<div class="search-form-container hdn" id="search-input-container">
						<div class="search-input-group">
							<div class="form-group">
							<input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-search" id="search-button"><span class="icon-magnifying-glass" aria-hidden="true"></span></button>
				</form>	
			</li>

			<?php
			$new_items = ob_get_clean();

			$items .= $new_items;
		}
		return $items;
	}
	add_filter('wp_nav_menu_items', 'mainmenu_navsearch', 10, 2);

	// Add template column to page list in wp-admin
	function page_column_views( $defaults ) {
		$defaults['page-layout'] = __('Template');
		return $defaults;
	}
	add_filter( 'manage_pages_columns', 'page_column_views' );

	function page_custom_column_views( $column_name, $id ) {
		if ( $column_name === 'page-layout' ) {
			$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( $set_template == 'default' ) {
				echo 'Default';
			}
			$templates = get_page_templates();
			ksort( $templates );
			foreach ( array_keys( $templates ) as $template ) :
				if ( $set_template == $templates[$template] ) echo $template;
			endforeach;
		}
	}
	add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );

	// add shared categories to pages
	function add_categories_to_pages() {
        register_taxonomy_for_object_type( 'category', 'page' );
    }
    add_action( 'init', 'add_categories_to_pages' );
	// add shared categories to results
	function add_categories_to_results() {
        register_taxonomy_for_object_type( 'category', 'results' );
    }
    add_action( 'init', 'add_categories_to_results' );

	function readable_phone_numb( $number ) {
		if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $number,  $matches ) ) {
			return '(' .  $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
		}
	}

	function get_pagination() {
		return '<div class="pagination">' . paginate_links( array(
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'format'       => '?paged=%#%',
			'show_all'     => false,
			'type'         => 'plain',
			'end_size'     => 2,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( '<span></span>', 'textdomain' ),
			'next_text'    => __( '<span></span>', 'textdomain' ),
			'add_args'     => false,
			'add_fragment' => '',
		) ) . '</div>';
	}

	// Add alternate excerpt extracted from ACF metadata
	function excerpt_function($ID, $searchTerms) {
		global $wpdb;
		$thisPost = get_post_meta($ID);
		
		foreach ($thisPost as $key => $value) {
			if ( false !== stripos($value[0], $searchTerms) ) {
				$found = substr(strip_tags($value[0]), 0, 150);
				echo $found . '... ';
			}
		}
	}

	// Remove text from search btn (icon added in style to replace)
	function my_search_form_text($text) {
		$text = str_replace('Search', '', $text); //set as value the text you want
		return $text;
	}
	add_filter('get_search_form', 'my_search_form_text');


	//Ajax toggle filter
	function location_ajax_filter(){
		global $wp_query;
		$location = $_POST["id"];
		$cat = (isset($_POST["id"])) ? $_POST["id"] : 'press-coverage';
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = [
			'post_type' => 'attorneys',
			'meta_key' => 'office',
			'meta_value' => esc_html($location),
			'posts_per_page' => -1,
		];
		$attorney_location_query = new WP_Query($args);
		$response = '';
		if( $attorney_location_query->have_posts() ) {
			while( $attorney_location_query->have_posts() ) :
				$attorney_location_query->the_post();
				$name = get_field('name');
				$link = get_the_permalink();
				$office = get_field('office');
                $photo = get_field('attorney_photo');
				$position = get_field('position');
				
				$response .= "
				<div class='attorney'>
					<a href='{$link}' alt='more about {$position} {$name}'>
						<p class='name'>{$name}</p>
						<p class='office'>{$office['label']} Office</p>
					</a>
					<img class='photo' src='{$photo['url']}' alt='{$photo['alt']}'>
				</div>
				";
			endwhile;
			
		} else {
			$response .= "
				<p class='subtitle'>There are currently no attorneys in this location. Please select another location.</p>
			";
		}
		echo $response;
		wp_die();
	}
	add_action('wp_ajax_nopriv_filter_by_location', 'location_ajax_filter');
	add_action('wp_ajax_filter_by_location', 'location_ajax_filter');

	

	function results_cpt_order( $query ) {
		// do not modify queries in the admin
		if( is_admin() ) {
			return $query;	
		}
		
		// Check if the query is for an archive
		if ( is_archive() && get_query_var("post_type") == "results" && $query->is_main_query() ) {
			$query->set('orderby', 'meta_value_num');    
			$query->set('meta_key', 'case_amount');    
			$query->set('order', 'DESC'); 
		}
		
		return $query;
	}
	add_filter( 'pre_get_posts' , 'results_cpt_order' );

    function klf_acf_input_admin_footer() { ?>
        <script type="text/javascript">
        (function($) {
        
        acf.add_filter('color_picker_args', function( args, $field ){
        
        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#ffffff', '#000000','#666666','#2E3645','#47556C','50617E','#E0F987','#CE363D']
        
        // return colors
        return args;
        
        });
        
        })(jQuery);
        </script>
        
        <?php }
        
        add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');


function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 1; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

/**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );


?>