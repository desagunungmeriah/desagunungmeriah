<?php

use App\Models\ConfigwebModel;

$web = new ConfigwebModel();
$web = $web->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/uploads/logo/<?= $web->logo ?>">
    <title><?= $title; ?> | <?= $web->title ?></title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="/assets/css/vendors_css.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- Style-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skin_color.css">
    <!--end::Page Vendors Styles-->
    <link href="<?= base_url() ?>/assets/plugins/custom/uppy/uppy.bundle.css?v=7.2.9" rel="stylesheet" type="text/css" />

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url() ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
                    <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                </a>
                <!-- Logo -->
                <div class="d-flex align-items-center">
                    <img src="<?= base_url('assets/images/logo-kab.png') ?>" alt="Logo" style="height: 30px;margin-right:20px;">
                    <h5 class="ml-5 mb-0">Admin Desa Gunung Meriah</h5>
                </div>
                <a href="index-2.html" class="logo">
                    <!-- logo-->
                    <!-- <div class="logo-lg">
                        <span class="light-logo"><img src="/uploads/logo/<?= $web->logo ?>" style="margin-left: -15px;" alt="logo"></span>
                        <span class="dark-logo"><img src="/uploads/logo/<?= $web->logo ?>" style="margin-left: -15px;" alt="logo"></span>
                    </div> -->
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
                                <i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                        </li>
                        <li class="btn-group d-lg-inline-flex d-none">
                            <div class="app-menu">
                                <!-- <div class="search-bx mx-5">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> -->
                            </div>
                        </li>
                        <!-- Notifications -->
                        <!-- <li class="dropdown notifications-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="Notifications">
                                <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li> -->

                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
                                <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <!-- <a class="dropdown-item" href="Profil"><i class="ti-user text-muted me-2"></i> Profile</a> -->
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="ti-lock text-muted me-2"></i> Logout</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Control Sidebar Toggle Button -->

                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" id="themeSwitch" class="waves-effect waves-light" onclick="switchTheme()">
                                <i class="icon-Moon"><span class="path1"></span><span class="path2"></span></i>
                                <i class="icon-Sun" style="display: none; color: yellow;"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%;">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">Dashboard</li>
                            <li>
                                <a href="dashboard">
                                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <?php
                            $user = session()->get('auth');
                            if ($user && $user['level'] == 0) :
                            ?>
                                <li class="header">Admin</li>
                                <li>
                                    <a href="<?= site_url('admin') ?>">
                                        <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                        <span>Data Admin</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li class="header">Website Tools</li>
                            <li>
                                <a href="configweb">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Setting Website</span>
                                </a>
                            </li>
                            <li>
                                <a href="slider">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Slider</span>
                                </a>
                            </li>
                            <li>
                                <a href="about">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Tentang Kami</span>
                                </a>
                            </li>
                            <li>
                                <a href="gambaranumum">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Gambaran Umum</span>
                                </a>
                            </li>
                            <li>
                                <a href="demografi">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Demografi</span>
                                </a>
                            </li>
                            <li>
                                <a href="visi">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Visi</span>
                                </a>
                            </li>
                            <li>
                                <a href="misi">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Misi</span>
                                </a>
                            </li>
                            <li>
                                <a href="produkdesa">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Produk Desa</span>
                                </a>
                            </li>
                            <li>
                                <a href="potensidesa">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Potensi Desa</span>
                                </a>
                            </li>
                            <li>
                                <a href="perangkatdesa">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Perangkat Desa</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="jeniskegiatan">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Jenis Kegiatan</span>
                                </a>
                            </li> -->

                            <li>
                                <a href="lokasi">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Lokasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="background">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Bg Footer Demografi</span>
                                </a>
                            </li>
                            <li>
                                <a href="berita">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Berita</span>
                                </a>
                            </li>
                            <li>
                                <a href="pesan">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Pesan</span>
                                </a>
                            </li>
                            <li>
                                <a href="layananpenduduk">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Layanan Penduduk</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- <div class="sidebar-footer">
                <a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
                <a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
                <a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
            </div> -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <?php if ($title == 'Dashboard') : ?>
                                <h3 class="page-title text-capitalize"><?= $title ?></h3>
                            <?php else : ?>
                                <h3 class="page-title text-capitalize">Data <?= $title ?></h3>
                            <?php endif; ?>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="fad fa-home"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                        <?php if ($title != 'Dashboard') : ?>
                                            <li class="breadcrumb-item active text-capitalize" aria-current="page">Data <?= $title ?></li>
                                        <?php endif; ?>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Main content -->

                <?= $this->renderSection('content') ?>

                <!-- /.content -->

            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- <footer class="main-footer" style="width: 100%;">
            &copy; <?= date('Y') ?> <a href="#"> <?= $web->title ?> App V 1.0</a> All Rights Reserved.
        </footer> -->

    </div>
    <!-- ./wrapper -->



    <!-- Vendor JS -->

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>

    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?= base_url() ?>/assets/plugins/global/plugins.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/global/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/js/scripts.bundle.js"></script>


    <!--begin::Page Scripts(used by this page)-->
    <script src="<?= base_url() ?>/assets/js/pages/widgets.js"></script>
    <script>
        const current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
        $('.menu-nav a[href~="<?= base_url() ?>/Admin/' + current + '"]').parent('li').addClass('menu-item-active');

        $("#bry-modal").draggable({
            handle: ".modal-header",
        });
    </script>
    <script src="<?= base_url() ?>/assets/js/pages/crud/ktdatatable/base/html-table1ff3.js?v=7.1.2"></script>
    <script src="<?= base_url() ?>/assets/plugins/custom/uppy/uppy.bundle.js"></script>

    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- EduAdmin App -->
    <script src="/assets/js/template.js"></script>
    <script src="/assets/js/theme_change.js"></script>
    <script src="/assets/js/pages/validation.js"></script>
    <script src="/assets/js/pages/form-validation.js"></script>
    <script src="/assets/icons/feather-icons/feather.min.js"></script>
    <script src="/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
    <script src="/assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/assets/vendor_components/select2/dist/js/select2.full.js"></script>
    <script src="/assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="/assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/assets/vendor_plugins/iCheck/icheck.min.js"></script>

    <!-- EduAdmin App -->
    <script src="/assets/js/pages/advanced-form-element.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.rz-select').select2({
                dropdownParent: $('#data-modal')
            });

            $('.summernote').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });
        });
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>