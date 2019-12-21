<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Page List</div>
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
						
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Details</th>
								<th width="10%">Created</th>
								<th width="10%">Status</th>
								<th width="10%">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php if ( $rec ) : foreach ( $rec as $i => $row ) : ?>
								<tr>
									<td><?php echo( $i + 1 ); ?></td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->slug; ?></td>
									<td><?php echo word_limiter( strip_tags( base64_decode( $row->details, TRUE ) ), 20 ); ?></td>
									<td><?= user_formated_date( $row->created_at ); ?></td>
									<td class="text-center"><?= show_data_status( $row->status ); ?></td>
									<td>
										<a href="<?= site_url( "page/edit/{$row->id}" ) ?>" class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip" data-placement="top">
											<i class="fa fa-edit"></i> Edit
										</a>
										<a href="<?= site_url( "page/copy/{$row->id}" ) ?>" class="btn btn-warning btn-xs" title="Copy" data-toggle="tooltip" data-placement="top">
											<i class="fa fa-files-o"></i> Copy
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td colspan="6">
										No Data Found.
									</td>
								</tr>
							<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->
<?php
$this->load->view( 'footer/view_footer' );
?>
