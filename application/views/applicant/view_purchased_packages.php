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
						<?= $page_title; ?>
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                            </span>
					</header>
					<div class="panel-body">
						<?php
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
						<div class="panel-group accordion" id="exm-accrd" role="tablist" aria-multiselectable="true">
							<?php if ( $purchases ) : ?>
								<?php foreach ( $purchases as $k => $purchase ) : ?>
									<div class="panel panel-success">
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
														<a href="<?= site_url( "user/$id/exam-payment/{$purchase->id}" ) ?>" class="btn">
															<i class="fa fa-money"></i>
															Pay Now
														</a>
													</div>
												<?php endif; ?>
												<table class="table table-bordered">
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
													<table class="table table-bordered">
														<thead>
														<tr>
															<th>#</th>
															<th>Exam Type</th>
															<th>Package Name</th>
															<th>Exam Name</th>
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
																<td><?= get_name_by_id( 'sif_exam_category', $exam->exam_id, 'id', 'exam_category_name' ) ?></td>
																<td><?= $exam->package_name; ?></td>
																<td><?= $exam->exam_name; ?></td>
																<td><?= get_name_by_id( 'sif_subject', $exam->subject_id, 'id', 'subject' ) ?></td>
																<td class="text-center"><?= $exam->time; ?> Min</td>
																<td class="text-center">
																	<?= show_exam_status( $exam->de_status ); ?>
																</td>
																<td class="text-center">
																	<?php if ( in_array( $exam->de_status, [8, 0] ) ): ?>
																		<a href="<?= site_url( "applicant/change-status/{$exam->de_id}/9" ) ?>" class="btn btn-xs btn-success m-bot5"
																		   onclick="return confirm('Are You SURE! You want to make this exam Open for the Applicant. Note: This Action cannot be reverted.')">
																			Make Open
																		</a>
																	<?php endif; ?>
																	<?php if ( $purchase->payment_status == 1 && $exam->de_status == 1 ): ?>
																		<a href="<?= site_url( "applicant/exam-result/{$exam->de_id}" ) ?>" class="btn btn-xs btn-primary">View Result</a>
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
								<h3 class="text-info">You haven't purchased any Package.</h3>
							<?php endif; ?>
						</div><!-- Tab -->
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
