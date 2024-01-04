<?php
/*
Plugin Name: My Custom product details page
Description: A plugin to display a list of product details.
Version: 1.0
Author: WordPress Tutorial
*/

function my_custom_product_details()
{
    add_menu_page(
        'My Product Menu',
        'My Product',
        'manage_options',
        'my-custom-product-details',
        'my_custom_product_details_page',
        'dashicons-admin-plugins',
    );
}
add_action('admin_menu', 'my_custom_product_details');

function my_custom_product_details_page($meta_key)
{
    $serial_Number = 1;
?>
    <div class="wrap">
        <h2>Product Details</h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th>Serial Number:</th>
                    <th>Product Image</th>
                    <th>Product Title</th>
                    <th>Post Date</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $args = array(
                    'post_type' => 'product',

                );
                $products = new WP_Query($args);

                if ($products->have_posts()) {
                    while ($products->have_posts()) {
                        $products->the_post();
                        $product_id = get_the_ID();
                        $product_image_id = get_post_meta(get_the_ID(), '_thumbnail_id', true); // Retrieve the featured image ID
                        $product_image = wp_get_attachment_image($product_image_id, 'thumbnail');
                ?>
                        <tr>
                            <td><?php echo $serial_Number; ?></td>
                            <td><?php echo $product_image; ?></td>
                            <td><?php the_title(); ?></td>
                            <td><?php the_date(); ?></td>
                            <td><?php echo wc_get_product_category_list($product_id)?></td>
                            <td>
                                <?php
                                $price = get_post_meta(get_the_ID(), '_price', true);
                                echo $price ? $price : 'N/A';
                                ?>
                            </td>
                            <td>
                                <?php
                                $color = get_post_meta(get_the_ID(), '_product_color', true);
                                echo $color ? $color : 'N/A';
                                ?>
                            </td>
                            
                        </tr>
                <?php
                        $serial_Number++;
                    }
                    wp_reset_postdata(); // Reset the query
                } else {
                    echo '<tr><td colspan="6">No products found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
