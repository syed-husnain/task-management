$(document).ready(function () {
    $('#branch_table').DataTable({
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

function branchChangeStatus(status, branchId) {
    var result = window.confirm('Are you sure you want to change Branch status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.branchChangeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'branch_id': branchId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

// get subChildCategories for selected subCategory
$('#branch_district').on('change', function () {

    var district_id = $('#branch_district').find(":selected").val();
    var option = '';
    $('#branch_city').prop('disabled', false);

    $.ajax({
        method: "POST",
        url: routes.getBranchCities,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'district_id': district_id
        },
        success: function (response) {
            $('#branch_city').empty();
            $('#branch_city').append(' <option value="" selected disabled>Select City</option>');

            response.cities.forEach(function (item, index) {
                option = "<option value='" + item.id + "'>" + item.name + "</option>"
                $('#branch_city').append(option);
            });
        }
    });
});
