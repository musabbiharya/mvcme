<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.php';
?>

<div id="wrapper">
    <form id="forminput" onsubmit="return adduser()">
        <div id="username" class='asu'>
            <label>username</label>
            <input name="username" >
        </div>
        <dv class="wrap">
        <div id="password">
            <label>password</label>
            <input id="passwordnya" name="password">
        </div>
            <button href="#" >Submit</button>
    </form>
</div>
<script>
    function adduser() {
//        var a=$('#forminput').find('div').hasClass('as');
           var a = $('#forminput').validasi({
               role:{
                   username:'required',
                   password:'required'
                   
               },
               message:{
                   username:'*required',
                   password:'*required'
                   
               },
               minLength:{
                   username:5,
                   password:8
                   
               }
           });
           console.log(a);
           
        return false;
        }
</script>
<?php
include 'footer.php';
?>
