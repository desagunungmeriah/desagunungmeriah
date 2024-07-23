<?= $this->extend("layouts/master_app") ?>

<?= $this->section("content") ?>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title text-capitalize">Data <?= $title ?></h4>
        </div>
        <div class="box-body">
            <table id="data_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Phone</th>
                        <th>Message</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section("script") ?>
<!-- page script -->
<script>
    let csrfHash = '<?= csrf_hash(); ?>';
    let csrfToken = '<?= csrf_token(); ?>';

    // dataTables
    $(function() {
        var table = $('#data_table').removeAttr('width').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollY": '45vh',
            "scrollX": true,
            "scrollCollapse": false,
            "responsive": false,
            "ajax": {
                "url": '<?php echo base_url($controller . "/getAll") ?>',
                "type": "POST",
                "dataType": "json",
                "data": {
                    [csrfToken]: csrfHash
                },
                async: "true"
            }
        });
    });
    var urlController = '';
    var submitText = '';

    function getUrl() {
        return urlController;
    }
</script>
<?= $this->endSection() ?>