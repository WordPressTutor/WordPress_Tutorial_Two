<?php

/**
 * Plugin Name: Custom Product Add
 * Description: This is a custom product add plugin
 * Version: 1.0
 * Author: WordPress Tutorial
 */

function product_shortcode()
{

    ob_start();

    $args = array('type' => 'product', 'taxonomy' => 'product_cat');
    $categories = get_categories($args);


    if (isset($_POST['addproduct'])) {

        $product_title = sanitize_text_field($_POST['product_title']);

        $product_content = sanitize_textarea_field($_POST['product_content']);

        $product_category = sanitize_text_field($_POST['event-dropdown']);
        $regular_price = sanitize_text_field($_POST['regular_price']);

        $sale_price = sanitize_text_field($_POST['sale_price']);

        $post_data = array(
            'post_title'   => $product_title,
            'post_content' => $product_content,
            'post_status'  => 'publish',
            'post_type'    => 'product',
            'post_author'  => get_current_user_id(),
            'event-dropdown' => array($product_category),  // Corrected line
            'tax_input' => array(
                'product_cat' => array($product_category),
            ),

        );

        $post_id = wp_insert_post($post_data);

        if ($post_id) {
            update_post_meta($post_id, '_regular_price', $regular_price);

            update_post_meta($post_id, '_sale_price', $sale_price);

            update_post_meta($post_id, '_price', $regular_price);

            // Featured Image
            if (!empty($_FILES['fimage']['name'])) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/media.php');

                $file_handler = 'fimage';
                $attach_id = media_handle_upload($file_handler, $post_id);

                if (is_wp_error($attach_id)) {
                    echo "<script>alert('Error uploading featured image: " . esc_html($attach_id->get_error_message()) . "');</script>";
                } else {
                    set_post_thumbnail($post_id, $attach_id);
                }
                echo "<script>alert('Product Added Successfully!');</script>";
            } else {
                echo "<script>alert('Product not added');</script>";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Product</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>

    <body>

        <form class="form-horizontal" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend>PRODUCTS</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">PRODUCT TITLE</label>
                    <div class="col-md-4">
                        <input id="product_name" name="product_title" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name_fr">PRODUCT CONTENT</label>
                    <div class="col-md-4">
                        <textarea id="product_name_fr" name="product_content" placeholder="PRODUCT CONTENT" class="form-control input-md" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
                    <div class="col-md-4">
                        <select name="event-dropdown">
                            <?php
                            echo '<option value="">Select the Categories</option>';
                            foreach ($categories as $cat) {
                                echo '<option value="' . $cat->term_id . '">' . $cat->name . '</option>';  // Corrected line
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="available_quantity">REGULAR PRICE</label>
                    <div class="col-md-4">
                        <input id="available_quantity" name="regular_price" placeholder="REGULAR PRICE" class="form-control input-md" required="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="available_quantity">SALE PRICE</label>
                    <div class="col-md-4">
                        <input id="available_quantity" name="sale_price" placeholder="SALE PRICE" class="form-control input-md" required="" type="text">
                    </div>
                </div>

                <!-- File Button - Featured Image -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">FEATURE IMAGE</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="fimage" class="input-file" type="file">
                    </div>
                </div>



                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">ADD PRODUCT</label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="addproduct" class="btn btn-primary">save product</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </body>

    </html>
<?php
    return ob_get_clean();
}

add_shortcode('product_shortcode', 'product_shortcode');
?>