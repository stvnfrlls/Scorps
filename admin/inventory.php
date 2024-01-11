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

    <title>SCORPS PH - Inventory</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="inventory.php">
                    <i class="fas fa-boxes"></i>
                    <span>Inventory</span>
                </a>
            </li>
            <li class="nav-item">
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
                            <a class="nav-link active" id="view-inventory-tab" data-bs-toggle="tab"
                                data-bs-target="#view-inventory-tab-pane" type="button" role="tab"
                                aria-controls="view-inventory-tab-pane">View Inventory</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="add-item-tab" data-bs-toggle="tab"
                                data-bs-target="#add-item-tab-pane" type="button" role="tab"
                                aria-controls="add-item-tab-pane">Add Item</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="update-item-tab" data-bs-toggle="tab"
                                data-bs-target="#update-item-tab-pane" type="button" role="tab"
                                aria-controls="update-item-tab-pane">Update Item</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="delete-item-tab" data-bs-toggle="tab"
                                data-bs-target="#delete-item-tab-pane" type="button" role="tab"
                                aria-controls="delete-item-tab-pane">Delete Item</a>
                        </li>
                    </ul>
                    <div class="tab-content bg-light rounded mt-2" id="myTabContent">
                        <div class="tab-pane fade show active" id="view-inventory-tab-pane">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Product List</h3>
                                            <div class="overflow-y-auto">
                                                <table class="table table-bordered text-center" id='productTable'>
                                                    <thead class="sticky-top">
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Stocks</th>
                                                        <th scope="col">Price</th>
                                                    </thead>
                                                    <tbody id="view-product-list"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="add-item-tab-pane">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Product List</h3>
                                            <div class="overflow-y-auto">
                                                <table class="table table-bordered text-center" id='productTable'>
                                                    <thead class="sticky-top">
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Stocks</th>
                                                        <th scope="col">Price</th>
                                                    </thead>
                                                    <tbody id="add-product-list"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Add Product</h3>
                                            <form class="mb-0" enctype="multipart/form-data">
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="productImage">Product Image</label>
                                                        <input type="file" class="form-control-file" id="productImage"
                                                            name="productImage" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="productId">Product Id</label>
                                                        <input type="text" class="form-control" id="productId"
                                                            name="productId" placeholder="Enter product Id">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="productName">Product Name</label>
                                                        <input type="text" class="form-control" id="productName"
                                                            name="productName" placeholder="Enter product name">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="stocks">Stocks</label>
                                                        <input type="number" class="form-control" id="in_stocks"
                                                            name="in_stocks" placeholder="Enter stock quantity">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="price">Price</label>
                                                        <input type="text" class="form-control" id="price" name="price"
                                                            placeholder="Enter price">
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="addProduct()">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="update-item-tab-pane">
                            <div class="row">
                                <div class="col-md-12 col-lg-8 my-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div class="">
                                                    <h3 class="mb-0">Product List</h3>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <input type="text" placeholder="product name" class="form-control"
                                                        id="searchProduct" name="searchProduct">
                                                </div>
                                            </div>
                                            <div class="overflow-y-auto">
                                                <table class="table table-bordered text-center">
                                                    <thead class="sticky-top">
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Stocks</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Action</th>
                                                    </thead>
                                                    <tbody id="edit-product-list">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4 my-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Update Product</h3>
                                            <form class="mb-0" enctype="multipart/form-data">
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="updateproductImage">Product Image</label>
                                                        <input type="file" class="form-control-file"
                                                            id="updateproductImage" name="updateproductImage"
                                                            accept="image/*">
                                                        <input type="hidden" class="form-control" id="currentImage"
                                                            name="currentImage">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="updateProductName">Product Name</label>
                                                        <input type="hidden" name="productId" id="productId">
                                                        <input type="text" class="form-control" id="updateProductName"
                                                            name="updateProductName" placeholder="Enter product name">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="updateIn_Stocks">Stocks</label>
                                                        <input type="number" class="form-control" id="updateIn_Stocks"
                                                            name="updateIn_Stocks" placeholder="Enter stock quantity">
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="form-group col-lg-12">
                                                        <label for="UpdatePrice">Price</label>
                                                        <input type="text" class="form-control" id="UpdatePrice"
                                                            name="UpdatePrice" placeholder="Enter price">
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="updateProduct()">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delete-item-tab-pane">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div class="">
                                                    <h3 class="mb-0">Product List</h3>
                                                </div>
                                                <div class="d-none d-md-block">
                                                    <input type="text" placeholder="product name" class="form-control"
                                                        id="searchProduct" name="searchProduct">
                                                </div>
                                            </div>
                                            <div class="overflow-y-auto">
                                                <table class="table table-bordered text-center">
                                                    <thead class="sticky-top">
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Stocks</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Action</th>
                                                    </thead>
                                                    <tbody id="remove-product-list">
                                                    </tbody>
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
            getProducts();
        });

        function getProducts() {
            $.ajax({
                type: "GET",
                url: "../config/request/getProduct.php",
                dataType: "json",
                success: function (response) {
                    var products = response.products;

                    populateUpdateTable(products);
                    populateDeleteTable(products);

                    products.forEach(item => {
                        const row = $("<tr>");
                        row.append($("<td>").text(item.product_name));
                        row.append($("<td>").text(item.in_stock));
                        row.append($("<td>").text(item.price));

                        $('#view-product-list').append(row.clone());
                        $('#add-product-list').append(row.clone());
                    });
                },
                error: function (error) {
                    console.log("Error:", error);
                },
            });
        }

        function populateUpdateTable(productList) {
            productList.forEach((item) => {
                const row = $("<tr>");
                row.append($("<td>").text(item.product_name));
                row.append($("<td>").text(item.in_stock));
                row.append($("<td>").text(item.price));

                const viewColumn = $("<td>");
                const viewButton = $("<button>")
                    .addClass("btn btn-primary view-btn")
                    .text("View")
                    .data("productData", item);
                viewColumn.append(viewButton);
                row.append(viewColumn);

                $('#edit-product-list').append(row);

                viewButton.on("click", function () {
                    const productData = $(this).data("productData");
                    $("#productId").val(productData.product_id);
                    $("#currentImage").val(productData.product_img);
                    $("#updateProductName").val(productData.product_name);
                    $("#updateIn_Stocks").val(productData.in_stock);
                    $("#UpdatePrice").val(productData.price);
                });
            });
        }

        function populateDeleteTable(productList) {
            productList.forEach((item) => {
                const row = $("<tr>");
                row.append($("<td>").text(item.product_name));
                row.append($("<td>").text(item.in_stock));
                row.append($("<td>").text(item.price));

                const deleteColumn = $("<td>");
                const deleteButton = $("<button>")
                    .addClass("btn btn-danger delete-btn")
                    .text("Remove")
                    .data("productId", item.product_id);
                deleteColumn.append(deleteButton);
                row.append(deleteColumn);

                $('#remove-product-list').append(row);

                deleteButton.on("click", function () {
                    const productId = $(this).data("productId");
                    $.ajax({
                        type: "POST",
                        url: "../config/request/deleteProduct.php",
                        data: {
                            product_id: productId,
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                getProducts();
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

        function addProduct() {
            var productId = $("#productId").val();
            var productName = $("#productName").val();
            var productImage = $("#productImage")[0].files[0];
            var inStock = $("#in_stocks").val();
            var price = $("#price").val();

            if (!productId) {
                alert("Please enter a product Id.");
                return;
            }

            if (!productName) {
                alert("Please enter a product name.");
                return;
            }

            if (!productImage) {
                alert("Please choose a product image.");
                return;
            }

            if (!inStock) {
                alert("Please enter the number of items in stock.");
                return;
            }

            if (!price) {
                alert("Please enter the product price.");
                return;
            }

            var formData = new FormData();
            formData.append("product_id", productId);
            formData.append("product_name", productName);
            formData.append("product_img", productImage);
            formData.append("in_stock", inStock);
            formData.append("price", price);
            $.ajax({
                type: "POST",
                url: "../config/request/addProduct.php",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        getProducts();

                        $("#productId").val(null);
                        $("#productName").val(null);
                        $("#productImage").val(null);
                        $("#in_stocks").val(null);
                        $("#price").val(null);
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error:", status, error);
                    console.log('Response:', xhr.responseText);
                },
            });
        }

        function updateProduct() {
            var productImage = $("#updateproductImage")[0].files[0];
            var currentImage = $("#currentImage").val();
            var productId = $("#productId").val();
            var productName = $("#updateProductName").val();
            var inStock = $("#updateIn_Stocks").val();
            var price = $("#UpdatePrice").val();

            if (!productName) {
                alert("Please enter a product name.");
                return;
            }

            if (!inStock) {
                alert("Please enter a valid quantity.");
                return;
            }

            if (!price) {
                alert("Please enter a valid price.");
                return;
            }

            var formData = new FormData();
            formData.append("product_id", productId);
            formData.append("product_name", productName);
            formData.append("in_stock", inStock);
            formData.append("price", price);

            if (productImage instanceof File) {
                formData.append("product_img", productImage);
            } else {
                formData.append("product_img", currentImage);
            }

            $.ajax({
                type: "POST",
                url: "../config/request/updateProduct.php",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        getProducts();

                        $("#productImage").val(null);
                        $("#currentImage").val(null);
                        $("#productId").val(null);
                        $("#updateProductName").val(null);
                        $("#updateIn_Stocks").val(null);
                        $("#UpdatePrice").val(null);
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error:", status, error);
                    console.log('Response:', xhr.responseText);
                },
            });
        }
    </script>
</body>

</html>