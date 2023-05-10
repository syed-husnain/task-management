$(document).ready(function () {
    $('#inquiry_table').DataTable({
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


function deleteInquiry(inquiryId) {
    var result = window.confirm('Are you sure you want to deactivate this inquiry?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteMerchnatInquiry,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'inquiry_id': inquiryId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
