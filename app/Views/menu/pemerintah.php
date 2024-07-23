<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>

<section class="perangkat-desa my-4">
    <h1 class="text-center mb-4">PERANGKAT DESA GUNUNG MERIAH</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($perangkat as $prg) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= base_url('uploads/fotoperangkatdesa/' . $prg->foto) ?>" class="card-img-top" alt="Foto <?= $prg->nama ?>">
                        <div class="card-body text-center">
                            <p class="card-text font-weight-bold"><?= $prg->nama ?></p>
                            <p class="card-text"><?= $prg->jabatan ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- <section class="struktur-lembaga my-4">
    <h1 class="text-center mb-4">Struktur Organisasi Lembaga Desa</h1>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Ketua</h5>
                        <p class="card-text">Nama Ketua BPD</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Wakil Ketua</h5>
                        <p class="card-text">Nama Wakil Ketua BPD</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Sekretaris</h5>
                        <p class="card-text">Nama Sekretaris BPD</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Bendahara</h5>
                        <p class="card-text">Nama Bendahara BPD</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center font-weight-bold mb-3">Anggota</h5>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6 class="card-title">Anggota 1</h6>
                                <p class="card-text">Nama Anggota 1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6 class="card-title">Anggota 2</h6>
                                <p class="card-text">Nama Anggota 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6 class="card-title">Anggota 3</h6>
                                <p class="card-text">Nama Anggota 3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?= $this->endSection() ?>