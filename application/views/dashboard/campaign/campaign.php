<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Campaigns</h1>
        </div>
        <!-- =============== content ============= -->
        <?= $this->session->flashdata("notif") ?>
        <div class="col-12 laporan mt-4" style="border:none">
            <table id="allCampaign" class="table table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Campaign</th>
                        <th>ID</th>
                        <th>EN</th>
                        <th>Target</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="all_campaign">

                </tbody>
                <tfoot>
                    <tr>
                        <th width="80px">No</th>
                        <th width="600px">Campaign</th>
                        <th width="100px">ID</th>
                        <th width="100px">EN</th>
                        <th width="250px">Target</th>
                        <th width="250px">Status</th>
                        <th width="250px">Action</th>

                    </tr>
                </tfoot>
            </table>

        </div>
        <!-- ============= end content =========== -->
    </section>
</div>
<!-- --------------- -->