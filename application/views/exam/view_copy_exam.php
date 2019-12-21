<?php
$this->load->view('header/view_header');
$current_date = date('Y-m-d');
?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->

		<div class="row">
			<div class="col-md-12">
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
				<form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post"
					  action="<?php echo site_url("exam_create/save_exam_copy/{$exam->id}"); ?>">

					<!--  <input type="hidden" name="update_id" value="<?php //echo isset($res->id) ? $res->id : '' ?>"> -->

					<section class="panel panel-info">
						<header class="panel-heading">
							<h3 class="panel-title">Copy Exam
								<span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
							</h3>

						</header>
						<div class="panel-body">
							<div class="form">

								<table class="table table-bordered">
									<tr>
										<th width="15%">Exam Name</th>
										<td width="35%">
											<?= form_input( 'exam_name', $exam->exam_name, ['class' => 'form-control'] ); ?>
										</td>
										<th width="15%">Type</th>
										<td width="35%"><?= $exam->type; ?></td>
									</tr>
									<tr>
										<th>Institute</th>
										<td><?= get_name_by_auto_id('sif_institute', $exam->institute_id, 'institute_name'); ?></td>
										<th>Course</th>
										<td><?= get_name_by_auto_id('sif_course', $exam->course_id, 'course_name'); ?></td>
									</tr>
									<tr>
										<th>Faculty <i class="fa fa-asterisk ipd-star"></i></th>
										<td>
											<?php
											//$ddp = "class='form-control m-bot15' id='faculty_code' required";
											$url = base_url( 'setting/ajax_get_subjects_by_faculty' );
											$ddp = "class='form-control m-bot15' id='faculty_id' required onchange=get_subjects_by_faculty('$url')";
											echo form_dropdown( 'faculty_id', get_faculty_list( $exam->institute_id, $exam->course_id ), '', $ddp );
											?>
										</td>
										<th>Subject <i class="fa fa-asterisk ipd-star"></i></th>
										<td>
											<?php
											$ddp = "class='form-control m-bot15' id='subject_faculty_id' required";
											echo form_dropdown( 'subject_id', ['' => 'Choose'], '', $ddp );
											?>
										</td>
									</tr>
									<tr>
										<th>For SIF ? <i class="fa fa-asterisk ipd-star"></i></th>
										<td>
											<input type="radio" name="is_sif" value="1"> Yes <input type="radio" name="is_sif" value="0" checked> No
										</td>
										<th>SIF Exam Code </th>
										<td>
											<input class="form-control" type="text" name="sif_exam_code">
										</td>
									</tr>
									<tr>
										<td></td>
										<td colspan="3">
											<button class="btn btn-success" type="submit" value="Submit">Submit</button>
										</td>
									</tr>
								</table>

							</div>
						</div>
					</section>
				</form>
			</div>
		</div>
	</section>
</section>
<!--main content end-->

<?php
$this->load->view('footer/view_footer');
?>
