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
                                <th>DATE </th>
                                <th>IN </th>
                                <th>OUT </th>
                                <th>Hrs </th>
                                


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->data['data'] as $item) {
                                ?>
                                <tr class="odd gradeX">
                                    <td></td>
                                    <td><?= $item['dateAtt'] ?></td>
                                    <td><?= $item['inTime'] ?></td>
                                    <td><?= $item['outTime'] ?></td>
                                    <td><?= $item['hours'] ?></td>
                                    
                                    

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