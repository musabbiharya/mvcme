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
                <select  id="projectid" style="width: 400px">
                    <?php
                    foreach ($this->data['data'] as $value) {
                        ?>
                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                   <?php }
                    ?>
                </select>
                <a class="btn btn-success projectprice" >Show</a>

            </div>
            <div class="panel-body">
                            

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
