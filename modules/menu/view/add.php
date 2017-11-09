<?php
/*
 * mymvc ;
 * add.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 8:17:06 PM;
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
                            <div id="menuName" class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Menu Name</span>
                                <input class="form-control" name='menuName' value=""/>
                                <p class="help-block"></p>
                            </div>
                            <div id="menuDesc" class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Desc</span>
                                <input class="form-control" name='menuDesc' value=""/>
                                <p class="help-block"></p>
                            </div>


                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Parent</span>
                                <select class="form-control" name='parent' >
                                    <option value="0" >root</option>
                                    <?php
                                    foreach ($this->parent as $group) {
                                        ?>

                                        <option value="<?= $group['id'] ?>" ><?= $group['menuName'] ?></option>
    <?php
}
?>

                                </select>
                            </div>
                            <div id="menuOrder" class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Order</span>
                                <input class="form-control" name='menuOrder' value="<?=($this->order['menuOrder'])+1?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div id="link" class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Link</span>
                                <input class="form-control" name='link' value=""/>
                                <p class="help-block"></p>
                            </div>
                            <button  type="button" class="btn btn-success" onclick="add()" >Submit</button>
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
