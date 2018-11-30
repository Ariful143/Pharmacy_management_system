<?php
/**
 * Created by PhpStorm.
 * User: MegaMind
 * Date: 6/24/2018
 * Time: 2:19 AM
 */

$db = 'pharmacy_management';
$user = 'root';
$pass = '';
$con = mysqli_connect("localhost",$user,$pass,$db);
global $con;
if(!$con){
   echo "Database Connect";
}

error_reporting(0);