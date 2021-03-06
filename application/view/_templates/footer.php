    </div>
    <!-- /#wrapper -->

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="<?php echo URL; ?>js/jquery/jquery.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->



    <!-- jQuery -->
    <script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo URL; ?>bower_components/metisMenu/dist/metisMenu.min.js"></script>
    
    <!-- DataTables JavaScript -->
    <script src="<?php echo URL; ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL; ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo URL; ?>bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo URL; ?>js/metisMenu/metisMenu.js"></script>
    <script src="<?php echo URL; ?>js/sb-admin-2.js"></script>
    <script type="text/javascript">
        var uri = "<?= URL;?>";
    </script>

        <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="<?= URL; ?>js/daterangepicker.js"></script>
    <script src="<?= URL; ?>js/bootstrap-datepicker.js"></script>
    <script src="<?= URL; ?>js/bootstrap-datepicker.es.js"></script>
    <script src="<?= URL; ?>js/moment.min.js"></script>
    <script src="<?php echo URL; ?>js/select2.full.min.js"></script>

    <?php require APP.'view/Cargo/contentBox.php';?>
    <?php require APP.'view/empleado/tablesEmpleado.php';?>
    <script src="<?php echo URL; ?>js/empleado.js"></script>
    <script src="<?php echo URL; ?>js/cargo.js"></script>
    <script src="<?php echo URL; ?>js/proceso.js"></script>
    <script src="<?php echo URL; ?>js/incapacidad.js"></script>
    <script src="<?php echo URL; ?>js/peligro.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <script>
        function cargarFichaRiesgo(empleados){
            var campos = $(empleados).parent().parent();
            $("#docu").val(campos.find("td").eq(0).text());
            $("#nomb").text(campos.find("td").eq(1).text()+" "+campos.find("td").eq(2).text());
            $("#carg").val(campos.find("td").eq(3).text());
            $("#myModal").show();
        }
    </script>
</body>
</html>