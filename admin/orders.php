<?php
require_once '../config/function.php';

if (!isset($_SESSION['userId'])) {
    header('Location: ../auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCORPS PH - Orders</title>

    <!-- Favicons -->
    <link rel="icon" href="../assets/img/icon.jpg">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../assets/css/style - admin.css" rel="stylesheet">

    <!-- Datatable Sources -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">SCORPS PH</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Tools
            </div>
            <li class="nav-item">
                <a class="nav-link" href="inventory.php">
                    <i class="fas fa-boxes"></i>
                    <span>Inventory</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="orders.php">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Orders</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Sales
            </div>
            <li class="nav-item">
                <a class="nav-link" href="customers.php">
                    <i class="fas fa-user"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sales.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sales</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <ul class="nav nav-pills justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="view-orders-tab" data-bs-toggle="tab"
                                data-bs-target="#view-orders-tab-pane" type="button" role="tab"
                                aria-controls="view-orders-tab-pane" aria-selected="false">View Orders</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="update-orders-tab" data-bs-toggle="tab"
                                data-bs-target="#update-orders-tab-pane" type="button" role="tab"
                                aria-controls="update-orders-tab-pane" aria-selected="false">Update Orders</a>
                        </li>
                    </ul>
                    <div class="tab-content bg-light rounded mt-2" id="myTabContent">
                        <div class="tab-pane fade show active" id="view-orders-tab-pane">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Order List</h3>
                                            <div class="overflow-y-auto">
                                                <table class="table table-bordered text-center" id='orderTable'>
                                                    <thead class="sticky-top">
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">No. of item(s)</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Payment Method</th>
                                                        <th scope="col">Order Status</th>
                                                    </thead>
                                                    <tbody id="view-order-list"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="update-orders-tab-pane">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Order List</h3>
                                            <div class="overflow-y-auto">
                                                <table class="table table-bordered text-center" id='orderTable'>
                                                    <thead class="sticky-top">
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">No. of item(s)</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Payment Method</th>
                                                        <th scope="col">Order Status</th>
                                                        <th scope="col">Action</th>
                                                    </thead>
                                                    <tbody id="update-order-list"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        $(document).ready(function () {
            getOrders();
        });

        function getOrders() {
            $.ajax({
                type: "GET",
                url: "../config/request/getOrders.php",
                dataType: "json",
                success: function (response) {
                    var orders = response.orders;

                    $('#view-order-list').empty();

                    populateUpdateOrders(orders);

                    orders.forEach(item => {
                        const row = $("<tr>");
                        row.append($("<td>").text(item.order_id));
                        row.append($("<td>").text(item.no_items));
                        row.append($("<td>").text(item.total_sum));
                        row.append($("<td>").text(item.payment_method));
                        row.append($("<td>").text(item.order_status));

                        $('#view-order-list').append(row);
                    });
                },
                error: function (error) {
                    console.log("Error:", error);
                },
            });
        }
        function populateUpdateOrders(orders) {
            $('#update-order-list').empty();

            orders.forEach(item => {
                const row = $("<tr>");
                row.append($("<td>").text(item.order_id));
                row.append($("<td>").text(item.no_items));
                row.append($("<td>").text(item.total_sum));
                row.append($("<td>").text(item.payment_method));

                const orderStatusSelect = $("<select>")
                    .addClass("form-control order-status-dropdown")
                    .attr("id", "orderStatus-" + item.order_id);
                const orderStatusOptions = [
                    { value: "", text: "Select Options" },
                    { value: "PENDING", text: "Pending" },
                    { value: "PROCESSING", text: "Processing" },
                    { value: "SHIPPED", text: "Shipped" },
                    { value: "DELIVERED", text: "Delivered" }
                ];
                $.each(orderStatusOptions, function (index, optionData) {
                    const option = $("<option>")
                        .val(optionData.value)
                        .text(optionData.text);

                    if (optionData.value === item.order_status) {
                        option.attr("selected", "selected");
                    }

                    orderStatusSelect.append(option);
                });
                row.append($("<td>").append(orderStatusSelect));

                const updateColumn = $("<td>");
                const updateButton = $("<button>")
                    .addClass("btn btn-primary btn-update")
                    .text("Update")
                    .data("orderId", item.order_id);
                updateColumn.append(updateButton);
                row.append(updateColumn);

                $('#update-order-list').append(row);

                updateButton.on("click", function () {
                    const orderId = $(this).data("orderId");
                    const selectedStatus = $("#orderStatus-" + orderId).val();
                    $.ajax({
                        type: "POST",
                        url: "../config/request/updateOrders.php",
                        data: {
                            order_id: orderId,
                            order_status: selectedStatus,
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                getOrders();
                                alert(response.message);
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function (error) {
                            console.log("Error:", error);
                        },
                    });
                });
            });
        }
    </script>
</body>

</html>