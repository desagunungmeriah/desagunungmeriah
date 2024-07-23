<?php $this->extend('layouts/master_public'); ?>

<?php $this->section('content'); ?>


<style>
    <?php foreach ($slider as $s) : ?>#slider-section-<?= $s->id ?> {
        background: url('/uploads/slider/<?= $s->slider_img ?>');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        height: 800px;
    }

    <?php endforeach; ?>
</style>

<div class="slider-list owl-carousel">
    <?php foreach ($slider as $s) : ?>
        <div id="slider-section-<?= $s->id ?>" class="slider-section d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="slider-content">
                            <h1><?= $s->judul ?></h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="single-box-icon-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 pl-0 pr-0">
                <div class="single-box-icon" data-cues="fadeIn">
                    <div class="box-icon">
                        <img src="/desa/assets/images/resource/services-details-icon.png" alt="icon" />
                    </div>
                    <div class="box-text">
                        <h4>Kegiatan &</h4>
                        <h4>Organisasi</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pl-0 pr-0">
                <div class="single-box-icon" data-cues="fadeIn">
                    <div class="box-icon">
                        <img src="/desa/assets/images/resource/icon2.png" alt="icon" />
                    </div>
                    <div class="box-text">
                        <h4>Industri &</h4>
                        <h4>Usaha</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pl-0 pr-0">
                <div class="single-box-icon" data-cues="fadeIn">
                    <div class="box-icon">
                        <img src="/desa//assets/images/resource/offer-icon2.png" alt="icon" />
                    </div>
                    <div class="box-text">
                        <h4>Agrikultur &</h4>
                        <h4>Pertanian</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-thumb" data-cue="zoomIn">
                    <img src="/uploads/about/<?= $about->image ?>" alt="thumb" />
                </div>
                <!-- <div class="about-all-shape">
                    <div class="about-shape">
                        <img src="/desa/assets/images/resource/shape.jpg" alt="shape" />
                    </div>
                    <div class="about-shape1">
                        <img src="/desa/assets/images/resource/shape.jpg" alt="shape" />
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6">
                <div class="section-title" data-cues="fadeIn">
                    <h5>TENTANG KAMI</h5>
                    <h1><?= $about->title ?></h1>
                </div>
                <div class="about-content">
                    <p>
                        <?= $about->description ?>
                    </p>
                    <!-- <div class="about-button">
                            <a href="about.html">Lebih Lanjut <i class="bi bi-chevron-right"></i></a>
                        </div> -->
                </div>
            </div>
        </div>

    </div>
</div>
<div class="offer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title center-title mt-0" data-cues="fadeIn">
                    <h5>Gambaran Umum</h5>
                    <h1>Gambaran Umum</h1>
                </div>
                <p>
                    <?= $gu->gambaran_umum ?>
                </p>
            </div>
        </div>

    </div>
</div>
<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title center-title up">
                    <h5>VISI DAN MISI</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testi-list owl-carousel">
                <?php foreach ($visi as $m) : ?>
                    <div class="col-lg-12 text-center">
                        <div class="section-title center-title up" style="margin: 40px 0 -20px 0">
                            <h1>VISI</h1>
                        </div>
                        <div class="single-testimonial-box">
                            <div class="testi-content">
                                <?= $m->visi ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($misi as $m) : ?>
                    <div class="col-lg-12 text-center">
                        <div class="section-title center-title up" style="margin: 40px 0 -20px 0">
                            <h1>MISI</h1>
                        </div>
                        <div class="single-testimonial-box">
                            <div class="testi-content">

                                <?= $m->misi ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="offer-section">
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title center-title mt-0" data-cues="fadeIn">
                    <h5>Visi & Misi</h5>
                    <h1>Visi</h1>
                </div>
                <?php foreach ($visi as $m) : ?>
                    <?= $m->visi ?>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="section-title center-title mt-0" data-cues="fadeIn">
                    <h1>Misi</h1>
                </div>
                <ol>
                    <?php foreach ($misi as $m) : ?>
                        <li> <?= $m->misi ?> </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>

    </div> -->
</div>

<style>
    .counter-section {
        padding: 78px 0 65px;
        background: url("/uploads/background/<?= $background->bg_footer_demografi ?>");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    .footer-section {
        background: url("/uploads/background/<?= $background->bg_footer_demografi ?>");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        padding: 105px 0 15px;
        background-attachment: fixed;
    }
</style>


<div class="counter-section">
    <div class="container">
        <div class="row">
            <?php foreach ($demografi as $l) : ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-counter-box" data-cues="fadeIn">
                        <div class="counter-text">
                            <h1 class="counter"><?= $l->angka ?></h1>
                            <span><?= $l->satuan ?></span>
                            <p><?= $l->label ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<div class="google-map-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="submit-button" data-cues="fadeIn">
                    <!-- <button><a class="text-white" href="<?= base_url() ?>/koordinat">Lihat Selengkapnya</a></button> -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="goolg-map" style="visibility: visible; animation-name: fadeInLeft;">
                    <iframe src="<?= $lokasi->maps_lokasi ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>