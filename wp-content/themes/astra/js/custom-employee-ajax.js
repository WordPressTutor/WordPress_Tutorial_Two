jQuery(document).ready(function($) {
    $('#get-employee').click(function() {
        var empId = 103;

        $.ajax({
            type: 'POST',
            url: employeeajax.ajaxurl,
            data: {
                action: 'get_employee_data',
                emp_id: empId
            },
            success: function(response) {
                if (response.success) {
                    $('#emp-id span').text(response.data.emp_id);
                    $('#emp-name span').text(response.data.emp_name);
                    $('#emp-email span').text(response.data.emp_email);
                    $('#emp-dept span').text(response.data.emp_dept);
                } else {
                    alert('Employee not found.');
                }
            }
        });
    });
});
