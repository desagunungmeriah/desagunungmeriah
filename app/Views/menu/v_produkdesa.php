<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>

<section class="perangkat-desa my-4">
    <h1 class="text-center mb-4">PRODUK DESA GUNUNG MERIAH</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($produk as $prg) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= base_url('uploads/fotoprodukdesa/' . $prg->foto) ?>" class="card-img-top" alt="Foto">
                        <div class="card-body text-center">
                            <p class="card-text font-weight-bold mb-0 fw-bold"><?= $prg->nama ?></p>
                            <p class="card-text font-weight-bold mb-0"><?= $prg->deskripsi ?></p>
                            <p class="card-text"><?= $prg->keterangan ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>