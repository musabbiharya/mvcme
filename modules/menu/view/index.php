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
                              <a class="glyphicon glyphicon-plus btn btn-success" href="<?=URL.$this->activeMenu?>/<?=$this->activeMenu?>/add/">Add</a>
                           
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
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($this->data['data'] as $item) { 
                                            ?>
                                            <tr class="odd gradeX">
                                            <td><?=$i?></td>
                                            <td><?=$item['menuName']?></td>
                                            <td><?=$item['menuDesc']?></td>
                                            <td class="center"><?=$item['parent']?></td>
                                            <td class="center"><?=$item['menuOrder']?></td>
                                            <td class="center"><?=$item['link']?></td>
                                            <td><div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li><a href="<?=URL.$this->activeMenu?>/<?=$this->activeMenu?>/edit/<?=$item['id']?>">Edit</a></li>
                                                                                                <?php if ($item['id']<> 1){?>
                                                                                                <li><a href="javascript:void(0)" data-toggle="modal" data-id="<?=$item['id']?>"  data-target="#myModal" class="openModal">Delete</a></li>
                                                                                                <?php }?>
                                                                                          </ul>
											</div></td>
                                        </tr>
                                        <?php $i++;
                                        
                                                                                                } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
      