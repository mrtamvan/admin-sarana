<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Donations</h1>
        </div>
        <!-- =============== content ============= -->
        <?= $this->session->flashdata("notif") ?>
        <div class="col-12 laporan mt-4" style="border:none">
            <table id="allDonation" class="table table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Campaign</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="donations">

                </tbody>
                <tfoot>
                    <tr>
                        <th width="80px">No</th>
                        <th width="300px">Nama</th>
                        <th width="400px">Campaign</th>
                        <th width="250px">Jumlah</th>
                        <th width="150px">Action</th>

                    </tr>
                </tfoot>
            </table>

        </div>
        <!-- ============= end content =========== -->
    </section>
</div>
<!-- --------------- -->

<!-- ========================= modal ======================================= -->
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background: rgba(0, 0, 0, 0.4); z-index: 99">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row mx-auto mb-1  pt-3">
                    <div class="col-5 col-xs-4">
                        <b>Nama</b>
                    </div>
                    <div class="col-7 col-xs-8">
                        <input type="text" readonly="readonly" style="border: none;background: white;pointer-events: none;" id="nama" name="nama">
                    </div>
                </div>

                <div class="row mx-auto mb-1">
                    <div class="col-5 col-xs-4">
                        <b>Email</b>
                    </div>
                    <div class="col-7 col-xs-8">
                        <input type="text" readonly="readonly" id="email" style="border: none;background: white;pointer-events: none;" name="email">
                    </div>
                </div>

                <div class="row mx-auto mb-1">
                    <div class="col-5 col-xs-4">
                        <b>Campaign</b>
                    </div>
                    <div class="col-7 col-xs-8">
                        <input type="text" readonly="readonly" id="campaign" style="border: none;background: white;pointer-events: none;" name="tlp">
                    </div>
                </div>
                <div class="row mx-auto mb-1">
                    <div class="col-5 col-xs-4">
                        <b>Jumlah Donasi</b>
                    </div>
                    <div class="col-7 col-xs-8">
                        <input type="text" readonly="readonly" id="amount" style="border: none;background: white;pointer-events: none;" name="tlp">
                    </div>
                </div>
                <div class="row mx-auto mb-1">
                    <div class="col-5 col-xs-4">
                        <b>Tanggal Donasi</b>
                    </div>
                    <div class="col-7 col-xs-8">
                        <input type="text" readonly="readonly" id="donate_date" style="border: none;background: white;pointer-events: none;">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" style="background: #fafafa;color: gray;border: none" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ================================ end modal =================================== -->