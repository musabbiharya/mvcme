<?php
/*
 * mvc ;
 * idex.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2017;
 * 11:22:42 PM;
 * Jakarta International Container Terminal (JICT);
 */
//var_dump($this->data['data']);
?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="glyphicon glyphicon-plus btn btn-success" href="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/add/">Add</a>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Folder Root</th>
                                <th>Start Project</th>
                                
                                <th>Operation</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->data['data'] as $item) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $i ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['folder'] ?></td>
                                    <td><?= $item['started'] ?></td>
                                    
                                    <td><div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= URL ?>projectprice/projectprice/addprice/<?= $item['id'] ?>">AddItems</a></li>

                                                <li><a href="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/edit/<?= $item['id'] ?>">Edit</a></li>

                                                <li><a href="javascript:void(0)" data-toggle="modal" data-id="<?= $item['id'] ?>"  data-target="#myModal" class="openModal">Delete</a></li>

                                            </ul>
                                        </div></td>

                                </tr>
                                <?php $i++;
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
