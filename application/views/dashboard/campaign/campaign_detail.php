    <?php foreach ($result as $campaign) { ?>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <div class="col-6">
                        <h1>Campaign Detail</h1>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <h1><a href="<?= base_url(
                          "campaign"
                        ) ?>" class="btn btn-warning" style="margin-left: 5em;background: orange;">Kembali</a></h1>
                    </div>
                </div>

                <!-- =========================== main content ================= -->
        <?= $this->session->flashdata("notif") ?>
                <div class="col-12 laporan mt-4">
                    <div class="form-group">
                        <div class="input-group">
                            <h4 class="label">Status Campaign</h4>
                            <?php if ($campaign->campaign_status == "1") { ?>
                                <h4 class="badge badge-primary ml-4"> Inctive </h4>
                            <?php } elseif (
                              $campaign->campaign_status == "2"
                            ) { ?>
                                <h4 class="badge badge-success ml-4"> Active </h4>
                            <?php } elseif (
                              $campaign->campaign_status == "3"
                            ) { ?>
                                <h4 class="badge badge-primary ml-4" style="background-color: gray;"> Expired </h4>
                            <?php } elseif (
                              $campaign->campaign_status == "4"
                            ) { ?>
                                <h4 class="badge badge-danger ml-4"> Danied </h4>
                            <?php } elseif (
                              $campaign->campaign_status == "5"
                            ) { ?>
                                <h4 class="badge badge-danger ml-4"> Banned </h4>
                            <?php } ?>
                        </div>
                        <span id="alamat_error" style="color: red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">
                            <label class="label" style="font-size: 14px;">Participant :</label>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom:-10px">
                                    <h5><?= $campaign->nama ?></h5>
                                </div>
                                <label class="label" style="font-size: 14px;"><?= $campaign->email ?></label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <!-- <label class="label" style="font-size: 14px;">Campaign</label> -->
                                <div class="input-group" style="margin-bottom:-5px">
                                    <h3 style="color: black;"><?php
                                    if ($campaign->id_id != "") {
                                      $result = $this->db->query(
                                        "SELECT * FROM cfs_campaigndetail where id='" .
                                          $campaign->id_id .
                                          "'"
                                      );
                                    } else {
                                      $result = $this->db->query(
                                        "SELECT * FROM cfs_campaigndetail where id='" .
                                          $campaign->id_en .
                                          "'"
                                      );
                                    }
                                    if ($result->num_rows() > 0) {
                                      $view = $result->row_array();
                                      echo $view["title"];
                                    }
                                    ?></h3>
                                </div>
                                <label class="label" style="font-size: 14px;">Kategori : <b><?= $campaign->category_title ?></b></label>
                                <label class="label mx-4" style="font-size: 14px;"> | </label>
                                <label class="label" style="font-size: 14px;">Tanggal Dibuat : <?= date(
                                  "d F Y",
                                  strtotime($campaign->create_date)
                                ) ?> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label class="label" style="font-size: 14px;">Target</label>
                                <div class="input-group">
                                    <h5>Rp <?= number_format(
                                      $campaign->target_fund,
                                      0,
                                      ",",
                                      "."
                                    ) ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label class="label" style="font-size: 14px;">Tercapai</label>
                                <div class="input-group">
                                        <?php if (
                                          $campaign->campaign_status == "2" ||
                                          $campaign->campaign_status == "3"
                                        ) { ?>
                                    <h5>Rp <?= number_format(
                                      $campaign->total_donate,
                                      0,
                                      ",",
                                      "."
                                    ) ?>
                                    <?php } else {echo "-";} ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label class="label" style="font-size: 14px;">Campaign Berakhir</label>
                                <div class="input-group">
                                <?php
                                // $end = strtotime($campaign->end_campaign);
                                // $start = time();
                                // $diff = $end - $start;

                                $end = new DateTime($campaign->end_campaign);
                                $start = new DateTime();

                                $date = $start->diff($end);
                                ?>
                                    <h5>
                                    <?php if (
                                      $campaign->campaign_status != "2"
                                    ) {
                                      echo "-";
                                    } elseif (
                                      $date->d === "0" &&
                                      $date->h === "0" &&
                                      $date->i === "0"
                                    ) {
                                      echo "Campaign Berakhir";
                                    } elseif (
                                      $date->d == "0" &&
                                      $date->h == "0"
                                    ) {
                                      echo $date->i . " Menit Lagi";
                                    } elseif (
                                      $date->d < "2" &&
                                      $date->h < "1"
                                    ) {
                                      echo $date->d .
                                        " Hari " .
                                        $date->i .
                                        " Menit";
                                    } elseif (
                                      $date->d < "2" &&
                                      $date->d == "0"
                                    ) {
                                      echo $date->h . " Jam";
                                    } elseif ($date->d < "2") {
                                      echo $date->d .
                                        " Hari " .
                                        $date->h .
                                        " Jam";
                                    } elseif ($date->d == "0") {
                                      echo $date->h . " Jam Lagi";
                                    } else {
                                      echo $date->d . " Hari Lagi";
                                    } ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label class="label" style="font-size: 14px;">Jumlah Donatur</label>
                                <div class="input-group">
                                <?php if (
                                  $campaign->campaign_status == "2" ||
                                  $campaign->campaign_status == "3"
                                ) { ?>
                                    <h5><?= $campaign->donatur ?>
                                    <?php } else {echo "-";} ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="min-height: 300px;">
                        <div class="col-lg-12 col-sm-12">
                            <label class="label" style="font-size: 14px;">Deskripsi</label>
                            <div class="form-group">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Indonesia</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">English</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <?php if ($campaign->id_id != "") { ?>
                                            <?php foreach (
                                              $indo
                                              as $indonesia
                                            ): ?>
                                                <?= $indonesia->description ?>
                                            <?php endforeach; ?>
                                        <?php } else { ?>
                                            <div class="d-flex justify-content-center items-center">
                                                <a href="<?= base_url() .
                                                  "newlanguage/" .
                                                  $campaign->id_en ?>" style="width:100%;border:dashed 2px gray;border-radius: 5px;padding:40px 50px;margin-top:100px;text-align: center;">
                                                    <h5>Tambah deskripsi Bahasa Indonesia untuk campaign ini</h5>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <?php if ($campaign->id_en != "") { ?>
                                            <?php foreach ($eng as $english): ?>
                                                <?= $english->description ?>
                                            <?php endforeach; ?>
                                        <?php } else { ?>
                                            <div class="d-flex justify-content-center items-center">
                                                <a href="<?= base_url() .
                                                  "newlanguage/" .
                                                  $campaign->id_en ?>" style="width:100%;border:dashed 2px gray;border-radius: 5px;padding:40px 50px;margin-top:100px;text-align: center;">
                                                    <h5>Tambah deskripsi Bahasa Inggris untuk campaign ini</h5>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--  endlaporan -->

                <?php if (
                  $campaign->campaign_status == "1" &&
                  $campaign->id_id != "" &&
                  ($campaign->campaign_status == "1" && $campaign->id_en != "")
                ): ?>
                    <div class="col-12 py-2 fixed-bottom shadow-sm" style="background-color: #6777ef;">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-3 p-2">
                                <a type="button" data-toggle="modal" data-target="#exampleModal" href="#" class="btn btn-warning btn-block" style="box-shadow: none;">DANIED</a>
                            </div>
                            <div class="col-3 p-2">
                                <a href="<?= base_url() .
                                  "cadmin/campaign_approve/" .
                                  $campaign->id ?>" class="btn btn-info btn-block" style="box-shadow: none;">APPROVE</a>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($campaign->id_id == "" || $campaign->id_en == ""): ?>
                    <div class="alert alert-info alert-dismissible  fixed-bottom " style="width: 50%; margin-left:30%">
                        <button type="button" class="close" data-dismiss="alert" style="color:white" aria-hidden="true">x</button>
                        <?php if ($campaign->id_id == "") {
                          $bahasa = "Indonesia ";
                        } else {
                          $bahasa = "English";
                        } ?>
                        <i class="icon fa fa-info"> </i>
                        Deskripsi dalam bahasa <?= $bahasa ?> harus diisi agar campaign bisa kamu approve ya
                    </div>
                <?php endif; ?>

                <!-- ============= end content =========== -->
                <!-- ============= start Modal =========== -->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, .4);">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                    </div>
                    <div class="modal-body">
                    <?= form_open(base_url("cadmin/input_message")) ?>
                    <input type="text" name="subjek" class="form-control mb-3" placeholder="Subjek" autocomplete="off">
                    <input type="text" name="id" value="<?= $campaign->id ?>" hidden>
                        <textarea name="pesan" id="pesan" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    <?= form_close() ?>
                    </div>
                    </div>
                </div>
                </div>
                <!-- ============= end Modal =========== -->




            </section>
        </div>
        <!-- --------------- -->
    <?php }
?>
