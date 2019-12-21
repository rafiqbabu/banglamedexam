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
						
						<h4 class="widget-title"><?= $page_title; ?> <span></span></h4>
						
						<div class="panel-group accordion" id="exm-accrd" role="tablist" aria-multiselectable="true">
							<?php if ( $purchases ) : ?>
								<?php foreach ( $purchases as $k => $purchase ) : ?>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="heading<?= $k; ?>">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#exm-accrd" href="#exam-pur-<?= $k; ?>" aria-expanded="<?= $k != 0 ? 'true' : 'false' ?>"
												   aria-controls="exam-pur-<?= $k; ?>" class="<?= $k != 0 ? 'collapsed' : '' ?>">
													<?= $purchase->pi_no; ?>
													-
													<?= "Date: " . user_formated_datetime( $purchase->created_at ); ?>
													-
													<?= get_name_by_id( 'sif_subject', $purchase->subject_id, 'id', 'subject' ) ?>
													-
													<?php if ( $purchase->payment_status == 1 ) {
														echo '<label class="label label-success">Paid</label>';
													} else {
														echo '<label class="label label-warning">Unpaid</label>';
													} ?>
												</a>
											</h4>
										</div>
										<div id="exam-pur-<?= $k; ?>" class="panel-collapse collapse <?= $k == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?= $k; ?>">
											<div class="panel-body">
												<?php if ( $purchase->payment_status != 1 ) : ?>
													<div class="text-right">
														<a href="<?= site_url( "user/$id/exam-payment/{$purchase->id}" ) ?>" class="btn">Pay Now</a>
													</div>
												<?php endif; ?>
												<table class="table default">
													<tbody>
													<tr>
														<td><b>Date</b></td>
														<td><?= user_formated_datetime( $purchase->created_at ); ?></td>
														<td><b>Exams</b></td>
														<td class="text-center">
															<span class="label label-info"><?= count( $purchase->exams ); ?></span>
														</td>
														<td><b>Status</b></td>
														<td>
															<?php if ( $purchase->payment_status == 1 ) {
																echo '<label class="label label-success">Paid</label>';
															} else {
																echo '<label class="label label-warning">Unpaid</label>';
															} ?>
														</td>
													</tr>
													<tr>
														<td><b>Cost BDT</b></td>
														<td><?= $purchase->final_cost_bdt; ?></td>
														<td><b>Cost USD</b></td>
														<td><?= $purchase->final_cost_usd; ?></td>
														<td><b>Discount</b></td>
														<td><?= $purchase->discount; ?>%</td>
													</tr>
													<tr>
														<td><b>Trans ID</b></td>
														<td><?= $purchase->trans_id; ?></td>
														<td><b>Currency</b></td>
														<td><?= $purchase->currency; ?></td>
														<td><b>Amount Paid</b></td>
														<td><?= $purchase->amount_paid; ?></td>
													</tr>
													</tbody>
												</table>
												
												<?php if ( $purchase->exams ) : ?>
													<table class="table default">
														<thead>
														<tr>
															<th>#</th>
															<th>Exam Type</th>
															<th>Exam Name</th>
															<?php if ( $purchase->exams[0]->package_id ) {
																echo "<th>Package</th>";
															} ?>
															<th>Subject</th>
															<th>Duration</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
														</thead>
														
														<tbody>
														<?php foreach ( $purchase->exams as $k => $exam ) : ?>
															<tr>
																<td><?= ( ++$k ); ?></td>
																<td><?= get_name_by_id( 'sif_exam_category', $exam->exam_type_id, 'id', 'exam_category_name' ) ?></td>
																<td><?= get_name_by_id( 'oe_exam', $exam->exam_id, 'id', 'exam_name' ) ?></td>
																<?php if ( $exam->package_id ): ?>
																	<td><?= get_name_by_id( 'oe_package', $exam->package_id ) ?></td>
																<?php endif; ?>
																<td><?= get_name_by_id( 'sif_subject', $exam->subject_id, 'id', 'subject' ) ?></td>
																<td class="text-center"><?= $exam->duration; ?> Min</td>
																<td class="text-center">
																	<?= show_exam_status( $exam->status ); ?>
																</td>
																<td class="text-center">
																	<?php if ( $purchase->payment_status == 1 && $exam->status == 1 ): ?>
																		<?php if ( $exam->ans_open_timeout >= date( "Y-m-d H:i:s" ) ): ?>
																			<a href="<?= site_url( "exam-answer/{$exam->id}" ) ?>" class="btn btn-xs bg-blue">Ans. Details</a>
																		<?php endif; ?>
																		<a href="<?= site_url( "exam-result/{$exam->id}" ) ?>" class="btn btn-xs bg-yellow">View Result</a>
																	<?php endif; ?>
																	<?php if ( $purchase->payment_status == 1 && $exam->status == 9 ): ?>
																		<a href="<?= site_url( "exam-prompt/{$exam->id}" ) ?>" class="btn btn-xs bg-green">Start Exam</a>
																	<?php endif; ?>
																</td>
															</tr>
														<?php endforeach; ?>
														</tbody>
													</table>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<hr>
								<div class="text-center"><?= $links; ?></div>
							
							<?php else: ?>
								<h3 class="text-warning">You haven't purchased any exam.</h3>
							<?php endif; ?>
						</div><!-- Tab -->
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
