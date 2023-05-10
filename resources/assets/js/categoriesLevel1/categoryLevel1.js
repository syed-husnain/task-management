$(document).ready(function () {
    $('#category_level1_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [3, 6]
            },
            {
                "bSearchable": false,
                "aTargets": [3, 6]
            }
        ]
    });
});

function changeCatLevel1Status(status, catLevel1Id) {
    var result = window.confirm('Are you sure you want to change category status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel1ChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'catLevel1_id': catLevel1Id
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}


function changeCatLevel1Approval(is_approved, catLevel1Id) {
    var result = window.confirm('Are you sure you want to change category approval?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.catLevel1ChangeApproval,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'is_approved': is_approved,
                'catLevel1_id': catLevel1Id
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}






$("#image_url").change(function () {

    readURL(this, '#cat_level1_image');

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



