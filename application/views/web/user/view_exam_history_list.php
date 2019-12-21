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
				<?php $id = $this->session->user->id; ?>
				<!-- Page Content -->
				<div class="col-md-9">
					<div class="widget profile-widget">
						<?php echo $msg; ?>
						
						<h4 class="widget-title"><?php echo $page_title; ?><span></span></h4>
						
							<div class="btn btn-sm bg-green pull-right">
								<a style="color:#FFFFFF;" href="http://banglamedexam.com/history.php?id=<?php echo $id; ?>" target="_blank">All Results at a glance</a>
							</div>

							<table class="table table-bordered table-sm padding-4">
								<thead>
								<tr>
									<th>#</th>
									<th>Package Name (Click to view specific package results only)</th>									
								</tr>
								</thead>
								<tbody>
									<?php 
										$sl=1;
										
										$sql="SELECT * FROM oe_doc_exams WHERE doc_id = '$id' GROUP BY package_id ORDER BY package_id DESC";
										$query = $this->db->query($sql);
										foreach ($query->result() as $row) {
											$package_name = get_name_by_id( 'oe_package', $row->package_id, 'id', 'name' );
											if ( $row->package_id != '' ) {
									?>
												<tr>
													<td><?php echo $sl; ?></td>
													<td><?php echo "<a href='http://banglamedexam.com/history_package.php?id={$id}&package_id={$row->package_id}' target='_blank'>".$package_name."</a>"; ?></td>
												</tr>
									<?php 
											}
											else {
									?>
												<tr>
													<td><?php echo $sl; ?></td>
													<td><?php echo "<a href='http://banglamedexam.com/history_package.php?id={$id}&package_id=0' target='_blank'>Others</a>"; ?></td>
												</tr>
									<?php 
											} 
											$sl=$sl+1; 
										} 
									?>
								
								</tbody>
							</table>
							
							<hr>
							
						
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
