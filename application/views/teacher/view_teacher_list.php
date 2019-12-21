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
						Search Wizard - Teacher
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
								  action="<?php echo base_url() . 'teacher/records'; ?>">
								
								<div class="form-group ">
									<label for="Name" class="control-label col-lg-2">Teacher Name</label>
									<div class="col-lg-4">
										<input class=" form-control" id="teacher_name" name="tec_name" type="text"/>
									</div>
									<label for="Name" class="control-label col-lg-2">Subject</label>
									<div class="col-lg-4">
										<?php
										$ddp = 'class="form-control m-bot15"';
										echo form_dropdown( 'subject_id', $subject_list, '', $ddp );
										?>
									</div>
								</div>
								
								<div class="form-group ">
									<label for="Name" class="control-label col-lg-2">Date Range</label>
									<div class="col-lg-4">
										<div class="input-group input-large" data-date="<?php echo $current_date; ?>"
											 data-date-format="mm/dd/yyyy">
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
						Teacher List
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
								<th>Teacher ID</th>
								<th>Username</th>
								<th>Password</th>
								<th>Teacher Name</th>
								
								<th>Courses</th>
								<!--                                <th>Faculties</th>-->
								<!--                                <th>Subjects</th>
                                                                <th>Topics</th>-->
								<th>Cell No</th>
								<th>Contact Person Name/Mobile</th>
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
										<td><?php echo $value->teacher_id; ?></td>
										<td><?php echo get_teacher_login_info( $value->teacher_id, 'username' ); ?></td>
										<td><?php echo get_teacher_login_info( $value->teacher_id, 'password_view' ); ?></td>
										<td><?php echo $value->tec_name; ?></td>
										
										<td><?php echo implode( ', ', $value->courses ); ?></td>
										<!--<td><?php /*echo implode(', ', $value->faculties);*/ ?></td>-->
										<!--                                        <td><?php //echo implode(', ', $value->subjects);?></td>
                                        <td><?php// echo implode(', ', $value->topics);?></td>-->
										<td>88<?php echo $value->mobile; ?></td>
										<td>
											<?php
											$mob = $value->pouse_mobile ? '88' . $value->pouse_mobile : '';
											echo $value->spouse_name . '<br>' . $mob;
											?>
										</td>
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
											<a href="<?php echo base_url() . 'teacher/profile/' . $value->id; ?>"
											   class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-zoom-in"></i> Details</a>
											<a href="<?php echo base_url() . 'teacher/edit/' . $value->id; ?>"
											   class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
										</td>
									</tr>
									<?php
								}
							} else {
								echo '<tr><td colspan="11" align="center">No Data Available</td></tr>';
							}
							?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
			<?php echo $links; ?>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->
<?php
$this->load->view( 'footer/view_footer' );
?>
