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
						Slider List
						<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
					</header>
					<div class="panel-body">
						<?php
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
							<a href="<?= site_url( 'slider/create' ) ?>" class="btn btn-success">Create Slider</a>
						</div>
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>Slider Title</th>
								<th>SL</th>
								<th>Description</th>
								<th>Image</th>
								<th>Link</th>
								<th>Created</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if ( $sliders ) {
								//$value_all = array();
								foreach ( $sliders as $key => $value ) {
									$key++;
									?>
									<tr>
										<td><?= $key; ?></td>
										<td><?= $value->title; ?></td>
										<td class="text-center"><?= $value->sl; ?></td>
										<td><?= $value->desc; ?></td>
										<td>
											<a href="<?= base_url( $value->image ); ?>" target="_blank">
												<img src="<?= base_url( $value->image ); ?>" alt="Slider Image" class="img-thumbnail" width="200">
											</a>
										</td>
										<td class="text-center">
											<?php if ( $value->link ): ?>
												<a href="<?= prep_url( $value->link ); ?>" class="btn btn-info btn-xs" target="_blank">Visit Link</a>
											<?php endif; ?>
										</td>
										<td class="text-center">
											<?= user_formated_datetime( $value->created_at ); ?>
										</td>
										<td class="text-center">
											<?php if ( $value->status == 1 ) {
												echo "<label class='label label-success'>Active</label>";
											} else {
												echo "<label class='label label-warning'>Inactive</label>";
											} ?>
										</td>
										<td class="text-center">
											<a href="<?= site_url( "slider/edit/$value->id" ); ?>"
											   class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
											</a>
										</td>
									</tr>
									<?php
								}
							} else {
								echo '<tr><td colspan="8" align="center">No Data Available</td></tr>';
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
