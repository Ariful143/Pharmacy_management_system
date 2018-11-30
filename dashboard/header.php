<?php
include "../inc/security.php";
date_default_timezone_set("Asia/Dhaka");

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PMS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../css/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../css/jquery-jvectormap.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <!-- i check -->
    <link rel="stylesheet" href="../css/iCheck/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/css/AdminLTE.min.css"> 
    <link rel="stylesheet" href="../css/css/skins/_all-skins.min.css"> 
    <!-- daterange picker -->
  <link rel="stylesheet" href="../css/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../css/bootstrap-timepicker.min.css">

  
    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="../css/form-wizard/jquery.steps.css" />

    <script>
        var ajaxurl = '../inc/actions.php'; 
    </script>
    <style type="text/css">
        body .wrapper{
            overflow: hidden;
        }
    </style> 
    
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

<?php include "menus.php"; ?>

