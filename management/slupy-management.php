<?php
/*
Plugin Name: Slupy Plugin Management
Description: Management Dashboard Addon
Author: Slupy Team
Version: 1.0.1

/* Verbiete den direkten Zugriff auf die Plugin-Datei */
if ( ! defined( 'ABSPATH' ) ) exit;
/* Nach dieser Zeile den Code einfügen*/


function admin_style() {
	wp_enqueue_style('admin-styles', plugin_dir_url( __DIR__ ) . 'management/admin-styles.css');
  }
  
  add_action('admin_enqueue_scripts', 'admin_style');

  
if ( ! function_exists('girls_post_type') ) {
function slupy_admin_page(){
	$page_title = 'Alle Girls';
	$menu_title = 'Verwaltung';
	$capability = 'read';
	$slug = 'settings_page_content';
	$callback = 'settings_page_content';
	$icon = 'dashicons-book';
	$position = 10;
	add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
  }
  add_action( 'admin_menu', 'slupy_admin_page' );
  function settings_page_content(){
	echo '<h1>Übersicht</h1>';
	?>
	<div class="wrap">
 
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">

		<div id="admin-container">
			<?php 
				
			$loop = new WP_Query( array( 'post_type' => 'girls', 'posts_per_page' => 10 ) ); 

			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<div class="row">				

				<?php
				the_title( '<h2 class="admin-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); 
				?>

				<div class="admin-content">
					<?php the_content(); ?>
				</div>

				<div class="admin-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>

			<?php endwhile; ?>
		</div><!-- #admin-container -->

	</form>

</div><!-- .wrap -->
<?php
  }
}