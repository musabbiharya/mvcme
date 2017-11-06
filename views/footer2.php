</div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<script src="<?php echo BACKEND; ?>assets/js/splash.js"></script>
<script>
    $( document ).ready(function() {
        var a= "<?php echo $this->activeMenu?>";
       $("#"+a).addClass('active-menu');
    });
</script>
<p style="color:white">(C) MARS framework v_1.0</p>
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->

<!-- BOOTSTRAP SCRIPTS -->


<script src="<?php echo BACKEND; ?>assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo BACKEND; ?>assets/js/jquery.metisMenu.js"></script>
<!-- MORRIS CHART SCRIPTS -->
<script src="<?php echo BACKEND; ?>assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo BACKEND; ?>assets/js/morris/morris.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo BACKEND; ?>assets/js/custom.js"></script>

<?php 
    if (isset($this->js)) 
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'modules/'.$this->activeMenu.'/view/'.$js.'"></script>';
        }
    }
    ?>
</body>
</html>
