<?php
/**
* Wizard
* @package Whizzie
* @since 1.0.0
*/

class Whizzie {
	protected $version = '1.1.0';
	protected $theme_name = '';
	protected $theme_title = '';
	protected $page_slug = '';
	protected $page_title = '';
	protected $config_steps = array();
	public $parent_slug;
	
	/**
	 * Constructor
	 * @param $config Configuration parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}

	/**
	 * Set variables based on configuration
	 * @param $config Configuration parameters
	 */
	public function set_vars( $config ) {
		if ( isset( $config['page_slug'] ) ) {
			$this->page_slug = esc_attr( $config['page_slug'] );
		}
		if ( isset( $config['page_title'] ) ) {
			$this->page_title = esc_attr( $config['page_title'] );
		}
		if ( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}

		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get( 'Name' );
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $current_theme->get( 'Name' ) ) );
		$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );
	}

	/*** Initialize hooks and actions ***/
	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style( 'theme-wizard-style', get_template_directory_uri() . '/theme-wizard/assets/css/theme-wizard-style.css');
		wp_register_script( 'theme-wizard-script', get_template_directory_uri() . '/theme-wizard/assets/js/theme-wizard-script.js', array( 'jquery' ));
		wp_localize_script(
			'theme-wizard-script',
			'sports_nutritionist_whizzie_params',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'verify_text' => esc_html( 'verifying', 'sports-nutritionist' )
			)
		);
		wp_enqueue_script( 'theme-wizard-script' );
	}

	public function menu_page() {
		add_theme_page( esc_html( $this->page_title ), esc_html( $this->page_title ), 'manage_options', $this->page_slug, array( $this, 'sports_nutritionist_setup_wizard' ) );
	}

	/*** Display the wizard page content ***/
	public function wizard_page() { ?>
		<div class="main-wrap">
			<div class="card whizzie-wrap">
				<ul class="whizzie-menu">
					<?php foreach ( $this->get_steps() as $step ) : ?>
						<li data-step="<?php echo esc_attr( $step['id'] ); ?>" class="step step-<?php echo esc_attr( $step['id'] ); ?>">
							<h2><?php echo esc_html( $step['title'] ); ?></h2>
							<?php $content = call_user_func( array( $this, $step['view'] ) ); ?>
							<?php if ( isset( $content['summary'] ) ) : ?>
								<div class="summary"><?php echo wp_kses_post( $content['summary'] ); ?></div>
							<?php endif; ?>
							<?php if ( isset( $content['detail'] ) ) : ?>
								<p><a href="#" class="more-info"><?php esc_html_e( 'More Info', 'sports-nutritionist' ); ?></a></p>
								<div class="detail"><?php echo wp_kses_post( $content['detail'] ); ?></div>
							<?php endif; ?>
							<?php if ( isset( $step['button_text'] ) && $step['button_text'] ) : ?>
								<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="<?php echo esc_attr( $step['callback'] ); ?>" data-step="<?php echo esc_attr( $step['id'] ); ?>"><?php echo esc_html( $step['button_text'] ); ?></a></div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="step-loading"><span class="spinner"></span></div>
			</div>
		</div>
	<?php }

	/*** Setup wizard page content and options ***/
	public function sports_nutritionist_setup_wizard() { ?>
		<div class="wrapper-info get-stared-page-wrap">
			<div class="tab-sec theme-option-tab">
				<div id="demo_offer" class="tabcontent">
					<?php $this->wizard_page(); ?>
				</div>
			</div>
		</div>
	<?php }

	/**
	 * Get the steps for the wizard
	 * @return array
	 */
	public function get_steps() {
		$steps = array(
			'intro' => array(
				'id' => 'intro',
				'title' => __( 'Welcome to ', 'sports-nutritionist' ) . $this->theme_title,
				'view' => 'get_step_intro',
				'callback' => 'do_next_step',
				'button_text' => __( 'Start Now', 'sports-nutritionist' ),
				'can_skip' => false
			),
			'widgets' => array(
				'id' => 'widgets',
				'title' => __( 'Demo Importer', 'sports-nutritionist' ),
				'view' => 'get_step_widgets',
				'callback' => 'install_widgets',
				'button_text' => __( 'Import Demo', 'sports-nutritionist' ),
				'can_skip' => true
			),
			'done' => array(
				'id' => 'done',
				'title' => __( 'All Done', 'sports-nutritionist' ),
				'view' => 'get_step_done'
			)
		);

		return $steps;
	}

	/*** Display the content for the intro step ***/
	public function get_step_intro() { ?>
		<div class="summary">
			<p style="text-align: center;"><?php esc_html_e( 'Thank you for choosing our theme! We are excited to help you get started with your new website.', 'sports-nutritionist' ); ?></p>
			<p style="text-align: center;"><?php esc_html_e( 'To ensure you make the most of our theme, we recommend following the setup steps outlined here. This process will help you configure the theme to best suit your needs and preferences. Click on the "Start Now" button to begin the setup.', 'sports-nutritionist' ); ?></p>
		</div>
	<?php }

	/*** Display the content for the widgets step ***/
	public function get_step_widgets() { ?>
		<div class="summary">
			<p><?php esc_html_e('To get started, use the button below to import demo content and add widgets to your site. After installation, you can manage settings and customize your site using the Customizer. Enjoy your new theme!', 'sports-nutritionist'); ?></p>
		</div>
	<?php }

	/*** Display the content for the final step ***/
	public function get_step_done() { ?>
		<div id="aster-demo-setup-guid">
			<div class="aster-setup-menu">
				<h3><?php esc_html_e('Setup Navigation Menu','sports-nutritionist'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Menu','sports-nutritionist'); ?></p>
				<h4><?php esc_html_e('A) Create Pages','sports-nutritionist'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Pages >> Add New','sports-nutritionist'); ?></li>
					<li><?php esc_html_e('Enter Page Details And Save Changes','sports-nutritionist'); ?></li>
				</ol>
				<h4><?php esc_html_e('B) Add Pages To Menu','sports-nutritionist'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Menu','sports-nutritionist'); ?></li>
					<li><?php esc_html_e('Click On The Create Menu Option','sports-nutritionist'); ?></li>
					<li><?php esc_html_e('Select The Pages And Click On The Add to Menu Button','sports-nutritionist'); ?></li>
					<li><?php esc_html_e('Select Primary Menu From The Menu Setting','sports-nutritionist'); ?></li>
					<li><?php esc_html_e('Click On The Save Menu Button','sports-nutritionist'); ?></li>
				</ol>
			</div>
			<div class="aster-setup-widget">
				<h3><?php esc_html_e('Setup Footer Widgets','sports-nutritionist'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Footer Widgets','sports-nutritionist'); ?></p>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Widgets','sports-nutritionist'); ?></li>
					<li><?php esc_html_e('Drag And Add The Widgets In The Footer Columns','sports-nutritionist'); ?></li>
				</ol>
			</div>
			<div style="display:flex; justify-content: center; margin-top: 20px; gap:20px">
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url(home_url()); ?>" class="button button-primary">Visit Site</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="button button-primary">Customize Your Demo</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('themes.php?page=sports-nutritionist-getting-started') ); ?>" class="button button-primary">Getting Started</a>
				</div>
			</div>
		</div>
	<?php }


	//                      ------------- MENUS -----------------                    //

	public function sports_nutritionist_customizer_primary_menu(){
		// ------- Create Primary Menu --------
		$sports_nutritionist_themename = 'Sports Nutritionist'; // Ensure the theme name is set
		$sports_nutritionist_menuname = $sports_nutritionist_themename . ' Primary Menu';
		$sports_nutritionist_bpmenulocation = 'primary';
		$sports_nutritionist_menu_exists = wp_get_nav_menu_object($sports_nutritionist_menuname);
	
		if( !$sports_nutritionist_menu_exists ) {
			$sports_nutritionist_menu_id = wp_create_nav_menu($sports_nutritionist_menuname);
			
			// Home
			wp_update_nav_menu_item($sports_nutritionist_menu_id, 0, array(
				'menu-item-title' => __('Home', 'sports-nutritionist'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// Blog
			$page_blog = get_page_by_path('blog');
			if($page_blog){
				wp_update_nav_menu_item($sports_nutritionist_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'sports-nutritionist'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($page_blog),
					'menu-item-status' => 'publish'
				));
			}
	
			// Services
			$page_services = get_page_by_path('services'); // Preferred over get_page_by_title()
			if($page_services){
				wp_update_nav_menu_item($sports_nutritionist_menu_id, 0, array(
					'menu-item-title' => __('Services', 'sports-nutritionist'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($page_services),
					'menu-item-status' => 'publish'
				));
			}
	
			// Review
			$page_review = get_page_by_path('review');
			if($page_review){
				wp_update_nav_menu_item($sports_nutritionist_menu_id, 0, array(
					'menu-item-title' => __('Review', 'sports-nutritionist'),
					'menu-item-classes' => 'review',
					'menu-item-url' => get_permalink($page_review),
					'menu-item-status' => 'publish'
				));
			}

			// Contact
			$page_contact = get_page_by_path('contact');
			if($page_contact){
				wp_update_nav_menu_item($sports_nutritionist_menu_id, 0, array(
					'menu-item-title' => __('Contact', 'sports-nutritionist'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($page_contact),
					'menu-item-status' => 'publish'
				));
			}
	
			// Assign menu to location if not set
			if( !has_nav_menu($sports_nutritionist_bpmenulocation) ){
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$sports_nutritionist_bpmenulocation] = $sports_nutritionist_menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}
	}

	//                      ------------- /*** Imports demo content ***/ -----------------                    //

	public function setup_widgets() {

		// Create a front page and assign the template
		$sports_nutritionist_home_title = 'Home';
		$sports_nutritionist_home_check = get_page_by_path('home');
		if (!$sports_nutritionist_home_check) {
			$sports_nutritionist_home = array(
				'post_type'    => 'page',
				'post_title'   => $sports_nutritionist_home_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'home' // Unique slug for the home page
			);
			$sports_nutritionist_home_id = wp_insert_post($sports_nutritionist_home);

			// Set the static front page
			if (!is_wp_error($sports_nutritionist_home_id)) {
				update_option('page_on_front', $sports_nutritionist_home_id);
				update_option('show_on_front', 'page');
			}
		}

		// Create a posts page and assign the template
		$sports_nutritionist_blog_title = 'Blogs';
		$sports_nutritionist_blog_check = get_page_by_path('blog');
		if (!$sports_nutritionist_blog_check) {
			$sports_nutritionist_blog = array(
				'post_type'    => 'page',
				'post_title'   => $sports_nutritionist_blog_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'blog' // Unique slug for the blog page
			);
			$sports_nutritionist_blog_id = wp_insert_post($sports_nutritionist_blog);

			// Set the posts page
			if (!is_wp_error($sports_nutritionist_blog_id)) {
				update_option('page_for_posts', $sports_nutritionist_blog_id);
			}
		}

		// Create a Services page and assign the template
		$sports_nutritionist_services_title = 'Services';
		$sports_nutritionist_services_check = get_page_by_path('services');
		if (!$sports_nutritionist_services_check) {
			$sports_nutritionist_services = array(
				'post_type'    => 'page',
				'post_title'   => $sports_nutritionist_services_title,
				'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'services' // Unique slug for the Services page
			);
			wp_insert_post($sports_nutritionist_services);
		}

		// Create a Review page and assign the template
		$sports_nutritionist_review_title = 'Review';
		$sports_nutritionist_review_check = get_page_by_path('review');
		if (!$sports_nutritionist_review_check) {
			$sports_nutritionist_review = array(
				'post_type'    => 'page',
				'post_title'   => $sports_nutritionist_review_title,
				'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'review' // Unique slug for the Review page
			);
			wp_insert_post($sports_nutritionist_review);
		}

		// Create a Contact page and assign the template
		$sports_nutritionist_contact_title = 'Contact';
		$sports_nutritionist_contact_check = get_page_by_path('contact');
		if (!$sports_nutritionist_contact_check) {
			$sports_nutritionist_contact = array(
				'post_type'    => 'page',
				'post_title'   => $sports_nutritionist_contact_title,
				'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'contact' // Unique slug for the Contact page
			);
			wp_insert_post($sports_nutritionist_contact);
		}

		/*----------------------------------------- Header Button --------------------------------------------------*/

			set_theme_mod( 'sports_nutritionist_header_button_label_','Membership');
			set_theme_mod( 'sports_nutritionist_banner_button_link_','#');
			
			// Create categories if not already created
			$sports_nutritionist_category_slider = wp_create_category('Slider');
			

			// Array of categories to assign to each set of posts
			$sports_nutritionist_categories = array($sports_nutritionist_category_slider);

			// Loop to create posts
			for ($i = 1; $i <= 3; $i++) {
				$title = array(
					'Fuel Your Body, Nourish Your Life',
					'Energize Your Body, Enrich Your Life',
					'Strengthen Your Body, Uplift Your Life',
				);

				// Determine category and post index to use for title
				$category_index = ($i <= 3) ? 0 : 1; // First 3 for Slider, next 3 for Blog
				$post_title = $title[$i - 1]; // Adjust for zero-based index in title array

				// Create post object
				$my_post = array(
					'post_title'    => wp_strip_all_tags($post_title),
					'post_content'  => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer.',
					'post_status'   => 'publish',
					'post_type'     => 'post',
					'post_category' => array($sports_nutritionist_categories[$category_index]), // Assign Slider to first 3, Blog to next 3
				);

				// Insert the post into the database
				$post_id = wp_insert_post($my_post);

				set_theme_mod( 'sports_nutritionist_banner_slider_content_post_' . $i,  $post_id);

				// Determine the category and set image URLs based on category
				if ($category_index === 0) { // Slider category
					$sports_nutritionist_image_url = get_template_directory_uri() . '/resource/img/slider' . $i . '.png';
					$sports_nutritionist_image_name = 'slider' . $i . '.png';
				}

				$sports_nutritionist_upload_dir = wp_upload_dir();
				$sports_nutritionist_image_data = file_get_contents($sports_nutritionist_image_url);
				$sports_nutritionist_unique_file_name = wp_unique_filename($sports_nutritionist_upload_dir['path'], $sports_nutritionist_image_name);
				$filename = basename($sports_nutritionist_unique_file_name);

				if (wp_mkdir_p($sports_nutritionist_upload_dir['path'])) {
					$file = $sports_nutritionist_upload_dir['path'] . '/' . $filename;
				} else {
					$file = $sports_nutritionist_upload_dir['basedir'] . '/' . $filename;
				}

				if ( ! function_exists( 'WP_Filesystem' ) ) {
				    require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}

				WP_Filesystem();
				global $wp_filesystem;

				if ( ! $wp_filesystem->put_contents( $file, $sports_nutritionist_image_data, FS_CHMOD_FILE ) ) {
				    wp_die( 'Error saving file!' );
				}

				$wp_filetype = wp_check_filetype($filename, null);
				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => sanitize_file_name($filename),
					'post_content'   => '',
					'post_status'    => 'inherit'
				);

				$sports_nutritionist_attach_id = wp_insert_attachment($attachment, $file, $post_id);

				require_once(ABSPATH . 'wp-admin/includes/image.php');

				$sports_nutritionist_attach_data = wp_generate_attachment_metadata($sports_nutritionist_attach_id, $file);
				wp_update_attachment_metadata($sports_nutritionist_attach_id, $sports_nutritionist_attach_data);
				set_post_thumbnail($post_id, $sports_nutritionist_attach_id);
			}				
		
		// ---------------------------------------- Slider --------------------------------------------------- //
		
			set_theme_mod('sports_nutritionist_enable_banner_section', true);

			for($i=1; $i<=3; $i++) {
				set_theme_mod('sports_nutritionist_banner_button_label_'.$i,'Explore');
			}
		// ---------------------------------------- About  --------------------------------------------------- //

			set_theme_mod( 'sports_nutritionist_about_image_1',get_template_directory_uri().'/resource/img/about1.png');

			set_theme_mod( 'sports_nutritionist_about_image_2',get_template_directory_uri().'/resource/img/about2.png');

			set_theme_mod( 'sports_nutritionist_about_image_3',get_template_directory_uri().'/resource/img/about3.png');

			set_theme_mod('sports_nutritionist_services_short_heading','About Nutriglow');
			set_theme_mod('sports_nutritionist_services_heading','Nourish Your Body, Transform Your Life!');
			set_theme_mod('sports_nutritionist_services_content','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley.');

			set_theme_mod('sports_nutritionist_about_static_number_1','1500');
			set_theme_mod('sports_nutritionist_about_static_heading_1','Happy Customer');

			set_theme_mod('sports_nutritionist_about_static_number_2','1500');
			set_theme_mod('sports_nutritionist_about_static_heading_2','Happy Customer');

			set_theme_mod('sports_nutritionist_about_button_text','Explore');
			set_theme_mod('sports_nutritionist_about_button_url','#');

		// ---------------------------------------- Footer section --------------------------------------------------- //	
		
			set_theme_mod('sports_nutritionist_footer_background_color_setting','#000000');
			
		// ---------------------------------------- Related post_tag --------------------------------------------------- //	
		
			set_theme_mod('sports_nutritionist_post_related_post_label','Related Posts');
			set_theme_mod('sports_nutritionist_related_posts_count','3');


		$this->sports_nutritionist_customizer_primary_menu();
	}
}