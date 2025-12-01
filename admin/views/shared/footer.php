</div><!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->
<script src="admin/themes/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="admin/themes/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="admin/themes/js/raphael-min.js"></script>
<script src="admin/themes/js/morris.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="admin/themes/js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="admin/themes/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/themes/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin/themes/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="admin/themes/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>    
<script src="admin/themes/vendors/jszip/dist/jszip.min.js"></script>
<script src="admin/themes/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="admin/themes/vendors/pdfmake/build/vfs_fonts.js"></script><!-- Page-Level Demo Scripts - Tables - Use for reference -->

<!-- Custom Theme Scripts -->
<script src="admin/themes/js/custom.min.js"></script>

<script>
    $(document).ready(function() {
        $(this).attr("title", "<?=$title;?>");
    });
</script>
<script>
    $('.deleteitem').on('click', function () {
        return confirm('Bạn chắc chắn muốn xóa?');
    });
</script>
<script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();
	});
</script>
</body>

</html>
