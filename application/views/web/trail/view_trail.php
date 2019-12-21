<!DOCTYPE html>
<html>
	<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title></title>
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
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/univershicon.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/prettyPhoto.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/menu.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/lib/timeline.css">
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/theme.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/theme-responsive.css">
		
		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->
		
		<!-- Skins CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/skins/default.css">
		
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
	</head>
<body>

	
<!-- Header Begins -->	
<?php 
	$this->load->view('header/header_top');
?>

<!-- Page Header -->
<div class="page-header bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<!-- Page Header Wrapper -->
				<div class="page-header-wrapper">
					<!-- Title & Sub Title -->
					<h3 class="title"><?php //echo get_name_by_auto_id('exam_topics',$value->topic_id,'topic_name'); ?></h3>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li class="active">Course</li>
					</ol><!-- Breadcrumb -->
				</div><!-- Page Header Wrapper -->
			</div><!-- Coloumn -->
		</div><!-- Row -->
	</div><!-- Container -->
</div><!-- Page Header -->

<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey typo-dark" style="padding-top:0px;">
		<!-- Container -->
		<div class="container" style="background:#fff;">
			<!-- Course Wrapper -->
			<div class="row course-single">
				<div class="col-sm-3">
				</div>				
				<div class="col-sm-9">
					<div class="form" id="form">
					<script type="text/javascript">
						find_answer_url = '<?php echo site_url('user/find_answer');?>';
					</script>
					<?php 
						if($question_lists){
						foreach ($question_lists as $key => $value) {
						$key = $key+1; 
					?>
						<div class="form-group ">
	                        <label for="Course" class="control-label col-lg-12 heading">
	                        <?php echo $key.'.'.' '.$value->question;?> 
	                        </label>
	                    </div>
	                    <div class="form-group " id="target_<?= $key ?>">	                    	   
		                    <div class="col-lg-12 test" style="padding-left:32px;">

		                      <label class="choose_ans_AA">
		                      	<input type="radio" name="optradio" data-targetId="target_<?= $key ?>" data-id="<?= $value->id; ?>" value="A">
		                      	<span  class="list_sty">A</span> 
		                      	<?php echo $value->option_1;?><span class="choose_ans_A" style="color:green; font-weight: bold; padding-left: 10px;"></span>
		                      </label><br>

		                      <label class="choose_ans_BB">
		                      	<input type="radio" name="optradio" data-targetId="target_<?= $key ?>" data-id="<?= $value->id; ?>" value="B">
		                      	<span class="list_sty">B</span> 
		                      	<?php echo $value->option_2;?><span class="choose_ans_B" style="color: green; font-weight: bold; padding-left: 10px;"></span>
		                      </label><br>

		                      <label class="choose_ans_CC">
		                      	<input type="radio" name="optradio" data-targetId="target_<?= $key ?>" data-id="<?= $value->id; ?>" value="C">
		                      	<span class="list_sty">C</span> 
		                      	<?php echo $value->option_3;?><span class="choose_ans_C" style="color: green; font-weight: bold; padding-left: 10px;"></span>
		                      </label><br>

		                      <label class="choose_ans_DD">
		                      	<input type="radio" name="optradio" data-targetId="target_<?= $key ?>" data-id="<?= $value->id; ?>" value="D">
		                      	<span class="list_sty">D</span> 
		                      	<?php echo $value->option_4;?><span class="choose_ans_D" style="color: green; font-weight: bold; padding-left: 10px;"></span>
		                      </label>    
		                    </div>
	                    </div>
	                    <div class="form-group wk-progress">
	                        <label for="Course" class="control-label col-lg-12">
	                        <a href="#"><i class="fa fa-book" aria-hidden="true"> View Answer</i></a> 
	                        <a href="#"><i class="fa fa-file-text" aria-hidden="true"> Workspace</i></a> 
	                        <a href="#"><i class="fa fa-users" aria-hidden="true"> Discuss in Forum </i></a>
	                        </label>

	                    </div>

	                <?php
					}
					}          
	                ?>   
					</div>
					<div class="form-group">
	                <a href="#" class="btn btn-info" role="button">Read More...</a>
	            </div>
				</div><!-- Column -->
					
			</div><!-- Course Wrapper -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('footer/footer');?>
<!-- Footer -->

<!-- library -->
<script src="<?php echo base_url();?>js/lib/jquery.js"></script>
<script src="<?php echo base_url();?>js/lib/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/lib/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url();?>js/lib/jquery.appear.js"></script>
<script src="<?php echo base_url();?>js/lib/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>js/lib/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>js/lib/countdown.js"></script>
<script src="<?php echo base_url();?>js/lib/counter.js"></script>
<script src="<?php echo base_url();?>js/lib/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url();?>js/lib/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url();?>js/lib/jquery.mb.YTPlayer.min.js"></script>
<script src="<?php echo base_url();?>js/lib/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url();?>js/lib/jquery.stellar.min.js"></script>
<script src="<?php echo base_url();?>js/lib/menu.js"></script>

<script src="<?php echo base_url();?>js/lib/modernizr.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url();?>js/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url();?>js/custom.js"></script>

</body>
</html>
