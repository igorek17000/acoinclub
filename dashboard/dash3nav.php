<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acoinclub</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="./plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css"> -->
    <!-- bootstrap4 - dual-listbox  -->
    <link rel="stylesheet" href="https://cdnout.com/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- =============================== -->
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <!-- <link rel="stylesheet" href="./plugins/select2/css/select2.min.css"> -->
    <link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="./plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="./plugins/dropzone/min/dropzone.min.css">
    <!-- -------------------------  -->
    <!-- =======================  -->
    <style>
        /* START OF MY STYLES  */
        .bb {
            color: black;
        }

        .color-palette {
            height: 35px;
            line-height: 35px;
            text-align: right;
            padding-right: .75rem;
        }

        .color-palette.disabled {
            text-align: center;
            padding-right: 0;
            display: block;
        }

        .color-palette-set {
            margin-bottom: 15px;
        }

        .color-palette span {
            display: none;
            font-size: 12px;
        }

        .color-palette:hover span {
            display: block;
        }

        .color-palette.disabled span {
            display: block;
            text-align: left;
            padding-left: .75rem;
        }

        .color-palette-box h4 {
            position: absolute;
            left: 1.25rem;
            margin-top: .75rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            display: block;
            z-index: 7;
        }

        .dashnav {
            position: fixed;
        }

        /* ./END OF MY STYLE  */
    </style>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">

    <!-- <body> -->
    <div class="wrapper">
        <!-- Preloader -->
        <?php
        require("./preloader.php");
        ?>
        <!-- ======= End of Preloader =========  -->

        <!-- Navbar -->
        <!-- <div class="dashnav"> -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../index.php" class="navbar-brand">
                    <img src="./img/erect.jpg" alt="Acoinclub logo" class="brand-image img-circle elevation-3" style="opacity: .8; max-width:3rem;">
                    <span class="brand-text font-weight-light">Acoinclub</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../buysell.php" class="nav-link">BUY/SELL</a>
                        </li>
                        <li class="nav-item">
                            <a href="../trade.php" class="nav-link">TRADE</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Settings</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <!-- <li><a href="#" class="dropdown-item">CARDS </a></li> -->
                                <li><a href="./finance.php" class="dropdown-item">FINANCE </a></li>
                                <li><a href="./verificationpage.php" class="dropdown-item"> VERIFICATION </a></li>
                                <li class="dropdown-divider"></li>

                                <!-- Level two dropdown-->
                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">My Services...</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="./affiliation.php" class="dropdown-item">AFFILIATES</a>
                                        </li>

                                        <!-- Level three dropdown-->
                                        <li class="dropdown-submenu">
                                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">more >> </a>
                                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item">LOANS</a></li>
                                                <li><a href="#" class="dropdown-item">INVESTMENT</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Level three -->

                                        <li><a href="#" class="dropdown-item">MARGIN TRADING</a></li>
                                        <li><a href="#" class="dropdown-item">STAKING</a></li>
                                    </ul>
                                </li>
                                <!-- End Level two -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../card.php" class="nav-link">CARDS</a>
                        </li>
                    </ul>

                    <!-- <div class="btn-group">
                        <button type="button" class="btn btn-info">Username@admin.com</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#" style="color: black;">Profile</a>
                            <a class="dropdown-item" href="#" style="color: black;">Account Activities </a>
                            <a class="dropdown-item" href="#" style="color: black;">Transaction Statement</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" style="color: black;">LOG OUT</a>
                        </div>
                    </div> -->

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.END of left navbar links -->

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="./messagepage.php">
                            <i class="fas fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="./img/avatar2.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./messagepage.php" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="./img/avatar 4.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="./img/avatar6.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./messagepage.php" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="./notificationcenter.php">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">18</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">18 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="./securitysettings.php" class="dropdown-item">
                                <i class="fas fa-user-cog"></i> 3 security settings
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>

                            <a href="./messagepage.php" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">4hrs</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./notificationcenter.php" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./verificationpage.php" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 uploaded document
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./notificationcenter.php" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- </div> -->
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <br /><br />
            <div class="container">
                <!-- alert or email notification here -->
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> Alert!</h5>
                    Info alert preview. This alert is dismissable.
                    Your email has not been verified, please <a href="#" class="card-link">click here</a> to verify your email address.
                </div>
                <!-- ======== ./ =====  -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <!-- <div class="content"> -->

        <!-- </div> -->
        <!-- /.content -->
        <!-- </div> -->
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="pad p-3 control-sidebar-content">
                <br /><br />
                <!-- user dropdown-button acccount -->
                <div class="btn-group">
                    <button type="button" class="btn btn-info">Username@admin.com</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="./profilepage.php" style="color: black;"><i class="fas fa-user-circle"></i> &nbsp; My Profile</a>
                        <a class="dropdown-item" href="./notificationcenter.php" style="color: black;"><i class="far fa-address-card"></i> Account Activities </a>
                        <a class="dropdown-item" href="./securitysettings.php" style="color: black;"><i class="fas fa-user-shield"></i>&nbsp; Security Settings</a>
                        <a class="dropdown-item" href="./transactionpage.php" style="color: black;"><i class="fas fa-file-invoice-dollar"></i>&nbsp; Transaction Statement</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php" style="color: black;"><i class="fas fa-sign-out-alt"></i>&nbsp; LOG OUT</a>
                    </div>
                </div>
                <!-- === / == -->
                <hr class="mb-2">

                <!-- <br /> -->
                <h4>
                    News and Updates
                </h4>
                <h5>
                    Promo! Promo!! Promo!!!
                </h5>
                <!-- RED ALERT  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
                    entire
                    soul, like these sweet mornings of spring which I enjoy with my whole heart.
                </div>
                <!-- ==========  -->
                <!-- BLUE ALERT  -->
                <!-- <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> Alert!</h5>
                    Info alert preview. This alert is dismissable.
                </div> -->
                <!-- ============  -->
                <!-- YELLOW ALERT  -->
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    Warning alert preview. This alert is dismissable.
                </div>
                <!-- ===========  -->
                <!-- GREEN ALERT  -->
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    Success alert preview. This alert is dismissable.
                </div>
                <!-- ==========  -->
                <!-- ./ END OF ALERTS  -->
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- =========./ End of Dasboard navigations ======= -->
        <?php

        ?>