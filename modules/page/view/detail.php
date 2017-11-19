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
                                <span class="input-group-addon" style="width: 100px">Page Name</span>
                                <input class="form-control" name='page' value="<?= $this->data['data']['page'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Description</span>
                                <input class="form-control" name='descript' value="<?= $this->data['data']['descript'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Parent</span>
                                <select class="form-control" name='parent' >
                                    <option value="0" <?= ($this->data['data']['parent']) ? 'selected' : ''; ?>>root</option>
                                    <?php
                                    foreach ($this->parent as $group) {
                                        $selected = ($group['id'] == $this->data['data']['parent']) ? 'selected' : '';
                                        ?>

                                        <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['page'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Order</span>
                                <input class="form-control" name='order_column' value="<?= ($this->data['data']['order_column']!==NULL)?$this->data['data']['order_column']:$this->order[0]['m_order_column']+1 ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">pclass</span>
                                <input class="form-control" name='pclass' value="<?= $this->data['data']['pclass'] ?>"/>
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
