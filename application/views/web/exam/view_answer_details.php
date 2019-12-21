<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey team-single">
		<!-- Container -->
		<div class="container">
			<!-- Page Content -->
			<div class="row exam-page">
				<div class="col-md-12">
					<div class="widget hidden-print">
						<?php echo $msg; ?>
						<h5 class="widget-title hidden-print">
							<?= $page_title; ?>
							<a href="<?= site_url( "exam-result/$exam->id" ) ?>" class="btn bg-green pull-right">View Result</a>
							<span></span>
						</h5>

						<table class="table default exam-qus-ans" >
							<?php foreach ( $data as $i => $row ) : ?>
								<tr>
									<!--
									<td width="10%"><strong>Q: <?= ( ++$i ); ?></strong></td>
									<td width="50%"><strong><?= $row['question']->question_name; ?></strong></td>
									<td class="t-blue" width="10%"><strong>Your Answer</strong></td>
									<td class="t-green" width="10%"><strong>Correct Answer</strong></td>
									<td class="" width="15%"><strong><i class="fa fa-check text-success"></i>/<i class="fa fa-close text-danger"></i></strong></td>
								    -->
								    
									<td><strong>Q: <?= ( ++$i ); ?></strong></td>
									<td><strong><?= strip_tags($row['question']->question_name); ?></strong></td>
									<td class="t-blue"><strong>Your Answer</strong></td>
									<td class="t-green"><strong>Correct Answer</strong></td>
									<td class=""><strong><i class="fa fa-check text-success"></i>/<i class="fa fa-close text-danger"></i></strong></td>
								
								
								</tr>

								<?php foreach ( $row['answers'] as $j => $answer ) : ?>
									<tr>
										<?php if ( $j == 0 ): ?>
											<td rowspan="<?= count( $row['answers'] ) ?>"><strong>Options</strong></td>
										<?php endif; ?>
										<td><?= $answer->index_seqn . ') ' . strip_tags($answer->ans) ?></td>
										<?php if ( $row['question']->type == 1 && $j == 0 ): ?>
											<td class="text-center t-blue" rowspan="5">
												<?= $ans = extract_qus_ans( $exam->answers, $row['question']->id, $answer->index_seqn ); ?>
											</td>
										<?php elseif ( $row['question']->type == 2 ) : ?>
											<td class="text-center t-blue">
												<?= $ans = extract_qus_ans( $exam->answers, $row['question']->id, $answer->index_seqn ); ?>
											</td>
										<?php endif; ?>
										<?php if ( $row['question']->type == 1 && $j == 0 ): ?>
											<td class="text-center t-green" rowspan="5"><?= $row['question']->correct_ans ?></td>

											<td class="text-center" rowspan="5">
												<?php
												if ( $ans ) {
													if ( $ans == $row['question']->correct_ans ) {
														echo '<i class="fa fa-check text-success"></i>';
													} else {
														echo '<i class="fa fa-close text-danger"></i>';
													}
												}
												?>
											</td>
										<?php elseif ( $row['question']->type == 2 ) : ?>
											<td class="text-center t-green"><?= $answer->correct_ans ?></td>
											<td class="text-center">
												<?php
												if ( $ans ) {
													if ( $ans == $answer->correct_ans ) {
														echo '<i class="fa fa-check text-success"></i>';
													} else {
														echo '<i class="fa fa-close text-danger"></i>';
													}
												}
												?>
											</td>
										<?php endif; ?>
									</tr>
								<?php endforeach; ?>
								<tr>
									<td><strong>Discussion</strong></td>
									<td colspan="4"><?= $row['question']->discussion; ?></td>
								</tr>
								<tr>
									<td><strong>Reference</strong></td>
									<td colspan="4"><?= $row['question']->reference; ?></td>
								</tr>
								<tr>
									<td colspan="5"><hr></td>
								</tr>
								
							<?php endforeach; ?>
						</table>
						
					</div>
				</div>
			</div>
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->
<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
