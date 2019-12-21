<?php
$this->load->view('header/view_header');
$current_date = date('Y-m-d');
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->

		<div class="row">
			<form class="cmxform" enctype="multipart/form-data" id="commentForm" role="form" method="post" action="<?php echo site_url('offer/send_offer_email'); ?>">
				<div class="col-md-12">
					<section class="panel panel-info">
						<header class="panel-heading">
							Send Offer Email
							<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
						</header>
						<div class="panel-body">
							<div class="form">
								<?php
								if (validation_errors()) {
									echo validation_errors('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>');
								}

								if ($this->session->flashdata('flashOK')) {
									echo "<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
									echo $this->session->flashdata('flashOK');
									echo "</div>";
								}
								if ($this->session->flashdata('flashError')) {
									echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
									echo $this->session->flashdata('flashError');
									echo "</div>";
								}
								?>

								<div class="form-group ">
									<label class="control-label">Send To:</label>
									<?= form_dropdown('emails', $email_list, '', ['class' => 'form-control multi-select', 'multiple' => 'multiple', 'required' => 'required']); ?>
								</div>
								<div class="form-group ">
									<label class="control-label">Offer Subject <i class="fa fa-asterisk ipd-star"></i></label>
									<input type="text" name="title" class="form-control" value="<?= isset($notice) ? $notice->title : ''; ?>" placeholder="Offer Subject">
								</div>
								<div class="form-group ">
									<label class="control-label">Offer Details <i class="fa fa-asterisk ipd-star"></i></label>
									<textarea name="details" class="form-control" id="details"><?= isset($notice) ? base64_decode($notice->details, true) : ''; ?></textarea>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Send Email</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>


			</form>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>
<script src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script>
<script>
	CKEDITOR.replace('details');
</script>
