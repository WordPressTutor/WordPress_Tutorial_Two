<?php
/*
Plugin Name: User Profile List Plugin
Description: A plugin to display a list of customers.
Version: 1.0
Author: WordPress Tutorial
*/

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Custom_List_Table extends WP_List_Table {
    public function __construct() {
        parent::__construct([
            'singular' => 'customer',
            'plural'   => 'customers',
            'ajax'     => false,
        ]);
    }

    public function get_columns() {
        return [
            'name'     => 'Name',
            'email'    => 'Email',
            'role'     => 'Role',
        ];
    }

    public function prepare_items() {
        global $wpdb;

        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        // Get users with the 'customer' role.
        $users = get_users(['role' => 'customer']);

        $total_items = count($users);

        $data = [];
        foreach ($users as $user) {
            $user_info = get_userdata($user->ID);
            $data[] = [
                'name'  => $user_info->display_name,
                'email' => $user_info->user_email,
                'role'  => 'Customer', // Hardcoded 'Customer' role for all users in this example.
            ];
        }


        $columns = $this->get_columns();
        $hidden = [];
        $sortable = [];

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page'    => $per_page,
        ]);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = array_slice($data, $offset, $per_page);
    }

    public function column_default($item, $column_name) {
        return $item[$column_name];
    }

    public function no_items() {
        echo 'No records found.';
    }
}

class Custom_Client_List_Table extends WP_List_Table {
    // Similar structure to Custom_List_Table for the client table.
    // Define columns, prepare_items, etc.
    public function __construct() {
        parent::__construct([
            'singular' => 'client_access',
            'plural'   => 'clients_access',
            'ajax'     => false,
        ]);
    }

    public function get_columns() {
        return [
            'name'     => 'Name',
            'email'    => 'Email',
            'role'     => 'Role',
        ];
    }

    public function prepare_items() {
        global $wpdb;

        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        // Get users with the 'customer' role.
        $users = get_users(['role' => 'client_access']);

        $total_items = count($users);

        $data = [];
        foreach ($users as $user) {
            $user_info = get_userdata($user->ID);
            $data[] = [
                'name'  => $user_info->display_name,
                'email' => $user_info->user_email,
                'role'  => 'client_access', // Hardcoded 'Customer' role for all users in this example.
            ];
        }


        $columns = $this->get_columns();
        $hidden = [];
        $sortable = [];

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page'    => $per_page,
        ]);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = array_slice($data, $offset, $per_page);
    }

    public function column_default($item, $column_name) {
        return $item[$column_name];
    }

    public function no_items() {
        echo 'No records found.';
    }
}

class Custom_Subscriber_List_Table extends WP_List_Table{
    public function __construct()
    {
        parent::__construct([
            'singular' => 'subscriber',
            'plural'   => 'subcribers',
            'ajax'     => false,
        ]);
    }

    public function get_columns()
    {
        return[
            'name'     => 'Name',
            'email'    => 'Email',
            'role'     => 'Role',
        ];
    }
    public function prepare_items() {
        global $wpdb;

        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;

        // Get users with the 'customer' role.
        $users = get_users(['role' => 'subscriber']);

        $total_items = count($users);

        $data = [];
        foreach ($users as $user) {
            $user_info = get_userdata($user->ID);
            $data[] = [
                'name'  => $user_info->display_name,
                'email' => $user_info->user_email,
                'role'  => 'subscriber', // Hardcoded 'Customer' role for all users in this example.
            ];
        }


        $columns = $this->get_columns();
        $hidden = [];
        $sortable = [];

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page'    => $per_page,
        ]);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = array_slice($data, $offset, $per_page);
    }

    public function column_default($item, $column_name) {
        return $item[$column_name];
    }

    public function no_items() {
        echo 'No records found.';
    }

}

function custom_list_page() {
    $myListTable = new Custom_List_Table();
    $myListTable->prepare_items();
    ?>
    <div class="wrap">
        <h2>Customer List</h2>
        <?php $myListTable->display(); ?>
    </div>
    <?php
}

function client_list_page() {
    $myClientListTable = new Custom_Client_List_Table();
    $myClientListTable->prepare_items();
    ?>
    <div class="wrap">
        <h2>Client List</h2>
        <?php $myClientListTable->display(); ?>
    </div>
    <?php
}


function subscriber_list_page(){
 $myClientListTable = new Custom_Subscriber_List_Table();
    $myClientListTable->prepare_items();
    ?>
    <div class="wrap">
        <h2>Client List</h2>
        <?php $myClientListTable->display(); ?>
    </div>
    <?php
}

function custom_list_menu() {
    add_menu_page(
    'User Profile List', 
    'Customer List', 
    'manage_options', 
    'customer-list', 
    'custom_list_page');
}
add_action('admin_menu', 'custom_list_menu');

add_action('admin_menu', 'client_list_submenu');

function client_list_submenu() {
    add_submenu_page(
        'customer-list',
        'client list',
        'client list',
        'manage_options',
        'client-slug',
        'client_list_page'
    );
}

add_action('admin_menu', 'subscriber_list_submenu');

function subscriber_list_submenu() {
    add_submenu_page(
        'customer-list',
        'subscriber list',
        'subscriber list',
        'manage_options',
        'subscriber-slug',
        'subscriber_list_page'
    );
}