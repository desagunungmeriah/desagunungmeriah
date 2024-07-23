<?= $this->extend('layouts/master_public') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center mb-4">INFORMASI TERBARU DESA GUNUNG MERIAH</h1>
    <div class="row">
        <?php foreach ($berita as $item) : ?>
            <div class="col-md-12 mb-4">
                <div class="d-flex">
                    <img src="<?= base_url('uploads/fotoberita/' . $item->foto) ?>" class="mr-3" alt="Foto" style="width: 200px; height: 200px; object-fit: cover;">
                    <div>
                        <h5 class="mb-1"><?= $item->judul ?></h5>
                        <p class="mb-1">
                            <small class="text-muted">
                                <i class="fas fa-calendar-alt"></i> <?= date('d F Y', strtotime($item->tanggal)) ?>
                            </small>
                        </p>
                        <a href="<?= base_url('detailinformasi/' . $item->id) ?>" class="text-primary">BACA SELENGKAPNYA →</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>