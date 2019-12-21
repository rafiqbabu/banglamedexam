<?php $this->load->view( 'header/email_header' ); ?>

<table class="table table-bordered">
	<tbody>
	<tr>
		<td>Date</td>
		<td><?= user_formated_datetime( $purchase->created_at ); ?></td>
		<td>Exams</td>
		<td class="text-center">
			<span class="label label-info"><?= $purchase->exam_count; ?></span>
		</td>
		<td>Status</td>
		<td>
			<?php if ( $purchase->payment_status == 1 ) {
				echo '<label class="label label-success">Paid</label>';
			} else {
				echo '<label class="label label-warning">Unpaid</label>';
			} ?>
		</td>
	</tr>
	<tr>
		<td>Cost BDT</td>
		<td><?= $purchase->final_cost_bdt; ?></td>
		<td>Cost USD</td>
		<td><?= $purchase->final_cost_usd; ?></td>
		<td>Discount</td>
		<td><?= $purchase->discount; ?>%</td>
	</tr>
	<tr>
		<td>Trans ID</td>
		<td><?= $purchase->trans_id; ?></td>
		<td>Currency</td>
		<td><?= $purchase->currency; ?></td>
		<td>Amount Paid</td>
		<td><?= $purchase->amount_paid; ?></td>
	</tr>
	</tbody>
</table>

<?php if ( $purchase->exams ) : ?>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>Exam Type</th>
			<th>Exam Name</th>
			<th>Subject</th>
			<th>Duration</th>
			<th>Status</th>
		</tr>
		</thead>
		
		<tbody>
		<?php foreach ( $purchase->exams as $exam ) : ?>
			<tr>
				<td><?= get_name_by_id( 'sif_exam_category', $exam->exam_type_id, 'id', 'exam_category_name' ) ?></td>
				<td><?= get_name_by_id( 'oe_exam', $exam->exam_id, 'id', 'exam_name' ) ?></td>
				<td><?= get_name_by_id( 'sif_subject', $exam->subject_id, 'id', 'subject' ) ?></td>
				<td class="text-center"><?= $exam->duration; ?> Min</td>
				<td class="text-center">
					<?php
					$class = 'default';
					if ( $exam->status == 1 ) {
						$class = "warning";
					} elseif ( $exam->status == 0 ) {
						$class = "danger";
					} elseif ( $exam->status == 8 ) {
						$class = "info";
					} elseif ( $exam->status == 9 ) {
						$class = "success";
					} ?>
					<label class="label label-<?= $class ?>"><?= exam_status( $exam->status ); ?></label>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>


<?php $this->load->view( 'footer/email_footer' ); ?>
