<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Big M Resources Ltd.">
    <meta name="author" content="Big M Resources Ltd.">
    <link rel="icon" type="text/css" href="<?= base_url('images/favicon.png'); ?>">

    <title>GENESIS : Online - <?php echo $module_name; ?></title>

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
    <script src="<?php echo base_url(); ?>js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var site_url_path = '<?php echo base_url(); ?>';
    </script>
</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="<?= site_url(); ?>" class="logo">
                <!--<img src="<?php /* echo base_url('images/logo-genesis.png'); */ ?>" alt="">-->
                GENESIS : Online Exam
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="nav notify-row" id="top_menu">
            <ul class="breadcrumbs-alt">
                <?php foreach ($breadcrumb as $cumb) : ?>
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
                        <?php if ($authUser->image) : ?>
                            <img alt="" src="<?php echo base_url($authUser->image) ?>">
                            <!-- <img alt="" src="<?php echo base_url('') ?>images/user.jpg"> -->
                        <?php else : ?>
                            <img alt="" src="<?php echo base_url('') ?>images/user.jpg">
                        <?php endif; ?>
                        <span class="username"><?php echo $authUser->last_name; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <li>
                            <p class="">User Profile</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5><?php echo $authUser->first_name . ' ' . $authUser->last_name; ?></h5>
                                        <p><?php echo $authUser->role; ?></p>
                                    </div>
                                            <span class="pull-right" data-percent="90">
                                                <?php if ($authUser->image) : ?>
                                                    <img alt="" src="<?php echo base_url($authUser->image) ?>">
                                                <?php else : ?>
                                                    <img alt="" src="<?php echo base_url('') ?>images/user.jpg">
                                                <?php endif; ?>
                                            </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('logout') ?>"><i class="fa fa-key"></i>Log Out</a>
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
                    <a href="<?= site_url('dashboard'); ?>"
                       class="<?php if ($this->uri->segment(1) == 'Dashboard') echo 'active'; ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

               
                <?php if ($this->ion_auth->is_admin() || $this->ion_auth->in_group(2)): ?>

                    <li class="sub-menu">
                        <a href="javascript:;"
                           class="<?php if ($this->uri->segment(1) == 'Exam_question') echo 'active'; ?>">
                            <i class="fa fa-plus-square"></i>
                            <span>Exam Question</span>
                        </a>
                        <ul class="sub">
                            <li class="<?php if ($this->uri->segment(1) == 'Exam_question' and $this->uri->segment(2) == '') echo 'active'; ?>">
                                <a href="<?php echo base_url('exam_question/add_examquestion') ?>">Add SBA Question</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(1) == 'Exam_question' and $this->uri->segment(2) == '') echo 'active'; ?>">
                                <a href="<?php echo base_url('exam_question/examquestion_list') ?>">SBA Question List</a>
                            </li>
                        
                            <li class="<?php if ($this->uri->segment(1) == 'Exam_question' and $this->uri->segment(2) == '') echo 'active'; ?>">
                                <a href="<?php echo base_url('exam_question/add_mcq_examquestion') ?>">Add MCQ Question</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(1) == 'Exam_question' and $this->uri->segment(2) == '') echo 'active'; ?>">
                                <a href="<?php echo base_url('exam_question/mcq_examquestion_list') ?>">MCQ Question List</a>
                            </li>
                        </ul>     
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;"
                           class="<?php if ($this->uri->segment(1) == 'exam_create') echo 'active'; ?>">
                            <i class="fa fa-book"></i>
                            <span>Exam</span>
                        </a>
                        <ul class="sub">
                            <li class="<?php if ($this->uri->segment(1) == 'exam_create' and $this->uri->segment(2) == '') echo 'active'; ?>">
                                <a href="<?php echo base_url('exam_create/create_exam') ?>">Exam Create</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(1) == 'exam_create' and $this->uri->segment(2) == '') echo 'active'; ?>">
                                <a href="<?php echo base_url('exam_create/exam_list') ?>">Exam List</a>
                            </li>                          
                        </ul>     
                    </li> 


                    <li class="sub-menu">
                        <a href="javascript:;" class="<?php if ($this->uri->segment(1) == 'setting') echo 'active'; ?>">
                            <i class="fa fa-cog"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="sub">
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'general_info') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/general_info') ?>">General Information</a></li>
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'add_institute') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/add_institute/') ?>">Institute</a></li>
                           
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'add_course') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/add_course/') ?>">Course</a></li>
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'add_faculty') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/add_faculty/') ?>">Faculty</a></li>
                           
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'subject') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/add_subject/') ?>">Subject</a></li>
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'add_chapter') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/add_chapter/') ?>">Chapter</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'add_topics') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/add_topics/') ?>">Topics</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(1) == 'setting' and $this->uri->segment(2) == 'exam_category') echo 'active'; ?>">
                                <a href="<?php echo base_url('setting/exam_category/') ?>">Exam Category</a>
                            </li>

                        </ul>
                    </li>  

                <?php endif; ?>

               
                <li>
                    <a href="<?php //echo site_url('logout');  ?>">
                        <i class="fa fa-key"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->