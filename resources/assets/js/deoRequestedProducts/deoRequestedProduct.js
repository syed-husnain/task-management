$(document).ready(function () {
    $('#product_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [10]
            },
            {
                "bSearchable": false,
                "aTargets": [10]
            }
        ]
    });
});



$('input[name="is_active"]').change(function () {
    if ($(this).is(":checked")) {
        $('input#is_active').val('1');
    } else {
        $('input#is_active').val('0');
    }
});



// get subChildCategories for selected subCategory
$('#category_level1_id').on('change', function () {

    var category_level1_id = $('#category_level1_id').find(":selected").val();
    var option = '';
    $('#category_level2_id').prop('disabled', false);

    $.ajax({
        method: "POST",
        url: routes.getCat2forMerchantProduct,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'category_level1_id': category_level1_id
        },
        success: function (response) {
            $('#category_level2_id').empty();
            $('#category_level2_id').append(' <option value="" selected disabled>Select Category</option>');

            response.category2.forEach(function (item, index) {
                option = "<option value='" + item.id + "'>" + item.name_en + "</option>"
                $('#category_level2_id').append(option);
            });
        }
    });
});


// get subChildCategories for selected subCategory
$('#category_level2_id').on('change', function () {

    var category_level2_id = $('#category_level2_id').find(":selected").val();
    var option = '';
    $('#category_level3_id').prop('disabled', false);

    $.ajax({
        method: "POST",
        url: routes.getCat3forMerchantProduct,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'category_level2_id': category_level2_id
        },
        success: function (response) {
            $('#category_level3_id').empty();
            $('#category_level3_id').append(' <option value="" selected disabled>Select Category</option>');

            response.category3.forEach(function (item, index) {
                option = "<option value='" + item.id + "'>" + item.name_en + "</option>"
                $('#category_level3_id').append(option);
            });
        }
    });
});


// get subChildCategories for selected subCategory
$('#category_level3_id').on('change', function () {

    var category_level3_id = $('#category_level3_id').find(":selected").val();
    var option = '';
    $('#category_level4_id').prop('disabled', false);

    $.ajax({
        method: "POST",
        url: routes.getCat4forMerchantProduct,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'category_level3_id': category_level3_id
        },
        success: function (response) {
            $('#category_level4_id').empty();
            $('#category_level4_id').append(' <option value="" selected disabled>Select Category</option>');

            response.category4.forEach(function (item, index) {
                option = "<option value='" + item.id + "'>" + item.name_en + "</option>"
                $('#category_level4_id').append(option);
            });
        }
    });
});



function productStockStatus(status, productId) {
    var result = window.confirm('Are you sure you want to change product stock status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.productStockStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'product_id': productId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function destroyProduct(productId) {
    var result = window.confirm('Are you sure you want to change product stock status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteProduct,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'product_id': productId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}


function deleteRequestedProductImage(imageId) {
    var result = window.confirm('Are you sure you want to delete this image?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteRequestedProductImage,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'image_id': imageId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}


// check if no of gallery images is greater then 5 while adding product
$("#image_url").on("change", function () {
    event.preventDefault();
    var $fileUpload = $("input[name='image_url[]']");

    if (parseInt($fileUpload.get(0).files.length) > 5) {
        $("#image_url").val(null);
        alert("You can only upload a maximum of 5 files");
        return false;
    }
});


function calculate(){
    var price = $('#price').val();
    var tax = $('#tax').val();
    var taxValue = parseInt(price)*parseInt(tax)/100;
    $('#sale_price').val(parseInt(price)+parseInt(taxValue))

   };


   // check if no of gallery images is greater then 5 while updating product
$("#requestedProductUpdate input#image_url").change(function () {
    var fileUpload = $("input[name='image_url[]']");
    var previousImageCount = $("#previousImageCount").val();
    var noOfImagesAllowed = 5 - parseInt(previousImageCount);

    if (parseInt(fileUpload.get(0).files.length) > noOfImagesAllowed) {
        alert("You can only upload a maximum of " + noOfImagesAllowed + " files");
        $("input[name='image_url[]']").val('');
        return false;
    }
});




$("#thumbnail").change(function () {

    readURL(this, '#display_image');

});

function readURL(input, element) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $(element).attr('src', e.target.result);

            $(element).removeClass("hidden");

        }

        reader.readAsDataURL(input.files[0]);

    }

}

$("#image_url").change(function () {

    readURL(this, '#display_image_url');

});

function readURL(input, element) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $(element).attr('src', e.target.result);

            $(element).removeClass("hidden");

        }

        reader.readAsDataURL(input.files[0]);

    }

}

