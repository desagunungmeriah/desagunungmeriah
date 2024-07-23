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
    <link rel="stylesheet" href="/desa/assets/css/meanmenu.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/owl.transitions.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/venobox/venobox.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/bootstrap-icons.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/scrollCue.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/desa/assets/css/responsive.css" type="text/css" media="all" />
    <script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/clash-display" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Bootstrap JS, Popper.js, and jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loder-section left-section"></div>
        <div class="loder-section right-section"></div>
    </div>
    <!-- <div class="curser"></div>
    <div class="curser2"></div> -->
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
                    <div class="header-top-menu-social-icon">
                        <ul>
                            <li><span>Follow Us:</span></li>
                            <li>
                                <a href="<?= $web->fb ?>"><i class="bi bi-facebook"></i></a>
                            </li>
                            <li>
                                <a href="<?= $web->ig ?>"><i class="bi bi-instagram"></i></a>
                            </li>
                            <li>
                                <a href="<?= $web->tiktok ?>"><i class="bi bi-tiktok"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sticky-header" class="_nav_manu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="logo">
                        <a class="logo_img" href="index.html" title="">
                            <img src="/uploads/logo/<?= $web->logo ?>" style="width: 70%" alt="logo" />
                        </a>
                        <a class="main_sticky" href="index.html" title="">
                            <img src="/uploads/logo/<?= $web->logo ?>" style="width: 70%" alt="logo" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-12 mt-0">
                    <nav class="_menu">
                        <ul class="nav_scroll">
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
                            <li><a href="<?= base_url('hubungikami') ?>" class="btn-hubungi-kami">Hubungi Kami</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--  Mobile Menu  -->
    <div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none">
        <div class="mobile-menu">
            <nav class="_menu">
                <ul class="nav_scroll">
                    <li>
                        <a href="index.html" class="up">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="service.html">Services</a>
                        <ul class="sub-menu">
                            <li><a href="service.html">Service</a></li>
                            <li><a href="service-details.html">Service Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="department.html">Departments</a>
                        <ul class="sub-menu">
                            <li><a href="department.html">Department</a></li>
                            <li>
                                <a href="department-details.html">Department Details</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="event.html"> Events</a>
                        <ul class="sub-menu">
                            <li><a href="event.html">Event</a></li>
                            <li><a href="event-details.html">Event Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="portfolio.html" class="up">Images</a>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="container text=center mb-5 pb-5">
        <div class="col-lg-12">
            <div class="goolg-map" style="visibility: visible; animation-name: fadeInLeft;">
                <iframe src="<?= $lokasi->maps_lokasi ?>"></iframe>
            </div>
        </div>
        <!-- <h4>Pilih Desa</h4>
        <div class="row">
            <div class="col-md-6">
                <label for="desaA" class="form-label">Lokasi A:</label>
                <select id="desaA" class="form-select">
                    <option value="0">Desa Ulung Rambung</option>
                    <option value="1">Desa Celawan</option>
                    <option value="2">Desa Kota Pari</option>
                    <option value="3">Desa Lubuk Saban</option>
                    <option value="4">Desa Sementara</option>
                    <option value="5">Desa Pantai Cermin Kanan</option>
                    <option value="6">Polmed</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="desaB" class="form-label">Lokasi B:</label>
                <select id="desaB" class="form-select">
                    <option value="1">Desa Celawan</option>
                    <option value="2">Desa Kota Pari</option>
                    <option value="3">Desa Lubuk Saban</option>
                    <option value="4">Desa Sementara</option>
                    <option value="5">Desa Pantai Cermin Kanan</option>
                    <option value="6">Polmed</option>
                </select>
            </div>
        </div> -->
    </div>

    <!-- <script>
        var curser = document.querySelector(".curser");
        var curser2 = document.querySelector(".curser2");
        document.addEventListener("mousemove", function(e) {
            curser.style.cssText = curser2.style.cssText =
                "left: " + e.clientX + "px; top: " + e.clientY + "px;";
        });
    </script> -->

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
    <script>
        var map = L.map('map').setView([3.6111981460927707, 98.99207998798298], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var locations = [{
                label: 'Desa Ulung Rambung',
                coordinates: [3.593115947193046, 98.94113085767083]
            },
            {
                label: 'Desa Celawan',
                coordinates: [3.6311247127825528, 98.95487220014783]
            },
            {
                label: 'Desa Kota Pari',
                coordinates: [3.6525663878570747, 98.95916950229876]
            },
            {
                label: 'Desa Lubuk Saban',
                coordinates: [3.6111981460927707, 99.03846238068327]
            },
            {
                label: 'Desa Sementara',
                coordinates: [3.6133337833841064, 98.99207998798298]
            },
            {
                label: 'Desa Pantai Cermin Kanan',
                coordinates: [3.648166869612429, 98.97890021701794]
            },
            {
                label: 'Polmed',
                coordinates: [3.563507488551984, 98.6555495]
            }
        ];

        var markers = [];
        var line;

        locations.forEach(function(location, index) {
            var marker = L.marker(location.coordinates, {
                draggable: true
            }).addTo(map);
            marker.bindPopup(location.label);
            markers.push(marker);

            marker.on('click', function(e) {
                if (markers.length > 1 && index > 0) {
                    var clickedMarker = e.target;
                    var prevMarker = markers[index - 1];

                    if (line) {
                        map.removeLayer(line);
                    }
                    line = L.polyline([prevMarker.getLatLng(), clickedMarker.getLatLng()], {
                        color: 'blue'
                    }).addTo(map);

                    var distance = prevMarker.getLatLng().distanceTo(clickedMarker.getLatLng());
                    alert('Jarak antara ' + prevMarker.getPopup().getContent() + ' dan ' + clickedMarker.getPopup().getContent() + ': ' + distance.toFixed(2) + ' meter');
                }
            });
        });

        document.getElementById('desaA').addEventListener('change', updateDistance);
        document.getElementById('desaB').addEventListener('change', updateDistance);

        function updateDistance() {
            var desaAIndex = document.getElementById('desaA').value;
            var desaBIndex = document.getElementById('desaB').value;

            var desaAMarker = markers[desaAIndex];
            var desaBMarker = markers[desaBIndex];

            map.fitBounds([desaAMarker.getLatLng(), desaBMarker.getLatLng()]);

            if (line) {
                map.removeLayer(line);
            }
            line = L.polyline([desaAMarker.getLatLng(), desaBMarker.getLatLng()], {
                color: 'red'
            }).addTo(map);

            var distance = desaAMarker.getLatLng().distanceTo(desaBMarker.getLatLng());
            alert('Jarak antara ' + desaAMarker.getPopup().getContent() + ' dan ' + desaBMarker.getPopup().getContent() + ': ' + distance.toFixed(2) + ' meter');
        }
    </script>