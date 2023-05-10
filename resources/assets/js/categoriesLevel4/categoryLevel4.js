$(document).ready(function () {
    $('#category_level4_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6, 9]
            },
            {
                "bSearchable": false,
                "aTargets": [6, 9]
            }
        ]
    });
});

function changeCatLevel4Status(status, catLevel4Id) {
    var result = window.confirm('Are you sure you want to change category status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel4ChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'catLevel4_id': catLevel4Id
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function changeCatLevel4Approval(is_approved, catLevel4Id) {
    var result = window.confirm('Are you sure you want to change category approval?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel4ChangeApproval,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'is_approved': is_approved,
                'catLevel4_id': catLevel4Id
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}


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
        url: routes.getCatLevel1for2,
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
        url: routes.getCatLevel2for3,
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



$("#image_url").change(function () {

    readURL(this, '#cat_level4_image');

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
