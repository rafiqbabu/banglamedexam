<?php
$this->load->view( 'header/view_header' );
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<!--Search-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel panel-info">
					<header class="panel-heading">
						Search Wizard
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
								  action="<?php echo current_url(); ?>">
								
								<div class="form-group ">
									
									<label for="Name" class="control-label col-lg-2">Date Range</label>
									<div class="col-lg-4">
										<div class="input-group">
											<input type="text" class="form-control datepicker" name="from_date_time">
											<span class="input-group-addon">To</span>
											<input type="text" class="form-control datepicker" name="to_date_time">
										</div>
									</div>
									
									<div class="col-lg-2">
										<button class="btn btn-primary" type="submit">Search</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!--End Search-->
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel panel-info">
					<header class="panel-heading">
						News/Events <span class="badge"><?= $total_rows; ?></span>
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
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
						
						<div class="text-right m-bot15">
							<a href="<?= site_url( 'setting/add_exam_news' ) ?>" class="btn btn-success">Add News/Events</a>
						</div>
						
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th width="40%">Title</th>
								<th width="40%">Details</th>
								<th width="10%">Date</th>
								<th width="5%">Status</th>
								<th width="5%">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( !empty( $record ) ) {
								
								foreach ( $record as $key => $value ) {
									?>
									<tr>
										<td><?= ( ++$key ); ?></td>
										<td><?php echo word_limiter( $value->news_title, 15 ); ?></td>
										<td><?php echo word_limiter( strip_tags( $value->news_details ), 30 ); ?></td>
										<td><?php echo user_formated_datetime( $value->created_at ); ?></td>
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
											<a href="<?php echo site_url( "news-details/$value->id" ); ?>" class="btn btn-primary btn-xs" title="View Details" target="_blank" data-toggle="tooltip"
											   data-placement="top">
												<i class="glyphicon glyphicon-zoom-in"></i> Details
											</a>
											<a href="<?php echo site_url( "setting/edit_exam_news/$value->id" ); ?>" class="btn btn-warning btn-xs" title="Edit" data-toggle="tooltip"
											   data-placement="top">
												<i class="glyphicon glyphicon-edit"></i> Edit
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
