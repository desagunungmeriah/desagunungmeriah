<?= $this->extend('layouts/master_public') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center mb-4"><?= $potensi->nama ?></h1>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="text-center">
                <img src="<?= base_url('uploads/fotopotensidesa/' . $potensi->foto) ?>" class="img-fluid mb-3 d-block mx-auto" alt="<?= $potensi->nama ?>" style="max-width:500px;height:500px;">
            </div>

            <p class="text-muted"><small><?= date('d F Y', strtotime($potensi->tanggal)) ?></small></p>
            <p><?= $potensi->keterangan ?></p>
        </div>
    </div>
    <div class="text-center mt-4 mb-4">
        <a href="<?= site_url('v_potensidesa') ?>" class="btn btn-dark">Kembali</a>
    </div>
</div>

<?= $this->endSection() ?>