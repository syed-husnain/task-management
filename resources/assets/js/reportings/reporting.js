// get brancher form vendor for reporting
$('#merchant').on('change', function () {

    var merchant = $('#merchant').find(":selected").val();
    var option = '';
    $('#branch').prop('disabled', false);

    $.ajax({
        method: "POST",
        url: routes.getBranchReporting,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'merchant': merchant
        },
        success: function (response) {
            $('#branch').empty();
            $('#branch').append(' <option value="" selected disabled>Select Category</option>');

            response.branches.forEach(function (item, index) {
                option = "<option value='" + item.id + "'>" + item.branch_name_en + "</option>"
                $('#branch').append(option);
            });
        }
    });
});

$(document).ready(function () {
    if ($('#filtered_order').length > 0) {
        var table = $('#example').DataTable({});
        $('#filtered_order').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }
            ],
            "order": [],
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [1, 2, 5, 7, 8]
                },
                {
                    "bSearchable": false,
                    "aTargets": []
                }
            ]
        });
        table.buttons().container()
            .appendTo('#filtered_order .col-lg-12:eq(0)');
    }
});


$(document).ready(function () {
    if ($('#filtered_products').length > 0) {
        var table = $('#example').DataTable({});
        $('#filtered_products').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }
            ],
            "order": [],
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': []
                },
                {
                    "bSearchable": false,
                    "aTargets": []
                }
            ]
        });
        table.buttons().container()
            .appendTo('#filtered_products .col-lg-12:eq(0)');
    }
});


$(document).ready(function () {
    if ($('#merchant_filtered_orders').length > 0) {
        var table = $('#example').DataTable({});
        $('#merchant_filtered_orders').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }
            ],
            "order": [],
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [7]
                },
                {
                    "bSearchable": false,
                    "aTargets": []
                }
            ]
        });
        table.buttons().container()
            .appendTo('#merchant_filtered_orders .col-lg-12:eq(0)');
    }
});
