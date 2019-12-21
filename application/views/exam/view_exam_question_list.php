<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

	<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
			<!-- page start-->

			<div class="row">
				<div class="col-md-12">
					<section class="panel panel-info">
						<header class="panel-heading">
							<h3 class="panel-title">Exam And Question Details</h3>
						</header>
						<div class="form form-horizontal">
							<div class="panel-body">
								<div class="form-group">
									<label for="Name" class="control-label col-md-2">Exam Name</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->exam_name; ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Institute Name</label>
									<div class="col-md-2">
										<strong><?php echo get_name_by_auto_id( 'sif_institute', $question_list->institute_id, 'institute_name' ); ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Course Name</label>
									<div class="col-md-2">
										<strong><?php echo get_name_by_auto_id( 'sif_course', $question_list->course_id, 'course_name' ); ?></strong>
									</div>
								</div>
								<div class="form-group ">
									<label for="Name" class="control-label col-md-2">Faculty</label>
									<div class="col-md-2">
										<strong><?php echo get_name_by_auto_id( 'sif_faculty', $question_list->faculty_id, 'faculty_name' ); ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Subject</label>
									<div class="col-md-2">
										<strong><?php echo get_name_by_auto_id( 'sif_subject', $question_list->subject_id, 'subject' ); ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Exam Type</label>
									<div class="col-md-2">
										<strong><?php echo get_name_by_auto_id( 'sif_exam_category', $question_list->exam_id, 'exam_category_name' ); ?></strong>
									</div>
								</div>
								<div class="form-group ">
									<label for="Name" class="control-label col-md-2">Mcq Total Question</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->mcq_total; ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Mcq Total Mark</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->mcq_value; ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Sba Total Question</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->sba_total; ?></strong>
									</div>

								</div>
								<div class="form-group ">

									<label for="Name" class="control-label col-md-2">Sba Total Mark</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->sba_value; ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Negative Mark</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->negative_mark; ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Total Mark</label>
									<div class="col-md-2">
										<strong><?php
											echo $question_list->total_mark; ?></strong>
									</div>
								</div>
								<div class="form-group">
									<label for="Name" class="control-label col-md-2">Time</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->time; ?></strong>
									</div>
									<label for="Name" class="control-label col-md-2">Cost</label>
									<div class="col-md-2">
										<strong><?php echo $question_list->exam_cost; ?></strong>
									</div>
								</div>
							</div>
						</div>

					</section>

					<section class="panel panel-info">
						<div class="panel-heading" style="background:#D9EDF7;text-align:center;">
							<h3 class="panel-title">Questions List</h3>
						</div>
						<div class="panel-body">
							<?php
							if ( validation_errors() ) {
								echo validation_errors( '<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>' );
							}

							if ( $this->session->flashdata( 'flashOK' ) ) {
								echo "<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
								echo $this->session->flashdata( 'flashOK' );
								echo "</div>";
							}
							if ( $this->session->flashdata( 'flashError' ) ) {
								echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
								echo $this->session->flashdata( 'flashError' );
								echo "</div>";
							}
							?>
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab_mcq">MCQ Question List</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#tab_sba">SBA Question List</a>
								</li>
							</ul>
							<div class="tab-content">

								<div id="tab_mcq" class="tab-pane active">
									<table class="table table-bordered table-striped">
										<thead>
										<tr>
											<td>#</td>
											<td>Question</td>
											<td>Chapter</td>
											<td>Topics</td>
											<td>Action</td>
										</tr>
										</thead>
										<tbody>
										<?php
										$question_lists = get_question_info( $question_list->id );
										if ( $question_lists ) {
											foreach ( $question_lists as $key => $value ) {

												if ( $value->question_type_id == '2' ) {
													?>
													<tr>
														<td><?php echo $key + 1; ?></td>
														<td>
															<?php echo get_name_by_auto_id( 'oe_qsn_bnk_master', $value->question_id, 'question_name' ); ?>

														</td>
														<td>
															<?php echo get_name_by_auto_id( 'oe_chapter', $value->chapter_id, 'chapter_name' ); ?>

														</td>
														<td>
															<?php echo get_name_by_auto_id( 'oe_topics', $value->topic_id, 'name' ); ?>
														</td>
														<td class="text-center" width="15%">
															<a class="btn btn-info btn-xs" href="<?= site_url( "exam_create/change_question/{$value->id}/{$value->question_id}" ) ?>">Change</a>
															<?php if ( $this->ion_auth->is_admin() ) : ?>
																<a class="btn btn-danger btn-xs" href="<?= site_url( "exam_create/delete_question/{$value->id}" ) ?>"
																   onclick="return confirm('Are You Sure? This action cannot be reverted. Do it on your own risk.')">Delete</a>
															<?php endif; ?>
														</td>
													</tr>
													<?php
												}
											}
										}
										?>
										</tbody>
									</table>
								</div>

								<div id="tab_sba" class="tab-pane">
									<table class="table table-bordered table-striped">
										<thead>
										<tr>
											<td>#</td>
											<td>Question</td>
											<td>Chapter</td>
											<td>Topics</td>
											<td>Action</td>
										</tr>
										</thead>
										<tbody>
										<?php
										$question_lists = get_question_info( $question_list->id );
										if ( $question_lists ) {
											foreach ( $question_lists as $key => $value ) {
												///$key = 0;
												if ( $value->question_type_id == '1' ) {
													?>
													<tr>
														<td><?php echo $key + 1; ?></td>
														<td>
															<?php echo get_name_by_auto_id( 'oe_qsn_bnk_master', $value->question_id, 'question_name' ); ?>

														</td>
														<td>
															<?php echo get_name_by_auto_id( 'oe_chapter', $value->chapter_id, 'chapter_name' ); ?>

														</td>
														<td>
															<?php echo get_name_by_auto_id( 'oe_topics', $value->topic_id, 'name' ); ?>
														</td>

														<td width="15%" class="text-center">
															<a class="btn btn-info btn-xs" href="<?= site_url( "exam_create/change_question/{$value->id}/{$value->question_id}" ) ?>">Change</a>
															<?php if ( $this->ion_auth->is_admin() ) : ?>
																<a class="btn btn-danger btn-xs" href="<?= site_url( "exam_create/delete_question/{$value->id}" ) ?>"
																   onclick="return confirm('Are You Sure? This action cannot be reverted. Do it on your own risk.')">Delete</a>
															<?php endif; ?>
														</td>
													</tr>
													<?php
												}
											}
										}
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<!-- page end-->
		</section>
	</section>
	<!--main content end-->
<?php
$this->load->view( 'footer/view_footer' );
