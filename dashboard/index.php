<?php include 'header.php'; ?>
 
<?php

if ($user['type'] == 'admin') {

 include 'home/admin.php';
  
}if($user['type'] == 'salesman'){ 
     include 'home/salesman.php';

}if($user['type'] == 'pharmasist'){
   include 'home/pharmasist.php';

}

?>

<?php include 'footer.php'; ?>