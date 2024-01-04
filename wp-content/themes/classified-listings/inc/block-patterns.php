<?php
/**
 * Classified Listings: Block Patterns
 *
 * @since Classified Listings 1.0
 */

 /**
  * Get patterns content.
  *
  * @param string $file_name Filename.
  * @return string
  */
function classified_listings_get_pattern_content( $file_name ) {
	ob_start();
	include get_theme_file_path( '/inc/patterns/' . $file_name . '.php' );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * Registers block patterns and categories.
 *
 * @since Classified Listings 1.0
 *
 * @return void
 */
function classified_listings_register_block_patterns() {

	$patterns = array(
		'header-default' => array(
			'title'      => __( 'Default header', 'classified-listings' ),
			'categories' => array( 'classified-listings-headers' ),
			'blockTypes' => array( 'core/template-part/header' ),
		),
		'footer-default' => array(
			'title'      => __( 'Default footer', 'classified-listings' ),
			'categories' => array( 'classified-listings-footers' ),
			'blockTypes' => array( 'core/template-part/footer' ),
		),
		'home-banner' => array(
			'title'      => __( 'Home Banner', 'classified-listings' ),
			'categories' => array( 'classified-listings-banner' ),
		),
		'popular-trainding-section' => array(
			'title'      => __( 'Popular Trending Section', 'classified-listings' ),
			'categories' => array( 'classified-listings-popular-trainding-section' ),
		),
		'primary-sidebar' => array(
			'title'    => __( 'Primary Sidebar', 'classified-listings' ),
			'categories' => array( 'classified-listings-sidebars' ),
		),
		'hidden-404' => array(
			'title'    => __( '404 content', 'classified-listings' ),
			'categories' => array( 'classified-listings-pages' ),
		),
		'post-listing-single-column' => array(
			'title'    => __( 'Post Single Column', 'classified-listings' ),
			//'inserter' => false,
			'categories' => array( 'classified-listings-query' ),
		),
		'post-listing-two-column' => array(
			'title'    => __( 'Post Two Column', 'classified-listings' ),
			//'inserter' => false,
			'categories' => array( 'classified-listings-query' ),
		),
		'post-listing-three-column' => array(
			'title'    => __( 'Post Three Column', 'classified-listings' ),
			//'inserter' => false,
			'categories' => array( 'classified-listings-query' ),
		),
		'post-listing-four-column' => array(
			'title'    => __( 'Post Four Column', 'classified-listings' ),
			//'inserter' => false,
			'categories' => array( 'classified-listings-query' ),
		),
		'feature-post-column' => array(
			'title'    => __( 'Feature Post Column', 'classified-listings' ),
			//'inserter' => false,
			'categories' => array( 'classified-listings-query' ),
		),
		'comment-section-1' => array(
			'title'    => __( 'Comment Section 1', 'classified-listings' ),
			'categories' => array( 'classified-listings-comment-sections' ),
		),
		'cover-with-post-title' => array(
			'title'    => __( 'Cover With Post Title', 'classified-listings' ),
			'categories' => array( 'classified-listings-banner-sections' ),
		),
	);

	$block_pattern_categories = array(
		'classified-listings-footers' => array( 'label' => __( 'Footers', 'classified-listings' ) ),
		'classified-listings-headers' => array( 'label' => __( 'Headers', 'classified-listings' ) ),
		'classified-listings-pages'   => array( 'label' => __( 'Pages', 'classified-listings' ) ),
		'classified-listings-query'   => array( 'label' => __( 'Query', 'classified-listings' ) ),
		'classified-listings-sidebars'   => array( 'label' => __( 'Sidebars', 'classified-listings' ) ),
		'classified-listings-banner'   => array( 'label' => __( 'Banner Sections', 'classified-listings' ) ),
		'classified-listings-popular-trainding-section'   => array( 'label' => __( 'Popular Trending Sections', 'classified-listings' ) ),
		'classified-listings-comment-section'   => array( 'label' => __( 'Comment Sections', 'classified-listings' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Classified Listings 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'classified_listings_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Classified Listings 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$patterns = apply_filters( 'classified_listings_block_patterns', $patterns );

	foreach ( $patterns as $block_pattern => $pattern ) {
		$pattern['content'] = classified_listings_get_pattern_content( $block_pattern );
		register_block_pattern(
			'classified-listings/' . $block_pattern,
			$pattern
		);
	}
}
add_action( 'init', 'classified_listings_register_block_patterns', 9 );
