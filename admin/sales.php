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

    <title>SCORPS PH - Sales</title>

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
            <li class="nav-item ">
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
            <li class="nav-item active">
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
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 ">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                </div>
                                <div class="card-body" id="productContainer">
                                    <canvas id="yearlySales" height="90"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sales per Month</h6>
                                </div>
                                <div class="card-body" id="productContainer">
                                    <canvas id="monthlySales" height="90"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="card shadow mb-4 ">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Items Sold per Product</h6>
                                </div>
                                <div class="card-body" id="productContainer">
                                    <canvas id="itemsSold"></canvas>
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
            $.ajax({
                url: '../config/request/getSales.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    monthlySales_Chart('monthlySales', data.monthlySales);
                    yearlySales_Chart('yearlySales', data.yearlySales);

                },
                error: function (error) {
                    console.log('Error fetching data: ' + error);
                }
            });
            $.ajax({
                url: '../config/request/getItemSold.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    createItemsSoldPerChart('itemsSold', data);
                },
                error: function (error) {
                    console.log('Error fetching data: ' + error);
                }
            });
        });
        function yearlySales_Chart(chartId, data) {
            var labels = data.map(item => item.year);
            var salesData = data.map(item => parseFloat(item.total_sales));

            var ctx = document.getElementById(chartId).getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        data: salesData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                callback: function (value) {
                                    return '₱ ' + new Intl.NumberFormat('en-US').format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var label = data.labels[tooltipItem.index] || "";

                                var formattedSales = new Intl.NumberFormat('en-US', {
                                    style: 'currency',
                                    currency: 'PHP'
                                }).format(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);

                                return formattedSales;
                            },
                        },
                    },
                }
            });
        }

        function monthlySales_Chart(chartId, data) {
            var labels = data.map(item => item.month_name);
            var salesData = data.map(item => parseFloat(item.total_sales));

            var ctx = document.getElementById(chartId).getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        data: salesData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                callback: function (value) {
                                    return '₱ ' + new Intl.NumberFormat('en-US').format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var label = data.labels[tooltipItem.index] || "";

                                var formattedSales = new Intl.NumberFormat('en-US', {
                                    style: 'currency',
                                    currency: 'PHP'
                                }).format(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);

                                return formattedSales;
                            },
                        },
                    },
                }
            });
        }
        function createItemsSoldPerChart(chartId, jsonData) {
            if (jsonData && jsonData.itemSold && Array.isArray(jsonData.itemSold)) {
                const labels = jsonData.itemSold.map(item => item.product_name);
                const data = jsonData.itemSold.map(item => parseInt(item.item_sold));
                const backgroundColor = generateRandomColors(data.length);

                function generateRandomColors(count) {
                    const colors = [];
                    for (let i = 0; i < count; i++) {
                        const randomColor = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.5)`;
                        colors.push(randomColor);
                    }
                    return colors;
                }

                const pieChart = new Chart(chartId, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: backgroundColor,
                        }]
                    },
                    options: {
                        title: {
                            display: false,
                        },
                        legend: {
                            display: false,
                        },
                    }
                });
            } else {
                console.error('Invalid JSON data structure.');
            }
        }
    </script>
</body>

</html>