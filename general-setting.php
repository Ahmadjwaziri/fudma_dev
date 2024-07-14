<?php include_once 'header2.php';
$set_query = $dBASE->query("SELECT * FROM settings");
$set_row = $set_query->fetch_array();
?>


    
    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">System Settings</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
                        <div class="row">


  <center>  <?php if (isset($_SESSION['response'])) {
                            echo $_SESSION['response'];
                        }?></center>
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab"><i class="fa fa-cog"></i> General</a></li>
                        <!-- <li role="presentation"><a href="#officeTime" aria-controls="officeTime" role="tab"
                                                   data-toggle="tab"><i
                                        class="fa fa-clock-o"></i> Office Time</a></li>
                        <li role="presentation"><a href="#expense" aria-controls="expense" role="tab" data-toggle="tab"><i
                                        class="fa fa-bar-chart"></i> Expense</a></li>
                        <li role="presentation"><a href="#leave" aria-controls="leave" role="tab" data-toggle="tab"><i
                                        class="fa fa-bed"></i> Leave</a></li>
                        <li role="presentation"><a href="#award" aria-controls="award" role="tab" data-toggle="tab"><i
                                        class="fa fa-trophy"></i> Award</a></li>
                        <li role="presentation"><a href="#job" aria-controls="job" role="tab" data-toggle="tab"><i
                                        class="fa fa-briefcase"></i> Job</a></li> -->
                    </ul>

                    <div class="tab-content panel p-20">

                                                <div role="tabpanel" class="tab-pane active" id="general">
                            <div class="row">
                                <div class="col-md-7">
                                    <form class="" role="form" action="process.php" method="post">
                                        <div class="form-group">
                                            <label>Application Name</label>
                                            <input type="text" class="form-control" required name="app_name"
                                                   value="<?php echo $set_row['app_name'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Tracker Api Key</label>
                                            <input type="text" class="form-control" name="t_api" required=""
                                                   value="<?php echo $set_row['t_api'];?>">
                                        </div>

                                          <div class="form-group">
                                            <label>Delivery Charges</label>
                                            <input type="text" class="form-control" name="delivery_charge" required=""
                                                   value="<?php echo $set_row['delivery_charge'];?>">
                                        </div>


 <div class="form-group">
                                            <label>Service Tax</label>
                                            <input type="text" class="form-control" name="service_tax" required=""
                                                   value="<?php echo $set_row['service_tax'];?>">
                                        </div>

                                        



                                        <input type="hidden" name="_token" value="LjIImXwwiOvxsJrgvGBlnxt6Gi7E8mIbbwsugFSn">
                                        <button type="submit" name="update-setting" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                                                <div role="tabpanel" class="tab-pane" id="officeTime">
                            <div class="row">
                                <div class="col-md-7">
                                    <form class="" role="form" action="https://smslight.com.ng/hr/settings/post-office-time" method="post">

                                        <div class="form-group">
                                            <label for="officetime">Office In Time</label>
                                            <input type='text' class="form-control timePicker" name="office_in_time" value="09:25 AM"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="officetime">Office Out Time</label>
                                            <input type='text' class="form-control timePicker" name="office_out_time" value="05:25 PM"/>
                                        </div>

                                        <input type="hidden" name="_token" value="LjIImXwwiOvxsJrgvGBlnxt6Gi7E8mIbbwsugFSn">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                                                <div role="tabpanel" class="tab-pane" id="expense">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form class="" role="form" method="post"
                                          action="https://smslight.com.ng/hr/settings/post-expense-title">
                                        <h3 class="panel-title"> Add New Expense Title</h3>

                                        <div class="form-group">
                                            <label>Expense Title</label>
                                            <span class="help">e.g. "Employee Salary"</span>
                                            <input type="text" class="form-control" required name="expense">
                                        </div>


                                        <input type="hidden" name="_token" value="LjIImXwwiOvxsJrgvGBlnxt6Gi7E8mIbbwsugFSn">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add </button>
                                    </form>
                                </div>
                                <div class="col-lg-8">
                                    <h3 class="panel-title">Expense Title List</h3>
                                    <table class="table data-table table-hover table-ultra-responsive">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%;">SL#</th>
                                            <th style="width: 65%;">Expense Title</th>
                                            <th style="width: 25%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                                                <div role="tabpanel" class="tab-pane" id="leave">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form class="" role="form" method="post"
                                          action="https://smslight.com.ng/hr/settings/post-leave-type">
                                        <h3 class="panel-title"> Leave Type</h3>

                                        <div class="form-group">
                                            <label>Leave Title</label>
                                            <span class="help">e.g. "Sick Leave"</span>
                                            <input type="text" class="form-control" required name="leave">
                                        </div>

                                        <div class="form-group">
                                            <label>Leave Quota</label>
                                            <span class="help">e.g. "12" Days/Year</span>
                                            <input type="number" class="form-control" required name="leave_quota">
                                        </div>


                                        <input type="hidden" name="_token" value="LjIImXwwiOvxsJrgvGBlnxt6Gi7E8mIbbwsugFSn">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add </button>
                                    </form>
                                </div>

                                <div class="col-lg-8">
                                    <h3 class="panel-title">Leave Title List</h3>
                                    <table class="table data-table table-hover table-ultra-responsive">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%;">SL#</th>
                                            <th style="width: 40%;">Leave Type</th>
                                            <th style="width: 20%;">Leave Quota</th>
                                            <th style="width: 25%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                                                    <tr>
                                                <td data-label="SL">1</td>
                                                <td data-label="Leave"><p>Sick</p></td>
                                                <td data-label="LeaveQuota"><p>10</p></td>
                                                <td>

                                                    <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target=".modal_edit_leave_type_1"><i class="fa fa-edit"></i> Edit</a>
                                                    <div class="modal fade modal_edit_leave_type_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Leave Type</h4>
            </div>
            <form class="form-some-up form-block" role="form" action="https://smslight.com.ng/hr/settings/update-leave-type" method="post">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Leave Title :</label>
                        <input type="text" class="form-control" required="" name="leave" value="Sick">
                    </div>

                    <div class="form-group">
                        <label>Leave Quota</label>
                        <input type="number" class="form-control" required name="leave_quota" value="10">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="LjIImXwwiOvxsJrgvGBlnxt6Gi7E8mIbbwsugFSn">
                    <input type="hidden" name="cmd" value="1">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>

</div>



                                                    <a href="#" class="btn btn-danger btn-xs deleteLeave" id="1"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                                                                </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                                                <div role="tabpanel" class="tab-pane" id="award">
                            <div class="row">

                                <div class="col-lg-4">
                                    <form class="" role="form" method="post"
                                          action="https://smslight.com.ng/hr/settings/post-award-name">
                                        <h3 class="panel-title"> Award Name</h3>

                                        <div class="form-group">
                                            <label>Award Name</label>
                                            <span class="help">e.g. "Best Employee"</span>
                                            <input type="text" class="form-control" required name="award">
                                        </div>


                                        <input type="hidden" name="_token" value="LjIImXwwiOvxsJrgvGBlnxt6Gi7E8mIbbwsugFSn">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add </button>
                                    </form>
                                </div>

                                <div class="col-lg-8">
                                    <h3 class="panel-title">Award Name List</h3>
                                    <table class="table data-table table-hover table-ultra-responsive">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%;">SL#</th>
                                            <th style="width: 65%;">Award Name</th>
                                            <th style="width: 25%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                                                <div role="tabpanel" class="tab-pane" id="job">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form class="" role="form" method="post"
                                          action="https://smslight.com.ng/hr/settings/post-job-file-extension">
                                        <h3 class="panel-title"> Job File Extension</h3>

                                        <div class="form-group">
                                            <label>Supported File Extension</label>
                                            <span class="help">e.g. "Doc,PDF" (Remember: File Extension Separated By Comma
                                                )</span>
                                            <input type="text" class="form-control" required name="file_extension"
                                                   value="doc,pdf">
                                        </div>


                                        <input type="hidden" name="_token" value="LjIImXwwiOvxsJrgvGBlnxt6Gi7E8mIbbwsugFSn">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
<?php include_once 'footer2.php';?>

<?php echo $_SESSION['response'] = "";?>