<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'm/d/Y' );
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel panel-info">
					<header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
						Search Wizard
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
								  action="<?php echo current_url(); ?>">
								
								<div class="form-group ">
									<label for="exam_name" class="control-label col-md-2">Exam Name</label>
									<div class="col-md-2">
										<input class=" form-control" id="exam_name" name="exam_name" type="text" placeholder="Exam Name"/>
									</div>
									<label for="exam_name" class="control-label col-md-2">Exam Type</label>
									<div class="col-md-2">
										<?php
										$ddp = "class='form-control m-bot15' id='answer'";
										echo form_dropdown( 'exam_id', $exam_category, '', $ddp );
										?>
									</div>
									<label for="institute_id" class="control-label col-md-2">Institute Name</label>
									<div class="col-md-2">
										<?php
										$url = base_url( 'setting/ajax_get_course_by_institute' );
										$ddp = "class='form-control m-bot15' id='institute_id' onchange=get_course_by_institue('$url')";
										echo form_dropdown( 'institute_id', $institute_list, set_value( 'institute_id', ( isset( $res->institute_id ) ) ? $res->institute_id : '' ), $ddp );
										?>
									</div>
								</div>
								<div class="form-group ">
									<label for="Status" class="control-label col-md-2">Course</label>
									
									<div class="col-md-2">
										<?php
										$url = base_url( 'setting/ajax_get_faculty_by_course' );
										$ddp = "class='form-control m-bot15' id='course_id' onchange=get_faculty_by_course('$url')";
										echo form_dropdown( 'course_id', $course_list, ( isset( $res ) ? $res->course_id : '' ), $ddp );
										?>
									</div>
									
									<label for="Status" class="control-label col-md-2">Faculty</label>
									<div class="col-md-2">
										<?php
										//$ddp = "class='form-control m-bot15' id='faculty_code'";
										$url = base_url( 'setting/ajax_get_subjects_by_faculty' );
										$ddp = "class='form-control m-bot15' id='faculty_id' onchange=get_subjects_by_faculty('$url')";
										echo form_dropdown( 'faculty_id', $faculty_list, ( isset( $res->faculty_id ) ? $res->faculty_id : '' ), $ddp );
										?>
									</div>
									<label for="Status" class="control-label col-md-2">Subject</label>
									<div class="col-md-2">
										<?php
										$ddp = "class='form-control m-bot15' id='subject_faculty_id'";
										echo form_dropdown( 'subject_id', $sub_list, '', $ddp );
										?>
									</div>
								</div>
								
								<!--<div class="form-group ">
									<label for="Name" class="control-label col-lg-2">Date Range</label>
									<div class="col-lg-4">
										<div class="input-group input-large" data-date="<?php /*echo $current_date; */ ?>"
											 data-date-format="mm/dd/yyyy">
											<input type="text" class="form-control datepicker" name="from_date_time">
											<span class="input-group-addon">To</span>
											<input type="text" class="form-control datepicker" name="to_date_time">
										</div>
									</div>

								</div>-->
								
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-2">
										<button class="btn btn-primary" type="submit">Search</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel panel-info">
					<header class="panel-heading">
						Exam List <span class="badge"><?= $total_rows; ?></span>
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
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
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>Exam Name</th>
								<th>Exam ID</th>
								<th>Created Date</th>
								<th>Exam Type</th>
								<th>Institute</th>
								<th>Couse</th>
								<th>Faculty</th>
								<th>Subject</th>
								<th>MCQ Question</th>
								<!--								<th>Value</th>-->
								<th>SBA Question</th>
								<!--								<th>Value</th>-->
								<!--								<th>Negative Mark</th>-->
								<th>Status</th>
								<th>Time</th>
								<th width="10%">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( !empty( $exam_lists ) ) {
								//$value_all = array();
								foreach ( $exam_lists as $key => $value ) {
									$key++;
									?>
									<tr>
										<td><?= $key; ?></td>
										<td>
											<a href="https://banglamedexam.com/exam_details.php?eid=<?php echo $value->id; ?>" target="_blank"><?php echo $value->exam_name; ?></a>
											<!--<a href="<?php echo base_url( "exam_create/exam_details" )."?eid={$value->id}"; ?>" target="_blank"><?php echo $value->exam_name; ?></a>-->
										</td>
										<td>
											<?php echo $value->id; ?>
										</td>
										<td>
											<?php echo $value->created_at; ?>
										</td>
										<td>
											<?php echo get_name_by_auto_id( 'sif_exam_category', $value->exam_id, 'exam_category_name' ); ?>
											<?php if ( $value->free_exam ) echo '<span class="badge bg-green">Free</span>'; ?>
										</td>
										<td><?php echo get_name_by_auto_id( 'sif_institute', $value->institute_id, 'institute_name' ); ?>
										</td>
										<td>
											<?php echo get_name_by_auto_id( 'sif_course', $value->course_id, 'course_name' ); ?>
										</td>
										<td>
											<?php echo get_name_by_auto_id( 'sif_faculty', $value->faculty_id, 'faculty_name' ); ?>
										</td>
										<td>
											<?php echo get_name_by_auto_id( 'sif_subject', $value->subject_id, 'subject' ); ?>
										</td>
										
										<td class="text-center">
											<?php echo $value->mcq_total; ?>
										</td>
										<!--										<td>-->
										<!--											--><?php //echo $value->mcq_value; ?>
										<!--										</td>-->
										<td class="text-center">
											<?php echo $value->sba_total; ?>
										</td>
										<!--										<td>-->
										<!--											--><?php //echo $value->sba_value; ?>
										<!--										</td>-->
										<!--										<td>-->
										<!--											--><?php //echo $value->negative_mark; ?>
										<!--										</td>-->
										<!--										<td>-->
										<!--											--><?php //echo $value->total_mark; ?>
										<!--										</td>-->
										
										<td class="text-center">
											<?php echo $value->exam_comm_code; ?>
											<?php
											if ( $value->status == 1 ) {
												echo '<label class="label label-success">Active</label>';
											} else {
												echo '<label class="label label-danger">Inactive</label>';
											}
											?>
										</td>
										<td class="text-center">
											<?php echo $value->time; ?> Min
										</td>
										<td>
											<a href="<?php echo base_url( "exam_create/exam_question_list/$value->id" ); ?>" class="btn btn-primary btn-xs" target="_blank">
												<i class="glyphicon glyphicon-zoom-in"></i>
												View Details
											</a>
											<a href="<?php echo base_url( "exam_create/exam_question_pdf/$value->id" ); ?>" class="btn btn-warning btn-xs" target="_blank">
												<i class="glyphicon glyphicon-question-sign"></i>
												Questions PDF
											</a>
											<a href="<?php echo base_url( "exam_create/copy_exam/$value->id" ); ?>" class="btn btn-info btn-xs">
												<i class="glyphicon glyphicon-file"></i>
												Copy Exam
											</a>
											<?php $en = $value->exam_name; $en = str_replace('&', '%26', $en); ?>
											
											<a href="<?php echo site_url( "package/vdo" ); ?>?en=<?php echo $en; ?>&eid=<?php echo $value->id; ?>&name=<?php echo $value->exam_name; ?>"
											   class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-zoom-in"></i> Add Video
                                            </a>
											
											
											<?php if ( $value->status == 1 ): ?>
												<a href="<?php echo base_url( "exam_create/status_change/$value->id/0" ); ?>" class="btn btn-danger btn-xs"
												   onclick="return confirm('Are you sure? you want to make this change.')">
													<i class="glyphicon glyphicon-eye-close"></i>
													Inactive
												</a>
											<?php else: ?>
												
												<a href="<?php echo base_url( "exam_create/status_change/$value->id/1" ); ?>" class="btn btn-success btn-xs"
												   onclick="return confirm('Are you sure? you want to make this change.')">
													<i class="glyphicon glyphicon-eye-open"></i>
													Active
												</a>
											<?php endif; ?>
										</td>
									</tr>
									<?php
								}
							} else {
								echo '<tr><td colspan="11" align="center">No Data Available</td></tr>';
							}
							?>
							</tbody>
						</table>
						<?php echo $links; ?>
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
?>    
