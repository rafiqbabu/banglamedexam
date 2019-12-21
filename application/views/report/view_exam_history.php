<?php
$this->load->view( 'header/view_header' );
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel panel-info">
					<header class="panel-heading">
						Search Wizard
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="cmxform form-horizontal " id="commentForm" role="form" method="get" action="<?php echo current_url(); ?>">
								
								<div class="form-group ">
									<label for="exam_name" class="control-label col-md-2">Exam</label>
									<div class="col-md-3">
										<?= form_dropdown( 'e', $exams, '', ['class' => 'form-control select2'] ); ?>
									</div>
									<label for="exam_name" class="control-label col-md-1">Applicant</label>
									<div class="col-md-3">
										<?= form_dropdown( 'a', $applicants, '', ['class' => 'form-control select2'] ); ?>
									</div>
									
									<label for="Status" class="control-label col-md-1">Status</label>
									
									<div class="col-md-2">
										<?= form_dropdown( 's', exam_status(), '', ['class' => 'form-control select2'] ); ?>
									</div>
								</div>
								<div class="form-group ">
									
									<label for="institute_id" class="control-label col-md-2">Exam Category</label>
									<div class="col-md-2">
										<?= form_dropdown( 'c', $exam_categories, '', ['class' => 'form-control select2'] ); ?>
									</div>
									
									<label for="Status" class="control-label col-md-2">Date Range</label>
									<div class="col-md-4">
										<div class="input-group">
											<input type="text" class="form-control datepicker" name="f" placeholder="yyyy-mm-dd" readonly>
											<span class="input-group-addon">To</span>
											<input type="text" class="form-control datepicker" name="t" placeholder="yyyy-mm-dd" readonly>
										</div>
									</div>
								
								</div>
								
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
						Exam History || Total Exams: <span class="badge bg-info"><?= $total_rows; ?></span>
						<span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                        </span>
					</header>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>#</th>
								<!--								<th>Reg No.</th>-->
								<th>Name</th>
								<th>Faculty</th>
								<th>Subject</th>
								<th>Exam Type</th>
								<th>Exam Name</th>
								<th>Duration (Minutes)</th>
								<th>Obtained Mark</th>
								<th>Correct Mark</th>
								<th>Wrong Mark</th>
								<th>Highest Mark</th>
								<th>Exam Type Position</th>
								<th>Subject Position</th>
								<th>Date</th>
								<th>Time</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( !empty( $records ) ) {
								
								foreach ( $records as $key => $value ) {
									$key++;
									?>
									<tr>
										<td><?= $key; ?></td>
										<!--<td><?php /*echo get_name_by_auto_id( 'oe_doc_master', $value->doc_id, 'reg_no' ); */ ?></td>-->
										<td><?php echo get_name_by_auto_id( 'oe_doc_master', $value->doc_id ); ?></td>
										<td class="text-center"><?php echo get_name_by_auto_id( 'sif_faculty', $value->faculty_id, 'faculty_name' ); ?></td>
										<td class="text-center"><?php echo get_name_by_auto_id( 'sif_subject', $value->subject_id, 'subject' ); ?></td>
										<td class="text-center"><?php echo get_name_by_auto_id( 'sif_exam_category', $value->exam_type_id, 'exam_category_name' ); ?></td>
										<td class="text-center"><?php echo get_name_by_auto_id( 'oe_exam', $value->exam_id, 'exam_name' ); ?></td>
										<td class="text-center"><?php echo $value->duration; ?> Minutes</td>
										<td class="text-center"><?php echo $value->final_mark; ?></td>
										<td class="text-center"><?php echo $value->correct_mark; ?></td>
										<td class="text-center"><?php echo $value->wrong_mark; ?></td>
										<td class="text-center"><?php echo get_highest_mark( $value->exam_id ); ?></td>
										
										<!--<td class="text-center"><?php echo $value->exam_type_pos; ?></td>-->
										<td> <!--new-->
	                                        <?php 
	                                            $sql="SELECT * FROM oe_doc_exams WHERE status = '1' AND subject_id = '$value->subject_id' GROUP BY doc_id ORDER BY final_mark DESC";
	                                            $query = $this->db->query($sql);
	                                            if ($query->num_rows() > 0) {
	                                                $sl=1;
	                                                foreach ($query->result() as $row) {
	                                                    $sop=0;
	                                                    if ($row->doc_id == $value->doc_id) {
	                                                        echo $sop = $sl;
	                                                    }
	                                                $sl=$sl+1;
	                                                }
	                                            }
	                                        ?>
	                                    </td>
	                                    
										<td class="text-center"><?php echo $value->subject_pos; ?></td>
										<td class="text-center"><span class="badge"><?php echo user_formated_date( $value->created_at ); ?></span></td>
										<td class="text-center"><?php echo user_formated_time( $value->start_time ) . " - " . user_formated_time( $value->end_time ); ?></td>
										<td class="text-center">
											<?php
											$class = 'default';
											if ( $value->status == 1 ) {
												$class = "success";
											} elseif ( $value->status == 0 ) {
												$class = "danger";
											} elseif ( $value->status == 8 ) {
												$class = "warning";
											} elseif ( $value->status == 9 ) {
												$class = "info";
											} ?>
											<span class="label label-<?= $class ?>"><?= exam_status( $value->status ); ?></span>
										</td>
										<td class="text-center">
											<?php if ( $value->status == 1 ): ?>
												<a href="<?= site_url( "applicant/exam-result/{$value->id}" ) ?>" class="btn btn-xs btn-primary m-bot5">View Result</a>
												<a href="<?= site_url( "applicant/exam-answer/{$value->id}" ) ?>" class="btn btn-xs btn-warning">Answer Details</a>
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
						
						<?= $links; ?>
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
