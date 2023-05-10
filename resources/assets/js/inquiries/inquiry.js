$(document).ready(function () {
    $('#inquiry_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [7]
            },
            {
                "bSearchable": false,
                "aTargets": [7]
            }
        ]
    });
});

$(document).ready(function () {
    $('#product_inquiry_table').DataTable({
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

$(document).ready(function () {
    $('#vendor_inquiry_table').DataTable({
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
    var result = window.confirm('Are you sure you want to delete this inquiry?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteInquiry,
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

function deleteProductInquiry(inquiryId) {
    var result = window.confirm('Are you sure you want to delete this product inquiry?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteProductInquiry,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'ProductInquiry_id': inquiryId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function deleteVendorInquiry(inquiryId) {
    var result = window.confirm('Are you sure you want to delete this vendor inquiry?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteVendorInquiry,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'VendorInquiry_id': inquiryId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}
