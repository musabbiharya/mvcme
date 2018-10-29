<?php
/*
 * mymvc ;
 * edit.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 6:43:34 PM;
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

                        <form role="form" id="dataForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/save/<?= $this->data['data']['id'] ?>">
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Name</span>
                                <input class="form-control" name='name' value="<?= $this->data['data']['name'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Project</span>
                                <select class="form-control" name='projectid' >
                                    <option value="0" <?= ($this->data['data']['projectid']) ? 'selected' : ''; ?>>HO</option>
                                    <?php
                                    foreach ($this->parent as $group) {
                                        $selected = ($group['id'] == $this->data['data']['projectid']) ? 'selected' : '';
                                        ?>

                                        <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['name'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                           
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Site Address</span>
                                <input class="form-control" name='address' value="<?= $this->data['data']['address'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <a class="btn btn-success getloc" >Get Longitude</a>
                                <input class="form-control" name='loc' value="<?= $this->data['data']['loc'] ?>"/>
                                <p class="help-block"></p>
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
