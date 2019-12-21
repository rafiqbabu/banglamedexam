<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey team-single">
		<!-- Container -->
		<div class="container" height="auto">
			<div class="row">
				<!-- Sidebar -->
				<?php $this->load->view( 'web/elements/view_sidebar' ); ?>
				<?php $email = $this->session->user->username; ?>
				<!-- Page Content -->
				
				<div class="col-md-9" id="i">
					<div class="widget profile-widget">
						<br><br>
						<?php echo $msg; ?>
						<h4 class="widget-title"><?php echo $page_title; ?><span></span></h4>
							
							
							<div style='background-color:#EBF4FA; padding:10px; margin-bottom:6px; color:#000000;'>
							<font size="4"><b><u>BSMMU</b></u></font><br>
							<?php 
							  	$sql="SELECT * FROM oe_package WHERE status = '1' AND id='75' ORDER BY id DESC ";
    							$query = $this->db->query($sql);{
    							    foreach ($query->result() as $row) {
  									echo "&raquo; ".$row->name;
  									echo "<br>";
  									}
  									
  								}
							?>
							</div>
							
							<br>
							
							<div style='background-color:#EBF4FA; padding:10px; margin-bottom:6px; color:#000000;'>
							<font size="4"><b><u>BCPS</b></u></font><br>
							<?php 
							  	$sql="SELECT * FROM oe_package WHERE status = '1' AND id='74' OR id='73' OR id='72' OR id='42' OR id='41' ORDER BY id DESC ";
    							$query = $this->db->query($sql);{
    							    foreach ($query->result() as $row) {
  									echo "&raquo; ".$row->name;
  									echo "<br>";
  									}
  									
  								}
							?>
							</div>
							
							
							<br><br>
							<!--<font size="5">Upcoming Packages</font><br>-->
							<h4 class="widget-title">Upcoming Packages<span></span></h4>
							<div style='background-color:#EBF4FA; padding:10px; margin-bottom:6px; color:#000000;'>
							    <font size="4"><b><u>BSMMU</b></u></font><br>
							    &raquo; Residency March 2020 In MD/MS/Basic Science/Paediatrics<br>
                                &raquo; M.phil/Diploma, MRCP/MRCS/MRCOG<br>
                            </div>
                            
                            <div style='background-color:#EBF4FA; padding:10px; margin-bottom:6px; color:#000000;'>
                                <font size="4"><b><u>BCPS</b></u></font><br>
                                &raquo; FCPS Part-I July 2020 All Subject In Speciality<br>
                                &raquo; FCPS Part-I July 2020 for Dentistry<br>
							</div>
							
							<div style='background-color:#EBF4FA; padding:10px; margin-bottom:6px; color:#000000;'>
                                <font size="4"><b><u>International</b></u></font><br>
                                &raquo; MRCS<br>
                                &raquo; MRCP<br>
                                &raquo; MRCOG<br>
                                
							</div>
							
						
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->