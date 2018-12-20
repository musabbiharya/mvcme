<?php
/*
 * mymvc ;
 * edit.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 6:43:34 PM;
 * Jakarta International Container Terminal (JICT);
 */
//var_dump($his->employee);
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
                                <span class="input-group-addon" style="width: 100px">SPKL NO</span>
                                <input id="datepicker" type="text"  class="form-control datepicker" name='spklNumber' value="<?= $this->data['data']['spklNumber'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Overtime Date</span>
                                <input id="datepicker" type="text"  class="form-control datepicker" name='spkldate' value="<?= $this->data['data']['spkldate'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Description</span>
                                <input class="form-control" name='keterangan' value="<?= $this->data['data']['keterangan'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="row">
                             <div class="col-md-6 col-sm-6">
                            <div class="panel panel-default" >
                                <div class="panel-heading" >
                                    Access
                                </div>
                                <?php
                                foreach ($this->employee as $value) {
                                    $check = in_array($value['id'], $this->data['data']['list']) ? 'checked' : '';
                                    ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="emp[]" value="<?= $value['id'] ?>"  <?= $check ?> /><?= $value['fullName'] ?>
                                        </label>
                                    </div>

<?php } ?>
                            </div></div></div>
                            
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
