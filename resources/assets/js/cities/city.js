$(document).ready(function () {
    $('#city_table').DataTable({
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

function changeCityStatus(status, cityId) {
    var result = window.confirm('Are you sure you want to change city status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeCityStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'city_id': cityId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
