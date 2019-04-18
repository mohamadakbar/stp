
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div></div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()."assets/home/"; ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()."assets/home/"; ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()."assets/home/"; ?>dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>dist/js/pages/mask/mask.init.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/libs/quill/dist/quill.min.js"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?php echo base_url()."assets/home/"; ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable({
             aaSorting: [[0, 'desc']]
        });
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</body>
</html>