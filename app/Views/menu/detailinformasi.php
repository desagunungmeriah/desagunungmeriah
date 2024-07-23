<?= $this->extend('layouts/master_public') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center mb-4"><?= $berita->judul ?></h1>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="text-center">
                <img src="<?= base_url('uploads/fotoberita/' . $berita->foto) ?>" class="img-fluid mb-3 d-block mx-auto" alt="<?= $berita->judul ?>" style="max-width:500px;height:500px;">
            </div>

            <p class="text-muted"><small><?= date('d F Y', strtotime($berita->tanggal)) ?></small></p>
            <p><?= $berita->keterangan ?></p>
        </div>
    </div>
    <div class="text-center mt-4 mb-4">
        <a href="<?= site_url('informasi') ?>" class="btn btn-dark">Kembali</a>
    </div>
</div>

<?= $this->endSection() ?>