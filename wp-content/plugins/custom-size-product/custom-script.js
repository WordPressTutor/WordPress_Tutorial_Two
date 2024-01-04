jQuery(function ($) {
    // AJAX request to update total price
    $(document).on('change', '#_size', function () {
        var size = $(this).val();
        var quantity = $('input[name="quantity"]').val();
        var product_id = custom_size_product_params.product_id;

        $.ajax({
            type: 'POST',
            url: custom_size_product_params.ajax_url,
            data: {
                action: 'update_total_price',
                product_id: product_id,
                quantity: quantity,
                size: size,
            },
            success: function (response) {
                // Update the displayed total price on the page
                $('.total-price').html(response);
            }
        });
    });

    $(document).on('click', '#add-to-cart-button', function (e) {
        e.preventDefault();

        var product_id = custom_size_product_params.product_id;
        var quantity = $('input[name="quantity"]').val();
        var size = $('#_size').val();

        // AJAX request to add the product to the cart
        $.ajax({
            type: 'POST',
            url: custom_size_product_params.ajax_url,
            data: {
                action: 'add_to_cart',
                product_id: product_id,
                quantity: quantity,
                size: size,
            },
            success: function () {
                // Redirect to the cart page after successful addition
                window.location.href = wc_cart_fragments_params.cart_url;
            }
        });
    });
});
