$(document).ready(function () {
    $('#category_level3_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [5, 8]
            },
            {
                "bSearchable": false,
                "aTargets": [5, 8]
            }
        ]
    });
});

function changeCatLevel3Status(status, catLevel3Id) {
    var result = window.confirm('Are you sure you want to change category status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel3ChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'catLevel3_id': catLevel3Id
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}


function changeCatLevel3Approval(is_approved, catLevel3Id) {
    var result = window.confirm('Are you sure you want to change category approval?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel3ChangeApproval,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'is_approved': is_approved,
                'catLevel3_id': catLevel3Id
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
        url: routes.getCatLevel2for3cat3,
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





$("#image_url").change(function () {

    readURL(this, '#cat_level3_image');

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
