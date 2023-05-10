$(document).ready(function () {
    $('#product_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [5,7]
            },
            {
                "bSearchable": false,
                "aTargets": [5,7]
            }
        ]
    });
});

$(document).ready(function () {
    $('#request_product_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [8]
            },
            {
                "bSearchable": false,
                "aTargets": [8]
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
        url: routes.getCatLevel1for2Product,
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
        url: routes.getCatLevel2for3Product,
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
        url: routes.getCatLevel3for4Product,
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



function changeDAproductApproval(isApproved, productId) {
    var result = window.confirm('Are you sure you want to change product approval?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeDAproductStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'is_approved': isApproved,
                'product_id': productId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function changeDAproductStatus(status, productId) {
    var result = window.confirm('Are you sure you want to change product status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeDAproductStatus1,
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

function changeDArequestedProductApproval(isApproved, productId) {
    var result = window.confirm('Are you sure you want to change product approval?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeDArequestedProductApproval,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'is_approved': isApproved,
                'product_id': productId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
function changeDArequestedProductStatus(status, productId) {
    var result = window.confirm('Are you sure you want to change product status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeDArequestedProductStatus,
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


function deleteProductImage(imageId) {
    var result = window.confirm('Are you sure you want to delete this image?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteProductImage,
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
    var $fileUpload = $("input[name='product_images[]']");

    if (parseInt($fileUpload.get(0).files.length) > 5) {
        $("#image_url").val(null);
        alert("You can only upload a maximum of 5 files");
        return false;
    }
});


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
