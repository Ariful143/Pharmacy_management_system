<?php
/**
 * Created by PhpStorm.
 * User: MegaMind
 * Date: 6/24/2018
 * Time: 3:26 AM
 */

session_start();
session_destroy();
header("Location:index.php");
