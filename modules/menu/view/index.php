<?php

/*
* mvc ;
* idex.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 4, 2017;
* 11:22:42 PM;
* Jakarta International Container Terminal (JICT);
*/
?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Menu Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu Name</th>
                                            <th>Description</th>
                                            <th>Parent</th>
                                            <th>Order</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->menuList as $item) { ?>
                                            <tr class="odd gradeX">
                                            <td><?=$item['id']?></td>
                                            <td><?=$item['menuName']?></td>
                                            <td><?=$item['menuDesc']?></td>
                                            <td class="center"><?=$item['parent']?></td>
                                            <td class="center"><?=$item['menuOrder']?></td>
                                            <td class="center"><?=$item['link']?></td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
      