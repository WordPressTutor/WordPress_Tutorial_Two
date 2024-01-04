<?php
/*
Plugin Name: My Custom user registration Plugin
Description: This is a custom WordPress plugin.
Version: 1.0
Author: WordPress Tutorial
*/

function my_custom_plugin_menu() {
    add_menu_page(
        'My Plugin Menu',
        'My Plugin',
        'manage_options',
        'my-custom-plugin',
        'my_custom_plugin_page',
        'dashicons-admin-plugins',
        20
    );
}
add_action('admin_menu', 'my_custom_plugin_menu');

function my_custom_plugin_page() {
    if (isset($_POST['submit'])) {
        
        $title = sanitize_text_field($_POST['title']);
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $description = sanitize_textarea_field($_POST['description']);

        
        $post_data = array(
            'post_title' => $title,
            'post_content' => $description,
            'post_type' => 'details', 
            'post_status' => 'publish',
        );

        $post_id = wp_insert_post($post_data);

        
        if ($post_id) {
            update_post_meta($post_id, 'name', $name);
            update_post_meta($post_id, 'email', $email);
            update_post_meta($post_id, 'phone', $phone);

            echo '<div class="updated"><p>Data has been successfully saved!</p></div>';
        } else {
            echo '<div class="error"><p>Error: Data could not be saved.</p></div>';
        }
    }
    ?>

    <div class="wrap">
        <h2>My Custom Plugin</h2>

        <form method="post">
            <label>Title:</label><br>
            <input type="text" name="title"><br>

            <label>Name:</label><br>
            <input type="text" name="name"><br>

            <label>Email:</label><br>
            <input type="text" name="email"><br>

            <label>Phone:</label><br>
            <input type="tel" name="phone"><br><br>

            <label>Description:</label><br>
            <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>

            <input type="submit" name="submit" class="button-primary" value="Submit">
        </form>
    </div>

    <?php
}
