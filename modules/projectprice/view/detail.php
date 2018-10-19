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
                    <div class="col-md-12">
                        <label>Search Item </label><input size="50" type="text" class="auto ui-autocomplete-input itemname"/><a  type="button" class="btn btn-success add"  >Add</a>
                        <form role="form" id="dataForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/saveitem/<?= $this->project ?>">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="listitem" >

                                    <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Price</th>
                                            <th >Unit</th>
                                            <th style="width: 10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($this->datalength > 0) {
                                            foreach ($this->data as $value) {
                                                ?>
                                        <tr>
                                            <td><input type="hidden" name="idItems[]" value ="<?=$value['idItems']?>"  /><?=$value['name']?></td>
                                            <td><input type="text" name="price[]" value ="<?=$value['price']?>" class="text-right" /></td>
                                            <td><input type="text" name="unit[]" value ="<?=$value['unit']?>" class="text-right" /></td>
                                            <td><a  class="btn btn-primary del">Del</a></td>
                                        </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
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
<script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>