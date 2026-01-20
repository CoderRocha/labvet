<script>
    $(function() {
            $('#tb_default').DataTable({
                "paging": true,
                "lenghtChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                }

            });

            $('#grid_client_pet').DataTable({
                "paging": true,
                "lenghtChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                }

            });
        }

    )
</script>
