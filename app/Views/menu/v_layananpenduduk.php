<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>

<div class="container mt-5 mb-5">
    <h1 class="text-center mb-4">LAYANAN DESA GUNUNG MERIAH</h1>
    <div class="accordion" id="accordionExample">
        <?php foreach ($layanan as $index => $row) : ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $index ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                        <i class="fas fa-id-card mr-2"></i> <span><?= $row->nama ?></span>
                    </button>
                </h2>

                <div id="collapse<?= $index ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $index ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h5 class="text-center"> <?= $row->judul ?></h5>
                        <div class="text-center mt-2 mb-2">
                            <img src="<?= base_url('uploads/layananpenduduk/' . $row->foto) ?>" alt="Alur Pelayanan KTP" style="height:300px;width:300px;">
                        </div>
                        <p><?= $row->keterangan ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>