<?php
/*
 * mymvc ;
 * add.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 8:17:06 PM;
 * Jakarta International Container Terminal (JICT);
 */
?>


<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">

                        <form role="form" id="dataForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/save/<?= $this->data['data']['id'] ?>">
                            <div id="title" class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Judul</span>
                                <input class="form-control" name='title' value="<?= $this->data['data']['title'] ?>"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group input-group input-group">
                                <span class="input-group-addon" style="width: 100px">Kategory</span>
                                <select class="form-control" name='catid' >
                                    <?php
                                    foreach ($this->parent as $group) {
                                        $selected = ($group['id'] == $this->data['data']['catid']) ? 'selected' : '';
                                        ?>

                                        <option value="<?= $group['id'] ?>" <?= $selected ?>><?= $group['category'] ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <!--<div id="isi" class="form-group input-group input-group">-->
                            <span class="input-group-addon" style="width: 100px">Isi</span>
                            <?php echo $this->ckeditor->editor('isi', $this->data['data']['isi']); ?>

                            <!--</div>-->

                            <div class="checkbox">
                                <label>
                                    <input id ="publish" type="checkbox" name="publish" <?= ($this->data['data']['publish']) ? 'checked' : ''; ?> />Publish
                                </label>
                            </div>
                            <button  type="button" class="btn btn-success button" onclick="simpan()" >Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
            <!--<textarea style="height: 100px;" cols="50" id="area5">HTML <b>content</b> <i>default</i> in textarea</textarea>-->	
        </div>
    </div>
    <!-- /. ROW  -->

</div>
<!-- /. ROW  -->
