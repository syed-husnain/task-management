$(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $('#password');
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
      var inputID = $('#password_id');
      if (inputID.attr("type") == "password") {
        inputID.attr("type", "text");
      } else {
        inputID.attr("type", "password");
      }
});

$(".toggle-confirm-password").click(function() {

      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $('#confirm_password');
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
      var inputID = $('#confirm_password_id');
      if (inputID.attr("type") == "password") {
        inputID.attr("type", "text");
      } else {
        inputID.attr("type", "password");
      }
});

function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


function showConfirmPassword() {
  var x = document.getElementById("password-confirm");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}

$(document).ready(function () {
    $(".alert").slideDown(300).delay(5000).slideUp(300);
});

const scrollOnTop = (height = 0) => {
    document.body.scrollTop = height; // For Safari
    document.documentElement.scrollTop = height;
}
