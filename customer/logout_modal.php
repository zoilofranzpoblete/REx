<div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"> Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to logout?</h6>
            </div>
            <div class="modal-footer">
               <a class="btn btn-success waves-effect waves-light" href="logout.php">Logout</a>
                <button class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ask_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to proceed this request?</h6>
            </div>
            <div class="modal-footer">
               <a class="btn btn-success waves-effect waves-light" id="submit_request">Submit Request</a>
                <button class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Generate Report</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
            </div>
            <div class="modal-body">
                <form action="generate_production_report.php" method="POST" target="_blank">
                <label for="name" class="control-label">Inclucion Date/s</label>
                <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="from_date" id="from_date" placeholder="From" readonly required>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="to_date" id="to_date" placeholder="To" readonly required>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success waves-effect waves-light" type="Submit" id="generate_report">Generate</button>
                        <button class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="masterlist_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Generate Report</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
            </div>
            <div class="modal-body">
                <form action="generate_urban_masterlist.php" method="POST" target="_blank">
                <label for="name" class="control-label">Inclucion Date/s</label>
                <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="from_date" id="from_dates" placeholder="From" readonly required>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="to_date" id="to_dates" placeholder="To" readonly required>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success waves-effect waves-light" type="Submit" id="generate_report">Generate</button>
                        <button class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="distribution_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Generate Report</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
            </div>
            <div class="modal-body">
                <form action="generate_distribution_report.php" method="POST" target="_blank">
                <label for="name" class="control-label">Inclucion Date/s</label>
                <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="from_date" id="from_datess" placeholder="From" readonly required>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="to_date" id="to_datess" placeholder="To" readonly required>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success waves-effect waves-light" type="Submit" id="generate_report">Generate</button>
                        <button class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
