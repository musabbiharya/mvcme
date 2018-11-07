<?php
/*
 * index.php
 * Satria Persada <triasada@yahoo.com> 
 * 8:28:28 PM
 * office 
 */
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Cuti</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Operation</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->data['data']['atasan'] as $item) {
                                ?>
                                <tr class="odd gradeX">
                                    <td></td>
                                    <td><?= $item['empid'] ?></td>
                                    <td><?= $item['fullName'] ?></td>
                                    <td><?= $item['cuti'] ?></td>
                                    <td><?= $item['startdate'] ?></td>
                                    <td><?= $item['enddate'] ?></td>
                                    <td><?= $item['reason'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td>
                                        <?php
                                        if ($item['status']=='Applied'){
                                        ?>
                                        <a class="btn btn-success" href="javascript:void(0)" onclick="approve('<?= $item['id'] ?>')">approve</a>
                                        <a class="btn btn-warning" href="javascript:void(0)" onclick="rejected('<?= $item['id'] ?>')">reject</a>
                                        <?php
                                        }
                                        ?>
                                    </td>

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