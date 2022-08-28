$(document).ready(function () {
    // console.log("Working");
    $("body").on("change", "#category", function () {
        // console.log('Working');

        let cat = $("#category").val();
        console.log(cat);
        // let myform = $("#invoice_form")[0];
        // let fd = new FormData(myform);
        
        load_data(cat);
        
    });
    
    let cat = $("#category").val();
    console.log(cat);
    load_data(cat);

    function load_data( cat) {
        $.ajax({
            url: "process/get_products_same_cat.php",
            data: {
                cat : cat,
                table:'table',
            },
            // cache: false,
            // processData: false,
            // contentType: false,
            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                // console.log(response);
                $('.product_options').empty();
                response.forEach(element => {
                    let elem = `<option value="${element.id}">${element.name}</option>`;
                    // $(elem).appendTo('#product_select');
                    // console.log(element);
                    console.log(elem);
                    $('.product_options').append(elem);

                });
            }
        });
    }

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
                $("#gallon_price").val(response.gallon_price);
                $("#quarter_price").val(response.quarter_price);
                $("#dabbi_price").val(response.dabbi_price);
                $("#drumi_price").val(response.drumi_price);
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
                
                $("#gallon_quantity").val(response.gallon_quantity);
                
                $("#quarter_quantity").val(response.quarter_quantity);
                
                $("#dabbi_quantity").val(response.dabbi_quantity);
                
                $("#drumi_quantity").val(response.drumi_quantity);
            }
        });

    });


    $("body").on("click", ".edit_customer", function (e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            url: "process/load_customer_form.php",
            data: {
                id: id,
            },

            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                // console.log(response);
                
                $("#customer_id").val(response.customer_id);
                $("#customer_name").val(response.customer_name);
                $("#customer_phone").val(response.customer_phone);
                $("#customer_address").val(response.customer_address);
                $("#customer_city").val(response.customer_city);

            }

        });

    });



})