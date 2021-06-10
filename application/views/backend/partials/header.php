<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- SEO Meta Tags-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="keyword" content="" />

        <!-- Title-->
        <title><?php echo $_ENV['SITE_TITLE']; ?> - <?php echo $title; ?></title>

        <!-- Main CSS-->
        <link href="<?php echo base_url('assets/backend/css/style.css'); ?>" rel="stylesheet" />

        <!-- Loading Animation-->
        <link href="<?php echo base_url('assets/backend/css/modal-loading-animate.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/backend/css/modal-loading.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- Core Chart-->
        <link href="<?php echo base_url('node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css'); ?>" rel="stylesheet" />

        <!-- Sweetalert-->
        <link href="<?php echo base_url('assets/backend/css/sweetalert2.min.css'); ?>" rel="stylesheet" />

        <!-- Datatable-->
        <link href="<?php echo base_url('assets/backend/css/dataTables.bootstrap4.css'); ?>" rel="stylesheet" />

        <!-- rich text editor -->
        <link href="//cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
        <link href="//cdn.quilljs.com/1.0.0/quill.bubble.css" rel="stylesheet">

        <!-- tags input css -->
        <link href="<?php echo base_url('assets/backend/css/bootstrap-tagsinput.css'); ?>" rel="stylesheet" />

        <!-- buttons css -->
        <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" />

        <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
    </head>
    <style type="text/css">
        tbody tr {
            cursor: pointer;
        }
    </style>
    <body class="c-app">
        <!-- Sidebar -->
        <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show <?php echo $minimized == true ? 'c-sidebar-minimized' : ''; ?>" id="sidebar">
            <div class="c-sidebar-brand d-lg-down-none">
                <div class="c-sidebar-brand-full">
                    <img class="" height="46" width="auto" src="<?php echo base_url('assets/img/favicon.png'); ?>" /> 
                    <b style="position:  relative;font-size: 25px;padding-left: 5px;vertical-align: -webkit-baseline-middle;">
                        <?php echo $_ENV['SITE_TITLE']; ?>
                    </b>
                </div>
                <img class="c-sidebar-brand-minimized" height="46" width="auto" src="<?php echo base_url('assets/img/favicon.png'); ?>" />
            </div>
            <ul class="c-sidebar-nav">
                <li class="c-sidebar-nav-title">Home Page</li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo site_url('category'); ?>">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-list'); ?>"></use>
                        </svg>
                        Categories
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo site_url('slide'); ?>">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-file'); ?>"></use>
                        </svg>
                        Slides
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo site_url('training'); ?>">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-building'); ?>"></use>
                        </svg>
                        Training Reasons
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo site_url('feedback'); ?>">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-people'); ?>"></use>
                        </svg>
                        Client Feedback
                    </a>
                </li>
                <li class="c-sidebar-nav-title">About Page</li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo site_url('admin/team'); ?>">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-briefcase'); ?>"></use>
                        </svg>
                        Team
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo site_url('partner'); ?>">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-layers'); ?>"></use>
                        </svg>
                        Partners
                    </a>
                </li>
                <li class="c-sidebar-nav-title">Classes Page</li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo site_url('mclass'); ?>">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-library-add'); ?>"></use>
                        </svg>
                        Classes
                    </a>
                </li>
            </ul>
            <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
        </div>

        <!-- Topbar -->
        <div class="c-wrapper c-fixed-components">
            <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
                <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-menu'); ?>"></use>
                    </svg>
                </button>
                <a class="c-header-brand d-lg-none" href="#">
                    <svg width="118" height="46" alt="MMA Logo">
                        <use xlink:href="<?php echo base_url('assets/backend/brand/coreui.svg#full'); ?>"></use>
                    </svg>
                </a>
                <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-menu'); ?>"></use>
                    </svg>
                </button>
                <ul class="c-header-nav d-md-down-none">
                    <li class="c-header-nav-item px-3">
                        <a class="c-header-nav-link" href="#">
                            <?php echo $this->session->user->name; ?>(<strong><?php echo $_ENV['SITE_TITLE']; ?></strong>)
                        </a>
                    </li>
                </ul>
                <ul class="c-header-nav ml-auto mr-4">
                    <li class="c-header-nav-item dropdown d-md-down-none mx-4">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true">
                            <svg class="c-icon">
                                <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-bell'); ?>"></use>
                            </svg>
                            <span class="badge badge-pill badge-warning text-white">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                            <div class="dropdown-header bg-light"><strong>You have 0 notifications</strong></div>
                            <!--<a class="dropdown-item" href="#">
                                <svg class="c-icon mfe-2 text-success">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>
                                </svg>
                                New user registered
                            </a>-->
                        </div>
                    </li>
                    <li class="c-header-nav-item dropdown">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="c-avatar">
                                <img class="c-avatar-img" src="<?php echo base_url('assets/backend/img/avatars/no-user-avatar.jpg'); ?>" alt="Profile Photo" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pt-0">
                            <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                            <a class="dropdown-item" href="<?php echo site_url('login/logout'); ?>">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="<?php echo base_url('node_modules/@coreui/icons/sprites/free.svg#cil-account-logout'); ?>"></use>
                                </svg>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>