<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="BIGM">
    <link rel="icon" type="text/css" href="<?= base_url('images/favicon.png'); ?>">

    <title><?= $company->name; ?></title>

    <!--Core CSS -->
    <link href="<?php echo base_url(); ?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->
</head>

<body class="">

<div class="login-body">
    <div class="container landing">
        <h1>
            <img src="<?= base_url($company->logo) ?>" alt="<?= $company->name ?> Logo">
        </h1>

        <div class="row">

            <h2>
                <!--<img src="<?/*= base_url('images/logo-bigm-new.png') */?>" alt="Bigm">-->
                <?= $company->name ?>
            </h2>
            <div class="col-md-8 col-md-offset-2">
                <div class="row login-block">
                    <div class="col-sm-4">
                   <!--   <a href="<?= site_url('login?type=teacher') ?>"><img class="img-responsive" src="<?= base_url('images/classroom1.png') ?>" alt="Teacher Login"><span>Teacher Login</span></a>-->
                    </div>
                     <div class="col-sm-4"><a href="<?= site_url('login?type=admin') ?>"><img class="img-responsive" src="<?= base_url('images/admin.png') ?>" alt="Admin Login"><span>Admin Login</span></a></div>
                    <div class="col-sm-4">
                        <!-- <a href="<?= site_url('doctor_login') ?>"><img class="img-responsive" src="<?= base_url('images/doctor.png') ?>" alt="Student Login"><span>Doctor Login</span></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo base_url(); ?>js/lib/jquery.js"></script>
<script src="<?php echo base_url(); ?>bs3/js/bootstrap.min.js"></script>

</body>
</html>
