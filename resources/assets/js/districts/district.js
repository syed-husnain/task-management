$(document).ready(function () {
    $('#district_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [4]
            },
            {
                "bSearchable": false,
                "aTargets": [4]
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

function changeDistrictStatus(status, districtId) {
    var result = window.confirm('Are you sure you want to change district status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeDistrictStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'district_id': districtId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
