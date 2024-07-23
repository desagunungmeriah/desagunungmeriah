<?= $this->extend('layouts/master_public') ?>

<?= $this->section('content') ?>
<?php

use App\Models\ConfigwebModel;

$web = new ConfigwebModel();
$web = $web->first();
?>


<div class="contact-us-section bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="section-title" data-cues="fadeIn" data-disabled="true">
                    <h5 data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">WRITE A MESSAGE</h5>
                    <h1 data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Hubungi Kami</h1>
                    <h4 data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Desa Gunung Meriah</h4>
                    <p class="section-dsc-1" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="<?= base_url('s_hubungikami') ?>" method="POST" enctype="multipart/form-data" id="dreamit-form">
                    <div class="row form">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-box" data-cues="fadeIn" data-disabled="true">
                                <input type="text" name="nama" placeholder="Name" required data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-box" data-cues="fadeIn" data-disabled="true">
                                <input type="email" name="email" placeholder="Email" required data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 600ms; animation-direction: normal; animation-fill-mode: both;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-box">
                                <input type="text" name="subject" placeholder="Subject" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-box">
                                <input type="text" name="phone" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-box" data-cues="fadeIn" data-disabled="true">
                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message" required data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="submit-button" data-cues="fadeIn" data-disabled="true">
                                <button type="submit" class="submit" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 2000ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Kirim Sekarang</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="contact-us-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title center-title" data-cues="fadeIn">
                    <h5>HUBUNGI KAMI</h5>
                    <h1>Kontak <?= $web->title ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-us-box" data-cues="fadeIn">
                    <div class="contact-us-icon">
                        <img src="/desa/assets/images/resource/address-icon.png" alt="icon">
                    </div>
                    <div class="contact-us-content">
                        <h4>Nomor telepon</h4>
                        <p><?= $web->no_hp ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-us-box" data-cues="fadeIn">
                    <div class="contact-us-icon">
                        <img src="/desa/assets/images/resource/address-icon1.png" alt="icon">
                    </div>
                    <div class="contact-us-content">
                        <h4>Email</h4>
                        <p><?= $web->email ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-us-box" data-cues="fadeIn">
                    <div class="contact-us-icon">
                        <img src="/desa/assets/images/resource/address-icon2.png" alt="icon">
                    </div>
                    <div class="contact-us-content">
                        <h4>Lokasi</h4>
                        <p><?= $web->alamat ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>