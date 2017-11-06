<?php

/*
* mvc ;
* edit.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 5, 2017;
* 3:00:27 PM;
* Jakarta International Container Terminal (JICT);
*/
?>
<script>
function editUserSubmit(){
    alert("<?php echo 'hallo' ?>");
    var data = form.serialize();
    
  $.ajax({
  type: "POST",
  url: url,
  data: data,
  success: function (data) {
                alert(data.msg);
            },
  dataType: 'json'
});
    alert('masuk');
    
}</script>