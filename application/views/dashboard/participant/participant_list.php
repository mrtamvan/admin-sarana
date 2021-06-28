<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Participant</h1>
        </div>

        <!-- =========================== main content ================= -->

        <div class="col-12 laporan mt-4" style="border:none">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <!-- <li class="nav-item">
                    <a class="nav-link" id="all-tab" data-toggle="tab" href="#all-participant" role="tab" aria-controls="all" aria-selected="true">All Participant</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="false">Active <span style="padding: 5px;border-radius: 20px;" class="badge badge-success"> <?= $actived ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="waiting-tab" data-toggle="tab" href="#waiting" role="tab" aria-controls="waiting" aria-selected="false">Unverified <span style="padding: 5px;border-radius: 20px;" class="badge badge-info"> <?= $waiting ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="registered-tab" data-toggle="tab" href="#registered" role="tab" aria-controls="registered" aria-selected="false">Registered <span style="padding: 5px;border-radius: 20px;" class="badge badge-primary"> <?= $registered ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="danied-tab" data-toggle="tab" href="#danied" role="tab" aria-controls="danied" aria-selected="false">Danied <span style="padding: 5px;border-radius: 20px;" class="badge badge-warning"> <?= $danied ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="banned-tab" data-toggle="tab" href="#banned" role="tab" aria-controls="banned" aria-selected="false">Banned <span style="padding: 5px;border-radius: 20px;" class="badge badge-danger"> <?= $banned ?></span></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- <div class="tab-pane fade show active" id="all-participant" role="tabpanel" aria-labelledby="all-tab">
                    <table id="listParticipant" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="all_participant">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80px">No</th>
                                <th width="400px">Nama</th>
                                <th width="400px">Email</th>
                                <th width="250px">Status</th>

                            </tr>
                        </tfoot>
                    </table>
                </div> -->
                <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="active-tab">
                    <table id="activeParticipant" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="active_participant">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80px">No</th>
                                <th width="400px">Nama</th>
                                <th width="400px">Email</th>
                                <th width="250px">Status</th>
                                <th width="250px">Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--end active participant tab-->
                <div class="tab-pane fade" id="waiting" role="tabpanel" aria-labelledby="waiting-tab">
                    <table id="waitParticipant" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="wait_participant">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80px">No</th>
                                <th width="400px">Nama</th>
                                <th width="400px">Email</th>
                                <th width="250px">Status</th>
                                <th width="250px">Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--end waiting tab-->
                <div class="tab-pane fade" id="registered" role="tabpanel" aria-labelledby="registered-tab">
                    <table id="unveParticipant" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="unve_participant">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80px">No</th>
                                <th width="400px">Nama</th>
                                <th width="400px">Email</th>
                                <th width="250px">Status</th>
                                <th width="250px">Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--end unverified tab-->
                <div class="tab-pane fade" id="danied" role="tabpanel" aria-labelledby="danied-tab">
                    <table id="daniedParticipant" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="danied_participant">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80px">No</th>
                                <th width="400px">Nama</th>
                                <th width="400px">Email</th>
                                <th width="250px">Status</th>
                                <th width="250px">Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--end danied tab-->
                <div class="tab-pane fade" id="banned" role="tabpanel" aria-labelledby="banned-tab">
                    <table id="bannedParticipant" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="banned_participant">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80px">No</th>
                                <th width="400px">Nama</th>
                                <th width="400px">Email</th>
                                <th width="250px">Status</th>
                                <th width="250px">Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--end banned tab-->
            </div>
        </div>

    </section>
</div> <!--  end main -->
<!-- --------------- -->

<!-- ========================= modal ======================================= -->
<div class="modal fade" id="participantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background: rgba(0, 0, 0, 0.4); z-index: 99">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Data Participant</h5>
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
                        <b>No Handphone</b>
                    </div>
                    <div class="col-7 col-xs-8">
                        <input type="text" readonly="readonly" id="tlp" style="border: none;background: white;pointer-events: none;" name="tlp">
                    </div>
                </div>
                <div class="row mx-auto mb-1">
                    <div class="col-5 col-xs-4">
                        <b>Tgl Registrasi</b>
                    </div>
                    <div class="col-7 col-xs-8">
                        <input type="text" readonly="readonly" id="tgl_register" style="border: none;background: white;pointer-events: none;">
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