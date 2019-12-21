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
        
        <link rel="icon" type="text/css" href="<?= base_url('images/favicon.png'); ?>">
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
		<link rel="stylesheet" href="../../../css_user/tree_style.css">
		<script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript" > </script>
		
  <script type="text/javascript">
  	$( document ).ready( function( ) {
    $( '.tree li' ).each( function() {
        if( $( this ).children( 'ul' ).length > 0 ) {
            $( this ).addClass( 'parent' );     
        }
    });
 
    $( '.tree li.parent > a' ).click( function( ) {
        $( this ).parent().toggleClass( 'active' );
        $( this ).parent().children( 'ul' ).slideToggle( 'fast' );
    });
 
    $( '#all' ).click( function() {
 
        $( '.tree li' ).each( function() {
            $( this ).toggleClass( 'active' );
            $( this ).children( 'ul' ).slideToggle( 'fast' );
        });
    });
 
});
  </script>
 <style type="text/css">
  	
  	.tree ul li a:hover{
	/*background: #5DADE2;*hoverhoverhoverhover*/
	background : #63A5F2;
	color:white;
	
	/*padding:5px 4px 5px 8px;*/
	
}

	.tree ul li {	
		padding:5px 4px 5px 8px;
		
	}

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
									<i class="fa fa-user-o" aria-hidden="true"></i>
									

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
									<h5>Prove Yoursel</h5>
									
									<h5><a href="">Registration Now</a></h5>
									
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
									<i class="fa fa-book" aria-hidden="true"></i>
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
			<div class="row">
				
			</div><!-- Row -->
			
			<!-- Team Container -->
			<div class="row">
				<div class="col-sm-6">
					<div>
						<a href="#" class="btn btn-block" style="height:50px;background-color: #2e86c1">BCPS</a>
					</div><!-- Pricing Footer -->
					<div id="menuh-container pricing-body" style="background: #ffffff;">
						<div class="tree menuh">
							<ul>
								<?php
								    	if($course_lists){
								    		foreach ($course_lists as $key => $value) {							
						   			 ?>
								    <li><a><?php echo $value->course_name;?></a>
									    <?php 
											echo get_faculty_under_course($value->id);
										?>	
								    </li>
							     <?php
							 	}
							 }
							     ?>  
							</ul>
						</div>
					</div>	
				</div><!-- Column -->
				

				<div class="col-sm-6">
					<div>
						<a href="#" class="btn btn-block" style="height:50px;background-color: #2e86c1">BSMMU</a>
					</div><!-- Pricing Footer -->
					<div id="menuh-container pricing-body" style="background: #ffffff;">
						<div class="tree menuh">
							<ul>
								<?php
								    	if($bsmmu_course_lists){
								    		foreach ($bsmmu_course_lists as $key => $value) {							
						   			 ?>
								    <li><a><?php echo $value->course_name;?></a>
									    <?php 
											echo get_faculty_under_course($value->id);
										?>	
								    </li>
							     <?php
							 	}
							 }
							     ?>  
							</ul>
						</div>
					</div>	<!-- end the menuh div --> 
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</section><!-- Section -->
	<section id="pricing" class="typo-dark" style="padding-top:10px;padding-bottom:20px;">
		<div class="container" style="max-width:1180px;">
			<div class="row">
				
			</div><!-- Row -->
			
			<!-- Team Container -->
			<div class="row">
				<div class="col-sm-6">
					<div>
							<a href="#" class="btn btn-block" style="height:50px;background-color: #2e86c1">ABROD</a>
						</div><!-- Pricing Footer -->
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
				</div><!-- Column -->


				<div class="col-sm-6">
					<!-- Pricing Wrapper -->
					<div class="pricing-wrap" style="padding:0px;">
						
						<!-- Pricing Footer (Book Button) -->
						<div>
							<a href="#" class="btn btn-block" style="height:50px;background-color: #2e86c1">UNDER GRADUATE</a>
						</div><!-- Pricing Footer -->
							<ul class="pricing-body">
								<!-- <li>$3200<span class="duration">/3 Years</span></li>
								<li>$3200<span class="duration">/3 Years</span></li>
								<li>$3200<span class="duration">/3 Years</span></li>
								<li>$3200<span class="duration">/3 Years</span></li> -->
							</ul>
						
					</div><!-- Pricing Wrapper -->
				</div><!-- Column -->

			</div><!-- Row -->
		</div><!-- Container -->
	</section><!-- Section -->
	<!--<section id="pricing" class="typo-dark" style="padding-top:0px;padding-bottom:10px;">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Medicine</h3>
						</div>
						<div class="panel-body">
							<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry </p>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Surgery</h3>
						</div>
						<div class="panel-body">
							<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry </p>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Basic Science</h3>
						</div>
						<div class="panel-body">
							<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry </p>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Dentist</h3>
						</div>
						<div class="panel-body">
							<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	
	<section style="margin-top:76px;padding-bottom: 15px;">
		<div class="container" >
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-danger">

						<div class="panel-heading">
							<h5 class="panel-title">Free Test</h5>
						</div>
						<div class="panel-body">
							<div class="col-sm-4">
								<div class="form-group ">
			                        <label for="Course" class="control-label col-lg-12 heading">
			                        	1. Which of the following is a trinucleotide repeat disorder?
			                        </label>
		                    	</div>

								<div class="form-group " id="">	                    	   
				                    <div class="col-lg-12 test" style="padding-left:32px;">

				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">A</span>Commence IV Thiamine 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
									  <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">B</span> IM glucagon 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">C</span>IV dextrose 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">D</span>Liason psychiatry 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">E</span>IV magnesium 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      
				                    </div>
		                    	</div>
		                    	<div class="col-sm-12">
				                    	<div class="panel panel-info">
											<div class="panel-body">
												 <label for="Course" class="control-label col-lg-12">
			                        <a href="#"><i class="fa fa-book" aria-hidden="true"> View Answer</i></a><a href="#"><i class="fa fa-users" aria-hidden="true"> Discuss in Forum </i></a>
			                        </label>
											</div>
										</div>
	                			</div>
	                        </div>
	                        <div class="col-sm-4">
								<div class="form-group ">
			                        <label for="Course" class="control-label col-lg-12 heading">
			                        	2.  A dexamethasone test shows that a patients cortisol levels fail to change.
			                        </label>
		                    	</div>

								<div class="form-group " id="">	                    	   
				                    <div class="col-lg-12 test" style="padding-left:32px;">

				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">A</span>Cushings disease 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
									  <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">B</span>Ectopic ACTH producing tumour 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">C</span>Pseudo Cushings syndrome 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">D</span>Adrenal tumour 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">E</span>Hypothyroidism 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                    </div>
		                    	</div>
		                    	<div class="col-sm-12">
				                    	<div class="panel panel-info">
											<div class="panel-body">
												 <label for="Course" class="control-label col-lg-12">
			                        <a href="#"><i class="fa fa-book" aria-hidden="true"> View Answer</i></a><a href="#"><i class="fa fa-users" aria-hidden="true"> Discuss in Forum </i></a>
			                        </label>
											</div>
										</div>
	                			</div>
	                        </div>	
	                        <div class="col-sm-4">
								<div class="form-group ">
			                        <label for="Course" class="control-label col-lg-12 heading">
			                        	3.  Which of the following increases during the acute phase response?
			                        </label>
		                    	</div>

								<div class="form-group " id="">	                    	   
				                    <div class="col-lg-12 test" style="padding-left:32px;">

				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">A</span>Transferrin 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
									  <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">B</span>Ferritin 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">C</span>Albumin 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">D</span>Caeruloplasmin 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      <label class="choose_ans_AA">
				                      	<input type="radio" name="optradio" data-targetId="target" data-id="" value="A">
				                      	<span  class="list_sty">E</span>Insulin growth factor 1 
				                      	<span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
				                      </label><br>
				                      
				                    </div>
		                    	</div> 
		                    </div>
		                    <div class="col-sm-4">
		                    	<div class="panel panel-info">
									<div class="panel-body">
										 <label for="Course" class="control-label col-lg-12">
	                        <a href="#"><i class="fa fa-book" aria-hidden="true"> View Answer</i></a><a href="#"><i class="fa fa-users" aria-hidden="true"> Discuss in Forum </i></a>
	                        </label>
									</div>
								</div>
	                		</div>       		
						</div>

					</div>
				</div>
			</div>
		</div>
		</section>
		
		<section class="pad-tb-none" style="padding-top: 8px;">
		<div class="container">
			<div class="row" style="margin: 0px;">
				
				<div class="col-md-6 col-eq-height pad-60" style="background-color: #ffffff;">
					<!-- Title -->
					<div class="title-container sm text-left">
						<div class="title-wrap">
							<h4 class="title">Message Of <span class="typo-thin">Genesis</span></h4>
							
						</div>
						<div class="simple-quote margin-top-30"> 							
							<p class="margin-bottom-30">Discover all the secrets and techniques for designing professional looking websites in a simple and perfect way... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum</p>							
						</div>
					</div>
				</div><!-- Column -->
				
				<div class="col-md-6 col-eq-height typo-light bg-img bg-cover" data-background="images/banner/bg-book-05.jpg" >
					<img src="<?php echo base_url();?>images/new1.jpg">
				</div><!-- Column  -->
				
			</div><!-- Row -->
		</div><!-- Container Fluid -->
	</section><!-- Section -->	
	
	<section style="padding-bottom: 15px;padding-top: 18px;">
		<div class="container" >
			<div class="row">
				<div class="col-md-12">
					<!-- Title -->
					
					<div class="owl-carousel nav-dark" 
						data-animatein="zoomIn" 
						data-animateout="" 
						data-items="1" 
						data-loop="true" 
						data-merge="true" 
						data-nav="true" 
						data-dots="false" 
						data-margin="" 
						data-stagepadding="" 
						data-mobile="2" 
						data-tablet="3" 
						data-desktopsmall="4"  
						data-desktop="5" 
						data-autoplay="false" 
						data-delay="3000" 
						data-navigation="true">
						<div class="item"><img src="<?php echo base_url();?>images/logo_addd.jpg" alt="..." width="140" height="80"></div>
						<div class="item"><img src="<?php echo base_url();?>images/register.png" alt="..." height="80" width="140"></div>
						<div class="item"><img src="<?php echo base_url();?>images/subjects.png" alt="..." height="80" width="140"></div>
						<div class="item"><img src="<?php echo base_url();?>images/topics.png" alt="..." height="80" width="140"></div>
						<div class="item"><img src="<?php echo base_url();?>images/1.png" alt="..." height="80" width="140"></div>
						
					</div><!-- carousel -->
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
