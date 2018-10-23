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
<style>
    .dataTables_filter {
        display: none;
    } 
</style>
<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Period : <?= $this->periode ?> (<?=$this->startdate?> to <?=$this->enddate?>)</h3>
                        <form role="form" id="dataForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/saveitem/<?= $this->project ?>">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="listitem" >

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Items</th>
                                            <th>Price</th>
                                            <th >Unit</th>
                                            <th style="width: 10%">Quantity</th>
                                            <th style="width: 10%">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($this->datalength > 0) {
                                            foreach ($this->data as $value) {
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $value['name'] ?></td>
                                                    <td class="text-right"><?= $value['price'] ?></td>
                                                    <td class="text-right"><?= $value['unit'] ?></td>
                                                    <td><input class="form-control quantity" type="text" name="qty[]" value="<?= $value['qty'] ?>"></td>
                                                    <td class="text-right"><?= $value['total'] ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" style="text-align:right">Total:</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>




                        </form>
                        <a class="btn btn-success projectprice" >Create Invoice</a>
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