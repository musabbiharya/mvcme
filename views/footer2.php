 </section>
    <!-- /.content -->
  </div>
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
     
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">BerjayaTeknikBersama</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<!--<script src="<?php echo BACKEND_TEMPLATE; ?>bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BACKEND_TEMPLATE; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo PUBLIC_JS; ?>dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_JS; ?>bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BACKEND_TEMPLATE; ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo URL; ?>public/js/splash.js"></script>
<script src="<?php echo URL; ?>public/js/validate.js"></script>
<script>
    var url_home = '<?php echo URL ?>';
    var home = '<?php echo URL . $this->activeMenu ?>/';
    $(document).ready(function () {
         $('#dataTables-example').dataTable();
        var a = "<?php echo $this->activeMenu ?>";

        $("#" + a).addClass('active-menu');
        var b = $('li').has('ul').has('li').has('a.active-menu');
        b.addClass('menu-open active');
        $('li').has('a.active-menu').addClass('active');
        console.log(b);
    });
</script>

<script src="<?php echo BACKEND_TEMPLATE; ?>assets/js/custom.js"></script>

<?php
if (isset($this->js)) {
    foreach ($this->js as $js) {
        echo '<script type="text/javascript" src="' . URL . 'modules/' . $this->activeMenu . '/view/' . $js . '"></script>';
    }
}
?>
</body>
</html>