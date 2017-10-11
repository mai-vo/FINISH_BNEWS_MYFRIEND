<?php
    ob_start();
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"]."/functions/connectDB.php";
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions/defines.php';
   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
   
   <script type="text/javascript" src="/libraries/jquery/jquery-3.1.1.min.js"></script> 
    <script type="text/javascript" src="/libraries/jquery/jquery.validate.min.js"></script>
    
    <link rel="apple-touch-icon" sizes="76x76" href="/templates/admin/assets/img/apple-icon.png">
    <link rel="icon" type="/templates/admin/image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    

    <title>AdminCP - VinaEnter</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/templates/admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/templates/admin/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="/templates/admin/assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/templates/admin/assets/css/demo.css" rel="stylesheet" />
    <link href="/templates/admin/assets/css/stylemai.css" type="text/css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/templates/admin/assets/css/themify-icons.css" rel="stylesheet">
    <script type="text/javascript" src="/libraries/ckeditor/ckeditor.js"></script>

</head>

