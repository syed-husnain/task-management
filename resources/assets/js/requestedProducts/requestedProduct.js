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

$(document).ready(function () {
    $('#merchant_request_product_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6]
            },
            {
                "bSearchable": false,
                "aTargets": [6]
            }
        ]
    });
});

function requestedProductChangeStatus(status, requestedProductId) {
    var result = window.confirm('Are you sure you want to change requested product status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.requestedProductChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'requested_product_id': requestedProductId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}




function requestedProductChangeStatus(status, requestedProductId) {
    var result = window.confirm('Are you sure you want to change requested product status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.requestedProductChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'requested_product_id': requestedProductId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
