<!DOCTYPE html>
<html>
	<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title>Genesis :: Online Exam</title>
		<meta name="keywords" content="Universh - Material Education, Events, News, Learning Centre & Kid School MultiPurpose HTML5 Template" />
		<meta name="description" content="Universh - Material Education, Events, News, Learning Centre & Kid School MultiPurpose HTML5 Template">
		<meta name="author" content="glorythemes.in">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>images/default/favicon.png">
		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' 
		rel='stylesheet' type='text/css'>

		<!-- Lib CSS -->
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/bootstrap.min.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/animate.min.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/font-awesome.min.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/univershicon.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/owl.carousel.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/prettyPhoto.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/menu.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/lib/timeline.css');?>">
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('css_user/theme.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('css_user/theme-responsive.css');?>">
		
		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->
		
		<!-- Skins CSS -->
		<link rel="stylesheet" href="<?php echo base_url('css_user/skins/default.css');?>">
		
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('css_user/custom.css');?>">
		 <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
		
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 8px 16px;
    text-decoration: none;
    display: block;
    color: black;
}

.dropdown-content a:hover {
	/*background-color: #f1f1f1*/

}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>

			 <style type="text/css">
  	
#menuh-container
	{
	position: absolute;		
	top: 0px;
	left: 0em;
	}

#menuh
	{
	font-size: small;
	font-family: arial, helvetica, sans-serif;
	width:100%;
	float:left;
	/*margin:2em;*/
	/*margin-top: 35px;*/
	}
		
#menuh a
	{
		text-align: center;
		display:block;
		/*border: 1px solid #0040FF;*/
		white-space:nowrap;
		margin:0;
		/*padding: 0.3em;*/
		border-bottom: 1px solid #fff;

	}
	
#menuh a:link, #menuh a:visited, #menuh a:active	/* menu at rest */
	{
		color:  #ffffff;
		/*background-color:white;*/		/* royal blue */
		text-decoration:none;
		text-align: left;
	}
	
#menuh a:hover						/* menu on mouse-over  */
	{
	/*color: white;
	background-color: #668CFF;	*/	/* cornflowerblue */
	text-decoration:none;
	}	
	
#menuh a.top_parent, #menuh a.top_parent:hover  /* attaches down-arrow to all top-parents */
	{
	/*background-image: url(navdown_white.gif);*/
	background-position: right center;
	background-repeat: no-repeat;
	}
	
#menuh a.parent, #menuh a.parent:hover 	/* attaches side-arrow to all parents */
	{
	/*background-image: url(nav_white.gif);*/
	background-position: right center;
	background-repeat: no-repeat;
	}

#menuh ul
	{
	list-style:none;
	margin:0;
	padding:0;
	float:left;
	width:9em;	/* width of all menu boxes */
	/* NOTE: For adjustable menu boxes you can comment out the above width rule.
	However, you will have to add padding in the "#menh a" rule so that the menu boxes
	will have space on either side of the text -- try it */
	}

#menuh li
	{
	position:relative;
	min-height: 1px;		/* Sophie Dennis contribution for IE7 */
	vertical-align: bottom;		/* Sophie Dennis contribution for IE7 */
	color: #fff;
	}

#menuh ul ul
	{
	position:absolute;
	z-index:500;
	top:auto;
	display:none;
	/*padding: 1em;
	margin:-1em 0 0 -1em;*/
	width: 254px;
	background-color: #35A3DC;

	}


#menuh ul li:hover{
	
	background :  #3366FF;
	color: #F16E52;
}

#menuh ul li a:hover{
	color : #F16E52;
}


#menuh ul ul ul
	{
	top:0;
	left:100%;
	}

div#menuh li:hover
	{
	cursor:pointer;
	z-index:100;
	}

div#menuh li:hover ul ul,
div#menuh li li:hover ul ul,
div#menuh li li li:hover ul ul,
div#menuh li li li li:hover ul ul
{display:none;}

div#menuh li:hover ul,
div#menuh li li:hover ul,
div#menuh li li li:hover ul,
div#menuh li li li li:hover ul
{display:block;}
  	
  </style>
  		
	</head>
<body>

	
<!-- Header Begins -->	
<?php 
	$this->load->view('web/header/header_top');
?>
<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey typo-dark" style="padding-top: 5px;">
		<!-- Container -->
		<div class="container">
			<!-- Course Wrapper -->
	<section id="pricing" class="typo-dark" style="padding:15px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 bg-verydark typo-light" style="height:332px;padding: 0px;">
					<!-- Title -->
					
					<div class="owl-carousel" 
						data-animatein="" 
						data-animateout="" 
						data-items="1" 
						data-loop="true" 
						data-merge="true" 
						data-nav="false" 
						data-dots="true" 
						data-stagepadding="" 
						data-margin="30"
						data-mobile="1" 
						data-tablet="1" 
						data-desktopsmall="1"  
						data-desktop="1" 
						data-autoplay="true" 
						data-delay="3000" 
						data-navigation="true">
						
						<!-- Item Ends -->
						<div class="item" style="margin-top:0px;padding-bottom: 10px;position: relative; ">
							<!-- Blockquote Wrapper -->
							
								
									<img style="height:332px;width: 555px;" src="<?php echo base_url();?>images/doctor1.jpg" class="img-responsive" alt="thumb">
									<!-- Blockquote Footer -->
								
							
						</div><!-- Item Ends -->
							<img style="height:332px;width: 555px;" src="<?php echo base_url();?>images/exam.jpg" class="img-responsive" alt="thumb">
						<!-- Item Ends -->					
					</div><!-- carousel -->
				</div><!-- Column  <--></-->
				
				<div class="col-md-6" style="height:379px;">
				     <div class="row">					
					    <div class="item all design web">
							<div class="col-md-6">
							<!-- Count Block -->
								<div class="count-block dark bg-yellow">
									<h5 style="font-size:20px;">Register Member</h5>
									<h3 data-count="1237" class="count-number"><span class="counter">1237</span>									
									</h3>
									<i class="uni-talk-man"></i>
									

								</div><!-- Counter Block -->
							</div><!-- Column -->
						</div><!-- Portfolio Item -->
						

						<div class="item all design web">
							<div class="col-md-6">
					<!-- Count Block -->
						<div class="count-block dark bg-orange">
							<h5>Exam Topics</h5>
							<h3 data-count="7985" class="count-number"><span class="counter">452</span></h3>
							<i class="fa fa-book" aria-hidden="true"></i>
						</div><!-- Counter Block -->
					</div><!-- Column -->
						</div><!-- Portfolio Item -->
					</div>
					<br><br>	
					<div class="row">
						<div class="item all design web">
							<div class="col-md-6">
								<div class="count-block dark bg-pink">
									<h5>Prove Yourself</h5>
									
									<h5><a href="" style="color:#fff;">Registration Now</a></h5>
									
									<!-- <i class="uni-chemical"></i> -->
									
								</div><!-- Counter Block -->
							</div><!-- Column -->
						</div><!-- Portfolio Item -->
						<div class="item all design web">
							<div class="col-md-6">
								<!-- Count Block -->
								<div class="count-block dark bg-green">
									<h5>Subjects</h5>
									<h3 data-count="7985" class="count-number"><span class="counter">452</span></h3>
									<i class="uni-fountain-pen"></i>
								</div><!-- Counter Block -->
							</div><!-- Column -->
						</div><!-- Portfolio Item -->
					</div>	
						
					
					
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container Fluid -->
	</section><!-- Section -->

	<section id="pricing" class="typo-dark" style="padding-top:10px;padding-bottom:20px;">
		<div class="container" style="max-width:1180px;">
			
			<!-- Team Container -->
			<div class="row">
				<!-- <div class="col-sm-3"> -->
					<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background: 	#cc3333;">BCPS</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
								<ul style="display: block;" class="pricing-body">
									<?php
								    	if($course_lists){
								    		foreach ($course_lists as $key => $value) {							
						   			 ?>
									<li>
										<?php echo $value->course_name;?>
										<?php 
										echo get_faculty_under_course($value->id);?>
									</li>
									<?php
									}
									}
									?>					
								</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
					</div><!-- Pricing Footer -->
				<!-- </div> --><!-- Column -->
				

				<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background: #E91E63">BSMMU</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
								<ul style="display: block;background: #44C9F6;" class="pricing-body">
									<?php
								    	if($bsmmu_course_lists){
								    		foreach ($bsmmu_course_lists as $key => $value) {							
						   			 ?>
									<li>
										<?php echo $value->course_name;?>
										<?php 
										echo get_faculty_under_course($value->id);?>
									</li>
									<?php
									}
									}
									?>					
								</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
				</div><!-- Pricing Footer -->

				
				<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background:#FF6634">ABROD</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
									<ul style="display: block;" class="pricing-body">
										<?php
									    	if($abrod_course_lists){
									    		foreach ($abrod_course_lists as $key => $value) {							
							   			 ?>
										<li>
											<?php echo $value->course_name;?>
											<?php 
											echo get_faculty_under_course($value->id);?>
										</li>
										<?php
										}
										}
										?>					
									</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
				</div><!-- Pricing Footer -->


				<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background:#2196F3">UNDER GRADUATE</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
									<ul style="display: block;" class="pricing-body">
										<?php
									    	//if($abrod_course_lists){
									    		//foreach ($abrod_course_lists as $key => $value) {							
							   			 ?>
										<li>
											<?php //echo $value->course_name;?>
											<?php 
											//echo get_faculty_under_course($value->id);?>
										</li>
										<?php
										//}
										//}
										?>					
									</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
				</div><!-- Pricing Footer -->

			</div><!-- Row -->
		</div><!-- Container -->
	</section><!-- Section -->
	
	<section id="pricing" class="typo-dark" style="padding-top:42px;padding-bottom:10px;">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background:#FF6634">Medicine</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
									<ul style="display: block;" class="pricing-body">
										<?php
									    	if($ins_course){
									    		foreach ($ins_course as $key => $value) {			
									    		//echo $value->institute_id;exit(); 				
							   			 ?>
										<li>
											<?php echo get_name_by_auto_id('sif_institute',$value->institute_id,'institute_name');?>
											<?php 
											$total = get_course_under_institute($value->course_id,$value->institute_id,$value->id);
											//echo '<pre>';
											//print_r($total);exit();
											?>
											
										</li>
										<?php
										}
										}
										?>					
									</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
				</div><!-- Pricing Footer -->

				<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background:#2196F3">Surgery</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
									<ul style="display: block;" class="pricing-body">
										<?php
									    	if($surgery){
									    		foreach ($surgery as $key => $value) {			
									    		//echo $value->institute_id;exit(); 				
							   			 ?>
										<li>
											<?php echo get_name_by_auto_id('sif_institute',$value->institute_id,'institute_name');?>
											<?php 
											$total = get_course_under_institute($value->course_id,$value->institute_id,$value->id);
											
											?>
											
										</li>
										<?php
										}
										}
										?>					
									</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
				</div><!-- Pricing Footer -->
				
				<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background:#E29C04">Basic Science</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
									<ul style="display: block;" class="pricing-body">
										<?php
									    	if($basic_science){
									    		foreach ($basic_science as $key => $value) {			
									    		//echo $value->institute_id;exit(); 				
							   			 ?>
										<li>
											<?php echo get_name_by_auto_id('sif_institute',$value->institute_id,'institute_name');?>
											<?php 
											$total = get_course_under_institute($value->course_id,$value->institute_id,$value->id);
											
											?>
											
										</li>
										<?php
										}
										}
										?>					
									</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
				</div><!-- Pricing Footer -->

				<div class="col-sm-3 dropdown">
						<a href="#" class="btn btn-block dropbtn" style="height:50px;background:#337AB7;">Dentist</a>
						<div class="dropdown-content">
						    <div id="menuh-container">
						<div id="menuh">
							<ul>
								<li>
									<ul style="display: block;" class="pricing-body">
										<?php
									    	if($dentist){
									    		foreach ($dentist as $key => $value) {			
									    		//echo $value->institute_id;exit(); 				
							   			 ?>
										<li>
											<?php echo get_name_by_auto_id('sif_institute',$value->institute_id,'institute_name');?>
											<?php 
											$total = get_course_under_institute($value->course_id,$value->institute_id,$value->id);
											
											?>
											
										</li>
										<?php
										}
										}
										?>					
									</ul>
								</li>
							</ul>
						</div> 	<!-- end the menuh-container div -->  
					</div>	<!-- end the menuh div --> 
					  	</div>
				</div><!-- Pricing Footer -->
			</div>
		</div>
	</section>
	
	<section id="pricing" class="typo-dark" style="padding-top:2px;padding-bottom:3px;">
		<div class="container">
			
			<div class="row">
				<hr class="lg_" />
				<div class="col-md-12">
					<div class="title-container">
						<div class="title-wrap">
							<h4 class="title">Free Test</h4>
							<span class="separator line-separator" style="top: 57px;"></span>
						</div>							
					</div><!-- Title Container -->
				</div><!-- Title Block -->
				<?php 
					if($free_exam_lists){
					foreach ($free_exam_lists as $key => $value) {
				?>
				
					<div class="col-sm-4 dropdown">
							<a href="#" class="btn btn-block dropbtn" style="height:50px;background:#2196F3">
							<?php echo  get_name_by_auto_id('sif_subject',$value->subject_id,'subject');?>
							+</a>						
					</div>
				
				<?php
				}
				}
				?>
				
			</div>
		</div>
	</section>
	
	<section style="padding-bottom: 15px;padding-top: 30px;">
		<div class="container">
			<!-- Row -->
			<div class="row">	
				<!-- Item Begins -->
				<div class="col-sm-12">
					<div class="owl-carousel" 
						data-animatein="zoomIn" 
						data-animateout="slideOutDown" 
						data-margin="30" 
						data-stagepadding="" 
						data-loop="true" 
						data-merge="true" 
						data-nav="true"
						data-dots="false" 
						data-items="1"  data-mobile="1" data-tablet="2" data-desktopsmall="2"  data-desktop="4" 
						data-autoplay="true" 
						data-delay="3000" 
						data-navigation="true">
						
						<div class="item">
							<!-- Shop Grid Wrapper -->
							<div class="shop-wrap">
								<!-- Shop Image Wrapper -->
								<div class="shop-img-wrap">
									<img width="500px" height="500px" src="<?php echo base_url();?>images/s_500.jpg" class="img-responsive" alt="Shop">
								</div><!-- Shop Wraper -->
								<!-- Shop Detail Wrapper -->
								
							</div><!-- Shop Wrapper -->
						</div><!-- Item -->
						
						<div class="item">
							<!-- Shop Grid Wrapper -->
							<div class="shop-wrap">
								<!-- Shop Image Wrapper -->
								<div class="shop-img-wrap">
									<img width="500px" height="500px" src="<?php echo base_url();?>images/orion.jpg" class="img-responsive" alt="Shop">
								</div><!-- Shop Wraper -->
								<!-- Shop Detail Wrapper -->
								
							</div><!-- Shop Wrapper -->
						</div><!-- Item -->
						
						<div class="item">
							<!-- Shop Grid Wrapper -->
							<div class="shop-wrap">
								<!-- Shop Image Wrapper -->
								<div class="shop-img-wrap">
									<img width="500px" height="500px" src="<?php echo base_url();?>images/incepta.jpg" class="img-responsive" alt="Shop">
								</div><!-- Shop Wraper -->
								<!-- Shop Detail Wrapper -->
								
							</div><!-- Shop Wrapper -->
						</div><!-- Item -->
						<div class="item">
							<!-- Shop Grid Wrapper -->
							<div class="shop-wrap">
								<!-- Shop Image Wrapper -->
								<div class="shop-img-wrap">
									<img width="500" height="500" src="<?php echo base_url();?>images/radiant.jpg" class="img-responsive" alt="Shop">
								</div><!-- Shop Wraper -->
								<!-- Shop Detail Wrapper -->
								
							</div><!-- Shop Wrapper -->
						</div><!-- Item -->
					</div><!-- Owl -->
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</section><!-- Section -->			

		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer');?>
<!-- Footer -->

<!-- library -->

<script src="<?php echo base_url();?>js_user/lib/jquery.js"></script>
<script src="<?php echo base_url();?>js_user/lib/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/jquery.appear.js"></script>
<script src="<?php echo base_url();?>js_user/lib/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/countdown.js"></script>
<script src="<?php echo base_url();?>js_user/lib/counter.js"></script>
<script src="<?php echo base_url();?>js_user/lib/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/jquery.mb.YTPlayer.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url();?>js_user/lib/jquery.stellar.min.js"></script>
<script src="<?php echo base_url();?>js_user/lib/menu.js"></script>

<script src="<?php echo base_url();?>js_user/lib/modernizr.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url();?>js_user/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url();?>js_user/custom.js"></script>

</body>
</html>
