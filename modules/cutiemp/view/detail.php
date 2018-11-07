<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<div class="col-md-12" >
    <div class="panel panel-default">
        <div class="panel-heading">

            Add Leave

        </div>
        <div class="panel-body">
            <form role="form" class="needs-validation" novalidate id="dataForm"  action="<?= URL . $this->activeMenu ?>/<?= $this->activeMenu ?>/save/<?= $this->data['data']['id'] ?>">
                <div class="form-group input-group ">
                    <span class="input-group-addon" style="width: 100px">Leave </span>
                    <select  name="cuti" id="cuti" class="form-control" onchange="cutiselect($(this))">

                        <option value="0">--Choose Kind of Leave--</option>
                        <option value="Annual">Annual Leave</option>
                        <option value="Sick">Sick Leave</option>
                        <option value="Emergency">Emergency Leave</option>

                    </select>
                </div>
                <div class="form-group input-group input-group">
                    <span class="input-group-addon" style="width: 100px">Start Date </span>
                    <input name="startdate" id="startdate" type="text"  class="datepicker error"  value="<?= $this->data['data']['startdate'] ?>" readonly >
                </div>
                <div class="form-group input-group input-group">
                    <span class="input-group-addon" style="width: 100px">End Date </span>
                    <input name="enddate" id="enddate" type="text"  class="datepicker"  value="<?= $this->data['data']['enddate'] ?>" readonly >
                </div>
                <div class="form-group input-group reason" style="display: none">
                    <span class="input-group-addon" style="width: 100px">Reason </span>
                    <input  name ="reason" type="text"    value="<?= $this->data['data']['reason'] ?>" disabled>
                </div>
                <div class="form-group input-group evidence" style="display: none">
                    <span class="input-group-addon" style="width: 100px">Evidence </span>
                    <input id="evidence"  type="file" class="form-control-file"   accept="image/png, image/jpeg" name="evidence" disabled="true"/>
                </div>
                <button  type="button" class="btn btn-success" onclick="simpan()" >Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>


        </div>
    </div>
</div>


