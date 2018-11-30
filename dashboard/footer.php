<footer class="main-footer">
    
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.simple.timer.js"></script>
<script src="../js/dojo.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="../js/jquery.sparkline.min.js"></script>



<!-- DataTables -->
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/iCheck/icheck.min.js"></script>
<!-- SlimScroll -->
<script src="../js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="../js/chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../dist/js/custom.js"></script>


<script src="../js/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../js/bootstrap-datepicker.min.js"></script>

<script src="../js/bootstrap-timepicker.min.js"></script>

<!--Form Validation-->
<script src="../css/form-wizard/bootstrap-validator.min.js" type="text/javascript"></script>

<!--Form Wizard-->
<script src="../css/form-wizard/jquery.steps.min.js" type="text/javascript"></script> 

<!--wizard initialization-->
<script src="../css/form-wizard/wizard-init.js" type="text/javascript"></script>


<script> 
    $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    });
</script>
<script>


    jQuery(function () {


jQuery(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    jQuery('html, body').animate({
      scrollTop: jQuery($.attr(this, 'href')).offset().top
     }, 500);
});

        jQuery('button.allDelete').hide();


        // DatePicker 
       jQuery('.datepicker').datepicker({
          autoclose: true,
         format: 'dd-mm-yyyy'
        });

    $('#checkAll').on('ifChanged', function(event) {
    $('input.CheckedALL').iCheck('toggle');
    $('.allDelete').toggle();
    });


       // All Checkbox Check 
        jQuery("#checkAll").click(function () {
            alert();
            jQuery('input.minimal.-red.CheckedALL').not(this).prop('checked', this.checked);
        });
   
        //Red color scheme for iCheck
        jQuery('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        });
        // Checkbox Red 
        jQuery('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        });

    })
</script>
</body>
</html>
