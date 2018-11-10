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
                                <span class="input-group-addon" style="width: 100px">Code</span>
                                <input class="form-control" name='code' value="<?= $this->data['data']['code'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Description</span>
                                <input class="form-control" name='description' value="<?= $this->data['data']['description'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Amount (%)</span>
                                <input class="form-control" name='amount' value="<?= $this->data['data']['amount'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Employee</span>
                                <select class="form-control" name='paidby' >
                                    <option value="0" <?= ($this->data['data']['paidby']==0)?'selected':'' ?>>Company</option>
                                    <option value="1" <?= ($this->data['data']['paidby']==1)?'selected':'' ?>>Employee</option>
                                    
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
