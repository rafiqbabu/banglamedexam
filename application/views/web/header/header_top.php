<header id="header" class="default-header colored flat-menu hidden-print"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<div class="header-top">
		<div class="container">
			<nav>
				<ul class="nav nav-pills nav-top">
					<li class="phone">
						<a href="mailto:<?= $company->email; ?>"><i class="fa fa-envelope"></i><?= $company->email; ?></a>
					</li>
					<li class="phone">
						<a href="tel:<?= $company->phone; ?>"><i class="fa fa-phone"></i>For Any Help : <?= $company->phone; ?></a>
					</li>
					<?php if ( !user_logged_in() ) : ?>
						<li><a title="Registration" href="<?= site_url( 'registration' ) ?>"><i class="uni-business-man"></i>Registration</a></li>
						<li><a title="Login" href="<?= site_url( 'user-login' ) ?>"><i class="uni-unlock-2"></i>Login</a></li>
					<?php endif; ?>
				</ul>
			
			</nav>
			<ul class="social-icons color">
				<li class="facebook"><a href="<?= prep_url( $company->fb_id ); ?>" target="_blank" title="Facebook"></a></li>
				<li class="twitter"><a href="<?= prep_url( $company->twitter ); ?>" target="_blank" title="Twitter"></a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="logo">
			<a href="<?php echo site_url(); ?>">
				<img alt="<?= $company->name; ?>" data-sticky-width="auto" data-sticky-height="28" height="60" width="auto" src="<?php echo base_url( $company->logo ); ?>">
			</a>
		</div>
		<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
			<i class="fa fa-bars"></i>
		</button>
	</div>
	<div class="navbar-collapse nav-main-collapse collapse">
		<div class="container">
			<nav class="nav-main mega-menu">
				<ul class="nav nav-pills nav-main" id="mainMenu">
					<li><a href="<?php echo site_url( '/' ); ?>">Home</a></li>
					<li><a href="<?= site_url( 'about-us' ); ?>">About</a></li>
					<li><a href="<?= site_url( 'benefits' ); ?>">Benefits</a></li>
					<li><a href="<?= site_url( 'instructions' ); ?>">Instructions</a></li>
					<li><a href="<?= site_url( 'feedback-form' ); ?>">Complain Box</a></li>
					<li><a href="<?= site_url( 'faqs' ); ?>">FAQs</a></li>
					<li><a href="<?= site_url( 'contact-us' ); ?>">Contact Us</a></li>
					
					<?php if ( user_logged_in() ) : ?>
								<li><a href="<?= site_url( "user/{$user->id}" ) ?>"><i class="fa fa-user"></i> My Profile</a></li>
								<li><a href="<?= site_url( 'user-logout' ); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
					<?php endif; ?>
					
					<?php if ( !user_logged_in() ) : ?>
						<li><a title="Registration" href="<?= site_url( 'registration' ) ?>"><i class="uni-business-man"></i>Registration</a></li>
						<li><a title="Login" href="<?= site_url( 'user-login' ) ?>"><i class="uni-unlock-2"></i>Login</a></li>
					<?php endif; ?>

					<!--
					<?php if ( user_logged_in() ) : ?>
						<li class="dropdown pull-right">
							<a class="dropdown-toggle" href="#">
								<i class="uni-gear"></i>
								<?= $user->name; ?>
								<i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= site_url( "user/{$user->id}" ) ?>"><i class="fa fa-user"></i> Profile</a></li>
								<hr>
								<li><a href="<?= site_url( 'user-logout' ); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</li>
					<?php endif; ?>
					-->
					
					
				</ul>
			</nav>
		</div>
	</div>
</header><!-- Header Ends -->
<!--page header-->
<?php if ( $this->uri->segment( 1 ) != '' ): ?>
	<div class="page-header bg-dark hidden-print">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- Page Header Wrapper -->
					<div class="page-header-wrapper">
						<!-- Title & Sub Title -->
						<h3 class="title"><!--<?= $page_title; ?>--></h3>
						<!--                    <h6 class="sub-title">All you want know</h6>-->
						<ol class="breadcrumb">
							<li><a href="<?= site_url( '/' ) ?>">Home</a></li>
							<li class="active"><?= $page_title; ?></li>
						</ol><!-- Breadcrumb -->
					</div><!-- Page Header Wrapper -->
				</div><!-- Coloumn -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div>
<?php endif; ?>
<div class="print-only text-center">
	<img alt="<?= $company->name; ?>" width="260" height="60" src="<?php echo base_url( 'images/course/logo.png' ); ?>">
</div>
