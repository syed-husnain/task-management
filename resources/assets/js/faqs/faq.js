$(document).ready(function () {
    $('#faqs_table').DataTable({
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

function deleteFaq(faqId) {
    var result = window.confirm('Are you sure you want to deactivate this Question?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteFaq,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'faq_id': faqId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
