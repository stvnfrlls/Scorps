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

    <title>SCORPS PH - Customer</title>

    <!-- Favicons -->
    <link rel="icon" href="../assets/img/icon.jpg">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../assets/css/style - admin.css" rel="stylesheet">

    <!-- Datatable Sources -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .card-body {
            height: 70vh;
        }

        .message-right {
            max-width: 70%;
            word-wrap: break-word;
            padding: 8px;
            border-radius: 10px;
        }

        .message {
            max-width: 70%;
            word-wrap: break-word;
            padding: 8px;
            border-radius: 10px;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="nav">
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
                <li class="nav-item active">
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
        </div>

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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <ul class="list-group">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                    <li class="list-group-item">A fourth item</li>
                                    <li class="list-group-item">And a fifth one</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">USERNAME</div>
                                <div class="card-body" id="chat-box">
                                    <div class="d-flex justify-content-end">
                                        <div class="alert alert-primary message" role="alert">
                                            User: Hello, how are you?
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="alert alert-secondary message-right message" role="alert">
                                            Bot: Hi there! I'm just a dummy bot, but I'm doing well.
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <div class="alert alert-primary message" role="alert">
                                            User: That's great! What can you do?
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <div class="alert alert-secondary message-right message" role="alert">
                                            Bot: I can provide information, answer questions, and engage in simple
                                            conversations.
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="input-group">
                                        <input type="text" id="message-input" class="form-control"
                                            placeholder="Type your message...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" onclick="sendMessage()">Send</button>
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
        function sendMessage() {
            var messageInput = document.getElementById('message-input');
            var chatBox = document.getElementById('chat-box');

            // Get the message from the input
            var messageText = messageInput.value.trim();

            if (messageText !== '') {
                // Determine the sender (user or bot)
                var senderClass = 'alert alert-primary';
                if (Math.random() < 0.5) {
                    // Simulate a response from the bot
                    senderClass = 'alert alert-secondary message-right';
                }

                // Append the message to the chat box
                chatBox.innerHTML += '<div class="' + senderClass + '" role="alert">' + messageText + '</div>';

                // Clear the input field
                messageInput.value = '';
            }
        }
    </script>
</body>

</html>