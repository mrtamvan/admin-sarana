<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-6">
                <h1>Detail Participant</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <h1><a href="<?= base_url(
                  "campaign"
                ) ?>" class="btn btn-warning" style="margin-left: 5em;background: orange;">Kembali</a></h1>
            </div>
        </div>
        <!-- =============== content ============= -->
        <div class="section-body">
            <?= $this->session->flashdata("pesan") ?>
            <?php foreach ($result as $view): ?>
                <div class="col-12 laporan mt-4 px-5" style="border:none">
                    <div class="form-group">
                        <div class="input-group">
                        <h4 class="label">Status</h4>
                        <?php if ($view->status == "2") { ?>
                            <h4 class="badge badge-primary ml-4"> Unverified </h4>
                        <?php } elseif ($view->status == "3") { ?>
                            <h4 class="badge badge-danger ml-4"> Danied </h4>
                        <?php } elseif ($view->status == "4") { ?>
                            <h4 class="badge badge-success ml-4"> Active </h4>
                        <?php } elseif ($view->status == "5") { ?>
                            <h4 class="badge badge-danger ml-4"> Banned </h4>
                        <?php } ?>
                        </div>
                        <span id="alamat_error" style="color: red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label">Nama Lengkap</label>
                                <div class="input-group">
                                    <input type="text" disabled style="background-color: white;" disabled style="background-color: white;" value="<?= $view->nama ?>" name="nama" autocomplete="off" class="form-control" placeholder="your name">
                                </div>
                                <span id="nama_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label">Nomor Telepon</label>
                                <div class="input-group">
                                    <input type="text" disabled style="background-color: white;" name="tlp" value="<?= $view->tlp ?>" autocomplete="off" class="form-control" placeholder="your phone number">
                                </div>
                                <span id="tlp_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">NIK</label>
                        <div class="input-group">
                            <input type="text" disabled style="background-color: white;" name="nik" autocomplete="off" class="form-control" placeholder="" value="<?= $view->nik ?>">
                        </div>
                        <span id="nik_error" style="color: red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label">Tempat Lahir</label>
                                <div class="input-group">
                                    <input type="text" disabled style="background-color: white;" name="temhir" autocomplete="off" class="form-control" placeholder="your name" value="<?= $view->temhir ?>">
                                </div>
                                <span id="temhir_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" disabled style="background-color: white;" name="tanghir" autocomplete="off" class="form-control" placeholder="your phone number" value="<?= date(
                                      "d F Y",
                                      strtotime($view->tanghir)
                                    ) ?>">
                                </div>
                                <span id="tanghir_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Alamat</label>
                        <div class="input-group">
                            <textarea disabled style="background-color: white;height: 80px;" name="alamat" class="form-control"><?= $view->alamat ?></textarea>
                        </div>
                        <span id="alamat_error" style="color: red;"></span>
                    </div>
                    <hr class=" my-5">
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label">Foto KTP</label>
                                <div class="input-group">
                                    <input type="text" disabled style="background-color: white;" name="ktp" autocomplete="off" class="form-control" placeholder="">
                                    <!-- <div class="custom-file">
                                                <input type="file" name="ktp" class="custom-file-input">
                                                <label class="custom-file-label pt-2" for="inputGroupFile01">Pilih file</label>
                                            </div> -->
                                </div>
                                <span id="ktp_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label">Foto Selfie dengan KTP</label>
                                <div class="input-group">
                                    <input type="text" disabled style="background-color: white;" name="selfie" autocomplete="off" class="form-control" placeholder="">
                                    <!-- <div class="custom-file">
                                                <input type="file" name="selfie" class="custom-file-input">
                                                <label class="custom-file-label pt-2" for="inputGroupFile01">Pilih file</label>
                                            </div> -->
                                </div>
                                <span id="selfie_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($view->status == "2") { ?>
                    <div class="col-12 py-2 fixed-bottom shadow-sm" style="background-color: #6777ef;">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-3 p-2">
                                <a href="<?= base_url() .
                                  "cadmin/approve/" .
                                  $view->id ?>" class="btn btn-info btn-block" style="box-shadow: none;">APPROVE</a>
                            </div>
                            <div class="col-3 p-2">
                                <a href="#" class="btn btn-warning btn-block" style="box-shadow: none;">DANIED</a>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                <?php } elseif ($view->status == "3") { ?>
                    <div class="col-12 py-2 fixed-bottom shadow-sm" style="background-color: #6777ef;">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-3 p-2">
                                <a href="<?= base_url() .
                                  "cadmin/approve/" .
                                  $view->id ?>" class="btn btn-info btn-block" style="box-shadow: none;">MOVE TO UNVIRIFIED</a>
                            </div>
                            <div class="col-3 p-2">
                                <a href="#" class="btn btn-danger btn-block" style="box-shadow: none;">BANNED</a>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                <?php } elseif ($view->status == "4") { ?>
                    <div class="col-12 laporan mt-4 shadow-sm">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-3 p-2">
                            </div>
                            <div class="col-5 p-2">
                                <a href="<?= base_url() .
                                  "cadmin/banned/" .
                                  $view->id ?>" class="btn btn-danger btn-block" style="box-shadow: none;">BANNED</a>
                            </div>
                        </div>
                    </div>
                <?php } elseif ($view->status == "5") { ?>
                    <div class="col-12 laporan mt-4 shadow-sm">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-3 p-2">
                            </div>
                            <div class="col-5 p-2">
                                <a href="<?= base_url() .
                                  "cadmin/approve/" .
                                  $view->id ?>" class="btn btn-success btn-block" style="box-shadow: none;">REACTIVED</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <!-- ============= end content =========== -->
    </section>
</div>
<!-- --------------- -->