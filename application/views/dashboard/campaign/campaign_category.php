<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Campaign Category</h1>
            <a href="" type="button" class="btn btn-primary ml-5" data-toggle="modal"  data-target="#category" data-backdrop="false">New Category</a>
        </div>
        <!-- =============== content ============= -->
        <?= $this->session->flashdata("notif") ?>
        <div class="col-12 laporan mt-4" style="border:none">
            <table id="allCampaign" class="table table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody id="all_category">

                </tbody>
                <tfoot>
                    <tr>
                        <th width="80px">No</th>
                        <th width="300px">Kategori</th>
                        <th width="600px">Deskripsi</th>
                        <th width="250px">Tanggal Dibuat</th>

                    </tr>
                </tfoot>
            </table>

        </div>
        <!-- ============= end content =========== -->
    </section>


</div>
<!-- --------------- -->




                <!-- ============= start Modal =========== -->

                <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, .4);">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    </div>
                    <div class="modal-body">
                    <?= form_open(base_url("cadmin/input_category")) ?>
                    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Kategory" autocomplete="off">
                        <textarea name="description" placeholder="Deskripsi" style="height: 150px;"  class="form-control"></textarea>
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