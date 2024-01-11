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
        console.log('success');
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