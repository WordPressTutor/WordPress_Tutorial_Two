<?php
/*
Plugin Name: Hospital Management System
Description: A simple hospital management system
Version: 1.0
Author: WordPress Tutorial
*/

// Create a custom plugin menu
add_action('admin_menu', 'hospital_management_menu');
function hospital_management_menu()
{
    add_menu_page(
        'Hospital Management',
        'Hospital Management',
        'manage_options',
        'hospital-management',
        'hospital_management_page'
    );
}

function hospital_management_page()
{
    ?>
    <div class="wrap">
        <h1>Hospital Management System</h1>

        <!-- Form to add/update patient data -->
        <form id="patient-form" method="post">
            <input type="hidden" name="patient_id" id="patient-id" value="">
            <label for="patient-name">Patient Name:</label><br>
            <input type="text" id="patient-name" name="patient_name" required><br><br>

            <label for="patient-age">Patient Age:</label><br>
            <input type="number" id="patient-age" name="patient_age" required><br><br>

            <label for="patient-condition">Patient Condition:</label><br>
            <textarea id="patient-condition" name="patient_condition" rows="5" required></textarea><br><br>

            <!-- Buttons for adding and updating patient -->
            <button type="submit" id="add-patient">Add Patient</button>
            <button type="button" id="update-patient" style="display: none;">Update Patient</button><br><br>
        </form>

        <!-- Table to display patient data -->
        <table id="patient-data" class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Patient Age</th>
                    <th>Patient Condition</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- JavaScript code using jQuery -->
    <script>
        jQuery(document).ready(function() {
            // Load patient data on page load
            loadPatientData();

            // Add patient data
            jQuery('#add-patient').click(function(e) {
                e.preventDefault();
                var patientData = {
                    patient_name: jQuery('#patient-name').val(),
                    patient_age: jQuery('#patient-age').val(),
                    patient_condition: jQuery('#patient-condition').val(),
                };

                // AJAX request to add a new patient
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'add_patient',
                        patient_data: patientData,
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Patient added successfully');
                            loadPatientData();
                            jQuery('#patient-form')[0].reset();
                        } else {
                            alert('Error adding patient: ' + response.data);
                        }
                    },
                });
            });

            // Edit patient data
            jQuery(document).on('click', '.edit-patient', function() {
                var patientId = jQuery(this).data('patient-id');
                var patientRow = jQuery(this).closest('tr');
                var patientName = patientRow.find('td:eq(0)').text();
                var patientAge = patientRow.find('td:eq(1)').text();
                var patientCondition = patientRow.find('td:eq(2)').text();

                jQuery('#patient-id').val(patientId);
                jQuery('#patient-name').val(patientName);
                jQuery('#patient-age').val(patientAge);
                jQuery('#patient-condition').val(patientCondition);

                jQuery('#add-patient').hide();
                jQuery('#update-patient').show();
            });

            // Update patient data
            jQuery('#update-patient').click(function(e) {
                e.preventDefault();
                var patientData = {
                    patient_id: jQuery('#patient-id').val(),
                    patient_name: jQuery('#patient-name').val(),
                    patient_age: jQuery('#patient-age').val(),
                    patient_condition: jQuery('#patient-condition').val(),
                };

                // AJAX request to update patient
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'update_patient',
                        patient_data: patientData,
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Patient updated successfully');
                            loadPatientData();
                            jQuery('#patient-form')[0].reset();
                            jQuery('#add-patient').show();
                            jQuery('#update-patient').hide();
                        } else {
                            alert('Error updating patient: ' + response.data);
                        }
                    },
                });
            });

            // Delete patient data
            jQuery(document).on('click', '.delete-patient', function() {
                var confirmDelete = confirm('Are you sure you want to delete this patient?');
                if (confirmDelete) {
                    var patientId = jQuery(this).data('patient-id');

                    // AJAX request to delete patient
                    jQuery.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'delete_patient',
                            patient_id: patientId,
                        },
                        success: function(response) {
                            if (response.success) {
                                alert('Patient deleted successfully');
                                loadPatientData();
                            } else {
                                alert('Error deleting patient: ' + response.data);
                            }
                        },
                    });
                }
            });

            // Load patient data
            function loadPatientData() {
                // AJAX request to get patient data
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'get_patient_data',
                    },
                    success: function(response) {
                        var patientData = response;

                        // Clear table rows
                        jQuery('#patient-data tbody').empty();

                        // Add table rows with patient data
                        for (var i = 0; i < patientData.length; i++) {
                            var row = '<tr>' +
                                '<td>' + patientData[i].patient_name + '</td>' +
                                '<td>' + patientData[i].patient_age + '</td>' +
                                '<td>' + patientData[i].patient_condition + '</td>' +
                                '<td>' +
                                '<button class="edit-patient" data-patient-id="' + patientData[i].patient_id + '">Edit</button>' +
                                '<button class="delete-patient" data-patient-id="' + patientData[i].patient_id + '">Delete</button>' +
                                '</td>' +
                                '</tr>';

                            jQuery('#patient-data tbody').append(row);
                        }
                    },
                });
            }
        });
    </script>
    <?php
}

// Register AJAX actions
add_action('wp_ajax_add_patient', 'add_patient_ajax');
add_action('wp_ajax_update_patient', 'update_patient_ajax');
add_action('wp_ajax_delete_patient', 'delete_patient_ajax');
add_action('wp_ajax_get_patient_data', 'get_patient_data_ajax');

// AJAX callback functions

// Add a new patient
function add_patient_ajax()
{
    if (isset($_POST['patient_data'])) {
        $patient_data = $_POST['patient_data'];

        $patient_name = sanitize_text_field($patient_data['patient_name']);
        $patient_age = intval($patient_data['patient_age']);
        $patient_condition = sanitize_text_field($patient_data['patient_condition']);

        global $wpdb; 

        $result = $wpdb->insert(
            $wpdb->prefix . 'patients', 
            array(
                'patient_name' => $patient_name,
                'patient_age' => $patient_age,
                'patient_condition' => $patient_condition,
            ),
            array('%s', '%d', '%s')
        );

        if ($result !== false) {
            wp_send_json_success('Patient added successfully');
        } else {
            wp_send_json_error('Error adding patient');
        }
    } else {
        wp_send_json_error('Invalid data');
    }
}

// Update an existing patient
function update_patient_ajax()
{
    if (isset($_POST['patient_data'])) {
        $patient_data = $_POST['patient_data'];

        $patient_id = intval($patient_data['patient_id']);
        $patient_name = sanitize_text_field($patient_data['patient_name']);
        $patient_age = intval($patient_data['patient_age']);
        $patient_condition = sanitize_text_field($patient_data['patient_condition']);

        global $wpdb; 

        $result = $wpdb->update(
            $wpdb->prefix . 'patients', 
            array(
                'patient_name' => $patient_name,
                'patient_age' => $patient_age,
                'patient_condition' => $patient_condition,
            ),
            array('patient_id' => $patient_id),
            array('%s', '%d', '%s'),
            array('%d')
        );

        if ($result !== false) {
            wp_send_json_success('Patient updated successfully');
        } else {
            wp_send_json_error('Error updating patient');
        }
    } else {
        wp_send_json_error('Invalid data');
    }
}

// Delete a patient
function delete_patient_ajax()
{
    if (isset($_POST['patient_id'])) {
        $patient_id = intval($_POST['patient_id']);

        global $wpdb; 
        $result = $wpdb->delete(
            $wpdb->prefix . 'patients', 
            array('patient_id' => $patient_id),
            array('%d')
        );

        if ($result !== false) {
            wp_send_json_success('Patient deleted successfully');
        } else {
            wp_send_json_error('Error deleting patient');
        }
    } else {
        wp_send_json_error('Invalid data');
    }
}

// Get patient data
function get_patient_data_ajax()
{
    global $wpdb; 

    $patients = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . 'patients'); 

    if ($patients !== false) {
        wp_send_json($patients);
    } else {
        wp_send_json_error('Error retrieving patient data');
    }
}
