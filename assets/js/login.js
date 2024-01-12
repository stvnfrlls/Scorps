const toggleForm = () => {
  const container = document.querySelector('.container');
  container.classList.toggle('active');
};

function login() {
  var username = $("#emailInput").val();
  var password = $("#passwordInput").val();

  if (!username) {
    $("#response").html('<div class="alert alert-danger">Please enter a username.</div>');
    return;
  }

  if (!password) {
    $("#response").html('<div class="alert alert-danger">Please enter a password.</div>');
    return;
  }

  $.ajax({
    type: "POST",
    url: "../config/request/authAccount.php",
    data: {
      username: username,
      password: password,
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        window.location.href = response.redirect;
      } else {
        console.log('error');
        $("#response").html(
          '<div class="alert alert-danger">' + response.message + "</div>"
        );
      }
    },
    error: function (xhr, error) {
      console.log("Error:", error);
      console.log("Response:", xhr.responseText);
    },
  });
}

function register() {
  var firstname = $("#firstnameSignUp").val();
  var lastname = $("#lastnameSignUp").val();
  var username = $("#emailSignUp").val();
  var password = $("#passwordSignUp").val();
  var cpassword = $("#cpasswordSignUp").val();

  if (!firstname) {
    $("#SignUpresponse").html('<div class="alert alert-danger">Please enter a First Name.</div>');
    return;
  }

  if (!lastname) {
    $("#SignUpresponse").html('<div class="alert alert-danger">Please enter a Last Name.</div>');
    return;
  }
  if (!username) {
    $("#SignUpresponse").html('<div class="alert alert-danger">Please enter a Email Address.</div>');
    return;
  }

  if (!password) {
    $("#SignUpresponse").html('<div class="alert alert-danger">Please enter a Password.</div>');
    return;
  }

  if (!cpassword) {
    $("#SignUpresponse").html('<div class="alert alert-danger">Please confirm your password.</div>');
    return;
  } else if (cpassword !== password) {
    $("#SignUpresponse").html('<div class="alert alert-danger">Password does not match.</div>');
    return;
  }

  $.ajax({
    type: "POST",
    url: "../config/request/addUser.php",
    data: {
      first_name: firstname,
      last_name: lastname,
      username: username,
      password: password,
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        $("#SignUpresponse").html(
          '<div class="alert alert-success">' + response.message + "</div>"
        );
        location.reload();
      } else {
        console.log('error');
        $("#SignUpresponse").html(
          '<div class="alert alert-danger">' + response.message + "</div>"
        );
      }
    },
    error: function (xhr, error) {
      console.log("Error:", error);
    },
  });
}