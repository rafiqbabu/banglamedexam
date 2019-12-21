<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Page Not Found</title>
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #FFEBEE;
            margin: 0;
            font: 13px/20px normal;
            color: #4F5155;
            font-family: 'Patua One', cursive;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #FF5252;
            font-size: 36px;
            font-weight: normal;
            margin: 0;
            padding: 14px 15px 10px 15px;
            line-height: 2;
            border-bottom: 1px solid;
            padding-top: 20vh;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #container {
            width: 100vw;
            box-shadow: 0 0 8px #D0D0D0;
            text-align: center;
            height: 100vh;
        }

        p {
            font-size: 18px;
            margin: 12px 15px 12px 15px;
        }

        .btn-home {
            padding: 10px 30px;
            display: inline-block;
            background: #9CCC65;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            margin-top: 30px;
            clear: both;
        }
    </style>
</head>
<body>
<div id="container">
    <h1>WHOOPS! <br> <?php echo $heading; ?></h1>
    <?php echo $message; ?>
    <a href="<?= config_item( 'base_url' ) ?>" class="btn-home">Home</a>
</div>
</body>
</html>