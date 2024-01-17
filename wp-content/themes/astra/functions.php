<?php

/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
    // Exit if accessed directly.
}

/**
 * Define Constants
 */
define('ASTRA_THEME_VERSION', '4.3.1');
define('ASTRA_THEME_SETTINGS', 'astra-settings');
define('ASTRA_THEME_DIR', trailingslashit(get_template_directory()));
define('ASTRA_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
define('ASTRA_PRO_UPGRADE_URL', 'https://wpastra.com/pro/?utm_source=dashboard&utm_medium=free-theme&utm_campaign=upgrade-now');
define('ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', 'https://wpastra.com/pro/?utm_source=customizer&utm_medium=free-theme&utm_campaign=upgrade');

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define('ASTRA_EXT_MIN_VER', '4.1.0');

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if (is_admin()) {
    require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if (is_admin()) {
    /**
     * Admin Menu Settings
     */
    require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
    require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
    require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if (version_compare(PHP_VERSION, '5.4', '>=')) {
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymus functions.
if (version_compare(PHP_VERSION, '5.3', '>=')) {
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';


// -------------------------------------------------------------------------------------------------------
function feedback_form_shortcode()
{
    ob_start();
?>
    <!-- <form method='post' action=''>
         <label>Name:</label><br>
         <input type='text' name='name' required><br>
         <label>Email:</label><br>
         <input type='email' name='email' required><br>
         <label>Feedback:</label><br>
         <textarea name='message' required></textarea><br>
         <input type='submit' name='submit' value='Submit Feedback'>
     </form> -->
<?php
    return;
}
add_shortcode('feedback_form', 'feedback_form_shortcode');



function custom_video_shortcode($atts)
{
    // Extract attributes
    $atts = shortcode_atts(array(
        'url' => 'https://www.youtube.com/embed/a3ICNMQW7Ok?si=a7bK7mTOf9N8YNS9', // Video URL
        'width' => '640', // Video width
        'height' => '360', // Video height
    ), $atts);

    // Ensure the URL is provided
    if (empty($atts['url'])) {
        return '<p>Error: No video URL provided.</p>';
    }

    // Start building the video HTML
    $output = '<div class="custom-video">';
    $output .= '<iframe width="' . esc_attr($atts['width']) . '" height="' . esc_attr($atts['height']) . '" src="' . esc_url($atts['url']) . '" frameborder="0" allowfullscreen></iframe>';
    $output .= '</div>';

    return $output;
}

add_shortcode('custom_video', 'custom_video_shortcode');

// if (isset($_POST['submit'])) {
//     $name = sanitize_text_field($_POST['name']);
//     $email = sanitize_email($_POST['email']);
//     $message = sanitize_textarea_field($_POST['message']);
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'feedback_details';

//     $data = (array(
//         'name' => $name,
//         'email' => $email,
//         'message' => $message,
//     ));

//     $wpdb->insert(
//         $table_name,
//         compact('name', 'email', 'message'),
//         array('%s', '%s', '%s')
//     );
//     echo '<div class="updated"><p>Feedback has been successfully submitted!</p></div>';
// }

//----------------------------------------------------------------------------------------------------------------
function custom_woocommerce_employee_shortcode()
{
    ob_start(); // Start output buffering

    // Include necessary JavaScript and CSS for AJAX
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-employee-ajax', get_template_directory_uri() . '/js/custom-employee-ajax.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-employee-ajax', 'employeeajax', array('ajaxurl' => admin_url('admin-ajax.php')));

    // Output HTML for the shortcode
?>
    <div id="employee-data">
        <p id="emp-id">Employee ID: <span></span></p>
        <p id="emp-name">Employee Name: <span></span></p>
        <p id="emp-email">Employee Email: <span></span></p>
        <p id="emp-dept">Employee Department: <span></span></p>
        <button id="get-employee">Get Employee Info</button>
    </div>
<?php

    // Return the output
    return ob_get_clean();
}

add_shortcode('woocommerce_employee', 'custom_woocommerce_employee_shortcode');

//------------------------------------------------------------------------------------------------------------
function custom_get_employee_data()
{
    global $wpdb;

    $emp_id = (int) $_POST['emp_id'];
    $results = $wpdb->get_row($wpdb->prepare("SELECT * FROM wp_crud_employees WHERE emp_id = %d", $emp_id));

    if ($results) {
        $response = array(
            'emp_id' => $results->emp_id,
            'emp_name' => $results->emp_name,
            'emp_email' => $results->emp_email,
            'emp_dept' => $results->emp_dept
        );
        wp_send_json_success($response);
    } else {
        wp_send_json_error(array('message' => 'Employee not found.'));
    }
}
add_action('wp_ajax_get_employee_data', 'custom_get_employee_data');
add_action('wp_ajax_nopriv_get_employee_data', 'custom_get_employee_data');


//-------------------------------------------------------------------------------------------

function display_submitted_data_shortcode()
{
    ob_start();
?>
    <div class="submitted-data">
        <form action="" method="POST" id="address-filter-form">
            <label for="address-filter">Filter by Address:</label>
            <select name="address_filter" id="address-filter">
                <option value="">Show All</option>
                <option value="Gomti Nagar">Gomti Nagar</option>
                <option value="Delhi">Delhi</option>
                <option value="Lucknow">Lucknow</option>
            </select>
            <button type="submit">Apply Filter</button>
        </form>
        <br><br><br>
        <div id="filtered-data">
            <?php echo get_submitted_data(); ?>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('#address-filter-form').on('submit', function(e) {
                e.preventDefault();
                var address_filter = $('#address-filter').val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: {
                        action: 'filter_submitted_data',
                        address_filter: address_filter,
                    },
                    success: function(response) {
                        $('#filtered-data').html(response);
                    }
                });
            });
        });
    </script>
    <?php
}
add_shortcode('display_submitted_data', 'display_submitted_data_shortcode');


function get_submitted_data($address_filter = '')
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'ajax_form';


    $query = "SELECT * FROM $table_name";
    if (!empty($address_filter)) {
        $query .= $wpdb->prepare(" WHERE Address = %s", $address_filter);
    }

    $results = $wpdb->get_results($query);

    ob_start();
    if ($results) {
    ?>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result) : ?>
                    <tr>
                        <td><?php echo esc_html($result->Username); ?></td>
                        <td><?php echo esc_html($result->Email); ?></td>
                        <td><?php echo esc_html($result->Number); ?></td>
                        <td><?php echo esc_html($result->DateOfBirth); ?></td>
                        <td><?php echo esc_html($result->Address); ?></td>
                        <td><?php echo esc_html($result->Gender); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php
    }
}


function filter_submitted_data_ajax_handler()
{
    $address_filter = isset($_POST['address_filter']) ? sanitize_text_field($_POST['address_filter']) : '';
    echo get_submitted_data($address_filter);
}

add_action('wp_ajax_filter_submitted_data', 'filter_submitted_data_ajax_handler');
add_action('wp_ajax_nopriv_filter_submitted_data', 'filter_submitted_data_ajax_handler');





//----------------------------------------------------------------------------------------------------
//wordpress category post list and pagination functions
// Enqueue scripts
function enqueue_ajax_scripts()
{
    wp_enqueue_script('jquery');

    wp_localize_script('jquery', 'custom_table_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_scripts');

// AJAX handler
function custom_table_ajax_handler()
{
    check_ajax_referer('custom_table_nonce', 'security');

    $category_filter = isset($_POST['post_categories']) ? sanitize_text_field($_POST['post_categories']) : '';
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 5;

    global $wpdb;
    $table_name = $wpdb->prefix . 'posts';

    $offset = ($page - 1) * $posts_per_page;

    $query = "SELECT p.*, t.name AS category_name, u.display_name AS author_name
              FROM $table_name p
              LEFT JOIN {$wpdb->prefix}term_relationships tr ON p.ID = tr.object_id
              LEFT JOIN {$wpdb->prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
              LEFT JOIN {$wpdb->prefix}terms t ON tt.term_id = t.term_id
              LEFT JOIN {$wpdb->prefix}users u ON p.post_author = u.ID
              WHERE p.post_type ='post'";

    if (!empty($category_filter)) {
        $query .= $wpdb->prepare(" AND t.name = %s", $category_filter);
    }

    if (!empty($search_query)) {
        $query .= $wpdb->prepare(" AND (p.post_title LIKE %s OR p.post_date LIKE %s OR t.name LIKE %s)", '%' . $search_query . '%', '%' . $search_query . '%', '%' . $search_query . '%');
    }

    $query .= $wpdb->prepare(" LIMIT %d, %d", $offset, $posts_per_page);

    $posts = $wpdb->get_results($query, ARRAY_A);

    ob_start();
    ?>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Categories</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <td><?= $post['post_title']; ?></td>
                    <td><?= $post['post_date']; ?></td>
                    <td><?= $post['category_name']; ?></td>
                    <td><?= $post['author_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination controls -->
    <div class="pagination">
        <?php
        $total_posts = wp_count_posts()->publish;
        $total_pages = ceil($total_posts / $posts_per_page);

        if ($page > 1)
            echo '<a href="#" class="prev-page" data-page="' . ($page - 1) . '">Previous</a>';

        echo '<span>Page ' . $page . ' of ' . $total_pages . '</span>';

        if (count($posts) === $posts_per_page) {
            echo '<a href="#" class="next-page" data-page="' . ($page + 1) . '">Next</a>';
        }
        ?>
    </div>
<?php
    $table_html = ob_get_clean();

    wp_send_json_success($table_html);
}
add_action('wp_ajax_custom_table_filter', 'custom_table_ajax_handler');
add_action('wp_ajax_nopriv_custom_table_filter', 'custom_table_ajax_handler');

// Shortcode for displaying the table
function custom_post_table()
{
    $categories = get_terms(array('taxonomy' => 'category', 'hide_empty' => false));
?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="table">
        <div class="row">
            <div class="col-5">
                <h2>Post Table</h2>
            </div>
            <div class="col-7">
                <form action="" method="GET" id="filter-form">
                    <div class="row">
                        <div class="col-4">
                            <select name="post_categories" id="form-select" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo esc_attr($category->name); ?>"><?php echo esc_html($category->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" name="search_query" id="search-input" placeholder="Search...">
                        </div>
                        <div class="col-4">
                            <button type="button" class="button button-primary" id="filter-button">Filter & Search</button><br><br>
                            <a href="#" class="button button-danger" id="reset-filter">Reset</a><br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="post-table-container">
            <!-- AJAX content will be loaded here -->
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            var currentPage = 1;

            function fetchAndDisplayData(page) {
                var post_categories = $('#form-select').val();
                var searchQuery = $('#search-input').val();
                $.ajax({
                    type: 'POST',
                    url: custom_table_ajax.ajax_url,
                    data: {
                        action: 'custom_table_filter',
                        security: '<?php echo wp_create_nonce("custom_table_nonce"); ?>',
                        post_categories: post_categories,
                        search_query: searchQuery,
                        page: page,
                    },
                    success: function(response) {
                        $('#post-table-container').html(response.data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Initial load
            fetchAndDisplayData(currentPage);

            // Filter and search button click event
            $('#filter-button').on('click', function() {
                currentPage = 1;
                fetchAndDisplayData(currentPage);
            });

            // Reset filter button click event
            $('#reset-filter').on('click', function() {
                $('#form-select').val('');
                $('#search-input').val('');
                currentPage = 1;
                fetchAndDisplayData(currentPage);
            });

            // Pagination controls
            $('#post-table-container').on('click', '.next-page', function(e) {
                e.preventDefault();
                currentPage++;
                fetchAndDisplayData(currentPage);
            });

            $('#post-table-container').on('click', '.prev-page', function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    fetchAndDisplayData(currentPage);
                }
            });
        });
    </script>
    <?php
}
add_shortcode('custom_table', 'custom_post_table');





//-------------------------------------------------------------------------------------

//wordpress woo commerce product meta box 
class WooCommerceProductMetaBox
{

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'create_meta_box']);
        add_action('save_post', [$this, 'save_product_meta']);
    }

    public function create_meta_box()
    {
        add_meta_box('product_color_picker', 'Product Color', [$this, 'meta_box_html'], 'product', 'normal', 'high');
    }

    public function meta_box_html($post)
    {
        // Get the existing color value from post meta, if it exists.
        $color = get_post_meta($post->ID, '_product_color', true);

    ?>
        <label for="product_color">Color:</label>
        <input type="text" id="product_color" name="product_color" value="<?php echo esc_attr($color); ?>">
        <br>


<?php
    }

    public function save_product_meta($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        if ($post_id && isset($_POST['product_color'])) {
            $color = sanitize_text_field($_POST['product_color']);
            update_post_meta($post_id, '_product_color', $color);
        }
    }
}

new WooCommerceProductMetaBox();

//----------------------------------------------------------------



// Function to add custom rating display after the product title

function add_custom_rating_display_after_title()
{
    global $product;
    if (is_product()) {
        $average_rating = $product->get_average_rating();
        $total_ratings = $product->get_rating_count();
        $percentage5 = ($product->get_rating_count(5) / $total_ratings) * 100;
        $percentage4 = ($product->get_rating_count(4) / $total_ratings) * 100;
        $percentage3 = ($product->get_rating_count(3) / $total_ratings) * 100;
        $percentage2 = ($product->get_rating_count(2) / $total_ratings) * 100;
        $percentage1 = ($product->get_rating_count(1) / $total_ratings) * 100;
        echo '
        <style>
            .rating-count-star-section {
                display: flex;
                align-items: center;
                gap: 5px;
                width: fit-content;
                position: relative;
                font-family: sans-serif;
            }

            .rating-star {
                display: flex;
                align-items: center;
            }

            .rating-star svg {
                width: 20px;
                height: 20px;
                color: gold;
            }

            .rating-popover {
                overflow: hidden;
                border: 1px solid #bbbfbf;
                border-color: #bbbfbf;
                width: 100%;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(15, 17, 17, 0.15);
                background-color: #fff;
                padding: 10px;
                position: absolute;
                top: calc(100% + 0px);
                min-width: 200px;
                display: none;
            }

            .rating-count-star-section:hover .rating-popover {
                display: block;
            }

            .rating-popover table {
                width: 100%;
                margin: 10px 0 0;
            }

            .rating-popover table tr td {
                padding: 5px 0;
                text-align: center;
            }
           
            .rating-star span {
                font-size: 30px;
                color: #FFD700; /* Set the color to yellow */
                margin-right: 5px; /* Adjust the spacing between stars */
            }

            /* Style for filled stars */
            .rating-star .star-★ {
            color: #FFD700; /* Set the color to yellow */
        }

        </style>';
        echo '
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
        jQuery.noConflict();
        jQuery(document).ready(function($) {
            $(".rating-count-star-section").hover(
                function() {
                    $(".rating-popover").show();
                },
                function() {
                    $(".rating-popover").hide();
                }
            );
        });
        </script>';
        echo '
        <div class="rating-wrapper-section">
            <div class="rating-section">
                <div class="rating-count-star-section">
                    <span>' . esc_html($average_rating) . '</span>
                    <div class="rating-star">';

        for ($i = 1; $i <= 5; $i++) {
            $filled_star = $i <= $average_rating ? '★' : '☆';
            echo '<span class="star-' . $filled_star . '">' . $filled_star . '</span>';
        }
        echo '
                    </div>
                    <div class="rating-popover">
                        <table>
                            <tr>
                                <td>5 Star</td>
                                <td>' . esc_html(number_format($percentage5, 0)) . '%</td>
                            </tr>
                            <tr>
                                <td>4 Star</td>
                                <td>' . esc_html(number_format($percentage4, 0)) . '%</td>
                            </tr>
                            <tr>
                                <td>3 Star</td>
                                <td>' . esc_html(number_format($percentage3, 0)) . '%</td>
                            </tr>
                            <tr>
                                <td>2 Star</td>
                                <td>' . esc_html(number_format($percentage2, 0)) . '%</td>
                            </tr>
                            <tr>
                                <td>1 Star</td>
                                <td>' . esc_html(number_format($percentage1, 0)) . '%</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>';
    }
}
add_action('woocommerce_before_add_to_cart_form', 'add_custom_rating_display_after_title', 20);
?>