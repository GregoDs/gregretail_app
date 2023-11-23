$(document).ready(function () {
    $(".add-to-cart-button").click(function () {
        var productID = $(this).data("product-id");

        $.ajax({
            url: "/addToCartSession",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productID
            },
            success: function (response) {
                // Handle the response here (e.g., update the cart icon, show a success message, etc.)
            },
            error: function (xhr, status, error) {
                // Handle errors here (e.g., show an error message)
            }
        });
    });
});