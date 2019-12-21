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
						Search Wizard - Executive/Support Staff
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="cmxform form-horizontal " id="commentForm" role="form" method="post" action="<?php echo base_url() . 'executive/records'; ?>">

								<div class="form-group ">
									<label for="Name" class="control-label col-lg-2">Executive/Staff Name</label>
									<div class="col-lg-4">
										<input class=" form-control" id="teacher_name" name="name" type="text"/>
									</div>

								</div>

								<div class="form-group ">
									<label for="Name" class="control-label col-lg-2">Date Range</label>
									<div class="col-lg-4">
										<div class="input-group input-large" data-date="<?php echo $current_date; ?>" data-date-format="mm/dd/yyyy">
											<input type="text" class="form-control datepicker" name="from_date_time">
											<span class="input-group-addon">To</span>
											<input type="text" class="form-control datepicker" name="to_date_time">
										</div>
									</div>

								</div>

								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-2">
										<button class="btn btn-primary" type="submit">Search</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
		<?php
		if ( validation_errors() ) {
			echo validation_errors( '<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>' );
		}

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
		<div class="row">
			<div class="col-lg-12">
				<section class="panel panel-info">
					<header class="panel-heading">
						Executive/Support Staff List
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Executive/Staff ID/Username</th>
								<th>Password</th>
								<th>Designation</th>
								<th>Cell No</th>
								<th>Blood Group</th>
								<th>Joining Date</th>
								<th>Image</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( !empty( $rec ) ) {

								foreach ( $rec as $key => $value ) {
									?>
									<tr>
										<td><?php echo $key + 1; ?></td>
										<td><?php echo $value->name; ?></td>
										<td><?php echo $value->exe_stuff_id; ?></td>
										<td><?= get_teacher_login_info( $value->exe_stuff_id, 'password_view' ); ?></td>
										<td><?php echo $emp_type[$value->emp_type] ?></td>
										<td><?php echo $value->mobile; ?></td>
										<td><i class="text-danger"><?php echo $value->blood_gro; ?></i></td>
										<td><?php echo date( 'd-m-Y', strtotime( $value->joining_date ) ); ?></td>
										<td>
											<?php
											if ( $value->photo && file_exists( $value->photo ) ) {
												?>
												<img src="<?php echo base_url( $value->photo ); ?>" width="auto" height="50px">
												<?php
											} else {
												?>
												<img src="http://www.placehold.it/50x50/EFEFEF/AAAAAA&amp;text=no+image" alt="" width="auto" height="50px"/>
												<?php
											}
											?>
										</td>
										<td>
											<?php
											if ( $value->status == '1' ) {
												echo '<span class="label label-success">Active</span>';
											} else {
												echo '<span class="label label-warning">Inactive</span>';
											}
											?>
										</td>
										<td>
											<a href="<?php echo base_url() . 'executive/profile/' . $value->id; ?>" class="btn btn-primary btn-xs" title="View" data-toggle="tooltip"
											   data-placement="top"><i class="glyphicon glyphicon-zoom-in"></i> Details</a>
											<a href="<?php echo base_url() . 'executive/edit/' . $value->id; ?>" class="btn btn-warning btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i
													class="glyphicon glyphicon-edit"></i> Edit</a>
										</td>
									</tr>
									<?php
								}
							} else {
								echo '<tr><td colspan="11" align="center">No Data Available</td></tr>';
							}
							?>
							<tr>
								<td colspan="12">
									<?php echo $links; ?>
								</td>
							</tr>
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
