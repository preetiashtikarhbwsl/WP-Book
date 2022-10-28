<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://mail.google.com/mail/u/0/#inbox
 * @since      1.0.0
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Book
 * @subpackage Wp_Book/admin
 * @author     Preeti Ashtikar <preeti.ashtikar@hbwsl.com>
 */
class Wp_Book_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-book-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Book_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Book_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-book-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register custom post
	 */
	public function register_book_post_types() {

		$labels = array(
			'name'                  => _x( 'Books', 'Post Type General Name', 'wp-book' ),
			'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'wp-book' ),
			'menu_name'             => __( 'Books', 'wp-book' ),
			'name_admin_bar'        => __( 'Books', 'wp-book' ),
			'archives'              => __( 'Books Archives', 'wp-book' ),
			'attributes'            => __( 'Books Attributes', 'wp-book' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wp-book' ),
			'all_items'             => __( 'All Books', 'wp-book' ),
			'add_new_item'          => __( 'Add New Book', 'wp-book' ),
			'add_new'               => __( 'Add New', 'wp-book' ),
			'new_item'              => __( 'New Book', 'wp-book' ),
			'edit_item'             => __( 'Edit Book', 'wp-book' ),
			'update_item'           => __( 'Update Book', 'wp-book' ),
			'view_item'             => __( 'View Book', 'wp-book' ),
			'view_items'            => __( 'View Books', 'wp-book' ),
			'search_items'          => __( 'Search Book', 'wp-book' ),
			'not_found'             => __( 'No books found', 'wp-book' ),
			'not_found_in_trash'    => __( 'No books found in Trash', 'wp-book' ),
			'featured_image'        => __( 'Featured Image', 'wp-book' ),
			'set_featured_image'    => __( 'Set featured image', 'wp-book' ),
			'remove_featured_image' => __( 'Remove featured image', 'wp-book' ),
			'use_featured_image'    => __( 'Use as featured image', 'wp-book' ),
			'insert_into_item'      => __( 'Insert into item', 'wp-book' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Book', 'wp-book' ),
			'items_list'            => __( 'Books list', 'wp-book' ),
			'items_list_navigation' => __( 'Books list navigation', 'wp-book' ),
			'filter_items_list'     => __( 'Filter Books list', 'wp-book' ),
		);
		$args   = array(
			'label'               => __( 'Book', 'wp-book' ),
			'description'         => __( 'Post Type Description', 'wp-book' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'comments' ),
			'taxonomies'          => array( 'book-category', 'book-tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-book-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'books', $args );
	}

	/**
	 * Register book category
	 */
	public function register_book_category() {

		$labels = array(
			'name'                       => _x( 'Book Category', 'Taxonomy General Name', 'wp-book' ),
			'singular_name'              => _x( 'Book Category', 'Taxonomy Singular Name', 'wp-book' ),
			'menu_name'                  => __( 'Book Category', 'wp-book' ),
			'all_items'                  => __( 'All Items', 'wp-book' ),
			'parent_item'                => __( 'Parent Book Category', 'wp-book' ),
			'parent_item_colon'          => __( 'Parent Book Category:', 'wp-book' ),
			'new_item_name'              => __( 'New Book Category Name', 'wp-book' ),
			'add_new_item'               => __( 'Add New Book Category', 'wp-book' ),
			'edit_item'                  => __( 'Edit Book Category', 'wp-book' ),
			'update_item'                => __( 'Update Book Category', 'wp-book' ),
			'view_item'                  => __( 'View Book Category', 'wp-book' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'wp-book' ),
			'add_or_remove_items'        => __( 'Add or remove Book Category', 'wp-book' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wp-book' ),
			'popular_items'              => __( 'Popular Book Categories', 'wp-book' ),
			'search_items'               => __( 'Search Book Category', 'wp-book' ),
			'not_found'                  => __( 'Not Book Category Found', 'wp-book' ),
			'no_terms'                   => __( 'No Book Categories', 'wp-book' ),
			'items_list'                 => __( 'Book Categories list', 'wp-book' ),
			'items_list_navigation'      => __( 'Book Categories list navigation', 'wp-book' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'book-category', array( 'books' ), $args );

	}

	/**
	 * Register book category
	 */
	public function register_book_tag() {

		$labels = array(
			'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'wp-book' ),
			'singular_name'              => _x( 'Book Tag', 'Taxonomy Singular Name', 'wp-book' ),
			'menu_name'                  => __( 'Book Tag', 'wp-book' ),
			'all_items'                  => __( 'All Book Tags', 'wp-book' ),
			'parent_item'                => __( 'Parent Book Tag', 'wp-book' ),
			'parent_item_colon'          => __( 'Parent Book Tag:', 'wp-book' ),
			'new_item_name'              => __( 'New Book Tag Name', 'wp-book' ),
			'add_new_item'               => __( 'Add New Book Tag', 'wp-book' ),
			'edit_item'                  => __( 'Edit Book Tag', 'wp-book' ),
			'update_item'                => __( 'Update Book Tag', 'wp-book' ),
			'view_item'                  => __( 'View Book Tag', 'wp-book' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'wp-book' ),
			'add_or_remove_items'        => __( 'Add or remove book tags', 'wp-book' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wp-book' ),
			'popular_items'              => __( 'Popular Book Tags', 'wp-book' ),
			'search_items'               => __( 'Search Book Tags', 'wp-book' ),
			'not_found'                  => __( 'No Book Tags Found', 'wp-book' ),
			'no_terms'                   => __( 'No Book Tags', 'wp-book' ),
			'items_list'                 => __( 'Book tags list', 'wp-book' ),
			'items_list_navigation'      => __( 'Book tags list navigation', 'wp-book' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'book-tag', array( 'books' ), $args );

	}

}
