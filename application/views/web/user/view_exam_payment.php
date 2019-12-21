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
						<h4 class="widget-title"><?= $page_title . ( $purchase->package_ids ? " - " . get_package_names( $purchase->package_ids ) : NULL ); ?> <span></span></h4>
						<table class="table default">
							<thead>
							<tr>
								<th>Date</th>
								<th>Exam Count</th>
								<th class="text-center" colspan="2">Cost</th>
								<th>Payment Status</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><?= user_formated_datetime( $purchase->created_at ); ?></td>
								<td class="text-center"><?= $purchase->exam_count; ?></td>
								<td class="text-center">৳ <?= number_format( $purchase->cost_bdt, 2 ); ?></td>
								<td class="text-center">$ <?= number_format( $purchase->cost_usd, 2 ); ?></td>
								<td class="text-center">
									<?php if ( $purchase->payment_status == 1 ) {
										echo '<label class="label label-success">Paid</label>';
									} else {
										echo '<label class="label label-warning">Unpaid</label>';
									} ?>
								</td>
							</tr>
							<?php if ( $purchase->discount ): ?>
								<tr>
									<td class="text-center" colspan="2">After Discount (<?= $purchase->discount; ?>%)</td>
									<td class="text-center">৳ <?= number_format( $purchase->final_cost_bdt, 2 ); ?></td>
									<td class="text-center">$ <?= number_format( $purchase->final_cost_usd, 2 ); ?></td>
									<td class="text-center"></td>
								</tr>
							<?php endif; ?>
							</tbody>
						</table>
						
						<?php if ( $purchase->discount == 100 ) : ?>
							<a href="<?= site_url( "user/{$id}/process-free-payment/{$pid}" ); ?>" class="btn bg-green btn-lg btn-block">Proceed</a>
						<?php endif; ?>
						
						<?php if ( $purchase->payment_status != 1 && $purchase->discount < 100 ): ?>
							
							<?= form_open( site_url( "user/{$id}/process-payment/{$pid}" ), 'class="edit-profile form-horizontal"' ); ?>
							<div class="row payment">
								<!-- Column -->
								<div class="col-md-12  margin-top">
									<h4 class="widget-title">Billing Information<span></span></h4>
									
									<div class="form-group payable">
										<label for="payable" class="control-label col-md-3">Payable Amount</label>
										<div class="col-md-3">
											<div class="input-group">
												<span class="input-group-addon">৳</span>
												<?php $amount = number_format( $purchase->final_cost_bdt, 2 ); ?>
												<?= form_input( 'payable', $amount, ['class' => 'form-control amount', 'disabled' => 'disabled'] ); ?>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="currency" class="control-label col-md-3">Currency <span class="jnn-important">*</span></label>
										<div class="col-md-3">
											<?= form_dropdown( 'currency', $currency_list, 'BDT', ['class' => 'form-control', 'id' => 'currency', 'required' => 'required', 'data-id' => $pid] ); ?>
										</div>
									</div>
									
									<input type="hidden" name="email" value="<?php echo $user->email; ?>">
									<input type="hidden" name="phone" value="<?php echo $user->phone; ?>">
									
									<?= form_hidden( 'address_1', $address ? $address->address : NULL, ['class' => 'form-control', 'id' => 'address_1'] ); ?>
									<?= form_hidden( 'address_2', $address ? $address->address_2 : NULL, ['class' => 'form-control', 'id' => 'address_2'] ); ?>
									<?= form_hidden( 'district', $address ? $address->district : NULL, ['class' => 'form-control', 'id' => 'division'] ); ?>
									<?= form_hidden( 'division', $address ? $address->division : NULL, ['class' => 'form-control', 'id' => 'district'] ); ?>
									<?= form_hidden( 'postcode', NULL, ['class' => 'form-control', 'id' => 'postcode'] ); ?>
									<!--<?= form_dropdown( 'country', $countries, 'bd', ['class' => 'form-control', 'id' => 'country'] ) ?>-->
									
									
								<!--
									<div class="form-group">
										<label for="email" class="control-label col-md-3">Email <span class="jnn-important">*</span></label>
										<div class="col-md-6">
											<?= form_input( ['name' => 'email', 'type' => 'email', 'class' => 'form-control', 'id' => 'email', 'value' => $user->email] ); ?>
										</div>
									</div>
									
									<div class="form-group">
										<label for="phone" class="control-label col-md-3">Phone <span class="jnn-important">*</span></label>
										<div class="col-md-6">
											<?= form_input( ['name' => 'phone', 'type' => 'tel', 'class' => 'form-control', 'id' => 'phone', 'value' => $user->phone] ); ?>
										</div>
									</div>
									
									<div class="form-group">
										<label for="address_1" class="control-label col-md-3">Address (Line 1) </label>
										<div class="col-md-6">
											<?= form_input( 'address_1', $address ? $address->address : NULL, ['class' => 'form-control', 'id' => 'address_1'] ); ?>
										</div>
									</div>
									
									<div class="form-group">
										<label for="address_2" class="control-label col-md-3">Address (Line 2)</label>
										<div class="col-md-6">
											<?= form_input( 'address_2', $address ? $address->address_2 : NULL, ['class' => 'form-control', 'id' => 'address_2'] ); ?>
										</div>
									</div>
									
									<div class="form-group">
										<label for="division" class="control-label col-md-3">City / District</label>
										<div class="col-md-6">
											<?= form_input( 'district', $address ? $address->district : NULL, ['class' => 'form-control', 'id' => 'division'] ); ?>
										</div>
									</div>
									
									<div class="form-group">
										<label for="district" class="control-label col-md-3">State / Division</label>
										<div class="col-md-6"><?= form_input( 'division', $address ? $address->division : NULL, ['class' => 'form-control', 'id' => 'district'] ); ?>
										</div>
									</div>
									
									<div class="form-group">
										<label for="postcode" class="control-label col-md-3">Postcode</label>
										<div class="col-md-6"><?= form_input( 'postcode', NULL, ['class' => 'form-control', 'id' => 'postcode'] ); ?>
										</div>
									</div>
									
									<div class="form-group">
										<label for="country" class="control-label col-md-3">Country </label>
										<div class="col-md-6">
											<?= form_dropdown( 'country', $countries, 'bd', ['class' => 'form-control', 'id' => 'country'] ) ?>
										</div>
									</div>
								-->
								
								
								</div><!-- Column -->
								
								<div class="col-md-3 col-md-offset-3">
									<!-- Button -->
									<button class="btn bg-green btn-lg btn-block" type="submit" onclick="submit_form(this, event)">
										Proceed
									</button>
								</div>
							</div>
							<?= form_close(); ?>
						
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
