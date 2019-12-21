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
						Applicants List
						<span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                        </span>
					</header>
					<div class="panel-body">
						<form class="form-inline" role="form" method="get" action="<?php echo current_url(); ?>">
							<div class="form-group m-bot15 col-md-4">
								<?= form_input( 'q', '', ['class' => 'form-control', 'placeholder' => 'Name/Username/Reg No./Phone/BMDC No'] ) ?>
							</div>
							<div class="form-group col-md-4">
								<button type="submit" class="btn btn-primary">Search</button>
							</div>
						</form>
						<div class="clearfix"></div>
						<hr>
						<p>Total Applicants: <span class="badge bg-info"><?= $total_rows; ?></span></p>
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Reg No.</th>
								<th>Name</th>
								<th>Email/Username</th>
								<th>Phone</th>
								<th width="10%">BMDC No.</th>
								<th>Password</th>
								<th>Photos</th>
								<th>Status</th>
								<th width="180">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( !empty( $applicants ) ) {
								
								foreach ( $applicants as $key => $value ) {
									$key++;
									?>
									<tr>
										<td><?php echo $value->id; ?></td>
										<td><?php echo $value->reg_no; ?></td>
										<td><?php echo $value->name; ?></td>
										<td><?php echo $value->username; ?></td>
										<td><?php echo $value->phone; ?></td>
										<td><?php echo $value->bmdc_no; ?></td>
										<td><?php echo $value->pass_view; ?></td>
										<td class="text-center">
											<?php if ( $value->photo && file_exists( $value->photo ) ) {
												$photo = $value->photo;
											} elseif ( $value->gender == 2 ) {
												$photo = 'images/doc-f.png';
											} else {
												$photo = 'images/doc-m.png';
											}
											?>
											<img src="<?php echo base_url( $photo ); ?>" alt="<?php echo $value->name; ?>" class="img-thumbnail" width="60" height="60">
										</td>
										<td class="text-center">
											<?php
											if ( $value->status == '1' ) {
												echo '<span class="label label-success">Active</span>';
											} else {
												echo '<span class="label label-warning">Inactive</span>';
											}
											?>
										</td>
										<td>
											<a href="<?= site_url( "applicant/show/{$value->id}" ) ?>" class="btn btn-success btn-xs" title="View Applicant" data-toggle="tooltip" data-placement="top">
												<i class="glyphicon glyphicon-zoom-in"></i> Details
											</a>
											
											<!--new-->
											<a href="<?= site_url( "applicant/update_pass/{$value->id}" ) ?>" class="btn btn-success btn-xs" title="Change Password" data-toggle="tooltip" data-placement="top">
												<i class="glyphicon glyphicon-edit"></i> Edit Pass
											</a>
											
											
											<a href="<?= site_url( "notice/create/{$value->id}" ) ?>" class="btn btn-warning btn-xs" title="Send Notice" data-toggle="tooltip" data-placement="top">
												<i class="glyphicon glyphicon-bell"></i> Send Notice
											</a>
											
											<!--new-->
											<a href="<?= site_url( "applicant/give_coupon/{$value->id}" ) ?>" class="btn btn-danger btn-xs" title="Give Coupon" data-toggle="tooltip" data-placement="top">
												 Coupon
											</a>
											
											
											<a href="<?= site_url( "applicant/purchased_exam/{$value->id}" ) ?>" class="btn btn-primary btn-xs" title="Purchased Exams" data-toggle="tooltip"
											   data-placement="top">
												<i class="glyphicon glyphicon-list-alt"></i> Purchased Exams
											</a>
											<a href="<?= site_url( "applicant/purchased_packages/{$value->id}" ) ?>" class="btn btn-danger btn-xs" title="Purchased Packages" data-toggle="tooltip"
											   data-placement="top">
												<i class="glyphicon glyphicon-list-alt"></i> Purchased Packages
											</a>
										</td>
									</tr>
									<?php
								}
							} else {
								echo '<tr><td colspan="7" align="center">No Data Available</td></tr>';
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
