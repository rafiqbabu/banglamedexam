<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey team-single">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<!-- Sidebar -->
				<?php $this->load->view( 'web/elements/view_sidebar' ); ?>
				
				<!-- Page Content -->
				<div class="col-md-9">
					<div class="widget profile-widget">
						<?php echo $msg; ?>
						
						<h4 class="widget-title"><?= "$page_title ($total_rows)"; ?> <span></span></h4>
						
						    
						
						<?php if ( $exams ): ?>
							<table class="table table-bordered table-sm padding-4">
								<thead>
								<tr>
									<th>#</th>
									<th>Exam Name</th>
									<th>Exam Type</th>
									<!--<th>Faculty</th>-->
									<th>Subject</th>
									<th>Date</th>
									<th>Duration</th>
									<th>Correct Mark</th>
									<th>Wrong Mark</th>
									<th>Obtained Mark</th>
									<th>Highest Mark</th>
									<th>Overall Position<!--Exam Type Position--></th>
									<th>Subject Position<!--Subject Position--></th>
									<!--th>Total Examine</th-->
								</tr>
								</thead>
								<tbody>
								<?php foreach ( $exams as $k => $exam ):
									$sl = $record_pos + $k + 1;
									$sop=0;
									?>
									<tr>
										<td><?= $sl; ?></td>
										<td><?= get_name_by_auto_id( 'oe_exam', $exam->exam_id, 'exam_name' ) ?></td>
										<td><?= get_name_by_auto_id( 'sif_exam_category', $exam->exam_type_id, 'exam_category_name' ) ?></td>
										<!--<td><? /*= get_name_by_auto_id('sif_faculty', $exam->faculty_id, 'faculty_name') */ ?></td>-->
										<td><?= get_name_by_auto_id( 'sif_subject', $exam->subject_id, 'subject' ) ?></td>
										<!--<td class="text-center"><? /*= $exam->duration; */ ?> Min</td>-->
										<td class="text-center"><?= user_formated_date( $exam->attend_date ); ?></td>
										<td class="text-center"><?= time_difference( $exam->start_time, $exam->end_time ); ?> Min</td>
										<td class="text-center"><?= $exam->correct_mark; ?></td>
										<td class="text-center"><?= $exam->wrong_mark; ?></td>
										<td class="text-center"><?= $exam->final_mark; ?></td>
										<td class="text-center"><?= get_highest_mark( $exam->exam_id ); ?></td>
										<!--<td class="text-center"><?= $exam->exam_type_pos; ?></td>-->
										<td class="text-center">
											<?php 
											  	
											  	$sql="SELECT * FROM oe_doc_exams WHERE status = '1' AND subject_id = '$exam->subject_id' GROUP BY doc_id ORDER BY final_mark DESC";
											    $query = $this->db->query($sql);
											    
											    if ($query->num_rows() > 0) {
  													$sl=1;
  													
  													foreach ($query->result() as $row) {
  														$id = $this->session->user->id;
  														$sop=0;
  														if ($row->doc_id == $id) {
  															echo $sop = $sl;
  														}
  													$sl=$sl+1;
  													
  													}
  													
  												}
  												
											?>
										</td>
										
										<!--<td class="text-center"><?= $exam->subject_pos; ?></td>-->
										<td class="text-center">
											<?php 
											  	
											  	$sql="SELECT * FROM oe_doc_exams WHERE status = '1' AND exam_id = '$exam->exam_id' group by doc_id ORDER BY final_mark DESC";
											    $query = $this->db->query($sql);
											    if ($query->num_rows() > 0) {
  													$sl=1;
  													foreach ($query->result() as $row) {
  														$id = $this->session->user->id;
  														if ($row->doc_id == $id){
  															echo $sl;
  														}
  													$sl=$sl+1;
  													}
  												}
											?>
										</td>
										<!--td class="text-center"><?= get_total_examine( $exam->exam_id ); ?></td-->
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
							
							<hr>
							<div class="text-center"><?= $links; ?></div>
						
						<?php else: ?>
							<h5>No Exam</h5>
						<?php endif; ?>
						
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
