<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'm/d/Y' );
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel panel-info">
					<header class="panel-heading">
						Operation Logs <span class="badge bg-primary"><?= $total_rows; ?></span>
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<form class="cmxform form-horizontal " id="commentForm" role="form" method="get" action="<?php echo current_url(); ?>">
							<div class="form-group ">
								<div class="col-md-3">
									<input type="text" class="form-control" name="title" placeholder="IP / Statement / Name">
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="text" class="form-control datepicker" name="from" placeholder="Date From">
										<span class="input-group-addon">To</span>
										<input type="text" class="form-control datepicker" name="to" placeholder="Date To">
									</div>
								</div>
								
								<div class="col-md-2">
									<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
								</div>
							</div>
						</form>
						
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th width="10%">IP</th>
								<th width="10%">Statement</th>
								<th width="10%">Datetime</th>
								<th width="50%">Query</th>
								<th width="10%">Admin Name</th>
								<th width="10%">User Name</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( $logs ) {
								//$log_all = array();
								foreach ( $logs as $key => $log ) {
									$key++;
									?>
									<tr>
										<td><?= $key; ?></td>
										<td><?php echo $log->ip; ?></td>
										<td><?php echo $log->statement; ?></td>
										<td class="text-center">
											<?php echo user_formated_datetime( $log->datetime ); ?>
										</td>
										<td>
											<!-- Button trigger modal -->
											<a href="#" class="btn-link" data-toggle="modal" data-target="#myModal-<?= $key; ?>">
												<?php echo character_limiter( base64_decode( $log->query, TRUE ), 50 ); ?>
											</a>
											
											<!-- Modal -->
											<div class="modal fade" id="myModal-<?= $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Query</h4>
														</div>
														<div class="modal-body">
															<?= base64_decode( $log->query, TRUE ); ?>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td><?php echo $log->admin_name; ?></td>
										<td><?php echo $log->user_name; ?></td>
									</tr>
									<?php
								}
							} else {
								echo '<tr><td colspan="9" align="center">No Data Available</td></tr>';
							}
							?>
							</tbody>
						</table>
						<?php echo $links; ?>
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
