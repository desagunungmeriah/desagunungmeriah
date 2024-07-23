<?php

use App\Models\ConfigwebModel;

$web = new ConfigwebModel();
$web = $web->first();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= $web->title ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" sizes="56x56" href="/uploads/logo/<?= $web->logo ?>" />
    <link rel="stylesheet" href="/desa/assets/css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/owl.carousel.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/animate.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/animated-text.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/all.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/flaticon.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/theme-default.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/meanmenu.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/owl.transitions.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/venobox/venobox.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/bootstrap-icons.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/scrollCue.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/responsive.css" type="text/css" media="all" />
    <script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/clash-display" rel="stylesheet" />

    <?= $this->renderSection('css') ?>
    <style>
        /* Custom CSS untuk navbar */
        .navbar-custom {
            background-color: #f8f9fa;
            /* Warna background navbar */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: black;
            /* Warna teks nav-item */
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: #04bebe;
            /* Warna teks nav-item saat dihover */
        }

        .btn-success {
            background-color: #04bebe !important;
        }

        .btn-success:hover {
            background-color: #037d7d !important;
        }

        .main-content {
            margin-top: 80px;
        }

        .d-flex {
            display: flex;
            align-items: flex-start;
        }

        .d-flex img {
            margin-right: 15px;
        }

        .d-flex div {
            flex: 1;
        }

        .d-flex h5 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .d-flex p {
            margin-bottom: 0.5rem;
        }

        .text-primary {
            color: #007bff;
            text-decoration: none;
        }

        .text-primary:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .btn-dark {
            background-color: #004a5e;
            border-color: #004a5e;
        }

        .btn-dark:hover {
            background-color: #003947;
            border-color: #003947;
        }

        .accordion-button i {
            margin-right: 10px;
            /* Custom margin if needed */
        }

        /*  */
        .card-img-top {
            height: 500px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loder-section left-section"></div>
        <div class="loder-section right-section"></div>
    </div>
    <!-- <div class="curser"></div>
    <div class="curser2"></div>
    <div class="header-top-section style2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="header-too-menu-address">
                        <ul>
                            <li>
                                <a href="#"><i class="bi bi-telephone"></i></a>
                                <span><?= $web->no_hp ?></span>
                            </li>
                            <li>
                                <i class="bi bi-geo-alt"></i>
                                <span><?= $web->alamat ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </div> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('assets/images/logo-kab.png') ?>" alt="Logo" height="40">
                <span style="font-size: 0.85em;">Gunung Meriah</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pemerintah') ?>">Pemerintah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('v_layananpenduduk') ?>">Layanan Kependudukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('informasi') ?>">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('v_potensidesa') ?>">Potensi Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('v_produkdesa') ?>">Produk Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white" href="<?= base_url('hubungikami') ?>">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo" data-cues="fadeIn">
                        <a href="#"><img src="/uploads/logo/<?= $web->logo ?>" style="width: 90%" alt="bg" /></a>
                    </div>
                    <div class="footer-widget-description">
                        <p>
                            <?php foreach ($visi as $m) : ?>
                                <?= $m->visi ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="footer-social-icon">
                        <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="bi bi-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget-content" data-cues="fadeIn">
                        <div class="footer-widget-title">
                            <h3>Halaman</h3>
                        </div>
                        <div class="footer-widget-menu">
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>">Profil Desa</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('pemerintah') ?>">Pemerintah</a>
                                </li>

                                <li>
                                    <a href="<?= base_url('v_layananpenduduk') ?>">Layanan Kependudukan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('informasi') ?>">Informasi</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('v_potensidesa') ?>">Potensi Desa</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('v_produkdesa') ?>">Produk Desa</a>
                                </li>
                                <li><a href="<?= base_url('hubungikami') ?>">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget-content" data-cues="fadeIn">
                        <div class="footer-widget-title">
                            <h3>Contact</h3>
                        </div>
                        <div class="footer-widget-menu">
                            <ul>
                                <li>
                                    <span><?= $web->alamat ?></span>
                                </li>
                                <li>
                                    <span><i aria-hidden="true" class="flaticon flaticon-call"></i><?= $web->no_hp ?></span>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-description text-center" data-cues="fadeIn">
                            <p>© <?= date('Y') ?> <?= $web->footer ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-popup">
        <button class="close-search style-two">
            <i class="fas fa-times"></i>
        </button>
        <button class="close-search"><i class="fas fa-arrow-up"></i></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <!-- <div class="progress_indicator active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="
            transition: stroke-dashoffset 10ms linear 0s;
            stroke-dasharray: 307.919, 307.919;
            stroke-dashoffset: 270.456;
          "></path>
        </svg>
    </div> -->

    <script>
        var curser = document.querySelector(".curser");
        var curser2 = document.querySelector(".curser2");
        document.addEventListener("mousemove", function(e) {
            curser.style.cssText = curser2.style.cssText =
                "left: " + e.clientX + "px; top: " + e.clientY + "px;";
        });
    </script>

    <script src="/desa/assets/js/vendor/jquery-3.6.2.min.js"></script>
    <script src="/desa/assets/js/bootstrap.min.js"></script>
    <script src="/desa/assets/js/owl.carousel.min.js"></script>
    <script src="/desa/assets/js/jquery.counterup.min.js"></script>
    <script src="/desa/assets/js/waypoints.min.js"></script>
    <script src="/desa/assets/js/wow.js"></script>
    <script src="/desa/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/desa/venobox/venobox.js"></script>
    <script src="/desa/assets/js/animated-text.js"></script>
    <script src="/desa/venobox/venobox.min.js"></script>
    <script src="/desa/assets/js/isotope.pkgd.min.js"></script>
    <script src="/desa/assets/js/jquery.meanmenu.js"></script>
    <script src="/desa/assets/js/jquery.scrollUp.js"></script>
    <script src="/desa/assets/js/jquery.barfiller.js"></script>
    <script src="/desa/assets/js/theme.js"></script>
    <script src="/desa/assets/js/scrollCue.min.js"></script>
</body>

</html>