```html
<footer class="main-footer">
    <strong>
        Copyright &copy; 2020 - Todos os direitos reservados.
    </strong>

    <div class="float-right d-none d-sm-inline-block">
        <b>AG Versão</b> 2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

</div>
<!-- ./wrapper -->


<!-- ========================================================= -->
<!-- JQUERY -->
<!-- ========================================================= -->

<script src="../plugins/jquery/jquery.min.js"></script>


<!-- ========================================================= -->
<!-- JQUERY UI -->
<!-- ========================================================= -->

<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>


<!-- ========================================================= -->
<!-- BOOTSTRAP 4 -->
<!-- ========================================================= -->

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- ========================================================= -->
<!-- OUTROS PLUGINS ADMINLTE -->
<!-- ========================================================= -->

<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Moment -->
<script src="../plugins/moment/moment.min.js"></script>

<!-- Date Range Picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>

<!-- Overlay Scrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


<!-- ========================================================= -->
<!-- ADMINLTE -->
<!-- ========================================================= -->

<script src="../dist/js/adminlte.js"></script>

<!-- Dashboard -->
<script src="../dist/js/pages/dashboard.js"></script>

<!-- Demo -->
<script src="../dist/js/demo.js"></script>


<!-- ========================================================= -->
<!-- DATATABLES -->
<!-- ========================================================= -->

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>

<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- ========================================================= -->
<!-- DATATABLES BUTTONS -->
<!-- ========================================================= -->

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


<!-- ========================================================= -->
<!-- INICIALIZAÇÃO DO DATATABLES -->
<!-- ========================================================= -->

<script>
$(document).ready(function () {

    $('#example1').DataTable({

        responsive: true,

        autoWidth: false,

        pageLength: 10,

        language: {
            decimal: ",",
            thousands: ".",

            emptyTable: "Nenhum registro encontrado",

            info: "Mostrando de _START_ até _END_ de _TOTAL_ registros",

            infoEmpty: "Mostrando 0 até 0 de 0 registros",

            infoFiltered: "(filtrado de _MAX_ registros)",

            lengthMenu: "Mostrar _MENU_ registros",

            loadingRecords: "Carregando...",

            processing: "Processando...",

            search: "Pesquisar:",

            zeroRecords: "Nenhum registro encontrado",

            paginate: {
                first: "Primeiro",
                last: "Último",
                next: "Próximo",
                previous: "Anterior"
            }
        },

        dom:
            "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

        buttons: [

            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                className: 'btn btn-secondary btn-sm'
            },

            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn btn-info btn-sm'
            },

            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-success btn-sm'
            },

            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-danger btn-sm'
            },

            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: 'btn btn-primary btn-sm'
            }

        ]

    });

});
</script>


</body>
</html>
```
