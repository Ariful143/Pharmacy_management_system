<?php include 'header.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pharmasist
            </h1>
            <ol class="breadcrumb">
                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#NewQuestionModal"><i class="fa fa-pencil"></i>  New Pharmasist</button>
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
                                    <th><input type="checkbox" class="minimal-red"></th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_POST['status'])){
                                    $sql = "update users set status ='".$_POST['status']."' where id='".$_POST['user_id']."'";
                                    $con->query($sql);
                                }
                                $sql = "select * from users where type='pharmasist' and status='1'";
                                $results = $con->query($sql);
                                foreach ($results as $result) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="minimal-red">
                                    </td>
                                    <td><?php echo  $result['username'];?></td>
                                    <td>
                                        <form method="post" action="">
                                            <?php if($result['status']==1){ ?>
                                                <button type="submit" name="status" value="0" class="btn btn-success btn-xs ">Active</button>

                                            <?php }else{ ?>
                                                <button type="submit" name="status" value="1" class="btn btn-warning btn-xs">Inactive</button>
                                            <?php }?>
                                            <input type="hidden" name="user_id" value="<?php echo  $result['id'];?>">
                                        </form>
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs " title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i></button>
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

    <div class="modal fade NewQuestionModal" id="NewQuestionModal">
    <form method="post" action="" id="NewQuestionForm">
        <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Pharmasist</h4>
                    </div>
                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">User Name </span>
                            <?php input_text('username');?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Password </span>
                            <?php input_text('password');?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Email </span>
                            <?php input_text('email');?>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Phone </span>
                            <?php input_text('phone');?>
                        </div>
                        <br>

                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="NewQuestionButton" class="btn btn-primary">Save changes</button>
                    </div>

            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
    </div>
    <div class="modal fade editQuestion" id="editQuestion">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Questions</h4>
                </div>
                <div class="modal-body">

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-question"></i></span>
                        <input type="text" id="newquestion" class="form-control" placeholder="Enter Full Question..">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="answer" id="newquestioncorrect1" class="flat-red">
                            </span>
                                <input type="text" class="form-control" id="newquestionans1" placeholder="First Choice">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="answer" id="newquestioncorrect2"  class="flat-red">
                            </span>
                                <input type="text" class="form-control" id="newquestionans2"  placeholder="Second Choice">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-6">
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="answer" id="newquestioncorrect3" class="flat-red">
                            </span>
                                <input type="text" class="form-control" id="newquestionans3"  placeholder="Third Choice">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                            <span class="input-group-addon">
                               <input type="radio" name="answer" id="newquestioncorrect4"  class="flat-red">
                            </span>
                                <input type="text" class="form-control" id="newquestionans4"  placeholder="Fourth Choice">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="UpdateQuestion" class="btn btn-primary">Save changes</button>
                </div>

            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>