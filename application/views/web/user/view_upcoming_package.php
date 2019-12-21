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
							    a
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