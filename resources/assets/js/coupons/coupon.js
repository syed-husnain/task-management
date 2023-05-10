$(document).ready(function () {
    $('#coupon_table').DataTable({
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

function changeCouponStatus(status, couponId) {
    var result = window.confirm('Are you sure you want to change coupon status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeCouponStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'coupon_id': couponId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
