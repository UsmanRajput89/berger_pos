$(document).ready(function () {
    // console.log("Working");

    $("body").on("click", ".edit_category", function (e) {

        e.preventDefault();

        let category_id = $(this).data('id');

        // alert(category_id);

        $.ajax({
            url: "process/load_category_form.php",
            data: {
                id: category_id,
            },
            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                $("#category_id").val(response.category_id);
                $("#category_name").val(response.category_name);
            }
        });

    });

    $("body").on("click", ".edit_product", function (e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            url: "process/load_product_form.php",
            data: {
                id: id,
            },

            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                // console.log(response);
                $("#product_id").val(response.id);
                $("#product_name").val(response.name);
                $("#sku").val(response.sku);
                $("#gallon_price").val(response.gallon_price);
                $("#gallon_quantity").val(response.gallon_quantity);
                $("#quarter_price").val(response.quarter_price);
                $("#quarter_quantity").val(response.quarter_quantity);
                $("#dabbi_price").val(response.dabbi_price);
                $("#dabbi_quantity").val(response.dabbi_quantity);
            }
        });

    });



})