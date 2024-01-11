function getProfileDetails(userId) {
    $.ajax({
        type: "POST",
        url: "../config/request/getUserDetails.php",
        dataType: "json",
        data: {
            userId: userId
        },
        success: function (response) {
            var userDetails = response.data;

            var fullName = `${userDetails[0].first_name} ${userDetails[0].last_name}`;
            var fullAddress = `${userDetails[0].home} ${userDetails[0].city}, ${userDetails[0].state} (${userDetails[0].postal})`;

            $('#fullName').text(fullName);
            $('#email').text(userDetails[0].email);
            $('#phone').text(userDetails[0].contact_no);
            $('#address').text(fullAddress);
        },
        error: function (error) {
            console.log("Error:", error);
        },
    });
}

function getOrderHistory(userId) {
    const cartTableBody = $("#orderList");
    $.ajax({
        type: "POST",
        url: "../config/request/getOrderHistory.php",
        dataType: "json",
        data: {
            userId: userId
        },
        success: function (response) {
            var orderData = response.data;

            orderData.forEach((item) => {
                const row = $("<tr>");
                row.append($("<td>").text(item.order_id));
                row.append($("<td>").text(item.total));
                row.append($("<td>").text(item.payment_method));
                row.append($("<td>").text(item.order_status));
                row.append($("<td>").text(new Date(item.created_at).toLocaleString()));

                const viewColumn = $("<td>");
                const viewButton = $("<button>")
                    .addClass("btn btn-danger view-btn")
                    .text("View")
                    .data("orderId", item.order_id);
                viewColumn.append(viewButton);
                row.append(viewColumn);

                cartTableBody.append(row);
            });

            $(".view-btn").on("click", function () {
                const orderId = $(this).data("orderId");
                window.location.href = "../shop/confirmation.php?orderId=" + orderId;
            });
        },
        error: function (error) {
            console.log("Error:", error);
        },
    });
}