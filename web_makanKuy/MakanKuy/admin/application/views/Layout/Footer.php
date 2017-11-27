
		<div class="footer">
      
            <div>
                <strong>Copyright</strong> Ilkom AJ 11 &copy; 2017
            </div>
        </div>

        </div>
        </div>

	<script type="text/javascript" src=" <?php echo base_url();?>asset/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src=" <?php echo base_url();?>asset/lib/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src=" <?php echo base_url();?>asset/lib/metisMenu/jquery.metisMenu.js"></script>
	<script type="text/javascript" src=" <?php echo base_url();?>asset/lib/slimscroll/jquery.slimscroll.min.js"></script>
	
	<script type="text/javascript" src=" <?php echo base_url();?>asset/lib/dataTables/datatables.min.js"></script>	
	    <!-- Custom and plugin javascript -->
		<script type="text/javascript" src=" <?php echo base_url();?>asset/js/inspinia.js"></script>
		<script type="text/javascript" src=" <?php echo base_url();?>asset/lib/pace/pace.min.js"></script>	
	<script type="text/javascript" src=" <?php echo base_url();?>asset/lib/toastr/toastr.min.js"></script>
	
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Aplikasi Pelaporan Tempat Sampah Ilegal Dinas Kebersihan Kota Bogor', 'Welcome to APTSI');

            }, 1300);
			
			   $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

		});
    </script>
</body>
</html>
