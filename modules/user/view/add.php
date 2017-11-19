<?php

/*
* mymvc ;
* add.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 7, 2017;
* 11:03:38 PM;
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

                                <form role="form" id="userForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/addSave/" onsubmit="return addUserSubmit()">
                                    <div id="username" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">UserName</span>
                                        <input  class="form-control" name='username' value=""/>
                                        <p class="help-block"></p>
                                    </div>
                                    <div id="password" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">Password</span>
                                        <input type="password" class="form-control" name='password' value="Jict2017"/>
                                        <p class="help-block"></p>
                                    </div>
                                    
                                    <div class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">Group</span>
                                        <select class="form-control" name='groupid' >
                                            <?php
                                            foreach ($this->userGroup as $group) {
                                                
                                                ?>

                                                <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['groupName'] ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div id="fname" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">First Name</span>
                                        <input  class="form-control" name='fname' value="" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div id="lname" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">Last Name</span>
                                        <input  class="form-control" name='lname' value="" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div id="address" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">Address</span>
                                        <input type="text" class="form-control" name='address' value="" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div id="email" class="form-group input-group input-group">
                                        <span class="input-group-addon" style="width: 100px">email</span>
                                        <input  class="form-control" name='email' value="" />
                                        <p class="help-block"></p>
                                    </div>

                                    <button  type="submit" class="btn btn-success"  >Submit</button>
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
    