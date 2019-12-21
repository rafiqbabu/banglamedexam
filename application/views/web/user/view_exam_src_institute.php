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
				<div class="col-md-9" id="i">
					<div class="widget profile-widget">
						<br><br><br>
						<?php echo $msg; ?>
						<h4 class="widget-title"><?php echo $page_title; ?><span></span></h4>
							<ul id="nav" >
								<?php 
									$sql="SELECT * FROM sif_institute WHERE status = '1' ORDER BY sl ASC";
									$query = $this->db->query($sql);
									if ($query->num_rows() > 0) {
										foreach ($query->result() as $row) {
								?>
											<li style="background-color:#229954; text-align:center;"><a style="color:#000000; font-weight:bold;" href="#i"><?php echo $row->institute_name; ?></a>
												<ul>
													<?php
														$sql="SELECT * FROM sif_course WHERE status = '1' AND institute_id = '$row->id' ORDER BY id ASC";
														$query = $this->db->query($sql);
														if ($query->num_rows() > 0) {
															foreach ($query->result() as $row2) {
																echo "<li style='background-color:#8e44ad;'><a href='".site_url("user/$user->id/exam-src-faculty")."?i={$row->id}&c={$row2->id}#f'>{$row2->course_name}</a></li>";
															}
														}
													?>
												</ul>
											</li>
								<?php
										}
									}
								?>

								
							</ul>

							<br><br>
							<!--
							<div class="src_bsmmu" style="margin-top: 300px;"><a href="<?= site_url( "user/{$user->id}/exam-src-faculty" ); ?>?i=6">BSMMU</a></div>
							<div class="src_bcps"><a href="#">BCPS</a></div>
							<div class="src_int"><a href="#">International</a></div>
							<div class="src_bpsc"><a href="#">BPSC</a></div>
							<div class="src_other"><a href="#">OTHERS</a></div>			
							-->
							
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
