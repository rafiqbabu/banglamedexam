<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey team-single">
		<!-- Container -->
		<div class="container">
			<!-- Page Content -->
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="widget">
						<?php echo $msg; ?>

						<h4 class="widget-title text-center"><?= $page_title; ?> <span></span></h4>
						<table class="table default">
							<tbody>
							<tr>
								<td><strong>Institute</strong></td>
								<td><?= get_name_by_auto_id( 'sif_institute', $exam->exam_data->institute_id, 'institute_name' ); ?></td>
								<td><strong>Course</strong></td>
								<td><?= get_name_by_auto_id( 'sif_course', $exam->exam_data->course_id, 'course_name' ); ?></td>
								<td><strong>Faculty</strong></td>
								<td><?= get_name_by_auto_id( 'sif_faculty', $exam->exam_data->faculty_id, 'faculty_name' ); ?></td>
							</tr>
							<tr>
								<td><strong>Subject</strong></td>
								<td colspan="2"><?= get_name_by_auto_id( 'sif_subject', $exam->exam_data->subject_id, 'subject' ); ?></td>
								<td><strong>Exam Type</strong></td>
								<td colspan="2"><?= get_name_by_auto_id( 'sif_exam_category', $exam->exam_data->exam_id, 'exam_category_name' ); ?></td>
							</tr>
							<tr>
								<td><strong>Title</strong></td>
								<td colspan="3"><?= $exam->exam_data->exam_name; ?></td>
								<td><strong>Duration</strong></td>
								<td>
									<span class="label label-warning"><?= $exam->exam_data->time; ?> Min</span>
								</td>
							</tr>
							<tr>
								<td><strong>Mark</strong></td>
								<td><?= $exam->exam_data->total_mark; ?></td>
								<td><strong>MCQ Questions</strong></td>
								<td>
									<span class="label label-info"><?= $exam->exam_data->mcq_total; ?></span>
								</td>
								<td><strong>SBA Questions</strong></td>
								<td>
									<span class="label label-info"><?= $exam->exam_data->sba_total; ?></span>
								</td>
							</tr>
							</tbody>
						</table>
						<div class="text-justify">
							<?php if ( $exam_prompt ) echo html_entity_decode( base64_decode( $exam_prompt->details ) ); ?>
						</div>

						<hr>

    						<?php 
								$id = $this->session->user->id."/".$exam->id."<br>"; 
								
								$sql="SELECT * FROM oe_doc_exams WHERE doc_id = '$id' AND status = '8'";
								$query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									echo "<font color='Red' size='4'>YOU HAVE TO COMPLETE THE FOLLOWING EXAM TO GET THE NEXT EXAM!</font> <font color='green' size='4'>Click The Box Below</font><hr>";
									foreach ($query->result() as $row) {
										echo "<div style='background-color:green; padding:10px; color:#FFFFFF; font-size:16px; width:auto;'><a style='color:#FFFFFF;' href='".site_url( "exam-start/{$row->id}" )."'>".get_name_by_auto_id( 'oe_exam', $row->exam_id, 'exam_name' )."</a></div><hr>";
									}
								}
								else {
									echo "<div class='text-center'><a href='".site_url( "exam-start/{$exam->id}" )."' class='btn bg-green btn-lg'>Start Now</a></div>";
								}
							?>
					</div>
				</div>
			</div>
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
