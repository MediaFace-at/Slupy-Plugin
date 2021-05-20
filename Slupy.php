<?php
/*
Plugin Name: Slupy Plugin
Plugin URI: https://github.com/MediaFace-at/Slupy-Plugin
Description: Plugin für Girl Verwaltung
Author: Slupy Team
Version: 1.0.1 
Github Plugin URI: https://github.com/MediaFace-at/Slupy-Plugin
*
/* Verbiete den direkten Zugriff auf die Plugin-Datei */
if ( ! defined( 'ABSPATH' ) ) exit;
/* Nach dieser Zeile den Code einfügen*/

if ( ! function_exists('girls_post_type') ) {
include(plugin_dir_path(__FILE__).'/management/slupy-management.php');

/* Disable Gutenberg */
add_filter( 'use_block_editor_for_post', '__return_false' );

/* Styles werden hier eingefügt */	
/*function slupy_styles() {
	wp_register_style('slupystyle', content_url().'/plugins/slupy/styles/plugin-styles.css');
	wp_enqueue_style('slupystyle');
}
add_action( 'wp_print_styles', 'slupy_styles' );
*/

/* Platzhaltertext vom Titel ändern */
function wpb_change_title_text( $title ){
	$screen = get_current_screen();
	if  ( 'girl' == $screen->post_type ) {
		 $title = 'Künstlername hier einfügen!';
	}
	return $title;
}
add_filter( 'enter_title_here', 'wpb_change_title_text' );

// Register Custom Post Type
function girls_post_type() {
	$labels = array(
		'name'                  => _x( 'Girls', 'Post Type General Name' ),
		'singular_name'         => _x( 'Girl', 'Post Type Singular Name' ),
		'menu_name'             => __( 'Girls' ),
		'name_admin_bar'        => __( 'Girls' ),
		'archives'              => __( 'Girls Archives'),
		'attributes'            => __( 'Girls Attributes'),
		'parent_item_colon'     => __( 'Parent Item:'),
		'all_items'             => __( 'Alle Girls'),
		'add_new_item'          => __( 'Girl hinzufügen'),
		'add_new'               => __( 'Girl hinzufügen'),
		'new_item'              => __( 'Girl hinzufügen'),
		'edit_item'             => __( 'Girl bearbeiten'),
		'update_item'           => __( 'Girl speichern'),
		'view_item'             => __( 'Girl ansehen'),
		'view_items'            => __( 'Girls ansehen'),
		'search_items'          => __( 'Girl suchen'),
		'not_found'             => __( 'Nicht gefunden'),
		'not_found_in_trash'    => __( 'Not found in Trash'),
		'featured_image'        => __( 'Featured Image'),
		'set_featured_image'    => __( 'Bild festlegen'),
		'remove_featured_image' => __( 'Bild entfernen'),
		'use_featured_image'    => __( 'Use as featured image'),
		'insert_into_item'      => __( 'Insert into item'),
		'uploaded_to_this_item' => __( 'Uploaded to this item'),
		'items_list'            => __( 'Items list'),
		'items_list_navigation' => __( 'Items list navigation'),
		'filter_items_list'     => __( 'Filter items list'),
	);
	$args = array(
		'label'                 => __( 'Girl'),
		'description'           => __( 'Girls Pool'),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'post-formats','page-attributes'),
		'hierarchical' 			=> true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           	=> get_template_directory_uri().'/img/lips.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_in_rest'          => true,
	);
	register_post_type( 'girls', $args );
	flush_rewrite_rules();
}
add_action( 'init', 'girls_post_type', 0 );

function girls_location() {
    register_taxonomy(
        'location',
		'girls',
        array(
            'label' => __( 'Location' ),
            'rewrite' => array( 'slug' => 'location' ),
            'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_in_rest'          => true,
			'hierarchical' => true,
        )
    );
}
add_action( 'init', 'girls_location', 1 );

function girls_service() {
    register_taxonomy(
        'service',
        'girls',
        array(
            'label' => __( 'Service' ),
            'rewrite' => array( 'slug' => 'service' ),
            'hierarchical' => false,
			'public' => true,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_in_rest'          => true,
        )
    );
	flush_rewrite_rules();
}
add_action( 'init', 'girls_service', 2 );

function girls_provenance() {
    register_taxonomy(
        'provenance',
        'girls',
        array(
            'label' => __( 'Provenance' ),
            'rewrite' => array( 'slug' => 'provenance' ),
            'hierarchical' => true,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_in_rest'          => true,
        )
    );
	flush_rewrite_rules();
}
add_action( 'init', 'girls_provenance', 3 );

function girls_rooms() {
    register_taxonomy(
        'rooms',
        'girls',
        array(
            'label' => __( 'Rooms' ),
            'rewrite' => array( 'slug' => 'rooms' ),
            'hierarchical' => true,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_in_rest'          => true,
        )
    );
	flush_rewrite_rules();
}
add_action( 'init', 'girls_rooms', 3 );

/* Diese Funktion fügt den Titelbild hinzu zum Column */
function add_featured_image_column($defaults) {
    $i = 1;
    $columns = array();
    foreach( $defaults as $key => $value ) {
        $columns[$key] = $value;
        if ( 2 == $i++ ) {
            $columns['featured_image'] = 'Titelbild';
        }
    }
    return $columns;
}
add_filter('manage_girls_posts_columns', 'add_featured_image_column');
  
function show_featured_image_column($column_name, $post_id) {
    if ($column_name == 'featured_image') {
        echo get_the_post_thumbnail($post_id, 'thumbnail'); 
    }
}
add_action('manage_girls_posts_custom_column', 'show_featured_image_column', 10, 2);

// >> Shortcode für die Anzeige der Girls
function get_girls($atts){
	
    $args = shortcode_atts( array(
		'post_type'      => 'girls',
		'posts_per_page' => '-1',
		'publish_status' => 'publish',
		'rows' => '',
		'orderby'=>'title',
		'order'=>'ASC'
	), $atts);
 
    $query = new WP_Query($args);
	$rows = '';
	ob_start();
    if($query->have_posts()) : ?>
 		<div class="row no-gutters">
		 	<?php if ( '1' == $args['rows'] ) {
			 $rows = 'col-6';
		   } elseif ( '2' == $args['rows'] ) {
			$rows = 'col-lg-6 col-md-6 col-6';
		   } elseif ( '3' == $args['rows'] ) {
			   $rows = 'col-lg-4 col-md-3 col-6';
		   } elseif ( '4' == $args['rows'] ) {
			$rows = 'col-lg-3 col-md-4 col-6';
			} else {
				$rows = 'col-lg-4 col-md-3 col-6';
			}
        	while($query->have_posts()) : 
            	$query->the_post() ;
				//$girlsData = array('girlsNational' => get_the_terms( get_the_ID(), 'provenance', 0 ), ); ?>
				<div class="girls_col <?php echo $rows; ?>">
					<a href="<?php echo get_post_permalink(); ?>">
						<div class="girls_container shine">
							<?php if(get_the_date('Y-m-d-H-i-s') > date("Y-m-d-H-i-s",strtotime("-14 day"))) : ?>
								<div class="new">
									<p class="new-inner">NEU</p>
								</div>
							<?php endif; ?>

							<div class="girls_poster">
								<?php echo get_the_post_thumbnail(); ?>
							</div>
							<div class="girls_desc">
								<div class="girls_name headline shimmerfx">
									<?php echo get_the_title(); ?>
								</div>	
							</div> 
						</div>
					</a>
				</div>
        	<?php endwhile;
        	wp_reset_postdata(); ?>
	 	</div>
    <?php endif; return ob_get_clean(); 
}
add_shortcode( 'get_girls', 'get_girls' );  
// shortcode code ends here

function get_girls_future($atts){
    $future_posts = new WP_Query(
		array(
		  'post_type'=>'girls',
		  'posts_per_page' => -1,
		  'order' => 'ASC',
		  'post_status' => 'future',
		  'rows' => '',
	), $atts);
	ob_start();
	$rows = ''; ?>

   	<?php if ( $future_posts->have_posts() ) : ?>
		<div class="row no-gutters">
		 	<?php if ( '1' == $atts['rows'] ) {
			 $rows = 'col-6';
		   	} elseif ( '2' == $atts['rows'] ) {
			$rows = 'col-lg-6 col-md-6 col-6';
		   } elseif ( '3' == $atts['rows'] ) {
			   $rows = 'col-lg-4 col-md-3 col-6';
		   } elseif ( '4' == $atts['rows'] ) {
			$rows = 'col-lg-3 col-md-4 col-6';
			} else {
				$rows = 'col-lg-4 col-md-3 col-6';
			}
   			while ($future_posts->have_posts()) : $future_posts->the_post();
				//$girlsData = array(
					//'girlsNational' => get_the_terms( get_the_ID(), 'provenance', 0 ),
					//'girlsBirthday' => get_post_meta( get_the_ID(), 'girls_actorbirthday', 0),
					//'girlsWeight' => get_post_meta( get_the_ID(), 'girls_weight', 0),
					//'girlsSize' => get_post_meta( get_the_ID(), 'girls_size', 0),
				//); ?>
				<div class="girls_col <?php echo $rows; ?>">
					<a href="<?php echo get_post_permalink(); ?>">
						<div class="girls_container shine">
							<div class="new future"><p class="new-inner">AB <?php echo get_the_date('d.m.'); ?></p></div>
							<div class="girls_poster"><?php echo get_the_post_thumbnail(); ?></div>
							<div class="girls_desc">
								<div class="girls_name headline shimmerfx"><?php echo get_the_title(); ?></div>
							</div> 
						</div>
					</a>
				</div>
	  		<?php endwhile; wp_reset_query();?>
		</div>
   <?php endif;  
   return ob_get_clean();
}
add_shortcode( 'get_girls_future', 'get_girls_future' );  

// Put post thumbnails into rss feed
function wpfme_feed_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
	$content = '' . $content;
	}
	return $content;
	}
	add_filter('the_excerpt_rss', 'wpfme_feed_post_thumbnail');
	add_filter('the_content_feed', 'wpfme_feed_post_thumbnail');
// END RSS feed

//Custom Branding
function my_custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.gif) !important; }
	</style>';
	}
	add_action('login_head', 'my_custom_login_logo');
// END Custom Branding
//Custom Admin Logo
function custom_admin_logo() {
	echo '<style type="text/css">
	#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/admin_logo.png) !important; }
	</style>';
	}
	add_action('admin_head', 'custom_admin_logo');
//END Custom Admin logo
//Footer Admin text
function remove_footer_admin () {
	echo 'Slupy Girl Management.';
}
add_filter('admin_footer_text', 'remove_footer_admin');
//END Footer Admin Text
//Dynamic Footer Date
function comicpress_copyright() {

	global $wpdb;
	$copyright_dates = $wpdb->get_results("SELECT YEAR(min(post_date_gmt)) AS firstdate, YEAR(max(post_date_gmt)) AS lastdate FROM $wpdb->posts WHERE post_status = 'publish'");
	$output = '';

	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
	
	return $output;
}
//im footer einfügen:(echo comicpress_copyright();)
//END Dynamic Footer

  /**
 * 
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function cmb2_custom_metaboxes() {
    
    /**
     * Metabox to save the 'status' where 'Internal' is the default.
     */
    $cmb = new_cmb2_box( array(
        'id'           => 'girls_personal_data',
        'title'        => 'Persönliche Daten',
        'object_types' => array( 'girls' ), // Post type
    ));
    $cmb->add_field( array(
		'name'    => 'Vorname',
		'default' => '',
		'id'      => 'girls_firstname',
		'type'    => 'text_medium'
	));
	$cmb->add_field( array(
		'name'    => 'Nachname',
		'default' => '',
		'id'      => 'girls_lastname',
		'type'    => 'text_medium'
	));
	//$cmb->add_field( array(
	//	'name'    => 'Horizontal Bild',
	//	'desc'    => 'Hier ein Horizontales Bild einfügen',
	//	'id'      => 'girls_horizontal',
	//	'type'    => 'file',
		// Optional:
	//	'options' => array(
	//		'url' => false, // Hide the text input for the url
	//	),
	//	'text'    => array(
	//		'add_upload_file_text' => 'Horizontales Bild einfügen' // Change upload button text. Default: "Add or Upload File"
	//	),
	//	// query_args are passed to wp.media's library query.
	//	'query_args' => array(
	//		//'type' => 'application/pdf', // Make library only display PDFs.
	//		// Or only allow gif, jpg, or png images
	//		'type' => array(
	//			'image/gif',
	//			'image/jpeg',
	//			'image/png',
	//		),
	//	),
	//	'preview_size' => 'large', // Image size to use when previewing in the admin.
	//));
	$cmb->add_field( array(
		'name' => __( 'Kuenstleralter', 'kuenstleralter' ),
		'desc' => __( 'Numbers only' ),
		'id'   => 'girls_actorbirthday',
		'type' => 'text',
	));
	$cmb->add_field( array(
		'name' => 'Geburtsdatum',
		'id'   => 'girls_birthday',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		'date_format' => 'j.m.Y',
	));
	
	$cmb->add_field( array(
		'name'           => 'Zimmer',
		'desc'           => 'Wähle hier das Zimmer aus',
		'id'             => 'girls_rooms',
		'taxonomy'       => 'rooms', //Enter Taxonomy Slug
		'type'           => 'taxonomy_select',
		'remove_default' => 'true', // Removes the default metabox provided by WP core.
		// Optionally override the args sent to the WordPress get_terms function.
		'query_args' => array(
			 'orderby' => 'slug',
			// 'hide_empty' => true,
		),
	) );
	$cmb->add_field( array(
		'name' => 'Bis wann',
		'id'   => 'girls_when',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		'date_format' => 'j.m.Y',
	));
	$cmb->add_field( array(
		'name' => __( 'Weight', 'weight' ),
		'desc' => __( 'Numbers only' ),
		'id'   => 'girls_weight',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
	));
	$cmb->add_field( array(
		'name' => __( 'Size', 'size' ),
		'desc' => __( 'Numbers only' ),
		'id'   => 'girls_size',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
	));
	$cmb->add_field( array(
		'name' => __( 'Konfektionsgröße', 'konfektionsgroesse' ),
		'desc' => __( 'Die Konfektionsgröße der Frau' ),
		'id'   => 'girls_confsize',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
	));
	$cmb->add_field( array(
		'name' => __( 'Haarfarbe', 'haarfarbe' ),
		'desc' => __( 'Haarfarbe der Frau' ),
		'id'   => 'girls_haircolor',
		'type' => 'text',
	));
	$cmb->add_field( array(
		'name' => __( 'Sprachen', 'sprachen' ),
		'desc' => __( 'Sprachen die Sie spricht' ),
		'id'   => 'girls_language',
		'type' => 'text',
	));
	$cmb->add_field( array(
		'name'    => 'Ausweis (Kopie)',
		'desc'    => 'Hier ein Ausweis kopie einfügen',
		'id'      => 'girls_pass',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Foto hinzufügen' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array(
			//'type' => 'application/pdf', // Make library only display PDFs.
			// Or only allow gif, jpg, or png images
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
			),
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	));
	$cmb->add_field( array(
		'name' => __( 'Arbeitsnummer', 'cmb2' ),
		'id'   => 'girls_worknumber',
		'type' => 'text',
	));
	$cmb->add_field( array(
		'name' => __( 'Privatnummer', 'cmb2' ),
		'id'   => 'girls_privenumber',
		'type' => 'text',
	));
	$cmb->add_field( array(
        'name'       => 'Email',
        'id'         => 'girls_email',
        'type'       => 'text_email',
    ));
	
	$cmb->add_field( array(
		'name'           => 'Services',
		'desc'           => '',
		'id'             => 'girls_services',
		'taxonomy'       => 'service', //Enter Taxonomy Slug
		'type'           => 'taxonomy_multicheck_inline',
		// Optional :
		'text'           => array(
			'no_terms_text' => 'Sorry, no terms could be found.' // Change default text. Default: "No terms"
		),
		'remove_default' => 'true', // Removes the default metabox provided by WP core.
		// Optionally override the args sent to the WordPress get_terms function.
		'query_args' => array(
			// 'orderby' => 'slug',
			// 'hide_empty' => true,
		),
	));
	$cmb->add_field( array(
		'name'           => 'Locations',
		'desc'           => '',
		'id'             => 'girls_location',
		'taxonomy'       => 'location', //Enter Taxonomy Slug
		'type'           => 'taxonomy_multicheck_inline',
		// Optional :
		'text'           => array(
			'no_terms_text' => 'Sorry, no terms could be found.' // Change default text. Default: "No terms"
		),
		'remove_default' => 'true', // Removes the default metabox provided by WP core.
		// Optionally override the args sent to the WordPress get_terms function.
		'query_args' => array(
			// 'orderby' => 'slug',
			// 'hide_empty' => true,
		),
	));
	$cmb->add_field( array(
		'name'           => 'Herkunft',
		'desc'           => 'Wähle hier die Herkunft aus',
		'id'             => 'girls_national',
		'taxonomy'       => 'provenance', //Enter Taxonomy Slug
		'type'           => 'taxonomy_select',
		'remove_default' => 'true', // Removes the default metabox provided by WP core.
		// Optionally override the args sent to the WordPress get_terms function.
		'query_args' => array(
			 'orderby' => 'slug',
			// 'hide_empty' => true,
		),
	) );
    $cmb->add_field( array(
		'name' => 'Fotogallerie',
		'desc' => 'Hier kannst du alle Bilder vom Girl hinzufügen',
		'id'   => 'girls_gallery',
		'type' => 'file_list',
	));
	$cmb->add_field( array(
		'name' => 'Letzte Arzt Kontrolle',
		'desc' => 'Datum der letzten Arzt Kontrolle (alle 6 Wochen)',
		'id'   => 'girls_drcheck',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		'date_format' => 'j.m.Y',
	));
	$cmb->add_field( array(
		'name' => 'Letzte Blut Kontrolle',
		'desc' => 'Datum der letzten Blut Kontrolle (alle 12 Wochen)',
		'id'   => 'girls_bloodcheck',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		'date_format' => 'j.m.Y',
	));
	$cmb->add_field( array(
		'name' => 'Letzte Lungen Kontrolle',
		'desc' => 'Datum der letzten Lungen Kontrolle (1 mal jährlich)',
		'id'   => 'girls_lungcheck',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		'date_format' => 'j.m.Y',
	));
    $cmb->add_field( array(
		'name' => 'Schuldenstand',
		'id' => 'wiki_test_textmoney',
		'type' => 'text_money',
		'before_field' => '€', // Replaces default '$'
	));
	$cmb->add_field( array(
		'name' => 'Anmerkungen',
		'desc' => 'Anmerkungen für besondere Vorfälle (Positiv wie Negativ)',
		'id' => 'girls_note',
		'type' => 'textarea_small'
	));
	$cmb->add_field( array(
		'name' => 'Haustiere?',
		'id'   => 'girls_pets',
		'type' => 'checkbox',
	));
	$cmb->add_field( array(
		'name'             => 'Wäschetausch',
		'id'               => 'girls_cloth',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => array(
			'standard' => __( 'Normal', 'cmb2' ),
			'custom'   => __( 'Nie', 'cmb2' ),
			'none'     => __( 'Selten', 'cmb2' ),
		),
	));
	$cmb->add_field( array(
		'name' => 'Sachen im Keller hinterlassen?',
		'id'   => 'girls_things',
		'type' => 'checkbox',
	));
}
add_action( 'cmb2_admin_init', 'cmb2_custom_metaboxes' );


/* Girls Sidebar */
function slupyGirlsSidebar() {
    register_sidebar(
        array (
            'name' => __( 'Girls Sidebar', 'slupy' ),
            'id' => 'custom-girls-bar',
            'description' => __( 'Girls Sidebar', 'slupy' ),
            'before_widget' => '<div class="girls-sidebar">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'slupyGirlsSidebar' );
/* Girls Data Widget */
class Girlslocation_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'girlslocation_widget',  // Base ID
            'Girls Loactions'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Girlslocation_Widget' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle shimmerfx">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>'
    );
 
    public function widget( $args, $instance ) {
		$location_list = get_the_terms( get_the_ID(), 'location' );
        if($location_list):
		echo $args['before_widget'];
		
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        } ?>
		<div id="location_list"> <?php 
				if( $location_list ) { ?>
					<ul class="slupy_list location"><?php
						foreach( $location_list as $key ) { ?>
								<li>
									<a href="<?php echo get_term_link($key) ?>">
										<?php echo $key->name; ?>
									</a>
								</li> 
						<?php } ?>
						</ul>
					<?php } ?>
			</div>
        <?php echo $args['after_widget'];
		endif;
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'slupy_translation' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'slupy_translation' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'slupy_translation' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'slupy_translation' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
 
}
$girls_location_widget = new Girlslocation_Widget();

class Girlsservices_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'girlsservices_widget',  // Base ID
            'Girls Services'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Girlsservices_Widget' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle shimmerfx">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>'
    );
 
    public function widget( $args, $instance ) {
		$service_list = get_the_terms( get_the_ID(), 'service' );
		if($service_list):
        echo $args['before_widget'];
		
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        } ?>
			<div id="services_list"> <?php 
				if( $service_list ) { ?>
				<ul class="slupy_list service"><?php
					foreach( $service_list as $key ) { ?>
						<li>
							<a href="<?php echo get_term_link($key) ?>">
								<?php echo $key->name; ?>
							</a>
						</li> 
					<?php } ?>
					</ul>
				<?php } ?>
			</div>
        <?php echo $args['after_widget'];
		endif;
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'slupy_translation' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'slupy_translation' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'slupy_translation' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'slupy_translation' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
 
}
$girls_services_widget = new Girlsservices_Widget();

class Girlsdata_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'girlsdata_widget',  // Base ID
            'Girls Data'   // Name
        );
        add_action( 'widgets_init', function() {
            register_widget( 'Girlsdata_Widget' );
        });
    }
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>'
    );
    public function widget( $args, $instance ) {
		$girlsBirthday = get_post_meta(get_the_ID(), 'girls_actorbirthday', 0);
		$girlsNational = get_the_terms( get_the_ID(), 'provenance', 0 );
		$girlsSize = get_post_meta( get_the_ID(), 'girls_size', 0);
		$girlsWeight = get_post_meta( get_the_ID(), 'girls_weight', 0); 
		$girlsNumber = get_post_meta( get_the_ID(), 'girls_worknumber', 0);
		$girlsConfsize = get_post_meta( get_the_ID(), 'girls_confsize', 0);
		$girlsHaircolor = get_post_meta( get_the_ID(), 'girls_haircolor', 0);
		$girlsLanguage = get_post_meta( get_the_ID(), 'girls_language', 0);
		$girlsName = get_the_title();
		if($girlsBirthday || $girlsNational || $girlsSize || $girlsWeight || $girlsNumber || $girlsName):
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        } ?>
			<div class="title_container">
				<p class="girl_name shimmerfx">
					<?php echo get_the_title(); ?>
				</p>
				<?php if($girlsNational): ?>
				<div class="round-flag-icon round-flag-<?php if($girlsNational[0]->slug == 'belgien'){
										echo 'be';	
									} elseif($girlsNational[0]->slug == 'daenemark'){
										echo 'dk';
									} elseif($girlsNational[0]->slug == 'england'){
										echo 'en';
									} elseif($girlsNational[0]->slug == 'europa'){
										echo 'european-union';
									} elseif($girlsNational[0]->slug == 'moldawien'){
										echo 'md';
									} elseif($girlsNational[0]->slug == 'deutschland'){
										echo 'de';
									} elseif($girlsNational[0]->slug == 'daenemark'){
										echo 'dk';
									} elseif($girlsNational[0]->slug == 'england'){
										echo 'en';
									} elseif($girlsNational[0]->slug == 'europa'){
										echo 'european-union';
									} elseif($girlsNational[0]->slug == 'finnland'){
										echo 'fi';
									} elseif($girlsNational[0]->slug == 'frankreich'){
										echo 'fr';
									} elseif($girlsNational[0]->slug == 'griechenland'){
										echo 'gr';
									} elseif($girlsNational[0]->slug == 'irland'){
										echo 'ie';
									} elseif($girlsNational[0]->slug == 'italien'){
										echo 'it';
									} elseif($girlsNational[0]->slug == 'norwegen'){
										echo 'no';
									} elseif($girlsNational[0]->slug == 'oesterreich'){
										echo 'at';
									} elseif($girlsNational[0]->slug == 'polen'){
										echo 'pl';
									} elseif($girlsNational[0]->slug == 'rumaenien'){
										echo 'ro';
									} elseif($girlsNational[0]->slug == 'schweden'){
										echo 'se';
									} elseif($girlsNational[0]->slug =='schweiz'){
										echo 'ch';
									} elseif($girlsNational[0]->slug == 'slowakei'){
										echo 'sk';
									} elseif($girlsNational[0]->slug == 'slowenien'){
										echo 'si';
									} elseif($girlsNational[0]->slug == 'tschechien'){
										echo 'cz';
									} elseif($girlsNational[0]->slug == 'ukraine'){
										echo 'ua';
									} elseif($girlsNational[0]->slug == 'ungarn'){
										echo 'hu';
									} else {
										var_dump( 'wieso?');
								} ?>"></div>
								<?php endif; ?>
				<span class="label">Anwesend</span>
			</div>
			<div>
				<?php if($girlsBirthday): ?>
				<div class="item">
					<span>Alter:</span>
					<?php echo $girlsBirthday[0]; ?> Jahre
				</div>
				<?php endif;
				if($girlsNational): ?>
				<div class="item">
					<span>Herkunft:</span>
					<?php echo $girlsNational[0]->name; ?>
				</div>  
				<?php endif;
				if($girlsWeight): ?>
				<div class="item">
					<span>Gewicht:</span>
					<?php echo $girlsWeight[0]; ?> kg
				</div>
				<?php endif;
				if($girlsSize): ?>
				<div class="item">
					<span>Größe:</span>
					<?php echo $girlsSize[0]; ?> cm
				</div>
				<?php endif; 
				if($girlsConfsize): ?>
				<div class="item">
					<span>Konfektion:</span>
					<?php echo $girlsConfsize[0]; ?>
				</div>
				<?php endif;
				if($girlsHaircolor): ?>
				<div class="item">
					<span>Haarfarbe:</span>
					<?php echo $girlsHaircolor[0]; ?>
				</div>
				<?php endif;
				if($girlsLanguage): ?>
				<div class="item">
					<span>Sprachen:</span>
					<?php echo $girlsLanguage[0]; ?>
				</div>
				<?php endif; ?>
			</div>
        	<?php echo $args['after_widget'];
		endif;
    }
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'slupy_translation' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'slupy_translation' ); ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'slupy_translation' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'slupy_translation' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
	    return $instance;
    }
}
$girls_data_widget = new Girlsdata_Widget();

class Girlscontacts_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'girlscontacts_widget',  // Base ID
            'Girls Contacts'   // Name
        );
        add_action( 'widgets_init', function() {
            register_widget( 'Girlscontacts_Widget' );
        });
    }
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>'
    );
    public function widget( $args, $instance ) {
        $girlsNumber = get_post_meta( get_the_ID(), 'girls_worknumber', 0);
		if($girlsNumber):
		echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        } ?>
			<a href="tel:<?php echo $girlsNumber[0]; ?>">
				<button class="btn btn-info btn-block">
				<i class="fa fa-phone" style="transform: rotate(100deg);"></i> <?php echo wordwrap($girlsNumber[0] , 3 , ' ' , true ); ?>
				</button>
			</a>
			<a class="mt-1" target="_blank" href="https://wa.me/<?php echo $girlsNumber[0]; ?>?text=Hy%20wann%20hast%20du%20zeit%20für%20mich">
				<button class="btn btn-success btn-block">
				<i class="fab fa-whatsapp"></i> Nachricht
				</button>
			</a>
        <?php echo $args['after_widget'];
		endif;
    }
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'slupy_translation' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'slupy_translation' ); ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'slupy_translation' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'slupy_translation' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
	    return $instance;
    }
}
$girls_contact_widget = new Girlscontacts_Widget();

class Girlsexerpt_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'girlsexerpt_widget',  // Base ID
            'Girls Exerpt'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Girlsexerpt_Widget' );
        });
 
    }
 
    public $args = array( 
        'before_title'  => '<h4 class="widgettitle shimmerfx">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>'
    );
  
    public function widget( $args, $instance ) {
		$girlsNumber = get_the_terms( get_the_ID(), 'rooms', 0);
		$girlsexerpt = get_the_content();
		$girlsWhen = get_post_meta( get_the_ID(), 'girls_when', 0);
		if($girlsNumber || $girlsexerpt):
        echo $args['before_widget'];
			if($girlsNumber):?> 
        	<h3 class="widget-title">Zimmer: <?php echo $girlsNumber[0]->name; ?></h3>
			<?php if ($girlsWhen):?><p class="girl_til">Bis: <?php echo date("d.m.j", strtotime($girlsWhen[0]))?></p><?php endif; ?>
			<?php endif;
			if($girlsexerpt): ?> 
				<div id="girlsexerpt"> <?php 
					if( $girlsexerpt ) { ?>
						<div class="slupy_list exerpt">
							<?php echo $girlsexerpt; ?>
						</div>
					<?php } ?>
				</div>
		<?php endif; 
        echo $args['after_widget'];
		endif;
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'slupy_translation' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'slupy_translation' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'slupy_translation' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'slupy_translation' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
 
}
$girls_exerpt_widget = new Girlsexerpt_Widget();

function register_slupy_widgets() { 
    register_widget( 'Girlslocation_Widget' );
	register_widget( 'Girlsservices_Widget' );
	register_widget( 'Girlsdata_Widget' );
}
// Register Girls Widgets widget
add_action( 'widgets_init', 'register_slupy_widgets' );

function slupy_gallery( $file_list_meta_id, $img_size = 'medium', $gallery_class ) {
						
	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_id, 1 ); ?>

	<div class="slupy_gallery <?php echo $gallery_class; ?>">
		<?php foreach ( (array) $files as $attachment_id => $attachment_url ) { 
			$lightbox_image = wp_get_attachment_image_src( $attachment_id, 'full' );?>
			<a class="simplelightbox" href="<?php echo $lightbox_image[0] ?>">
				<?php echo wp_get_attachment_image( $attachment_id, $img_size ); ?>
			</a>
		<?php } ?>
	</div> 
<?php }

}