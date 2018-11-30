<?php include 'header.php'; ?>
 
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Report
            </h1>
            <ol class="breadcrumb">
                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#NewQuestionModal"><i class="fa fa-pencil"></i>  New Saleseman</button>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
 

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="minimal-red"> Invoice No</th>
                                    <th>Customer Name</th>
                                    <th>Phone </th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_POST['status'])){
                                    $sql = "update users set status ='".$_POST['status']."' where id='".$_POST['user_id']."'";
                                    $con->query($sql);
                                }
                                $sql = "select * from orders";
                                $results = $con->query($sql);
                                foreach ($results as $result) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="minimal-red"> <?php echo  $result['invoice_no'];?></td>
                                    <td><?php echo  getCustomerName($result['customer_id']);?></td>
                                    <td><?php echo  getCustomerPhone($result['customer_id']);?></td>
                                    <td><?php echo  $result['date'];?></td>
                                    <td><?php echo  $result['total_price'];?> TK</td> 
                                    <td>
                                        <a href="reportview.php?id=<?php echo  $result['id'];?>" class="btn btn-info btn-sm"> View</a>
                                    </td> 
                                </tr>
                                <?php

                                } ?>

                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
 
 
    <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>