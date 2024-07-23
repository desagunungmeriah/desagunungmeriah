<?= $this->extend("layouts/master_app") ?>

<?= $this->section("content") ?>
<!-- Main content -->

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h4 class="box-title text-capitalize">Data config web</h4>
     <!-- <button type="button" class="btn float-end btn-primary btn-sm" onclick="save()" title="<?= lang("App.new") ?>"> <?= lang('App.new') ?></button> -->
    </div>
    <div class="box-body">
      <table id="data_table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Logo</th>
            <th>Fb</th>
            <th>No hp</th>
            <th>Email</th>
            <th>Ig</th>
            <th>Tiktok</th>
            <th>Alamat</th>
            <th>Deskripsi</th>
            <th>Footer</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</section>

<!-- /Main content -->

<!-- ADD modal content -->
<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <?= csrf_field() ?>
          <div class="row">
            <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" required>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="title" class="col-form-label"> Title: <span class="text-danger">*</span> </label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Title" minlength="0" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="logo" class="col-form-label"> Logo: </label>
                <input type="text" id="logo" name="logo" class="form-control" placeholder="Logo" minlength="0" value="logo.png" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="fb" class="col-form-label"> Fb: </label>
                <input type="text" id="fb" name="fb" class="form-control" placeholder="Fb" minlength="0">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="no_hp" class="col-form-label"> No hp: </label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="No hp" minlength="0">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="email" class="col-form-label"> Email: </label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" minlength="0">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="ig" class="col-form-label"> Ig: </label>
                <input type="text" id="ig" name="ig" class="form-control" placeholder="Ig" minlength="0">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="tiktok" class="col-form-label"> Tiktok: </label>
                <input type="text" id="tiktok" name="tiktok" class="form-control" placeholder="Tiktok" minlength="0">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="alamat" class="col-form-label"> Alamat: </label>
                <textarea cols="40" rows="5" id="alamat" name="alamat" class="form-control" placeholder="Alamat" minlength="0"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="deskripsi" class="col-form-label"> Deskripsi: </label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi" minlength="0">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="footer" class="col-form-label"> Footer: </label>
                <input type="text" id="footer" name="footer" class="form-control" placeholder="Footer" minlength="0">
              </div>
            </div>
          </div>
          <div class="row">
          </div>

          <div class="form-group text-center">
            <div class="btn-group">
              <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /ADD modal content -->


<!-- ADD modal content -->
<div id="upload-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel">Upload Foto Logo</h4>
      </div>
      <div class="modal-body">
        <form id="add-form" action="" method="_post">
          <?= csrf_field() ?>
          <input type="hidden" id="test">
          <div class="modal-body" style="max-height: 500px; overflow: auto;">
            <div class="form-group">
              <div class="uppy" id="kt_uppy_2">
                <div class="uppy-dashboard"></div>
                <div class="uppy-progress"></div>
              </div>
            </div>

        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<?= $this->endSection() ?>

<!-- page script -->
<?= $this->section("script") ?>
<script src="<?= base_url() ?>/assets/plugins/custom/uppy/uppy.bundle.js"></script>
<script>
  function upload(idAlumni) {
    // open modal upload-modal
    $('#upload-modal').modal('show');
    var KTUppy = function() {
    const Tus = Uppy.Tus;
    const XHR = Uppy.XHRUpload;
    // to get uppy companions working, please refer to the official documentation here: https://uppy.io/docs/companion/
    const Dashboard = Uppy.Dashboard;

    var initUppy2 = function() {
      var id = '#kt_uppy_2';

      var options = {
        proudlyDisplayPoweredByUppy: false,
        target: id,
        inline: true,
        replaceTargetContent: true,
        showProgressDetails: true,
        note: 'max 5 file',
        height: 300,
        metaFields: [{
            id: 'name',
            name: 'Name',
            placeholder: 'file name'
          },
          {
            id: 'caption',
            name: 'Caption',
            placeholder: 'describe what the image is about'
          }
        ],
        browserBackButtonClose: true
      }

      var uppyDashboard = Uppy.Core({
        autoProceed: true,
        restrictions: {
          maxFileSize: 9000000, // 1mb
          maxNumberOfFiles: 5,
          minNumberOfFiles: 1,
          allowedFileTypes: ['image/*']
        }
      });

      uppyDashboard.use(Dashboard, options);
      uppyDashboard.use(XHR, {
        endpoint: '<?= base_url()  ?>/configweb/upload/' + idAlumni + '',
        responseType: 'text',
        formData: true,
        bundle: true,

      });
      uppyDashboard.on('upload-success', (responseText, response) => {

        console.log(response)
        console.log(responseText)

        window.location.reload();
      })
    }

    return {
      // public functions
      init: function() {

        initUppy2();

      }
    };
  }();

  KTUtil.ready(function() {
    KTUppy.init();
  });
  }

</script>

<script>
  let csrfHash = '<?= csrf_hash(); ?>'
  let csrfToken = '<?= csrf_token(); ?>'
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

  function getSubmitText() {
    return submitText;
  }

  function save(id) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id === 'undefined' || id < 1) { //add
      urlController = '<?= base_url($controller . "/add") ?>';
      submitText = '<?= lang("App.save") ?>';
      $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
      $("#form-btn").text(submitText);
      $('#data-modal').modal('show');
    } else { //edit
      urlController = '<?= base_url($controller . "/edit") ?>';
      submitText = '<?= lang("App.update") ?>';
      $.ajax({
        url: '<?= base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          id: id,
          [csrfToken]: csrfHash
        },
        dataType: 'json',
        success: function(response) {
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          $("#data-form #id").val(response.id);
          $("#data-form #title").val(response.title);
          $("#data-form #logo").val(response.logo);
          $("#data-form #fb").val(response.fb);
          $("#data-form #no_hp").val(response.no_hp);
          $("#data-form #email").val(response.email);
          $("#data-form #ig").val(response.ig);
          $("#data-form #tiktok").val(response.tiktok);
          $("#data-form #alamat").val(response.alamat);
          $("#data-form #deskripsi").val(response.deskripsi);
          $("#data-form #footer").val(response.footer);


        }
      });
    }
    $.validator.setDefaults({
      highlight: function(element) {
        $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      },
      errorElement: 'div ',
      errorClass: 'invalid-feedback',
      errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else if ($(element).is('.select')) {
          element.next().after(error);
        } else if (element.hasClass('select2')) {
          //error.insertAfter(element);
          error.insertAfter(element.next());
        } else if (element.hasClass('selectpicker')) {
          error.insertAfter(element.next());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {
        var form = $('#data-form');
        $(".text-danger").remove();
        $.ajax({
          // fixBug get url from global function only
          // get global variable is bug!
          url: getUrl(),
          type: 'post',
          data: form.serialize(),
          cache: false,
          dataType: 'json',
          beforeSend: function() {
            $('#form-btn').html('<i class="fad fa-spinner fa-spin"></i>');
          },
          success: function(response) {
            if (response.success === true) {
              $('#data-modal').modal('hide');
              Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
              })
            } else {
              if (response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var ele = $("#" + index);
                  ele.closest('.form-control')
                    .removeClass('is-invalid')
                    .removeClass('is-valid')
                    .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                  ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                });
              } else {
                Swal.fire({
                  toast: false,
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 3000
                })

              }
            }
            $('#form-btn').html(getSubmitText());
          }
        }).fail(function(res) {
          console.log(res);
        });
        return false;
      }
    });

    $('#data-form').validate({

      //insert data-form to database

    });
  }

  function remove(id) {
    Swal.fire({
      title: "<?= lang("App.remove-title") ?>",
      text: "<?= lang("App.remove-text") ?>",
      icon: 'warning',
      showCancelButton: true,
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      },
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '<?= lang("App.confirm") ?>',
      cancelButtonText: '<?= lang("App.cancel") ?>'
    }).then((result) => {

      if (result.value) {
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            id: id,
            [csrfToken]: csrfHash
          },
          dataType: 'json',
          success: function(response) {
            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
              })
            } else {
              Swal.fire({
                toast: false,
                position: 'bottom-end',
                icon: 'error',
                title: response.messages,
                showConfirmButton: false,
                timer: 3000
              })
            }
          }
        });
      }
    })
  }
</script>


<?= $this->endSection() ?>