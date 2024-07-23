<?= $this->extend("layouts/master_app") ?>

<?= $this->section("content") ?>

<div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url('https://eduadmin-template.multipurposethemes.com/bs5/images/svg-icon/color-svg/custom-1.svg')">
    <div class="row">
        <div class="col-12 col-xl-7">
            <?php if (session()->has('alert')) : ?>
                <?php $alert = session('alert'); ?>
                <div class="my-3 alert alert-<?= esc($alert['type']) ?>" role="alert">
                    <?= esc($alert['message']) ?>
                </div>
            <?php endif; ?>
            <h2>Selamat datang kembali, <strong></strong></h2>

            <p class="text-dark my-10 fs-16">
                Kamu login seabgai
                <strong class="text-warning">Admin</strong>
            </p>
        </div>
        <div class="col-12 col-xl-5"></div>
    </div>
</div>

<?= $this->endSection() ?>