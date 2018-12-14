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
                                <th>DAY </th>
                                <th>IN </th>
                                <th>OUT </th>
                                <th>Hrs </th>
                                <th>Approval </th>
                                <th>Remarks </th>
                                


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->data['data'] as $item) {
                                $classhov ='';
                                    if ($item['dateDay']=='Saturday' || $item['dateDay']=='Sunday' ||$item['keterangan']!='' ){
                                        $classhov = 'success';
                                    }else{
                                        if ($item['inTime']==''){
                                            $classhov = 'danger';
                                        }
                                    }
                                ?>
                                <tr class="odd gradeX <?=$classhov?>">
                                    <td></td>
                                    <td><?= $item['_date'] ?></td>
                                    <td><?= $item['dateDay'] ?></td>
                                    <td><?= $item['inTime'] ?></td>
                                    <td><?= $item['outTime'] ?></td>
                                    <td><?= $item['hours'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td><?= $item['keterangan'] ?></td>
                                    
                                    

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