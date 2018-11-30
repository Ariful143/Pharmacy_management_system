<?php
include 'header.php';
///////////////
if(isset($_POST['orderPlace'])) {

    $invoice = $_SESSION['AddToCart'];

        $sql = "insert into users values('','".$_REQUEST['name']."','','','".$_REQUEST['phone']."','customer','1')";
        $con->query($sql);
        $last_id = $con->insert_id;
        $sql = "update orders set customer_id ='" . $last_id . "' , total_price = '".$_REQUEST['price']."' where id='" . $_REQUEST['orderPlace']. "'";
        $con->query($sql);


        $sql = "select * from order_details where order_id='".$_REQUEST['orderPlace']."'";
        $results = $con->query($sql); 
        foreach ($results as $result ) {

            $sql = "insert into quantitys values('','".$result['product_id']."','-".$result['quantity']."','1')";
            $con->query($sql);
            
        }
 

       unset($_SESSION['AddToCart']);
       unset($_SESSION['AddToCartID']);

        //header('location:'.$invoice);  

        echo "<script>document.location.href = 'invoice-print.php?invoice=".$invoice."'; </script>";


       
    }
     
if(isset($_REQUEST['request_for_update'])){
    $sql = "update products set status ='3'  where id='" . $_REQUEST['request_for_update']. "'";
    $con->query($sql);
}
    
if(isset($_REQUEST['empty'])){
    echo $sql = "delete  from order_details  where order_id='" . $_REQUEST['empty']. "'";
    $con->query($sql);
}

    //////////////

if(empty($_SESSION['AddToCart'])){
$_SESSION['AddToCart'] = "IN".rand(1000,9999);
} 

if(isset($_POST['add_to_cart'])) {
 

    if(empty($_SESSION['AddToCartID'])){
        $sql = "insert into orders values('','".$_REQUEST['order_id']."','','','".date('Y-m-d')."','1')";
        $con->query($sql);
        $last_id = $con->insert_id;
        $_SESSION['AddToCartID'] = $last_id;
        $sql = "insert into order_details values('','".$_SESSION['AddToCartID']."','".$_POST['add_to_cart']."','".$_REQUEST['quantity']."')";
        $con->query($sql);
    }else{
        $sql = "insert into order_details values('','".$_SESSION['AddToCartID']."','".$_POST['add_to_cart']."','".$_REQUEST['quantity']."')";
        $con->query($sql);
    } 
       
    
    
 
    $message = SuccessAlert('Successfully Updated');

}

if(isset($_REQUEST['delete'])) {

    SqlDelete('products',$_REQUEST['delete']);  
 $message = SuccessAlert('Successfully Updated');
}
if(isset($_REQUEST['status'])) {

    SqlStatus('products',$_REQUEST['product_id'],$_REQUEST['status']);  
 $message = SuccessAlert('Successfully Updated');
}

if(isset($_REQUEST['NewMedicine'])) {

    $sql = "insert into products values('','".$_REQUEST['product']."','".$_REQUEST['power']."','".$_REQUEST['type']."','".$_REQUEST['price']."','1')";
    $con->query($sql);
    $last_id = $con->insert_id;
    $sql = "insert into quantitys values('','".$last_id."','".$_REQUEST['quantity']."','1')";
    $con->query($sql);
    $message = SuccessAlert('Successfully Updated');
     //header('location:questions.php');  

}

?>
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Sale Medicine
            </h1>
            
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                <?php if(isset($message)){ echo $message;}?>
 
                    
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>Invoice <?php if(isset($_SESSION['AddToCart'])){ echo $_SESSION['AddToCart'];} ?> </h3>
 
                        </div>
                    <form method="post" action="">
                        <div class="panel-body">
                           
                             <table  class="table table-bordered table-striped">
                                <tr style="background: silver;">
                                    <th>Items</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    
                                </tr>
                                <?php 
                                    $sql = "select * from order_details where order_id = '".$_SESSION['AddToCartID']."'";
                                    $results = $con->query($sql);
                                    $i =1 ;
                                    $total = 0;
                                    foreach($results as $result) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo getMedicineName($result['product_id']); ?></td>
                                    <td><?php echo $result['quantity']; ?></td>
                                    <td><?php echo $result['quantity']."  * ".getMedicinePrice($result['product_id']); ?></td>
                                </tr>
                                 <?php $total = $total+ ($result['quantity']*getMedicinePrice($result['product_id']));  $i++; } ?>
                                <tr style="background: silver;">
                                    <td colspan="2"></td>
                                    <td>Total</td>
                                    <td ><?php echo $total." TK"; ?></td>
                                   
                                </tr>
                                <tr>
                                    <td colspan="2"><?php input_text('name','','Enter Customer Name');?></td>
                                    <td colspan="2"><?php input_text('phone','','Enter Customer Phone');?></td>
                                </tr>
                                
                            </table>

                        </div>
                        <div class="panel-footer text-center">
                            <button name="orderPlace" value="<?php if(isset($_SESSION['AddToCartID'])){ echo $_SESSION['AddToCartID'];} ?>" class="btn btn-success ">Submit</button>
                            <input type="hidden" name="price" value="<?php echo $total; ?>">
                            <button type="submit" name="empty" type="button" value="<?php if(isset($_SESSION['AddToCartID'])){ echo $_SESSION['AddToCartID'];} ?>" class="btn btn-warning "><i class="fa fa-trash"></i> Empty</button>
                        </div>
                        </form>
                    </div>
                    
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                
                    
                    <div class="box">
                        <div class="box-body">
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Power</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>Add to cart</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                            
                                $sql = "select * from products where status='1' ORDER BY id DESC";
                                $results = $con->query($sql);
                                $i = 1;
                                foreach($results as $result) {
                                    
                                    ?>
                                    <tr>
                                        <form method="post" action="">

                                        <td><?php echo $result['product'];?> </td>
                                        <td><?php echo $result['power'];?> </td>
                                        <td><?php echo getMedicineType($result['type_id']);?> </td>
                                        <td><?php echo $result['price'];?> </td>
                                        <td><?php echo getQuantity($result['id']); ?> </td>
                                        <td>
                                            <?php select_digit('quantity',1,getQuantity($result['id']),getQuantity($result['id']));?>
                                        </td>
                                        <td>
                                        <?php if(getQuantity($result['id']) < 5 ){ ?>
                                            <button type="submit" class="btn btn-warning btn-sm" name="request_for_update" value="<?php echo $result['id'];?>"> Request For update </button>
                                        <?php }else{ ?>
                                            <button type="submit" class="btn btn-success btn-sm" name="add_to_cart" value="<?php echo $result['id'];?>"> Add To Cart</button>
                                        <?php }?>
                                            <input type="hidden" name="order_id" value="<?php echo($_SESSION['AddToCart']);?>">
                                            
                                        </td>
                                        

                                    </form>
                                    </tr>
                                    <?php
	}
	
	?>

                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.box-body -->
                    </div>
                    
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    
    
<?php
include 'footer.php';

?>