<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>

<style>
    #map {width:100%;height:100%;}
</style>

<style>
    .camcontent{
        display: block;
        position: relative;
        overflow: hidden;
        height: 480px;
        margin: auto;
    }
    .cambuttons button {
        border-radius: 15px;
        font-size: 18px;
    }
    .cambuttons button:hover {
        cursor: pointer;
        border-radius: 15px;
        background: #00dd00 ;    /* green */
    }
</style>
<script> var userid = '<?= $this->userid ?>'</script>

<div class="col-md-12" >
    <!--<div class="col-md-6">-->
        <h2 class="absennya"></h2>
        <div class="camcontent">
            <video id="video" autoplay></video>
            <canvas id="canvas" width="640" height="480"> </canvas>
        </div>
        <div class="cambuttons">
            <button id="snap" style="display:none;">  Capture </button>
            <button id="reset" style="display:none;">  Reset  </button>
            <button id="upload" style="display:none;"> Upload </button>
            <br> <span id=uploading style="display:none;"> Uploading has begun . . .  </span>
            <span id=uploaded  style="display:none;"> Success, your photo has been uploaded!</span>
        </div>
        <!--<a href="javascript:void(0)" class="btn btn-primary masuk" style="display:none">Masuk</a>-->
    <!--</div>-->
    
</div>
<div id="map">
    <img id="static-map" src="" />
</div>
