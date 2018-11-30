<?php
include 'header.php';

if(isset($_POST['UpdateMedicine'])) {
 

    $sql = "update products set product='$_POST[product]', power='$_POST[power]',type_id='$_POST[type]',price='$_POST[price]',status=1 where id='".$_REQUEST['edit']."'";
    $con->query($sql);

     $totalQuantity =  getQuantity($_REQUEST['edit']); 
    $quantity = $_POST['quantity'] - $totalQuantity;
     

    $sql = "insert into quantitys values('','".$_REQUEST['edit']."','".$quantity."','1')";
    $con->query($sql);
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
                Medicine
            </h1>
            <ol class="breadcrumb">
                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#NewQuestionModal"><i class="fa fa-pencil"></i>  New Medicine</button>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                <?php if(isset($message)){ echo $message;}?>

                    <!-- /.box -->
                    <?php
                        if(!empty($_REQUEST['edit'])) {

                            $sql2 = "select * from products where id='".$_REQUEST['edit']."'";
                            $infos = $con->query($sql2);
                            $info = $infos->fetch_array();
                	?>
                    <form method="post" action="">
                    <div class="box box-info box-solid">

                        <div class="box-header">
                            <h2 class="box-title">Edit Medicine </h2>
                        </div>
                        <div class="box-body">



                        <div class="col-xs-12"> 
                            
                            <div class="input-group">
                            <span class="input-group-addon">Name </span>
                            <?php input_text('product',$info['product']);?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Power </span>
                            <?php input_text('power',$info['power']);?>
                            
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Type </span>


                            <?php input_select('type','types',$info['type_id'],'','type');?>
                        </div>
                        <br>
                        
                        <div class="input-group">
                            <span class="input-group-addon">Price </span>
                            <?php input_text('price',$info['price']);?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Quantity </span>
                            <?php input_text('quantity',getQuantity($info['id']));?>
                        </div>
                        <br>    

                  
                        <!-- /.box-body -->
                    </div>
                           

                        </div>
                        <!-- /.box-body -->
                            <div class="box-footer text-center">

                                <a href="medicines.php"><button type="button" name="UpdateQuestion"  class="btn btn-warning"><?php echo faicon('reply')?> Back</button> 
                                <button type="submit" name="UpdateMedicine" value="<?php echo $_REQUEST['edit']; ?>" class="btn btn-primary"><?php echo faicon('save')?> Update Changes</button>
                            </div>
                        <!-- Loading (remove the following to stop the loading)-->

                        <!-- end loading -->
                    </div>
                    </form>
                    <?php
} else {
	
	?>
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Power</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
	if(isset($_POST['status'])) {
		$sql = "update questions set status ='" . $_POST['status'] . "' where id='" . $_POST['questions_id'] . "'";
		$con->query($sql);
	}
	$sql = "select * from products ORDER BY id DESC";
	$results = $con->query($sql);
    $i = 1;
	foreach($results as $result) {
		
		?>
                                    <tr>
                                        <td>
                                          <?php echo $i;?>  
                                        </td>

                                        <td><?php echo $result['product'];?> </td>
                                        <td><?php echo $result['power'];?> </td>
                                        <td><?php echo getMedicineType($result['type_id']);?> </td>
                                        <td><?php echo $result['price'];?> </td>

                                        <td><?php echo getQuantity($result['id']);//echo $result['power'];?> </td>
                                        <td>
                                            <form method="post" action="">
                                                <?php
		if($result['status'] == 2) {
			
			?>
                                                    <button  class="btn btn-info btn-xs ">Request For Stock</button>

                                                <?php
		} else if($result['status'] == 1) {
			
			?>
                                                    <button type="submit" name="status" value="0" class="btn btn-success btn-xs ">Active</button>

                                                <?php
		} else {
			
			?>
                                                    <button type="submit" name="status" value="1" class="btn btn-warning btn-xs">Inactive</button>
                                                <?php
		}
		
		?>
                                                <input type="hidden" name="product_id" value="<?php
		echo $result['id'];
		
		?>">
                                            </form>
                                        <td>

<div class="dropdown">
  <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php echo faicon('gears')?>  Action
    <span class="caret"></span>
  </button> 
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="?edit=<?php echo $result['id'];?>"><?php echo faicon('pencil')?> Edit</a></li>
    <li><a  href="?delete=<?php echo $result['id'];?>"><?php echo faicon('trash')?> Delete</a></li>
  </ul>
</div> 
                                        </td>
                                    </tr>
                                    <?php
	}
	
	?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
}

?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade NewQuestionModal" id="NewQuestionModal">
    <form method="post" action="" >
        <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Medicine</h4>

                    </div>
                    <div class="modal-body"> 
                        <div class="input-group">
                            <span class="input-group-addon">Name </span>
                            <?php input_text('product');?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Power </span>
                            <?php input_text('power');?>
                            
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Type </span>


                            <?php input_select('type','types','','','type');?>
                        </div>
                        <br>
                        
                        <div class="input-group">
                            <span class="input-group-addon">Price </span>
                            <?php input_text('price');?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Quantity </span>
                            <?php input_text('quantity');?>
                        </div>
                        <br> 
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="NewMedicine" class="btn btn-primary">Save</button>
                    </div>

            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
    </div>
    <!-- /.content-wrapper -->
<?php
include 'footer.php';

?>