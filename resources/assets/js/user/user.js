$(document).ready(function () {
    $('#user_table').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6]
            },
            {
                "bSearchable": false,
                "aTargets": []
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

function changeStatus(status, userId) {
    var result = window.confirm('Are you sure you want to change user status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'user_id': userId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function activateUser(userId) {
    var result = window.confirm('Are you sure you want to activate this user?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here
        $.ajax({
            method: "POST",
            url: './activate',
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

$('input[name="is_active"]').change(function () {
    if ($(this).is(":checked")) {
        $('input#is_active').val('1');
    } else {
        $('input#is_active').val('0');
    }
});

$('input[name="is_authorized"]').change(function () {
    if ($(this).is(":checked")) {
        $('input#is_authorized').val('1');
    } else {
        $('input#is_authorized').val('0');
    }
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#user_profile_image').attr('src', e.target.result);
            $('#user_profile_image').show();
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile_image").change(function () {
    readURL(this);
});

$(document).ready(function () {
    $('#dataTableUsers').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [0, 6]
        }, {
            "bSearchable": false,
            'aTargets': [0, 6]
        }],
    });

    $('#dataTableConsumers').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [0, 6]
        }, {
            "bSearchable": false,
            'aTargets': [0, 6]
        }],
    });
    $('#dataTableProfessionals').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [0, 6]
        }, {
            "bSearchable": false,
            'aTargets': [0, 6]
        }],
    });
    $('#dataTableDeleted').DataTable({
        responsive: true,
        "order": [],
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [0, 5]
        }, {
            "bSearchable": false,
            'aTargets': [0, 5]
        }],
    });
    $("div.discount_fields").hide()
});
$('select#discount_allowed').change(function () {
    if ($(this).val() == "1") {
        $("div.discount_fields").show();
        $("div.discount_fields input").attr('required', true);
    } else {
        $("div.discount_fields").hide();
        $("div.discount_fields input").attr('required', false);
    }
});

$('select#edit_discount_allowed').change(function () {
    if ($(this).val() == "1") {
        $("div.edit_discount_fields").show();
        $("div.edit_discount_fields input").attr('required', true);
    } else {
        $("div.edit_discount_fields").hide();
        $("div.edit_discount_fields input").attr('required', false);
        // $('input#is_authorized').val('0');
    }
});





// Change Password From Admin
function adminChangePassword() {

    var checkBox = document.getElementById("change_password");
    var password = document.getElementById("password");

    var confirm_password = document.getElementById("confirm_password");
    if (checkBox.checked == true) {
        password.style.display = "block";
        confirm_password.style.display = "block";
    } else {
        password.style.display = "none";
        confirm_password.style.display = "none";
    }
}


function changeMerchantUserStatus(status, merchantUserId) {
    var result = window.confirm('Are you sure you want to change merchant user status?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.changeMerchantUserStatus,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'status': status,
                'merchantUser_id': merchantUserId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

function deleteMerchantUser(merchantUserId) {
    var result = window.confirm('Are you sure you want to delete merchant user?');
    if (result == false) {
        event.preventDefault();
    } else {

        // ajax call here

        $.ajax({
            method: "POST",
            url: routes.deleteMerchantUser,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'merchantUser_id': merchantUserId
            },
            success: function (response) {
                location.reload();

            }
        });
    }
}

