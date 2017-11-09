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
                                <span class="input-group-addon" style="width: 100px">Menu Name</span>
                                <input class="form-control" name='menuName' value="<?= $this->data['data']['menuName'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Desc</span>
                                <input class="form-control" name='menuDesc' value="<?= $this->data['data']['menuDesc'] ?>"/>
                                <p class="help-block"></p>
                            </div>


                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Group</span>
                                <select class="form-control" name='parent' >
                                    <option value="0" <?= ($this->data['data']['parent']) ? 'selected' : ''; ?>>root</option>
<?php
foreach ($this->data['parent'] as $group) {
    $selected = ($group['id'] == $this->data['data']['parent']) ? 'selected' : '';
    ?>

                                        <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['menuName'] ?></option>
    <?php
}
?>

                                </select>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Order</span>
                                <input class="form-control" name='menuOrder' value="<?= $this->data['data']['menuOrder'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Link</span>
                                <input class="form-control" name='link' value="<?= $this->data['data']['link'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <button  type="button" class="btn btn-success" onclick="edit()" >Submit</button>
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
