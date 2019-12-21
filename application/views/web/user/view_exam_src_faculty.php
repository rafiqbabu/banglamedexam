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
				<div class="col-md-9" id="f">
					<div class="widget profile-widget">
						<br><br><br>
						<?php echo $msg; ?>
						
						<h4 class="widget-title"><?php echo $page_title; ?><span></span></h4>
						
							<?php
								$sql="SELECT * FROM sif_institute WHERE status = '1' AND id = '$_GET[i]'";
								$query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									foreach ($query->result() as $rowi) {
										echo "<div style='font-size:24px;'>{$rowi->institute_name}</div>";
									}
								}
							?>
							<?php
								$sql="SELECT * FROM sif_course WHERE status = '1' AND id = '$_GET[c]'";
								$query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									foreach ($query->result() as $rowc) {
										echo "<div style='background-color: #8e44ad ; color:#FFFFFF; padding:10px; width:250px; margin-bottom:6px; margin-left:0px;'>{$rowc->course_name}</div>";
									}
								}
							?>
							
							
							<ul id="nav" >
								<?php 
									$sql="SELECT * FROM sif_faculty WHERE status = '1' AND institute_id = '$rowi->id' AND course_id = '$rowc->id' ORDER BY faculty_name DESC";
									$query = $this->db->query($sql);
									if ($query->num_rows() > 0) {
										foreach ($query->result() as $rowf) {
								?>
											<li style="background-color:#229954; text-align:center;"><a style="color:#000000; font-weight:bold;" href="#f"><?php echo $rowf->faculty_name; ?></a>
												<ul>
													<?php
														$sql="SELECT * FROM sif_subject WHERE status = '1' AND institute_id = '$rowi->id' AND course_id = '$rowc->id' AND faculty_id = '$rowf->id' ORDER BY subject ASC";
														$query = $this->db->query($sql);
														if ($query->num_rows() > 0) {
															foreach ($query->result() as $rows) {
																echo "<li><a href='".site_url("user/$user->id/exam-src-candidate")."?i={$rowi->id}&c={$rowc->id}&f={$rowf->id}&s={$rows->id}#c'>{$rows->subject}</a></li>";
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

							<!--
							<div style="background-color:#efefef; color:#000000; padding:10px; width:200px; margin-bottom:6px; margin-left:0px;">
								<a style="color:#000000;" href="#">Select Faculty</a>
							</div>
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
