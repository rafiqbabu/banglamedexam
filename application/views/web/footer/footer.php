<footer id="footer" class="footer-1 hidden-print">
	<div class="main-footer widgets-dark typo-light">
		<div class="container">
			<div class="row">
				<!-- Widget Column -->
				<div class="col-md-3 col-sm-6">
					<!-- Widget -->
					<div class="widget subscribe no-box">
						<h5 class="widget-title">Signup<span></span></h5>
						<p class="form-message1" style="display: none;"></p>
						<div class="clearfix"></div>
						<ul class="thumbnail-widget">
							<li>
								<div class="thumb-content"><a href="<?= site_url( 'user-login' ) ?>">Login </a></div>
							</li>
							<li>
								<div class="thumb-content"><a href="<?= site_url( 'registration' ) ?>">Registration</a></div>
							</li>
						
						</ul><!-- Thumbnail Widget -->
					</div><!-- Widget -->
				</div><!-- Column -->
				
				<!-- Widget Column -->
				<div class="col-md-3 col-sm-6">
					<!-- Widget -->
					<div class="widget no-box">
						<h5 class="widget-title">Important Links<span></span></h5>
						<ul class="thumbnail-widget">
							<li>
								<div class="thumb-content"><a href="<?= site_url( 'privacy-policy' ) ?>">Privacy Policy</a></div>
							</li>
							<li>
								<div class="thumb-content"><a href="<?= site_url( 'terms-and-conditions' ) ?>">Terms and Conditions</a></div>
							</li>
						
						</ul><!-- Thumbnail Widget -->
					</div><!-- Widget -->
				</div><!-- Column -->
				
				<!-- Widget Column -->
				<div class="col-md-3 col-sm-6">
					<!-- Widget -->
					<div class="widget no-box">
						<h5 class="widget-title">Other links<span></span></h5>
						<ul class="thumbnail-widget">
							<li><a href="http://www.bsmmu.edu.bd/" target="_blank">BSMMU</a></li>
							<li><a href="https://www.bcpsbd.org/" target="_blank">BCPS</a></li>
						</ul>
					</div><!-- Widget -->
					<!-- Widget -->
				
				</div><!-- Column -->
				
				<!-- Widget Column -->
				<div class="col-md-3 col-sm-6">
					<div class="widget no-box">
						<h5 class="widget-title">Follow Us<span></span></h5>
						<!-- Social Icons Color -->
						<ul class="social-icons color">
							<li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"></a></li>
							<li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"></a></li>
						</ul>
					</div><!-- Widget -->
				</div><!-- Column -->
			
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Main Footer -->
	
	<!-- Footer Copyright -->
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<!-- Copy Right Logo -->
				
				<!-- Copy Right Content -->
				<div class="col-sm-7">
					<p>&copy; Copyright <?= date( 'Y' ) ?>. All Rights Reserved. | By <a href="<?= site_url(); ?>" title="<?= $company->name; ?>"><?= $company->name; ?> </a></p>
				</div><!-- Copy Right Content -->
				<!-- Copy Right Content -->
				<div class="col-sm-5">
					<nav class="sm-menu">
						<ul>
							<li>Developed By <a href="http://medigeneit.com/" target="_blank" class="btn-link">Medigene IT.</a></li>
						</ul>
					</nav><!-- Nav -->
				</div><!-- Copy Right Content -->
			</div><!-- Footer Copyright -->
		</div><!-- Footer Copyright container -->
	</div><!-- Footer Copyright -->
</footer>

<!-- library -->

<script src="<?php echo base_url(); ?>js_user/lib/jquery.js"></script>
<script src="<?php echo base_url(); ?>js_user/lib/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js_user/lib/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url(); ?>js_user/lib/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>js_user/lib/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>js_user/lib/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>js_user/lib/countdown.js"></script>
<script src="<?php echo base_url(); ?>js_user/lib/counter.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--js_user/lib/isotope.pkgd.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--js_user/lib/jquery.easypiechart.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--js_user/lib/jquery.mb.YTPlayer.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--js_user/lib/jquery.prettyPhoto.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--js_user/lib/jquery.stellar.min.js"></script>-->
<script src="<?php echo base_url(); ?>js_user/lib/menu.js"></script>

<script src="<?php echo base_url(); ?>js_user/lib/modernizr.js"></script>
<script type="text/javascript" src="<?= base_url( 'js_user/lib/swal.min.js' ) ?>"></script>
<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url(); ?>js_user/theme.js"></script>
<script src="<?php echo base_url( "js/submitter.js?v=" . config_item( 'app_version' ) ); ?>"></script>
<!-- Datepicker -->
<link rel="stylesheet" href="<?= base_url( 'assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css' ) ?>">
<script src="<?php echo base_url( 'assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js' ); ?>"></script>
<script>
	$('.datepicker').datepicker({autoclose: true, format: 'dd M, yyyy'});
</script>

<!-- Theme Custom -->
<script src="<?php echo base_url( "js_user/jnn_web_custom.js?v=" . config_item( 'app_version' ) ); ?>"></script>

</body>
</html>
