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
						<table class="table default table-bordered table-answer">
							<?php foreach ( $data as $i => $row ) : ?>
								<tr>
									<td width="10%"><strong>Q: <?= ( ++$i ); ?></strong></td>
									<td width="60%"><strong><?= $row['question']->question_name; ?></strong></td>
									<td class="t-blue" width="10%"><strong>Your Answer</strong></td>
									<td class="t-green" width="10%"><strong>Correct Answer</strong></td>
									<td class="" width="10%"><strong><i class="glyphicon glyphicon-ok text-success"></i>/<i class="glyphicon glyphicon-remove text-danger"></i></strong></td>
								</tr>
								
								<?php foreach ( $row['answers'] as $j => $answer ) : ?>
									<tr>
										<?php if ( $j == 0 ): ?>
											<td rowspan="<?= count( $row['answers'] ) ?>"><strong>Options</strong></td>
										<?php endif; ?>
										<td width="65%"><?= $answer->index_seqn . ') ' . $answer->ans ?></td>
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
														echo '<i class="glyphicon glyphicon-ok text-success"></i>';
													} else {
														echo '<i class="glyphicon glyphicon-remove text-danger"></i>';
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
														echo '<i class="glyphicon glyphicon-ok text-success"></i>';
													} else {
														echo '<i class="glyphicon glyphicon-remove text-danger"></i>';
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
									<td colspan="5"></td>
								</tr>
							<?php endforeach; ?>
						</table>
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
