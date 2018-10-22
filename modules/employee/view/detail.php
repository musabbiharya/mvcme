<?php
/*
 * mymvc ;
 * edit.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 6:43:34 PM;
 * Jakarta International Container Terminal (JICT);
 */
//var_dump($this->data);
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

                        <form role="form" id="dataForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/save/<?= $this->data['data']['id'] ?>">
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Employee ID</span>
                                <input class="form-control" name='id' value="<?= $this->data['data']['id'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Full Name</span>
                                <input class="form-control" name='fullName' value="<?= $this->data['data']['fullName'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                                <span class="input-group-addon" style="width: 100px">Join Date</span>
                                <input  type="text" class="form-control" name="joinDate" value="<?= $this->data['data']['joinDate'] ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Superior</span>
                                <select class="form-control" name='parent' >
                                    
                                    <?php
                                    foreach ($this->parent as $group) {
                                        $selected = ($group['id'] == $this->data['data']['parent']) ? 'selected' : '';
                                        ?>

                                        <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['fullName'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Position</span>
                                <select class="form-control" name='groupID' >
                                    <!--<option value="0" <?= ($this->data['data']['groupID']) ? 'selected' : ''; ?>>root</option>-->
                                    <?php
                                    foreach ($this->position as $group) {
                                        $selected = ($group['id'] == $this->data['data']['groupID']) ? 'selected' : '';
                                        ?>

                                        <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['groupName'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>




                            <button  type="button" class="btn btn-success" onclick="simpan()" >Submit</button>
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
