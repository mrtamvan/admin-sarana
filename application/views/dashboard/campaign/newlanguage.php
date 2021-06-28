            <?php foreach ($result as $campaign): ?>
              <!-- Main Content -->
              <div class="main-content">
                <section class="section">
                  <div class="section-header">
                    <div class="col-6">
                    <?php if ($campaign->id_id == "") {
                      $tambah = "Indonesia";
                    } else {
                      $tambah = "English";
                    } ?>
                      <h1>Tambah Bahasa <?= $tambah ?></h1>
                    </div>
                    <div class="col-6" style="text-align: right;">
                      <h1><a href="<?= base_url(
                        "campaign"
                      ) ?>" class="btn btn-warning" style="margin-left: 5em;background: orange;">Kembali</a></h1>
                    </div>
                  </div>

                  <!-- =========================== main content ================= -->

                  <div class="col-12 laporan mt-4">
                    <?= form_open(base_url("cadmin/input_newlanguage")) ?>
                    <h6>Judul</h6>
                    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul Artikel" autocomplete="off" value="<?= $campaign->title ?>">
                    <input type="text" name="id" value="<?= $campaign->id ?>" hidden>
                    <input type="text" name="bahasa" value="<?= $campaign->id_id ?>" hidden>
                    <h6>Deskripsi</h6>
                    <textarea name="deskripsi" id="newlanguage" class="form-control"><?= $campaign->description ?></textarea>
                    <input type="submit" name="artikel" class="btn btn-primary" value="Simpan Artikel">
                    <?= form_close() ?>

                    <div class="alert alert-info alert-dismissible  fixed-bottom " style="width: 50%; margin-left:30%">
                      <button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
                      <?php if ($campaign->id_id == "") {
                        $bahasa = "English";
                      } else {
                        $bahasa = "Indonesia";
                      } ?>
                      <i class="icon fa fa-info"> </i>
                      Isi deskripsi dibawah ini merupakan duplikasi dari deskripsi campaign berbahasa <?= $bahasa ?> ya
                    </div>
                  </div>


                  <!-- ============= end content =========== -->


                </section>
              </div>
              <!-- --------------- -->
            <?php endforeach;
?>
