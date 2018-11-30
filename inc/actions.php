<?php
/**
 * Created by PhpStorm.
 * User: MegaMind
 * Date: 6/24/2018
 * Time: 2:22 AM
 */
require 'dbcon.php';
//require 'security.php';

$actions = $_REQUEST['action'];
$actions($con);
function login($con){
    $email=$_REQUEST['email'];
    $pass=md5($_REQUEST['pass']);

    $sql = "select * from users where email='".$email."' and password='".$pass."' ";
    $results = $con->query($sql);
    $row = $results->num_rows;
    if($row > 0){
        $result = $results->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['id']= $result['id'];
        $_SESSION['online_exam']= true;
        $_SESSION['username']= $result['username'];
        $_SESSION['email']= $result['email'];
        $_SESSION['pass']= $result['password'];
        $_SESSION['type']= $result['type'];
        $_SESSION['status']= $result['status'];
        $success = array(
            'status' => 'success',
            'message' => "<div class=\"alert alert-success alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <p><i class=\"icon fa fa-check\"></i> Successfully Logged In !</p>
      </div>",
            'url' => 'dashboard/'
        );
        echo json_encode($success);
        die();

    }else{
        $success = array(
            'status' => 'error',
            'message'=>" <div class=\"alert alert-danger alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <hp><i class=\"icon fa fa-ban\"></i> Username Or Password Error !</hp>
      </div>"
        );
        echo json_encode($success);
        die();
    }

}

// Teacher Regsitration  
function treg($con){

    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $pass=md5($_REQUEST['pass']);
    $pass2=md5($_REQUEST['pass2']);



    $emailCheck =  emailSearch($email,$con);

    if($pass != $pass2){

         $success = array(
                'status' => 'error',
                'message'=>" <div class=\"alert alert-danger alert-dismissible\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <hp><i class=\"icon fa fa-ban\"></i> Password Do Not Match !</hp>
          </div>"
            );
            echo json_encode($success);
            die();

    } 
    else if($emailCheck == 0){

        echo $sql = "insert into users values ('','$name','$pass','$email','teacher','1')";
       if($con->query($sql)){ 
        $success = array(
            'status' => 'success',
            'message' => "<div class=\"alert alert-success alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <p><i class=\"icon fa fa-check\"></i> Successfully Logged In !</p>
      </div>",
            'url' => 'dashboard/'
        );
        echo json_encode($success);
        die();

        }else{
            $success = array(
                'status' => 'error',
                'message'=>" <div class=\"alert alert-danger alert-dismissible\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <hp><i class=\"icon fa fa-ban\"></i> Username Or Password Error !</hp>
          </div>"
            );
            echo json_encode($success);
            die();
        } 
    }else{

         $success = array(
                'status' => 'error',
                'message'=>" <div class=\"alert alert-danger alert-dismissible\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <hp><i class=\"icon fa fa-ban\"></i> Email Already Regsitraed ! Please Reset Password .</hp>
          </div>"
            );
            echo json_encode($success);
            die();

    } 
}



// Student Regsitration  
function sreg($con){

    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $pass=md5($_REQUEST['pass']);
    $pass2=md5($_REQUEST['pass2']);



    $emailCheck =  emailSearch($email,$con);

    if($pass != $pass2){

         $success = array(
                'status' => 'error',
                'message'=>" <div class=\"alert alert-danger alert-dismissible\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <hp><i class=\"icon fa fa-ban\"></i> Password Do Not Match !</hp>
          </div>"
            );
            echo json_encode($success);
            die();

    } 
    else if($emailCheck == 0){

        echo $sql = "insert into users values ('','$name','$pass','$email','student','1')";
       if($con->query($sql)){ 
        $success = array(
            'status' => 'success',
            'message' => "<div class=\"alert alert-success alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <p><i class=\"icon fa fa-check\"></i> Successfully Logged In !</p>
      </div>",
            'url' => 'dashboard/'
        );
        echo json_encode($success);
        die();

        }else{
            $success = array(
                'status' => 'error',
                'message'=>" <div class=\"alert alert-danger alert-dismissible\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <hp><i class=\"icon fa fa-ban\"></i> Username Or Password Error !</hp>
          </div>"
            );
            echo json_encode($success);
            die();
        } 
    }else{

         $success = array(
                'status' => 'error',
                'message'=>" <div class=\"alert alert-danger alert-dismissible\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <hp><i class=\"icon fa fa-ban\"></i> Email Already Regsitraed ! Please Reset Password .</hp>
          </div>"
            );
            echo json_encode($success);
            die();

    } 
}

function  NewQuestion($con){
    $_REQUEST['newquestioncorrect'];
    $_REQUEST['newquestionans'];
    $_REQUEST['newquestion'];
    session_start();
    $sql = "insert into questions values('','".$_SESSION['id']."','". $_REQUEST['newquestion']."','1')";
    $con->query($sql);
    $question_id = $con->insert_id;
    for($i=0;$i<count($_REQUEST['newquestionans']);$i++){
        if(!empty($_REQUEST['newquestionans'][$i])){
            $sql = "insert into options values('','".$question_id."','". $_REQUEST['newquestionans'][$i]."')";
            $con->query($sql);
            $answer_id = $con->insert_id;
            if($_REQUEST['newquestioncorrect'][$i]==1){
                $sql = "insert into answers values('','".$question_id."','".$answer_id."')";
                $con->query($sql);
            }
        }
    }
    if($question_id){
        $success = array(
            'status' => 'success',
            'message' => "<div class=\"alert alert-success alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <p><i class=\"icon fa fa-check\"></i> Question Added Successfully !</p>
      </div>"
        );
    }else{
        $success = array(
            'status' => 'error',
            'message'=>" <div class=\"alert alert-danger alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <hp><i class=\"icon fa fa-ban\"></i> Question Not Added !</hp>
      </div>"
        );
    }

    echo json_encode($success);
    die();

}

function  GetQuestion($con){
    $_REQUEST['NewQuestionedit'];
    $Allquestions  = array ();
    $ides = array();

    $sql = "select * from questions where id='".$_REQUEST['NewQuestionedit']."'";
    $questions = $con->query($sql);
    $question = $questions->fetch_array(MYSQLI_ASSOC);
    $Allquestions['question'] = $question['question'];


    $sql = "select * from options where questions_id='".$_REQUEST['NewQuestionedit']."'";
    $options = $con->query($sql);
    $i=0;
    foreach ($options as $option) {
        $ides[$i] = $option['id'];
        $Allquestions  = $option['id'];


    }


    for($i=0;$i<count($_REQUEST['newquestionans']);$i++){
        if(!empty($_REQUEST['newquestionans'][$i])){
            $sql = "insert into options values('','".$question_id."','". $_REQUEST['newquestionans'][$i]."')";
            $con->query($sql);
            $answer_id = $con->insert_id;
            if($_REQUEST['newquestioncorrect'][$i]==1){
                $sql = "insert into answers values('','".$question_id."','".$answer_id."')";
                $con->query($sql);
            }
        }
    }
    if($question_id){
        $success = array(
            'status' => 'success',
            'message' => "<div class=\"alert alert-success alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <p><i class=\"icon fa fa-check\"></i> Question Added Successfully !</p>
      </div>"
        );
    }else{
        $success = array(
            'status' => 'error',
            'message'=>" <div class=\"alert alert-danger alert-dismissible\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
        <hp><i class=\"icon fa fa-ban\"></i> Question Not Added !</hp>
      </div>"
        );
    }

    echo json_encode($success);
    die();

}



function emailSearch($email,$con){

    $sql = "select * from users where email='".$email."'";
    $results = $con->query($sql);
    $row = $results->num_rows;
    if($row > 0){
        return 1;
    }else{
        return 0;
    }



}