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
                            <div id="title" class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Judul</span>
                                <input class="form-control" name='title' value=""/>
                                <p class="help-block"></p>
                            </div>
                            <div id="isi" class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Isi</span>
                                <input class="form-control" name='isi' value=""/>
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
