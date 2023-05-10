$(document).ready(function () {
    $('#brand_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [5]
            },
            {
                "bSearchable": false,
                "aTargets": [5]
            }
        ]
    });
});

function deleteUser(userId) {
    var result = window.confirm('Are you sure you want to deactivate this user?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteUser,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'user_id': userId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function changeBrandStatus(status, brandId) {
    var result = window.confirm('Are you sure you want to change brand status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeBrandStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'brand_id': brandId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function changeBrandApproval(status, brandId) {
    var result = window.confirm('Are you sure you want to change brand approval?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeBrandApproval,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'is_approved': status,
                'brand_id': brandId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
