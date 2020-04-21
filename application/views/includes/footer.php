  <footer class="footer">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <?php echo date('Y'); ?> <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i><span><a href="https://github.com/yakubu234"> &nbsp;&nbsp;by Yakubu Abiola</a> </span></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.min.js"></script>
        <!-- summernote -->
        <script src="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>
        <script>
            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 120,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
            });
        </script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>assets/pages/datatables.init.js"></script>

        <script src="<?php echo base_url(); ?>plugins/bootstrap-md-datetimepicker/js/moment-with-locales.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/bootstrap-md-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

        <!-- Plugins js -->
        <script src="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        
        <script src="<?php echo base_url(); ?>plugins/dropzone/dist/dropzone.js"></script>

        <script src="<?php echo base_url(); ?>plugins/select2/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

        <!-- Plugins Init js -->
        <script src="<?php echo base_url(); ?>assets/pages/form-advanced.js"></script>

        <script src="<?php echo base_url(); ?>plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Responsive-table-->
        <script src="<?php echo base_url(); ?>plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

        <script>
            $(function() {
                $('.table-responsive').responsiveTable({
                    addDisplayAllBtn: 'btn btn-secondary'
                });
            });
        </script>
    
    </body>

</html>