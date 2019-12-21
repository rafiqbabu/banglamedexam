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
				<div class="col-md-9" id="c">
					<div class="widget profile-widget">
						<br><br><br>
						<?php echo $msg; ?>				
						<h4 class="widget-title"><?php echo $page_title; ?><span></span></h4>
		
							<?php
								$sql="SELECT * FROM sif_institute WHERE status = '1' AND id = '$_GET[i]'";
								$query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									foreach ($query->result() as $rowi) {
										$i = "<div style='background-color:#607d8b; color:#000000; padding:10px; width:320px; margin-bottom:6px; margin-left:0px; text-align:center;'>{$rowi->institute_name}</div>";
									}
								}
							?>
							<?php
								$sql="SELECT * FROM sif_course WHERE status = '1' AND id = '$_GET[c]'";
								$query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									foreach ($query->result() as $rowc) {
										$c = "<div style='background-color:#78909c; color:#000000; padding:10px; width:320px; margin-bottom:6px; margin-left:0px;  text-align:center;'>{$rowc->course_name}</div>";
									}
								}
							?>

							<?php
								$sql="SELECT * FROM sif_faculty WHERE status = '1' AND id = '$_GET[f]'";
								$query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									foreach ($query->result() as $rowf) {
										$f = "<div style='background-color:#90a4ae; color:#000000; padding:10px; width:320px; margin-bottom:6px; margin-left:0px;  text-align:center;'>{$rowf->faculty_name}</div>";
									}
								}
							?>

							<?php
								$sql="SELECT * FROM sif_subject WHERE status = '1' AND id = '$_GET[s]'";
								$query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									foreach ($query->result() as $rows) {
										$s = "<div style='background-color:#b0bec5; color:#000000; padding:10px; width:320px; margin-bottom:6px; margin-left:0px;  text-align:center;'>{$rows->subject}</div>";
									}
								}
							?>
							<br>
						<form action="<?php echo site_url("user/$user->id/exam-selection-sif"); ?>#s" method="GET">
							
							<input type="hidden" name="i" value="<?php echo $rowi->id; ?>">
							<input type="hidden" name="c" value="<?php echo $rowc->id; ?>">
							<input type="hidden" name="f" value="<?php echo $rowf->id; ?>">
							<input type="hidden" name="s_sif" value="<?php echo $rows->id; ?>">

							<input type="radio" name="candidate" value="2" required>
							<a style="background-color:#d35400; color:#FFFFFF; padding:10px; border-radius:10px;" href="<?php echo site_url("user/$user->id/exam-selection-sif")."?i={$rowi->id}&c={$rowc->id}&f={$rowf->id}&s_sif={$rows->id}&candidate=2#s"; ?>">Private</a>&nbsp;&nbsp;&nbsp;
							<br><br>
							<input type="radio" name="candidate" value="3" required>
							<a style="background-color:#800080; color:#FFFFFF; padding:10px; border-radius:10px;" href="<?php echo site_url("user/$user->id/exam-selection-sif")."?i={$rowi->id}&c={$rowc->id}&f={$rowf->id}&s_sif={$rows->id}&candidate=3#s"; ?>">BSMMU</a>	
							<br><br>
							<input type="radio" name="candidate" value="1" required>	
							<a style="background-color:#006400; color:#FFFFFF; padding:10px; border-radius:10px;" href="<?php echo site_url("user/$user->id/exam-selection-sif")."?i={$rowi->id}&c={$rowc->id}&f={$rowf->id}&s_sif={$rows->id}&candidate=1#s"; ?>">Government</a>&nbsp;&nbsp;&nbsp;

							<?php echo "<br><br>".$i.$c.$f.$s; ?>
							
							<input style="background-color:#006400; color:#FFFFFF; padding:10px; border:0px; width:320px;" type="submit" value="Proceed">

						</form>
							<!--
							<ul id="nav" >
								<?php 
									$sql="SELECT * FROM sif_faculty WHERE status = '1' AND institute_id = '$rowi->id' AND course_id = '$rowc->id' ORDER BY faculty_name ASC";
									$query = $this->db->query($sql);
									if ($query->num_rows() > 0) {
										foreach ($query->result() as $rowf) {
								?>
											<li><a href="#"><?php echo $rowf->faculty_name; ?></a>
												<ul>
													<?php
														$sql="SELECT * FROM sif_subject WHERE status = '1' AND institute_id = '$rowi->id' AND course_id = '$rowc->id' AND faculty_id = '$rowf->id' ORDER BY id ASC";
														$query = $this->db->query($sql);
														if ($query->num_rows() > 0) {
															foreach ($query->result() as $rows) {
																echo "<li><a href='".site_url("user/$user->id/exam-src-candidate")."?i={$rowi->id}&c={$rowc->id}&f={$rowf->id}&s={$rows->id}'>{$rows->subject}</a></li>";
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
						-->

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