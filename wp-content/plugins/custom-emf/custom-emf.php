<?php
/*
Plugin Name: My Custom CRUD Plugin
Description: This is a custom CRUD WordPress plugin.
Version: 1.0
Author: WordPress Tutorial
*/

register_activation_hook(__FILE__, 'create_employee_table');

function create_employee_table()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'crud_employees';


    $sql = "CREATE TABLE $table_name (
        id mediumint(11) NOT NULL AUTO_INCREMENT,
        emp_id varchar(50) NOT NULL,
        emp_name varchar(250) NOT NULL,
        emp_email varchar(250) NOT NULL,
        emp_dept varchar(250) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


add_action('admin_menu', 'add_crud_menu');

function add_crud_menu()
{
    add_menu_page('Employee CRUD', 'Employee CRUD', 'manage_options', 'employee_crud', 'employee_crud_page');
}

// Callback function for CRUD operations
function employee_crud_page()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'crud_employees';

    //submissions
    if (isset($_POST['submit'])) {
        $emp_id = sanitize_text_field($_POST['emp_id']);
        $emp_name = sanitize_text_field($_POST['emp_name']);
        $emp_email = sanitize_email($_POST['emp_email']);
        $emp_dept = sanitize_text_field($_POST['emp_dept']);


        if (isset($_GET['action']) && $_GET['action'] === 'edit') {
            $id = intval($_GET['id']);
            $wpdb->update(
                $table_name,
                compact('emp_id', 'emp_name', 'emp_email', 'emp_dept'),
                array('id' => $id),
                array('%s', '%s', '%s', '%s'),
                array('%d')
            );
            $_GET['action'] = 'add';
        } else {
            $wpdb->insert(
                $table_name,
                compact('emp_id', 'emp_name', 'emp_email', 'emp_dept'),
                array('%s', '%s', '%s', '%s')
            );
        }
    }

    //employee deletion
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $wpdb->delete($table_name, array('id' => $id), array('%d'));
    }


    $employees = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);


?>
    <div class="wrap">
        <h2>Employee List</h2>
        <table class="wp-list-table widefat fixed striped">

            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee) : ?>
                    <tr>

                        <td><?= $employee['emp_id']; ?></td>
                        <td><?= $employee['emp_name']; ?></td>
                        <td><?= $employee['emp_email']; ?></td>
                        <td><?= $employee['emp_dept']; ?></td>
                        <td>
                            <a href="?page=employee_crud&action=edit&id=<?= $employee['id']; ?>">Edit</a> |
                            <a href="?page=employee_crud&action=delete&id=<?= $employee['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <h2><?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? 'Edit Employee' : 'Add Employee'; ?></h2>
        <form method="post">
            <?php
            if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $employee = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $id", ARRAY_A);
            }
            ?>
            <input type="hidden" name="action" value="<?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? 'edit' : 'add'; ?>">
            <input type="hidden" name="id" value="<?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? esc_attr($employee['id']) : ''; ?>">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label>Employee ID</label></th>
                        <td><input name="emp_id" type="text" id="emp_id" class="regular-text" required value="<?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? esc_attr($employee['emp_id']) : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Name</label></th>
                        <td><input name="emp_name" type="text" id="emp_name" class="regular-text" required value="<?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? esc_attr($employee['emp_name']) : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Email</label></th>
                        <td><input name="emp_email" type="email" id="emp_email" class="regular-text" required value="<?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? esc_attr($employee['emp_email']) : ''; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label>Department</label></th>
                        <td><input name="emp_dept" type="text" id="emp_dept" class="regular-text" required value="<?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? esc_attr($employee['emp_dept']) : ''; ?>"></td>
                    </tr>
                </tbody>
            </table>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?= (isset($_GET['action']) && $_GET['action'] === 'edit') ? 'Update Employee' : 'Add Employee'; ?>"></p>
        </form>
    <?php
}
