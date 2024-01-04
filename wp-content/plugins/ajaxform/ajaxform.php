<?php
/*
Plugin Name: My AJAX Form
Description: This is a AJAX Form
Version: 1.0
Author: WordPress Tutorial
*/

function my_form_ajax_menu()
{
    add_menu_page(
        'My Form Menu',
        'My Form',
        'manage_options',
        'my-form-ajax',
        'my_form_ajax_page',
        'dashicons-admin-plugins'
    );
}

add_action('admin_menu', 'my_form_ajax_menu');

function my_ajax_plugin_enqueue_scripts()
{
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'my_ajax_plugin_enqueue_scripts');


function my_form_ajax_page()
{
    global $wpdb;
    if(isset($_POST['submit'])){
        if(isset($_POST['ID'])){
        $ID = intval($_POST['ID']);
        $username = sanitize_text_field($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $number = sanitize_text_field($_POST['number']);
        $dob = sanitize_text_field($_POST['dob']);
        $address = sanitize_textarea_field($_POST['address']);
        $gender = sanitize_text_field($_POST['gender']);

        $wpdb->update(
            $wpdb->prefix . 'ajax_form',
            array(
                'Username' => $username,
                'Email' => $email,
                'Number' => $number,
                'Dob' => $dob,
                'Address'=> $address,
                'Gender' => $gender,
            ),
            array('ID' => $ID),
            array('%s', '%s', '%d', '%d', '%s', '%s'),
            array('%d')
        );
        echo '<div class="updated"><p>updated successfully.</p></div>';
        }else{
        $username = sanitize_text_field($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $number = sanitize_text_field($_POST['number']);
        $dob = sanitize_text_field($_POST['dob']);
        $address = sanitize_textarea_field($_POST['address']);
        $gender = sanitize_text_field($_POST['gender']);
        }

        $wpdb->insert(
            $wpdb->prefix . 'ajax_form',
            array(
                'Username' => $username,
                'Email' => $email,
                'Number' => $number,
                'Dob' => $dob,
                'Address'=> $address,
                'Gender' => $gender,
            ),
            array('%s', '%s', '%d', '%d', '%s', '%s'),          
        );
        echo  '<div class="updated"><p>added successfully.</p></div>';
    }
   
?>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 50%;
                margin: 0 auto;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <form method="post">
            <center>
                <h1>Registration Form</h1>
            </center>
            <table>
                <input type="hidden" name="ID" id="id">
                <tr>
                    <th><label>Username:</label></th>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <th><label>Email:</label></th>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <th><label>Number:</label></th>
                    <td><input type="text" name="number"></td>
                </tr>
                <tr>
                    <th><label>Date of Birth:</label></th>
                    <td><input type="date" name="dob"></td>
                </tr>
                <tr>
                    <th><label>Address:</label></th>
                    <td><textarea name="address" cols="30" rows="5"></textarea></td>
                </tr>
                <tr>
                    <th><label>Gender:</label></th>
                    <td>
                        <select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <center><input type="submit" id="submit-button" class="button" style="background-color:#00d2ff; color:black; padding: 10px;" name="submit" value="Register"></center>
        </form><br><br>
        <center><button id="display-data-button" class="button" style="background-color: #00d2ff; color: black; padding: 10px;">
                Display Data
            </button></center>
            <div id="response-container"></div>
        <div id="data-display"></div>

    </body>

    </html>
    <script>
        
    </script>

    <?php
}

function my_ajax_data_callback()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'ajax_form';
    $results = $wpdb->get_results("SELECT * FROM $table_name", OBJECT);

    if ($results) {
    ?>
        <div class="wrap">
            <h2>Registration List</h2>
            <table class="wp-list-table widefat fixed striped">
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
        </div>
<?php
    } else {
        echo "data not found";
    }

    die();
}
// Add an action hook to handle AJAX requests with the action parameter 'my_ajax_data'
add_action('wp_ajax_my_ajax_data', 'my_ajax_data_callback');

// Add an action hook to handle AJAX requests from non-logged-in users with the action parameter 'my_ajax_data'
add_action('wp_ajax_nopriv_my_ajax_data', 'my_ajax_data_callback');

// Function to enqueue JavaScript files and set up localization data for AJAX
function enqueue_my_scripts()
{
    // Enqueue the JavaScript file 'my-ajax-scripts.js'
    wp_enqueue_script('my-ajax-scripts', plugin_dir_url(__FILE__) . 'my-ajax-scripts.js', array('jquery'), '1.0', true);

    // Localize the script by passing data to the client-side JavaScript
    wp_localize_script('my-ajax-scripts', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}

// Add an action hook to enqueue scripts when in the WordPress admin area
add_action('admin_enqueue_scripts', 'enqueue_my_scripts');
