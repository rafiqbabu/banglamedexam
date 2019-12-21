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
						User List
						<span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                        </span>
					</header>
					<div class="panel-body">
						
						<div class="clearfix"></div>
						<hr>
						<p>User List <a href="#" style="background-color:skyblue; padding:6px; border-radius:10px; margin-left:20px;">Add New User</a>  <span class="badge bg-info"></span></p>
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Email/Username</th>
								<th>Password</th>
								<th width="70">Status</th>
								<th width="180">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( !empty( $all_user ) ) {
								
								foreach ( $all_user as $key => $value ) {
									$key++;
									?>
									<tr>
										<td><?= $key; ?></td>
										<td><?php echo $value->first_name." ".$value->last_name; ?></td>
										<td><?php echo $value->phone; ?></td>
										<td><?php echo $value->username; ?></td>
										<td><?php echo $value->password_view; ?></td>
										
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
											<a href="<?= site_url( "applicant/user_role/{$value->id}" ) ?>" class="btn btn-success btn-xs" title="Set Roll" data-toggle="tooltip" data-placement="top">
												<i class="glyphicon glyphicon-edit"></i> Set Role
											</a>
											<!--new-->
											<a href="<?= site_url( "applicant/update_userr/{$value->id}" ) ?>" class="btn btn-success btn-xs" title="Update" data-toggle="tooltip" data-placement="top">
												<i class="glyphicon glyphicon-edit"></i> Change
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
