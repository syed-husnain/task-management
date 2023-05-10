$(document).ready(function () {
    $('#customer_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6, 9]
            },
            {
                "bSearchable": false,
                "aTargets": [9]
            }
        ]
    });
});

function deleteCustomer(customerId) {
    var result = window.confirm('Are you sure you want to deactivate this customer?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteCustomer,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'customer_id': customerId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function customerChangeStatus(status, customerId) {
    var result = window.confirm('Are you sure you want to change Merchant status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.customerChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'customer_id': customerId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
