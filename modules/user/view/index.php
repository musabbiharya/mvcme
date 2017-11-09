<?php

/*
* mvc ;
* index.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 5, 2017;
* 1:03:21 AM;
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
                                            <th>Username</th>
                                            <!--<th>Password</th>-->
                                            <th>Group</th>
                                            <th>Name</th>
                                            <th>Operation</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;foreach ($this->userList as $item) { ?>
                                            <tr class="odd gradeX">
                                            <td><?=$i?></td>
                                            <td><?=$item['username']?></td>
                                            <!--<td><?=$item['password']?></td>-->
                                            <td class="center"><?=$item['groupName']?></td>
                                            <td class="center"><?=$item['name']?></td>
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
                                        <?php $i++;} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
     