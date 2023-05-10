$(document).ready(function () {
    $('#category_level2_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [4, 7]
            },
            {
                "bSearchable": false,
                "aTargets": [4, 7]
            }
        ]
    });
});

function changeCatLevel2Status(status, catLevel2Id) {
    var result = window.confirm('Are you sure you want to change category status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel2ChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'catLevel2_id': catLevel2Id
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}


function changeCatLevel2Approval(is_approved, catLevel2Id) {
    var result = window.confirm('Are you sure you want to change category approval?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel2ChangeApproval,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'is_approved': is_approved,
                'catLevel2_id': catLevel2Id
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}





$("#image_url").change(function () {

    readURL(this, '#cat_level2_image');

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
