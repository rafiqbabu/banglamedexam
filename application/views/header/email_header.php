<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $subject; ?></title>
	<link href="<?php echo base_url( 'bs3/css/bootstrap.min.css?v=' . config_item( 'app_version' ) ); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url( 'css/email.css?v=' . config_item( 'app_version' ) ); ?>">
</head>
<body>

<div class="content">
	<p class="text-center">
		<img src="<?= base_url( $company->logo ); ?>" alt="<?= $company->name; ?>" height="100px">
	</p>
	<hr>
