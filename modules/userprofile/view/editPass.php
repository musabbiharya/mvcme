<?php
/*
 * mvc ;
 * edit.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 5, 2017;
 * 1:31:13 AM;
 * Jakarta International Container Terminal (JICT);
 */
?>

        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">

                                <form role="form" id="userForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/save/<?= $this->userData['id'] ?>">
                                    <div id="oldpass" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">Old Password</span>
                                        <input type="password"  class="form-control" name='oldpass' value="" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div id="newpass" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">New Password</span>
                                        <input type="password"  class="form-control" name='newpass' value="" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div id="newpassconfirm" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">Confirm Password</span>
                                        <input type="password"  class="form-control" name='newpassconfirm' value="" />
                                        <p class="help-block"></p>
                                    </div>

                                    <button  type="button" class="btn btn-success" onclick="editUserSubmit()" >Submit</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>

                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- End Form Elements -->
                </div>
            </div>
            <!-- /. ROW  -->

        </div>
        <!-- /. ROW  -->
    