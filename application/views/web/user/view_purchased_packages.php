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
						
						<!--
						<?php
						    $id = $this->session->userdata( 'user' )->id;
						    $sql = "SELECT * FROM oe_exam WHERE id = '8189' AND free_exam = '1' AND status = '1' ";
                            $query = $this->db->query($sql);
                                if ($query->num_rows() > 0) {
                                    
                                    foreach ($query->result() as $row) {
                                        
                                        $sql = "SELECT * FROM oe_doc_exams WHERE exam_id = '8189' AND doc_id = '$id' AND status = '1' ";
                                        $query = $this->db->query($sql);
                                        if ($query->num_rows() > 0) {
                                            echo "<a href='#' style='font-size:30px; color:Orange;'>Free Exam : {$row->exam_name}</a><br><font color=red>(You Have Completed This Exam)</font>";
                                            $enn=$row->exam_name;  
                                                                                if (!empty($enn)){
    																			$enn = str_replace("'", "\'", $enn);
    																			$sql="SELECT * FROM solve_vdo WHERE e_name = '$enn' ORDER BY id DESC LIMIT 1";
    											    							$query = $this->db->query($sql);
    											    							foreach ($query->result() as $rowv) {
    											    								if ( $rowv->sts=1) {
    											    								    echo "<br><button type='button' class='btn btn-primary btn-xs' style='background-color:green' data-toggle='modal' data-target='#myModal_{$rowv->id}'>Solution Video</button>";
    											    								    echo "
    											    								    <div class='modal fade' id='myModal_{$rowv->id}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                                                                                            <div class='modal-dialog' role='document'>
                                                                                                <div class='modal-content'>
                                                                                                    <div class='modal-header'>
                                                                                                        <h4 class='modal-title' id='myModalLabel'>Solution Class</h4>
                                                                                                    </div>
                                                                                                    <div class='modal-body'>
                                                                <iframe width='100%' height='315' src='{$rowv->url}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                                                                                                    </div>
                                                                                                    <div class='modal-footer'>
                                                                                                        <button type='button' class='btn btn-sm bg-red' data-dismiss='modal'>Close</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
    											    								    ";
    											    								    echo "<br><br>";
    											    								}
    											    							}
						                                                        }
                                                                                
                                        } else {
                                            $enn=$row->exam_name;
						                    echo "<a href='".site_url( "free-exam/{$row->id}" )."' style='font-size:30px; color:#FFFFFF; border: 2px green solid; padding:10px; background-color:Skyblue;'>Free Exam</a>";
						                    //echo " Solution Video";
                                        }
						                
                                    }
                                }
                        ?>
                        -->                                              
						
						
						<div class="panel-group accordion" id="exm-accrd" role="tablist" aria-multiselectable="false" style="margin-top:10px;">
							<?php if ( $purchases ) : ?>
								<?php foreach ( $purchases as $k => $purchase ) : ?>
									<div class="panel panel-default">
																				
										<div class="panel-heading" role="tab" id="heading<?= $k; ?>">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#exm-accrd" href="#exam-pur-<?= $k; ?>" aria-expanded="<?= $k != 0 ? 'false' : 'false' ?>"
												   aria-controls="exam-pur-<?= $k; ?>" class="<?= $k != 0 ? 'collapsed' : '' ?>">
													
													<!--<?= "Date: " . user_formated_datetime( $purchase->created_at ); ?>-->
													<?php echo get_package_names($purchase->package_ids); ?> 
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
												
												<table class="table default">
													<tbody>
													<tr>
														<td>
															<b>Date</b> : <?= user_formated_datetime( $purchase->created_at )?><br>
															<b>Exams</b> : <span class="label label-info"><?= count( $purchase->exams ); ?></span><br>
															<!--
															<b>Status</b> : <?php if ( $purchase->payment_status == 1 ) {
																				echo '<label class="label label-success">Paid</label>';
																			} else {
																				echo '<label class="label label-warning">Unpaid</label>';
																			} ?><br>
															-->
															<b>Cost</b> : BDT <?= $purchase->final_cost_bdt; ?> & USD <?= $purchase->final_cost_usd; ?><br>
															<b>Discount</b> : <?= $purchase->discount; ?>%<br>
															<b>Trans ID</b> : <?= $purchase->trans_id; ?><br>
															<b>Currency</b> : <?= $purchase->currency; ?><br>
															<b>Amount Paid</b> : <?= $purchase->amount_paid; ?>
														</td>
													</tr>
													</tbody>
												</table>
												
												<?php if ( $purchase->exams ) : ?>
													<table class="table default">
														<thead>
														<tr>
															<th>#</th>
															<!--<th>Exam Type</th>-->
															<!--<th>Package Name</th>-->
															<th>Exam Details</th>
															<!--<th>Subject</th>-->
															<!--<th>Duration</th>-->
															<th>Status</th>
															<th>Action</th>
														</tr>
														</thead>
														
														<tbody>
														<?php

														 foreach ( $purchase->exams as $k => $exam ) :

														?>
															<tr>
																<td><?= ( ++$k ); ?></td>
																<!--<td><?= get_name_by_id( 'sif_exam_category', $exam->exam_id, 'id', 'exam_category_name' ) ?></td>-->
																<!--<td><?= $exam->package_name; ?></td>-->
																
																<td>
																	<?= $exam->exam_name; ?><br>
																	<span class="btn btn-xs bg-blue">Exam Type : <?= get_name_by_id( 'sif_exam_category', $exam->exam_id, 'id', 'exam_category_name' ) ?></span><br>
																	<span class="btn btn-xs bg-yellow">Subject : <?= get_name_by_id( 'sif_subject', $exam->subject_id, 'id', 'subject' ) ?></span><br>
																	<span class="btn btn-xs bg-green">Duration : <?= $exam->time; ?> Min</span>
																</td>

																<!--<td><?= get_name_by_id( 'sif_subject', $exam->subject_id, 'id', 'subject' ) ?></td>-->
																<!--<td class="text-center"><?= $exam->time; ?> Min</td>-->
																<td class="text-center">
																	<?= show_exam_status( $exam->de_status ); ?>
																</td>
																<td class="text-center">
																	
																	<?php if ( $purchase->payment_status == 1 && $exam->de_status == 1 ): ?>
																		
																		<!--
																		<?php if ( $exam->ans_open_timeout >= date( "Y-m-d H:i:s" ) ): ?>
																			<a href="<?= site_url( "exam-answer/{$exam->de_id}" ) ?>" class="btn btn-xs bg-blue">Ans. Details</a>
																		<?php endif; ?>
																		-->
																		<!--new -->
																		<?php
																			$sql="SELECT * FROM oe_package WHERE id = '$exam->package_id' ORDER BY id DESC LIMIT 1";
											    							$query = $this->db->query($sql);
											    							foreach ($query->result() as $row) {
											    								if ( $row->end_date >= date( "Y-m-d H:i:s" ) ){
											    									//echo $row->end_date;
											    						?>
											    									<a href="<?= site_url( "exam-answer/{$exam->de_id}" ) ?>" class="btn btn-xs bg-blue">Ans. Details</a>
											    						<?php 
											    								}
											    							}
											    						?>
											    						<!--new end-->
											    						
											    						
											    						<?php
																			// link for solutions video class
																			$en = $exam->exam_name;
																			$en = str_replace("'", "\'", $en);
																			$sql="SELECT * FROM solve_vdo WHERE e_name = '$en' AND sts = '1' ORDER BY id DESC LIMIT 1";
											    							$query = $this->db->query($sql);
											    							foreach ($query->result() as $rowv) {
											    								if ( $rowv->sts=1) {
											    								    echo "<br><button type='button' class='btn btn-primary btn-xs' style='background-color:green' data-toggle='modal' data-target='#myModal_{$rowv->id}'>Solution Video</button><br>";
											    								    echo "
											    								    <div class='modal fade' id='myModal_{$rowv->id}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                                                                                        <div class='modal-dialog' role='document'>
                                                                                            <div class='modal-content'>
                                                                                                <div class='modal-header'>
                                                                                                    <h4 class='modal-title' id='myModalLabel'>Solution Class</h4>
                                                                                                </div>
                                                                                                <div class='modal-body'>
                            <iframe width='100%' height='315' src='{$rowv->url}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                                                                                                </div>
                                                                                                <div class='modal-footer'>
                                                                                                    <button type='button' class='btn btn-sm bg-red' data-dismiss='modal'>Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
											    								    ";
											    								}
											    							}
											    					    ?>
											    						
											    						
																		<a href="<?= site_url( "exam-result/{$exam->de_id}" ) ?>" class="btn btn-xs bg-yellow">View Result</a>
																	<?php endif; ?>
																	
																	<?php if ( $purchase->payment_status == 1 && $exam->de_status == 9 || $exam->de_status == 8): ?>
																		<?php if ( $exam->de_id ): ?>
																			<a href="<?= site_url( "exam-prompt/{$exam->de_id}" ) ?>" class="btn btn-xs bg-green">Start Exam</a>
																		<?php else: ?>
																			<a href="<?= site_url( "package-exam/{$exam->id}/{$exam->package_id}/{$purchase->id}" ) ?>" class="btn btn-xs bg-green">Start Exam</a>
																		<?php endif; ?>
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
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->

































