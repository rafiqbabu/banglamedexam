<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="icon" type="text/css" href="<?= base_url('images/favicon.png'); ?>">

    <title>GENGSIS :: SIF - Doctor Login</title>

    <!--Core CSS -->
    <link href="<?php echo base_url();?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="<?php echo base_url();?>js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->
</head>

  <body class="">

  <div class="login-body">
      <div class="container">

          <form class="form-signin" method="post" action="<?php echo base_url('doctor_login/process'); ?>">
              <div class="login-wrap">

                  <div class="text-center">
                      <?php if ($company->logo) : ?>
                          <img class="img-responsive logo" src="<?= base_url($company->logo); ?>" alt="<?= $company->name; ?>">
                      <?php endif; ?>
                  </div>

                  <div class="user-login-info">
                      <h4 class="text-center">SIF :: Doctor Login</h4>
                      <?php
                      //            if (validation_errors()) {
                      //                echo validation_errors('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>');
                      //            }

                      if ($this->session->flashdata('flashOK')) {
                          echo"<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                          echo $this->session->flashdata('flashOK');
                          echo"</div>";
                      }
                      if ($this->session->flashdata('flashError')) {
                          echo"<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                          echo $this->session->flashdata('flashError');
                          echo"</div>";
                      }
                      echo form_hidden('login_type','S');
                      ?>
                      <!--<div class="form-group">
                          <input type="radio" checked name="login_type" id="student" value="S">
                          <label for="student">Student</label>
                          <input type="radio" name="login_type" id="parent" value="P">
                          <label for="parent">Parent</label>
                      </div>-->

                      <input type="text" name="username" class="form-control" placeholder="Student ID" autofocus>
                      <span class="text-danger"><?= form_error('username'); ?></span>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <span class="text-danger"><?= form_error('password'); ?></span>
                  </div>

                  <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

                                    <a href="<?= site_url();?>"><i class="fa fa-home"></i> Home</a>

                    <p class="copy"> Developed By <a href="http://bigm-bd.com" target="_blank">Big M Resources Ltd.</a></p>
              </div>

          </form>


      </div>
  </div>

    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="<?php echo base_url();?>js/lib/jquery.js"></script>
    <script src="<?php echo base_url();?>bs3/js/bootstrap.min.js"></script>

  </body>
</html>
