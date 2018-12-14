<?php
/*
 * mvc ;
 * idex.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2017;
 * 11:22:42 PM;
 * Jakarta International Container Terminal (JICT);
 */
//var_dump($this->workdays);
$wkdays= $this->workdays[0]['jumlah'];
?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                
                <input id="datepicker" type="text"  class="datepicker"  value="<?=$this->period?>" readonly>
                        
                <a class="btn btn-success projectprice" >Show</a>

            </div>
            <div class="panel-body">
                <strong><?=$wkdays?>  workdays This Month  </strong>      

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<?php
if (isset($this->period)){
//    var_dump($this->data);
    ?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            
<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="headersalary">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Workdays</th>
                                <th>Diff</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($this->data['data'] as $item) {
                                ?>
                                <tr class="odd gradeX">
                                    <td></td>
                                    <td><a href="javascript:void(0)" onclick="detail(<?= $item['id'] ?>)"><?= $item['id'] ?></a> </td>
                                    <td><?= $item['fullName'] ?></td>
                                    <td><?= $item['total'] ?></td>
                                    
                                    <td><?=($item['total']-$wkdays)?></td>

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

<?php
    
}