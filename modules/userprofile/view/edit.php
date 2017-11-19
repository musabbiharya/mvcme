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

                                <form role="form" id="userForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/editSave/<?= $this->userData['id'] ?>">
                                    <div class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">UserName</span>
                                        <input class="form-control" name='username' value="<?= $this->userData['username'] ?>"/>
                                        <p class="help-block"></p>
                                    </div>
                                    <input type="hidden" name="groupid" value="<?=$this->userData['groupid']?>">
                                    <div class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">First Name</span>
                                        <input  class="form-control" name='fname' value="<?= $this->userData['fname'] ?>" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">Last Name</span>
                                        <input  class="form-control" name='lname' value="<?= $this->userData['lname'] ?>" />
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
    