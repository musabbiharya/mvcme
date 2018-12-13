<?php
/*
 * mvc ;
 * admin.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2018;
 * 11:22:42 PM;
 * Jakarta International Container Terminal (JICT);
 */
?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <input id="datepicker" type="text"  class="datepicker"  value="<?=$this->date?>" readonly>
                <a class="btn btn-success attendacelist" >Show</a>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="grouptable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="ckall" onClick="toggle(this)"/> checkAll</th>
                                <th>No</th>
                                <th>empID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time IN</th>
                                <th>Pict IN</th>
                                <th>Time OUT</th>
                                <th>Pict OUT</th>
                                <th>Location</th>
                                <th>Approval Stat</th>
                                <th>Remarks</th>


                            </tr>
                        </thead>
                        <form id="formcheck">
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->data as $item) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php
                                        if ($item['status']==''){
                                        ?><input type="checkbox" name="ck[]" value="<?= $item['empid'] ?>"/>
                                            <?php
                                        }
                                        ?></td>
                                    <td><?= $i ?></td>
                                    <td><?= $item['empid'] ?></td>
                                    <td><?= $item['fullName'] ?></td>
                                    <td><?= $item['dateAtt'] ?></td>
                                    <td><?= $item['inTime'] ?></td>
                                    <td><img src="<?= $item['inPic'] ?>" height="50"/></td>
                                    <td><?= $item['outTime'] ?></td>
                                    <td><img src="<?= $item['outPic'] ?>" height="50"/></td>
                                    <td><?= $item['loc'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td><?= $item['remarks'] ?></td>
                                    

                                </tr>
                                <?php $i++;
                            }
                            ?>

                        </tbody>
                        <a class="btn btn-success" href="javascript:void(0)" onclick="approveAll()">Approve</a> |
                        <a class="btn btn-danger" href="javascript:void(0)" onclick="rejectedAll()">reject</a>
                        </form>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
