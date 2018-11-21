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
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Emp Id : <?=$this->empid?> | Name : <?=$this->empname?>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="detailsalay">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Description </th>
                                <th style="width: 10%"></th>
                                <th style="width: 10%"></th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->data['data'] as $item) {
                                ?>
                                <tr class="odd gradeX">
                                    <td></td>
                                    <td><?= $item['item'] ?></td>
                                    <?php
                                    if ($item['transaction']=='KREDIT'){
                                        ?>
                                        <td></td>

                                        <td class="text-right"><?=$item['amount']?></td>
                                    <?php
                                    
                                    }else{
                                        ?>
                                        <td class="text-right"><?=$item['amount']?></td>

                                        <td></td>
                                    <?php
                                    
                                    }
                                        ?>
                                    

                                </tr>
                                <?php
                                $i++;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>