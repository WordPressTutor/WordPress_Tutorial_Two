<?php
/**
 * Add theme page
 */

function classified_listings_menu() {
	add_theme_page( esc_html__( 'Classified Listings', 'classified-listings' ), esc_html__( 'Classified Theme', 'classified-listings' ), 'edit_theme_options', 'classified-listings-info', 'classified_listings_theme_page_display' );
}
add_action( 'admin_menu', 'classified_listings_menu' );

function classified_listings_admin_theme_style() {
	wp_enqueue_style('classified-listings-custom-admin-style', esc_url(get_template_directory_uri()) . '/css/admin-style.css');
	wp_enqueue_script('classified-listings-tabs', esc_url(get_template_directory_uri()) . '/js/tab.js');
}
add_action('admin_enqueue_scripts', 'classified_listings_admin_theme_style');

/**
 * Display About page
 */
function classified_listings_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	} ?> 

	<div class="wrapper-info">
	    <div class="col-left">
	    	<h2><?php esc_html_e( 'Welcome to Classified Listings Theme', 'classified-listings' ); ?> <span class="version"><?php esc_html_e('Version:','classified-listings'); ?> <?php echo esc_html($theme['Version']);?></span></h2>
	    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','classified-listings'); ?></p>
	    </div>
	    <div class="col-right">
	    	<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/final-logo.png" alt="" />
			</div>
			<div class="update-now">
				<h4><?php esc_html_e('Buy Classified Listings Pro at 20% Discount','classified-listings'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','classified-listings'); ?> ( <span><?php esc_html_e('vwpro20','classified-listings'); ?></span> ) </h4>
				<div class="info-link">
					<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'classified-listings' ); ?></a>
				</div>
			</div>
	    </div>

	    <div class="tab-sec">
			<div class="tab">
				<button class="tablinks" onclick="classified_listings_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Free Setup', 'classified-listings' ); ?></button>
			  	<button class="tablinks" onclick="classified_listings_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'classified-listings' ); ?></button>
			  	<button class="tablinks" onclick="classified_listings_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'classified-listings' ); ?></button>
			</div>

			<div id="lite_theme" class="tabcontent open">
				<div class="col-left-lite-theme">
					<div class="lite-theme-tab">
						<h3><?php esc_html_e( 'Lite Theme Information', 'classified-listings' ); ?></h3>
						<hr class="h3hr">
					  	<p><?php esc_html_e('Classified Listings is a versatile and feature-rich WordPress theme designed to create a powerful online classified ads platform. It caters to various niche markets such as real estate, jobs, services, and products by providing an intuitive and customizable interface that enables users to post and search for classified advertisements easily. At its core, the theme offers a user-friendly front-end submission system, allowing registered users to post their listings seamlessly. This makes it an ideal solution for building a community-driven marketplace. The theme incorporates advanced search and filtering options, making it effortless for visitors to find specific listings based on categories, location, price range, and other relevant criteria. Classified Listings focuses on delivering an engaging and visually appealing experience. It typically includes customizable templates for listing pages, ensuring that each entry maintains a consistent yet unique look. This aids in enhancing user engagement and the overall browsing experience. Moreover, the theme integrates monetization options, enabling website owners to generate revenue by offering premium features for listing promotions, highlighting, or creating membership plans. This can make it a suitable choice for entrepreneurs looking to establish a revenue stream through their classifieds platform. Additionally, the Classified Listings theme is designed to be responsive, ensuring that the platform functions seamlessly on various devices, including desktops, tablets, and smartphones. This enhances accessibility and user engagement, which is crucial for the success of any online marketplace.','classified-listings'); ?></p>
					  	<div class="col-left-inner">
							<div class="pro-links">
						    	<a href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site', 'classified-listings'); ?></a>
								<a href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site', 'classified-listings'); ?></a>
							</div>
							<div class="support-forum-col-section">
								<div class="support-forum-col">
									<h4><?php esc_html_e('Having Trouble, Need Support?', 'classified-listings'); ?></h4>
									<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'classified-listings'); ?></p>
									<div class="info-link">
										<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'classified-listings'); ?></a>
									</div>
								</div>
								<div class="support-forum-col">
									<h4><?php esc_html_e('Reviews & Testimonials', 'classified-listings'); ?></h4>
									<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'classified-listings'); ?>  </p>
									<div class="info-link">
										<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'classified-listings'); ?></a>
									</div>
								</div>
								<div class="support-forum-col">
									<h4><?php esc_html_e('Theme Documentation', 'classified-listings'); ?></h4>
									<p> <?php esc_html_e('If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'classified-listings'); ?>  </p>
									<div class="info-link">
										<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Free Theme Documentation', 'classified-listings'); ?></a>
									</div>
								</div>
							</div>
					  	</div>
					</div>
				</div>
			</div>
			
			<div id="pro_theme" class="tabcontent">
			  	<h3><?php esc_html_e( 'Premium Theme Information', 'classified-listings' ); ?></h3>
				<hr class="h3hr">
			    <div class="col-left-pro">
			    	<p><?php esc_html_e('The Classified WordPress Theme stands as a comprehensive and sophisticated solution designed to establish an exceptional online classified ads platform. It boasts a premium design that exudes professionalism, captivating users with its sleek aesthetics and seamless functionality. This theme caters to businesses, entrepreneurs, and individuals seeking a top-tier platform to list a diverse array of products, services, jobs, and more. Crafted for those who demand excellence, the Classified Theme offers an array of benefits that set it apart from free alternatives. Its premium status guarantees not only an elegant appearance but also unparalleled customization options, allowing users to tailor the website’s visual identity and features according to their specific requirements. This theme is equipped with an impressive range of features and functionalities. Integrated payment gateways streamline transactions, while advanced search and filtering tools empower users to easily discover relevant listings. SEO optimization tools help maximize visibility in search engines, driving higher organic traffic.','classified-listings'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'classified-listings'); ?></a>
						<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'classified-listings'); ?></a>
						<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'classified-listings'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/pro.png" alt="" />
			    </div>
			    <div class="featurebox">
				    <h3 class="theme-features"><?php esc_html_e( 'Theme Features', 'classified-listings' ); ?></h3>
					<hr class="h3hr1">
					<div class="table-image">
						<table class="tablebox">
							<thead>
								<tr>
									<th><?php esc_html_e('Features', 'classified-listings'); ?></th>
									<th><?php esc_html_e('Free Themes', 'classified-listings'); ?></th>
									<th><?php esc_html_e('Premium Themes', 'classified-listings'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php esc_html_e('Easy Setup', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Responsive Design', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('SEO Friendly', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Banner Settings', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Number of Slider/ Banner', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('Banner', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('Unlimited Slides', 'classified-listings'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Template Pages', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('3', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('6', 'classified-listings'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Home Page Template', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'classified-listings'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Theme sections', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('2', 'classified-listings'); ?></td>
									<td class="table-img"><?php esc_html_e('10', 'classified-listings'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Contact us Page Template', 'classified-listings'); ?></td>
									<td class="table-img">0</td>
									<td class="table-img"><?php esc_html_e('1', 'classified-listings'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Blog Templates & Layout', 'classified-listings'); ?></td>
									<td class="table-img">0</td>
									<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'classified-listings'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Page Templates & Layout', 'classified-listings'); ?></td>
									<td class="table-img">0</td>
									<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'classified-listings'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Section Reordering', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Demo Importer', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Full Documentation', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Latest WordPress Compatibility', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Woo-Commerce Compatibility', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Support 3rd Party Plugins', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Secure and Optimized Code', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Exclusive Functionalities', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Section Enable / Disable', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Section Google Font Choices', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Gallery', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Simple & Mega Menu Option', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Support to add custom CSS / JS ', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Shortcodes', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Premium Membership', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Budget Friendly Value', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Priority Error Fixing', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Custom Feature Addition', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('All Access Theme Pass', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Seamless Customer Support', 'classified-listings'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( CLASSIFIED_LISTINGS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'classified-listings'); ?></a></td>
								</tr>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>

			<div id="free_pro" class="tabcontent">
				<div class="support-sec">
				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'classified-listings'); ?></h4>
						<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'classified-listings'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'classified-listings'); ?></a>
						</div>
				  	</div>
				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'classified-listings'); ?></h4>
						<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'classified-listings'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'classified-listings'); ?></a>
						</div>
				  	</div>

				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'classified-listings'); ?></h4>
						<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'classified-listings'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','classified-listings'); ?></a>
						</div>
				  	</div>

				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'classified-listings'); ?></h4>
						<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'classified-listings'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( CLASSIFIED_LISTINGS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'classified-listings'); ?></a>
						</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>
<?php }?>