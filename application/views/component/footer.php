<footer class="main-footer">
  <div class="footer-left">
    <?= date("Y") ?> &copy; Yayasan Pengembangan Pemuda Mandiri
  </div>
  <div class="footer-right">
    Developed By <a href="https://digicraft.id/" target="_bank">Digicraft Digital Agency</a>
  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() . "assets/" ?>js/stisla.js"></script>
<!-- <script src="<?php echo base_url() .
  "assets/"; ?>vendor/datatables/jquery/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script>
<script src="<?php echo base_url() .
  "assets/"; ?>vendor/datatables/js/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>


<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= base_url() . "assets/" ?>js/scripts.js"></script>
<script src="<?= base_url() . "assets/" ?>vendor/chart.js/Chart.js"></script>
<script>
       $(document).ready(function() {
           $('#newlanguage').summernote({
               placeholder: 'Your campaign description...',
               height: 400,
               toolbar: [
                   ['style', ['style']],
                   ['font', ['bold', 'italic', 'underline', 'clear']],
                   ['fontname', ['fontname']],
                   ['color', ['color']],
                   ['para', ['ul', 'ol', 'paragraph']],
                   ['table', ['table']],
                   ['insert', ['link', 'picture', 'video']],
                   ['view', ['fullscreen']],
               ],
               callbacks: {
                   onImageUpload: function(image) {
                       uploadImage(image[0]);
                   },
                   onMediaDelete: function(target) {
                       deleteImage(target[0].src);
                   }
               }
           });
           $('#pesan').summernote({
               placeholder: 'Isi pesan ...',
               height: 200,
               toolbar: [
                   ['font', ['bold', 'italic', 'underline']],
                   ['para', ['ul', 'ol', 'paragraph']],
               ]
           });

           function uploadImage(image) {
               var data = new FormData();
               data.append("image", image);
               $.ajax({
                   url: "<?= base_url("cadmin/upload_image") ?>",
                   cache: false,
                   contentType: false,
                   processData: false,
                   data: data,
                   type: "POST",
                   success: function(url) {
                       $('#newlanguage').summernote("insertImage", url);
                   },
                   error: function(data) {
                       console.log(data);
                   }
               });
           }

           function deleteImage(src) {
               $.ajax({
                   data: {
                       src: src
                   },
                   type: "POST",
                   url: "<?= base_url("cadmin/delete_image") ?>",
                   cache: false,
                   success: function(response) {
                       console.log(response);
                   }
               });
           }
       });
   </script>
<script type="text/javascript">
  $(document).ready(function() {

    allParticipant();
    unveParticipant();
    activeParticipant();
    waitParticipant();
    daniedParticipant();
    bannedParticipant();
    all_campaign();
    all_category();
    donations();

    $('#listParticipant').DataTable({
      'info': false,
    });
    $('#unveParticipant').DataTable({
      'info': false,
    });
    $('#waitParticipant').DataTable({
      'info': false,
    });
    $('#activeParticipant').DataTable({
      'info': false,
    });
    $('#daniedParticipant').DataTable({
      'info': false,
    });
    $('#bannedParticipant').DataTable({
      'info': false,
    });
    $('#allCampaign').DataTable({
      'info': false,
    });
    $('#allDonation').DataTable({
      'info': false,
    });

    function allParticipant() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/all_participant',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            if (data[i].status == '1') {
              status = '<span class="badge badge-primary">registered</span>';
            }
            if (data[i].status == '2') {
              status = '<span class="badge badge-info">waiting</span>';
            }
            if (data[i].status == '3') {
              status = '<span class="badge badge-warning">danied</span>';
            }
            if (data[i].status == '4') {
              status = '<span class="badge badge-success">active</span>';
            }
            if (data[i].status == '5') {
              status = '<span class="badge badge-danger">banned</span>';
            }
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].nama + '</font></td>' +
              '<td>' + data[i].email + '</td>' +
              '<td>' + status + '</td>' +
              '</tr>';
          }
          $('#all_participant').html(html);
        }

      });
    }

    function unveParticipant() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/unve_participant',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            var action = '<a href="" type="button" class="btn btn-primary" data-nama="'+ data[i].nama +'" data-tlp="'+ data[i].tlp +'" data-email="'+ data[i].email +'" data-registrasi="'+ data[i].tgl_register +'" id="detailModal"  data-toggle="modal"  data-target="#participantModal" data-backdrop="false">Detail</a>';
            if (data[i].status == '1') {
              status = '<span class="badge badge-primary">registered</span>';
            }
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].nama + '</font></td>' +
              '<td>' + data[i].email + '</td>' +
              '<td>' + status + '</td>' +
              '<td>' + action + '</td>' +
              '</tr>';
          }
          $('#unve_participant').html(html);
        }

      });
    }

    function waitParticipant() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/wait_participant',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            if (data[i].status == '2') {
              status = '<span class="badge badge-info">unverified</span>';
            }
            var action = '<a class="btn btn-primary" href="'+ baseUrl +'participant/'+data[i].id+'">Detail</a>';
            if (data[i].status == '1') {
              status = '<span class="badge badge-primary">registered</span>';
            }
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].nama + '</font></td>' +
              '<td>' + data[i].email + '</td>' +
              '<td>' + status + '</td>' +
              '<td>' + action + '</td>' +
              '</tr>';
          }
          $('#wait_participant').html(html);
        }

      });
    }

    function daniedParticipant() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/danied_participant',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            if (data[i].status == '3') {
              status = '<span class="badge badge-warning">danied</span>';
            }
            var action = '<a class="btn btn-primary" href="'+ baseUrl +'participant/'+data[i].id+'">Detail</a>';
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].nama + '</font></td>' +
              '<td>' + data[i].email + '</td>' +
              '<td>' + status + '</td>' +
              '<td>' + action + '</td>' +
              '</tr>';
          }
          $('#danied_participant').html(html);
        }

      });
    }

    function activeParticipant() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/active_participant',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            var action = '<a class="btn btn-primary" href="'+ baseUrl +'participant/'+data[i].id+'">Detail</a>';
            if (data[i].status == '4') {
              status = '<span class="badge badge-success">active</span>';
            }
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].nama + '</font></td>' +
              '<td>' + data[i].email + '</td>' +
              '<td>' + status + '</td>' +
              '<td>' + action + '</td>' +
              '</tr>';
          }
          $('#active_participant').html(html);
        }

      });
    }

    function bannedParticipant() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/banned_participant',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            if (data[i].status == '5') {
              status = '<span class="badge badge-danger">banned</span>';
            }
            var action = '<a class="btn btn-primary" href="'+ baseUrl +'participant/'+data[i].id+'">Detail</a>';
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].nama + '</font></td>' +
              '<td>' + data[i].email + '</td>' +
              '<td>' + status + '</td>' +
              '<td>' + action + '</td>' +
              '</tr>';
          }
          $('#banned_participant').html(html);
        }

      });
    }


  });

  //donation

  function donations() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/get_donation',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            var action = '<a href="" type="button" class="btn btn-primary" data-nama="'+ data[i].name +'" data-amount="'+ data[i].amount +'" data-email="'+ data[i].email +'" data-campaign="'+ data[i].title +'" data-datedonate="'+ data[i].donate_date +'" id="detailDonate"  data-toggle="modal"  data-target="#donateModal" data-backdrop="false">Detail</a>';
            if (data[i].status == '1') {
              status = '<span class="badge badge-primary">registered</span>';
            }
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].name + '</font></td>' +
              '<td>' + data[i].title + '</td>' +
              '<td> Rp ' + parseInt(data[i].amount).toLocaleString()  + '</td>' +
              '<td>' + action + '</td>' +
              '</tr>';
          }
          $('#donations').html(html);
        }

      });
    }


  //campaigns

  function all_campaign() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/campaigns',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var no = i + 1;
            var status;
            var hl = '';
            var i_id;
            var i_en;
            var set_hl = '';
            

            if (data[i].campaign_status == '2') {
              if(data[i].is_highlight == '1'){
                hl = '<span class="badge badge-info">highlight</span>';
                status = '';
              }else{
                status = '<span class="badge badge-success">active</span>';
                set_hl = '<a class="btn btn-info" href="'+ baseUrl +'cadmin/sethl/'+data[i].id+'">Set Highlight</a>';
              }
            }
            if (data[i].campaign_status == '3') {
              status = '<span class="badge badge-primary" style="background-color: gray;">expired</span>';
            }
            if (data[i].campaign_status == '4') {
              status = '<span class="badge badge-warning">danied</span>';
            }
            if (data[i].campaign_status == '5') {
              status = '<span class="badge badge-danger">User get banned</span>';
            }
            var action = '<a class="btn btn-primary" href="'+ baseUrl +'campaign/'+data[i].id+'">Detail</a>';
            if (data[i].campaign_status == '1') {
              status = '<span class="badge badge-primary">inactive</span>';
            }
            if(data[i].id_id !== null){
              i_id = '<i class="fas fa-check-circle" style="color:#47c363"></i>';
            }
            else{
              i_id = '<a href="'+ baseUrl +'newlanguage/'+ data[i].id_en +'"><i class="fas fa-pencil-alt" style="color:#6777ef"></i></a>';
            }
            if(data[i].id_en !== null){
              i_en = '<i class="fas fa-check-circle" style="color:#47c363"></i>';
            }else{
              i_en = '<a href="'+ baseUrl +'newlanguage/'+ data[i].id_id +'"><i class="fas fa-pencil-alt" style="color:#6777ef"></i></a>';
            }
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].title + '</font></td>' +
              '<td>' + i_id + '</td>' +
              '<td>' + i_en + '</td>' +
              '<td> Rp ' + parseInt(data[i].target_fund).toLocaleString()  + '</td>' +
              '<td>' + status +' '+ hl + '</td>' +
              '<td>' + action +' '+ set_hl + '</td>' +
              '</tr>';
          }
          $('#all_campaign').html(html);
        }

      });
    }


//campaigns category

  function all_category() {
      var baseUrl = '<?= base_url() ?>'
      $.ajax({
        type: 'ajax',
        url: baseUrl + 'cadmin/campaign_category',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            var created_date = data[i].create_date;
            var parts = created_date.split("-");
            if (parts[1] == "01") {
              var bulan = "Januari";
            }
            if (parts[1] == "02") {
              var bulan = "Februari";
            }
            if (parts[1] == "03") {
              var bulan = "Maret";
            }
            if (parts[1] == "04") {
              var bulan = "April";
            }
            if (parts[1] == "05") {
              var bulan = "Mei";
            }
            if (parts[1] == "06") {
              var bulan = "Juni";
            }
            if (parts[1] == "07") {
              var bulan = "Juli";
            }
            if (parts[1] == "08") {
              var bulan = "Agustus";
            }
            if (parts[1] == "09") {
              var bulan = "September";
            }
            if (parts[1] == "10") {
              var bulan = "Oktober";
            }
            if (parts[1] == "11") {
              var bulan = "Novemver";
            }
            if (parts[1] == "12") {
              var bulan = "Desember";
            }
            var dmyDate = parts[2] + " " + bulan + " " + parts[0];
            var no = i + 1;
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td><font style=text-transform:capitalize>' + data[i].category_title + '</font></td>' +
              '<td>' + data[i].description + '</td>' +
              '<td>' + dmyDate + '</td>' +
              '</tr>';
          }
          $('#all_category').html(html);
        }

      });
    }
</script>

<script src="<?= base_url() . "assets/" ?>js/custom.js"></script>

<script>
  $(document).on("click", "#100", function () {
      var nama = 100;
        $("#nama").val(nama);
      });

</script>

</body>

</html>