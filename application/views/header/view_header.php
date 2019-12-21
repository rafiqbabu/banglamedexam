<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="text/css" href="<?= base_url( 'images/favicon.png' ); ?>">
	
	<title><?= "{$company->name} :: {$module_name }"; ?></title>
	
	<!--Core CSS -->
	<link href="<?php echo base_url( 'bs3/css/bootstrap.min.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet">
	<link href="<?php echo base_url( 'css/bootstrap-reset.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet">
	<link href="<?php echo base_url( 'assets/font-awesome/css/font-awesome.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet"/>
	
	<!--dynamic table-->
	<link href="<?php echo base_url( 'assets/advanced-datatable/media/css/demo_page.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet"/>
	<link href="<?php echo base_url( 'assets/advanced-datatable/media/css/demo_table.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url( "assets/data-tables/DT_bootstrap.css?v=" . config_item( 'app_version' ) ); ?>"/>
	
	<?php if ( $this->uri->segment( 1 ) == '' || $this->uri->segment( 1 ) == 'dashboard' || $this->uri->segment( 1 ) == 'student_dashboard' ): ?>
		<link href=" <?php echo base_url( 'assets/jvector-map/jquery-jvectormap-1.2.2.css' ); ?>" rel="stylesheet">
		<link href="<?php echo base_url( 'css/clndr.css' ); ?>" rel="stylesheet">
		<!--clock css-->
		<link href="<?php echo base_url( 'assets/css3clock/css/style.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet">
		<!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url( 'assets/morris-chart/morris.css?v=' . config_item( 'app_version' ) ); ?>">
	<?php endif; ?>
	
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url( 'css/style.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet">
	<link href="<?php echo base_url( 'css/style-responsive.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet"/>
	<link href="<?php echo base_url( 'css/tree-style.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet"/>
	
	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('js/ie8/ie8-responsive-file-warning.js'); ?>"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var site_url_path = '<?php echo base_url(); ?>';
	</script>
	
	<script type="text/javascript">
		// <!--
		function siteHost() { // Read-only-ish
			return "<?php echo base_url(); ?>";
		}
		
		//-->
	</script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142900668-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142900668-1');
</script>


</head>

<body>
<?php $idd = $this->session->userdata( 'user_id' ); ?>
<section id="container">
	<!--header start-->
	<header class="header fixed-top clearfix">
		<!--logo start-->
		<div class="brand">
			<a href="<?= site_url(); ?>" class="logo">
				<!--<img src="<?php /* echo base_url('images/logo-genesis.png'); */ ?>" alt="">-->
				<?= $company->name; ?>
			</a>
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars"></div>
			</div>
		</div>
		<!--logo end-->
		
		<div class="nav notify-row" id="top_menu">
			<ul class="breadcrumbs-alt">
				<?php foreach ( $breadcrumb as $cumb ) : ?>
					<li>
						<a href="#"><?= $cumb; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="top-nav clearfix">
			<!--search & user info start-->
			<ul class="nav pull-right top-menu">
				<li>
					<input type="text" class="form-control search" placeholder="Search">
				</li>
				<!-- user login dropdown start-->
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<?php if ( $authUser->image ) : ?>
							<img alt="" src="<?php echo base_url( $authUser->image ) ?>">
							<!-- <img alt="" src="<?php echo base_url( '' ) ?>images/user.jpg"> -->
						<?php else : ?>
							<img alt="" src="<?php echo base_url( '' ) ?>images/user.jpg">
						<?php endif; ?>
						<span class="username"><?php echo $authUser->first_name; ?></span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu extended tasks-bar">
						<li>
							<p class="">User Profile</p>
						</li>
						<li>
							<?php
							$link = 'javascript:void(0)';
							if ( $this->ion_auth->in_group( 4 ) ) {
								$link = site_url( "teacher/profile/{$user_auto_id}" );
							} elseif ( $this->ion_auth->in_group( 5 ) ) {
								$link = site_url( "executive/profile/{$user_auto_id}" );
							}
							?>
							<a href="<?= $link; ?>">
								<div class="task-info clearfix">
									<div class="desc pull-left">
										<h5><?php echo $authUser->first_name . ' ' . $authUser->last_name; ?></h5>
										<p><?php echo $authUser->role; ?></p>
									</div>
									<span class="pull-right" data-percent="90">
											<?php if ( $authUser->image && file_exists( $authUser->image ) ) : ?>
												<img alt="" src="<?php echo base_url( $authUser->image ) ?>">
											<?php else : ?>
												<img alt="" src="<?php echo base_url( 'images/user.jpg' ) ?>">
											<?php endif; ?>
										</span>
								</div>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url( 'logout' ) ?>"><i class="fa fa-power-off"></i> Logout</a>
						</li>
					</ul>
				</li>
				<!-- user login dropdown end -->
				<!--        <li>
                            <div class="toggle-right-box">
                                <div class="fa fa-bars"></div>
                            </div>
                        </li>-->
			</ul>
			<!--search & user info end-->
		</div>
	</header>
	<!--header end-->
	<aside>
		<div id="sidebar" class="nav-collapse">
			<!-- sidebar menu start-->
			<ul class="sidebar-menu" id="nav-accordion">
				


				<li>
					<a href="<?= site_url( 'dashboard' ); ?>"
					   class="<?php if ( $this->uri->segment( 1 ) == 'Dashboard' ) echo 'active'; ?>">
						<i class="fa fa-dashboard"></i>
						<span>Dashboard </span>
					</a>
				</li>
				
				<!--
				<?php if ( $this->ion_auth->in_group( [4, 5] ) ): ?>
					<li>
						<a href="<?= $link; ?>"
						   class="<?php if ( current_url() == $link ) echo 'active'; ?>">
							<i class="fa fa-user"></i>
							<span>Profile</span>
						</a>
					</li>
				<?php endif; ?>
				-->

				<?php if ( $this->ion_auth->is_admin() && $idd == 2) : ?>
					
					<li>
						<a href="<?php echo base_url( 'applicant/user_list' ); ?>" class="<?php if ( $this->uri->segment( 1 ) == 'applicant' ) echo 'active'; ?>">
							<i class="fa fa-users"></i>
							<span>User List</span>
						</a>

					</li>
				<?php endif; ?>
<?php
	$sql = "select * from user_role where user_id = '$idd'";
    $query=$this->db->query($sql);
    foreach ($query->result() as $row) {
    	$m1 = $row->m1; $m2 = $row->m2; $m3 = $row->m3; $m4 = $row->m4; $m5 = $row->m5; $m6 = $row->m6; $m7 = $row->m7;
    	$m8 = $row->m8; $m9 = $row->m9; $m10 = $row->m10; $m11 = $row->m11; $m12 = $row->m12; $m13 = $row->m13; $m14 = $row->m14; $m15 = $row->m15;
	}
?>
			
				<?php if ( $this->ion_auth->is_admin() && $m15 == 1) : ?>
					
					<li>
						<a href="<?php echo base_url( 'applicant/complain' ); ?>" class="<?php if ( $this->uri->segment( 1 ) == 'complain' ) echo 'active'; ?>">
							<i class="fa fa-list-alt"></i>
							<span>Complain Box</span>
						</a>

					</li>
				<?php endif; ?>
				
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) ) && ($m1 == 1)) : ?>
					<li class="sub-menu">
						<a href="javascript:"
						   class="<?php if ( $this->uri->segment( 1 ) == 'exam_question' ) echo 'active'; ?>">
							<i class="fa fa-plus-square"></i>
							<span>Exam Question</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'exam_question' and $this->uri->segment( 2 ) == 'add_examquestion' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'exam_question/add_examquestion' ) ?>">Add SBA Question</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'exam_question' and $this->uri->segment( 2 ) == 'examquestion_list' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'exam_question/examquestion_list' ) ?>">SBA Question List</a>
							</li>
							
							<li class="<?php if ( $this->uri->segment( 1 ) == 'exam_question' and $this->uri->segment( 2 ) == 'add_mcq_examquestion' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'exam_question/add_mcq_examquestion' ) ?>">Add MCQ Question</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'exam_question' and $this->uri->segment( 2 ) == 'mcq_examquestion_list' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'exam_question/mcq_examquestion_list' ) ?>">MCQ Question List</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'exam_question' and $this->uri->segment( 2 ) == 'question_pic' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'exam_question/question_pic' ) ?>">Question Picture</a>
							</li>
						
						</ul>
					</li>
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) ) && ($m2 == 1)) : ?>
					<li class="sub-menu">
						<a href="javascript:"
						   class="<?php if ( $this->uri->segment( 1 ) == 'exam_create' ) echo 'active'; ?>">
							<i class="fa fa-book"></i>
							<span>Exam</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'exam_create' and $this->uri->segment( 2 ) == 'create_exam' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'exam_create/create_exam' ) ?>">Exam Create</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'exam_create' and $this->uri->segment( 2 ) == 'exam_list' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'exam_create/exam_list' ) ?>">Exam List</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) ) && ($m3 == 1)) : ?>
					
					<li class="sub-menu">
						<a href="javascript:"
						   class="<?php if ( $this->uri->segment( 1 ) == 'package' ) echo 'active'; ?>">
							<i class="fa fa-th"></i>
							<span>Packages</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'package' and $this->uri->segment( 2 ) == 'create' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'package/create' ) ?>">Package Create</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'package' and $this->uri->segment( 2 ) == 'records' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'package/records' ) ?>">Packages List</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) ) && ($m4 == 1)) : ?>
					
					<li class="sub-menu">
						<a href="javascript:"
						   class="<?php if ( $this->uri->segment( 1 ) == 'notice' ) echo 'active'; ?>">
							<i class="fa fa-bell-o"></i>
							<span>Notice</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'notice' and $this->uri->segment( 2 ) == 'create' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'notice/create' ) ?>">Notice Create</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'notice' and $this->uri->segment( 2 ) == '' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'notice' ) ?>">Notice List</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m5 == 1)): ?>
					
					<li>
						<a href="<?php echo base_url( 'applicant/index' ); ?>" class="<?php if ( $this->uri->segment( 1 ) == 'applicant' ) echo 'active'; ?>">
							<i class="fa fa-users"></i>
							<span>Applicants</span>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m6 == 1)): ?>
					
					<li class="sub-menu">
						<a href="javascript:"
						   class="<?php if ( $this->uri->segment( 1 ) == 'report' ) echo 'active'; ?>">
							<i class="fa fa-list-alt"></i>
							<span>Reports</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'report' and $this->uri->segment( 2 ) == 'purchased-exams' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'report/purchased-exams' ) ?>">Purchased Packages</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'report' and $this->uri->segment( 2 ) == 'exam-history' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'report/exam-history' ) ?>">Exam History</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'report' and $this->uri->segment( 2 ) == 'question-count' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'report/question-count' ) ?>">Question Count</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m7 == 1)): ?>
					
					<li class="sub-menu">
						<a href="javascript:" class="<?php if ( $this->uri->segment( 1 ) == 'page' ) echo 'active'; ?>">
							<i class="fa fa-bars"></i>
							<span>Pages</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'page' and $this->uri->segment( 2 ) == '' ) echo 'active'; ?>">
								<a href="<?php echo site_url( 'page' ) ?>">Add Page</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'page' and $this->uri->segment( 2 ) == 'record' ) echo 'active'; ?>">
								<a href="<?php echo site_url( 'page/record' ) ?>">Page List</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m8 == 1)): ?>
					<li class="sub-menu">
						<a href="javascript:" class="<?php if ( $this->uri->segment( 1 ) == 'teacher' ) echo 'active'; ?>">
							<i class="fa fa-user"></i>
							<span>Teacher</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'teacher' and $this->uri->segment( 2 ) == '' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'teacher' ) ?>">Add Teacher</a></li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'teacher' and $this->uri->segment( 2 ) == 'records' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'teacher/records' ) ?>">Teacher List</a></li>
						</ul>
					</li>
				<?php endif; ?>

				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m9 == 1)): ?>
					<li class="sub-menu">
						<a href="javascript:"
						   class="<?php if ( $this->uri->segment( 1 ) == 'executive' ) echo 'active'; ?>">
							<i class="fa fa-user-md"></i>
							<span>Executive & Support Staff</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'executive' and $this->uri->segment( 2 ) == '' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'executive' ) ?>">Add Executive/Support Staff</a></li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'executive' and $this->uri->segment( 2 ) == 'records' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'executive/records' ) ?>">Executive/Support Staff list</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>

				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m10 == 1)): ?>					
					<li>
						<a href="<?php echo base_url( 'coupon' ); ?>" class="<?php if ( $this->uri->segment( 1 ) == 'coupon' ) echo 'active'; ?>">
							<i class="fa fa-gift"></i>
							<span>Coupons</span>
						</a>
					</li>
				<?php endif; ?>

				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m11 == 1)): ?>
					<li>
						<a href="<?php echo base_url( 'slider' ); ?>" class="<?php if ( $this->uri->segment( 1 ) == 'slider' ) echo 'active'; ?>">
							<i class="fa fa-picture-o"></i>
							<span>Sliders</span>
						</a>
					</li>
				<?php endif; ?>	

				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m12 == 1)): ?>
					<li>
						<a href="<?php echo base_url( 'advertisement' ); ?>" class="<?php if ( $this->uri->segment( 1 ) == 'advertisement' ) echo 'active'; ?>">
							<i class="fa fa-adn"></i>
							<span>Advertisements</span>
						</a>
					</li>
				<?php endif; ?>

				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m13 == 1)): ?>	
					<li>
						<a href="<?php echo base_url( 'offer' ); ?>" class="<?php if ( $this->uri->segment( 1 ) == 'offer' ) echo 'active'; ?>">
							<i class="fa fa-gift"></i>
							<span>Offer Email</span>
						</a>
					</li>
				
				<?php endif; ?>
				
				<?php if (( $this->ion_auth->is_admin() || $this->ion_auth->in_group( [1] ) )  && ($m14 == 1)): ?>
					<li class="sub-menu">
						<a href="javascript:" class="<?php if ( $this->uri->segment( 1 ) == 'setting' ) echo 'active'; ?>">
							<i class="fa fa-cog"></i>
							<span>Setting</span>
						</a>
						<ul class="sub">
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'general_info' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/general_info' ) ?>">General Information</a></li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'add_institute' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/add_institute/' ) ?>">Institute</a></li>
							
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'add_course' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/add_course/' ) ?>">Course</a></li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'add_faculty' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/add_faculty/' ) ?>">Faculty</a></li>
							
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'subject_list' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/subject_list/' ) ?>">Subject</a></li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'add_chapter' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/add_chapter/' ) ?>">Chapter</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'topic_list' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/topic_list/' ) ?>">Topics</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'exam_category' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/exam_category/' ) ?>">Exam Category</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'exam_instruction' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/exam_instruction/' ) ?>">Exam Instruction</a>
							</li>
							<li class="<?php if ( $this->uri->segment( 1 ) == 'setting' and $this->uri->segment( 2 ) == 'exam_news' ) echo 'active'; ?>">
								<a href="<?php echo base_url( 'setting/exam_news/' ) ?>">News/Events</a>
							</li>
						
						</ul>
					</li>
				<?php endif; ?>
				
				<li>
					<a href="<?php echo site_url( 'logout' ); ?>">
						<i class="fa fa-power-off"></i>
						<span>Logout</span>
					</a>
				</li>
				
			</ul>
			<!-- sidebar menu end-->
		</div>
	</aside>
	<!--sidebar end-->
