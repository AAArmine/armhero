<footer class="footer">
                                        <div class="container">
                                            <nav>
                                                
                                                <p class="copyright text-center">
                                                    ©
                                                    <script>
                                                        document.write(new Date().getFullYear())
                                                    </script>
                                                    <a href="http://cybertech.am">Cyber Tech Tim</a>, made with love for a better web
                                                </p>
                                            </nav>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/plugins/bootstrap-datetimepicker.js"></script> -->
<!-- <script src="../assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script> -->
<!-- <script src="../assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script> -->
<!-- <script src="../assets/js/plugins/nouislider.js" type="text/javascript"></script> -->
<!-- <script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script> -->
<!-- <script src="../assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script> -->
<script src="../assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<!-- <script src="../assets/js/plugins/fullcalendar.min.js"></script> -->
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">

    var table = $('#datatables');
    $().ready(function() {

        table.bootstrapTable({
            toolbar: ".toolbar",
            search: true,
            pagination: true,
            searchAlign: 'left',
            pageSize: 8,
            pageList: [8, 10, 25, 50, 100],

            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
        });

        $(window).resize(function() {
            table.bootstrapTable('resetView');
        });
    });
</script>

                            

