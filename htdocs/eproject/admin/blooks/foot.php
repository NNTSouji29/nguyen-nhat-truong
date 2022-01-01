<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- datatable -->
<script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/dist/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();

        $("#datatable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    function imgError(image) {
        image.onerror = "";
        image.src = "../public/image/no-image.png";
        return true;
    }
</script>