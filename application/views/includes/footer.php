
		<div class="manualAlertBox text-secondary"></div>
		<script src="<?=site_url('assets/js/bootstrap.min.js')?>"></script>
		<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js"></script>
		<script>

			$(document).ready( function () {
				$('#datatables').DataTable({
					dom: "<'row'<'col-sm-12 col-md-6'l<'mb-2'B>><'col-sm-12 col-md-6'f>>" +
						"<'row'<'col-sm-12'tr>>" +
						"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
					buttons: {
						buttons: ['excel','pdf','print']
					},
					initComplete: function () {
						$('.buttons-pdf').html('<span class="fa fa-file-pdf mx-1 bg-info" data-toggle="tooltip" title="Export As Pdf"/>')
						$('.buttons-excel').html('<span class="fa fa-file-excel mx-1 bg-success" data-toggle="tooltip" title="Export To Excel"/>')
						$('.buttons-print').html('<span class="fa fa-print mx-1 bg-secondary" data-toggle="tooltip" title="Print"/>')
					}
				});

				$('.select2').select2({
				});
				if ($('.select2').hasClass("select2-hidden-accessible")) {
					$('.select2-selection').css('height','100%');
					$('.select2-selection__arrow').css('height','100%');
					// $('.select2-selection__rendered').css('margin-top','5px');
				}
			});

			const deleteRow = (Id, type) => {
				if(confirm('Are you sure you want to delete the User?')){
					location.assign('<?=site_url()?>delete'+type.charAt(0).toUpperCase()+type.slice(1) +'/'+Id);
				}
			}

			const showAlertBox = (msg, type) => {
				const manualAlertBox = $('.manualAlertBox');
				manualAlertBox.addClass('bg-'+type);
				if(type == 'light'){
					manualAlertBox.addClass('text-success');
				} else {
					manualAlertBox.addClass('text-light');
				}
				manualAlertBox.addClass('fadeInDown');
				manualAlertBox.html("<h6 class='my-4 px-4'>"+msg+"</h6>");
				manualAlertBox.css('display','block');
				setTimeout(() => {
					manualAlertBox.css('display','none');
					manualAlertBox.html('');
				},5000);
			}
			<?php
			if($this->session->has_userdata('msg_success')){ ?>
				showAlertBox("<?=$this->session->userdata('msg_success')?>","light");
			<?php }
			?>
			<?php
			if($this->session->has_userdata('msg_error')){ ?>
				showAlertBox("<?=$this->session->userdata('msg_error')?>","danger");
			<?php }
			$this->session->unset_userdata('msg_success');
			$this->session->unset_userdata('msg_error');
			?>
		</script>
	</body>
</html>
