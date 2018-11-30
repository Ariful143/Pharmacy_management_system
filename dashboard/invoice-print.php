<?php
include "../inc/security.php";
date_default_timezone_set("Asia/Dhaka");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../css/bootstrap/dist/css/bootstrap.min.css"> 
  <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="../css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/css/AdminLTE.min.css"> 
 
 
  <!-- Google Font //onload="window.print();" -->
</head>
<body onload="doPrint();" >
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Ist Pharmacy.
          <small class="pull-right">Date: <?php echo date('Y-m-d');?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    
    <?php 

        $sql2 = "select * from orders where invoice_no='".$_REQUEST['invoice']."'";
        $infos = $con->query($sql2);
        $info = $infos->fetch_array();

    ?>
    <div class="row invoice-info">
    <div class="col-xs-8 col-xs-offset-2">
      
      
        <b>Invoice # <?php echo $_REQUEST['invoice']; ?></b><br>
        <br> 
        <b>Customer Name : </b><?php echo getCustomerName($info['customer_id']); ?><br><br> 
        <b>Phone :</b> <?php echo getCustomerPhone($info['customer_id']); ?>
        <br> <br> 
      </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        <table class="table table-bordered">
          <thead>
          <tr  style=" background: silver; ">
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th> 
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <?php 
            $sql2 = "select * from order_details where order_id='".$info['id']."'";
            $infos = $con->query($sql2);
            $total = 0;
            foreach($infos as $info ){
    
          ?>
          <tr >
            <td><?php echo getMedicineName($info['product_id']); ?></td>
            <td><?php echo $info['quantity']; ?></td>
            <td><?php echo getMedicinePrice($info['product_id']); ?></td>
            <td><?php echo  ($info['quantity'] * getMedicinePrice($info['product_id'])); 
             $total = $total + ($info['quantity'] * getMedicinePrice($info['product_id']));
            ?> Tk </td>
          </tr> 
            <?php } ?>
             
            <tr style=" background: silver; ">
              <td></td>
              <td></td> 
              <td>Total:</td>
              <td><?php echo $total ;?> Tk</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->

      <!-- /.col -->
      <div class="col-xs-8 col-xs-offset-2 ">
        <div class="table-responsive">
          <table class="table table-striped">  
            <tr>
            
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script>
function doPrint() {
    window.print();            
    document.location.href = "sales.php"; 
}
</script>
</body>
</html>
