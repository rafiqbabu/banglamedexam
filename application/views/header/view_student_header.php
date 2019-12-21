<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="icon" type="text/css" href="<?= base_url('images/favicon.png'); ?>">

    <title>GENESIS : SIF - <?= $module_name; ?></title>

    <!--Core CSS -->
    <link href="<?php echo base_url(); ?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <!--dynamic table-->
    <link href="<?php echo base_url(); ?>assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/data-tables/DT_bootstrap.css"/>

    <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == 'student_dashboard'): ?>
        <link href="<?php echo base_url(); ?>assets/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/clndr.css" rel="stylesheet">
        <!--clock css-->
        <link href="<?php echo base_url(); ?>assets/css3clock/css/style.css" rel="stylesheet">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/morris-chart/morris.css">
    <?php endif; ?>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet"/>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var site_url_path = '<?php echo base_url();?>';
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

<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="#" class="logo">
                <!--<img src="<?php /*echo base_url('images/logo-genesis.png'); */?>" alt="">-->
                GENESIS : SIF
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="nav notify-row" id="top_menu">

        </div>
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <?php if ($authUser->photo) : ?>
                            <img alt="" src="<?php echo base_url($authUser->photo) ?>">
                        <?php else : ?>
                            <img alt="" src="<?php echo base_url('') ?>images/user.jpg">
                        <?php endif; ?>
                        <span class="username"><?= $authUser->doc_name; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <li>
                            <p class="">User Profile</p>
                        </li>
                        <li>
                            <a href="<?php echo base_url('student_logout') ?>"><i class="fa fa-key"></i>Log Out</a>
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
                    <a href="<?= site_url('student_dashboard'); ?>"
                       class="<?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'index') echo 'active'; ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url("student_dashboard/profile/{$authUser->id}"); ?>"
                       class="<?php if ($this->uri->segment(1) == 'student_dashboard' && $this->uri->segment(2) == 'profile') echo 'active'; ?>">
                        <i class="fa fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?php //echo site_url("student_dashboard/payment_details/{$authUser->student_id}"); ?>"
                       class="<?php if ($this->uri->segment(1) == 'student_dashboard' && $this->uri->segment(2) == 'payment_details') echo 'active'; ?>">
                        <i class="fa fa-money"></i>
                        <span>Payment Details</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;"
                       class="<?php if ($this->uri->segment(1) == 'result' or $this->uri->segment(1) == 'marks_entry') echo 'active'; ?>">
                        <i class="fa fa-table"></i>
                        <span>Result</span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if ($this->uri->segment(1) == 'student_dashboard' and $this->uri->segment(2) == 'current_result') echo 'active'; ?>">
                            <a href="<?php //echo base_url('student_dashboard/current_result') ?>">Current Result</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('student_dashboard/show_routine')?>" class="<?php if($this->uri->segment(1) == 'student_dashboard' and $this->uri->segment(2) == 'show_routine') echo 'active';?>">
                        <i class="fa fa-list-alt"></i>
                        <span>Schedule</span>
                    </a>
                </li>
               
                <li>
                    <a href="<?= site_url('student_logout'); ?>">
                        <i class="fa fa-key"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->