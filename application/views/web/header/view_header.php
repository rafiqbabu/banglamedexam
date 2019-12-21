<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Basic -->
    
    <title><?= "{$company->name} :: {$page_title }"; ?></title>
    <meta name="keywords" content=""/>
    <meta name="description" content="<?= "{$company->name} - {$company->tagline}" ?>">
    <meta name="author" content="Medigene IT">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url( 'images/favicon.png' ); ?>">
    <!-- Web Fonts  -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!--    <link href="https://fonts.googleapis.com/css?family=Barlow:100,100i,400,400i,500,500i,700,700i" rel="stylesheet">-->
    <!-- Lib CSS -->
    <link rel="stylesheet" href="<?php echo base_url( 'css_user/lib/bootstrap.min.css' ); ?>">
    <!--    <link rel="stylesheet" href="--><?php //echo base_url('css_user/lib/animate.min.css');?><!--">-->
    <link rel="stylesheet" href="<?php echo base_url( 'css_user/lib/font-awesome.min.css' ); ?>">
    <link rel="stylesheet" href="<?php echo base_url( 'css_user/lib/univershicon.css' ); ?>">
    <link rel="stylesheet" href="<?php echo base_url( 'css_user/lib/owl.carousel.css' ); ?>">
    <!--    <link rel="stylesheet" href="--><?php //echo base_url('css_user/lib/prettyPhoto.css');?><!--">-->
    <link rel="stylesheet" href="<?php echo base_url( "css_user/lib/menu.css?v=" . config_item( 'app_version' ) ); ?>">
    <!--    <link rel="stylesheet" href="--><?php //echo base_url('css_user/lib/timeline.css');?><!--">-->

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url( "css_user/theme.css?v=" . config_item( 'app_version' ) ); ?>">
    <link rel="stylesheet" href="<?php echo base_url( "css_user/theme-responsive.css?v=" . config_item( 'app_version' ) ); ?>">

    <!--[if IE]>
    <link rel="stylesheet" href="<?php echo base_url('css/ie.css');?>">
    <![endif]-->

    <!-- Skins CSS -->
    <link rel="stylesheet" href="<?php echo base_url( 'css_user/skins/default.css' ); ?>">

     <link rel="stylesheet" href="<?php echo base_url( 'css/new_style.css' ); ?>">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url( "css_user/custom.css?v=" . config_item( 'app_version' ) ); ?>">
    <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->

    <script type="text/javascript">
        const BASE_URL = '<?= site_url(); ?>';
    </script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142900668-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142900668-1');
</script>




<style>
     @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}
     
 </style>
 
 


</head>
<body>
