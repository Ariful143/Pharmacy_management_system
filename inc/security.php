<?php
/**
 * Created by PhpStorm.
 * User: MegaMind
 * Date: 6/24/2018
 * Time: 2:19 AM
 */

require 'dbcon.php';
session_start();
if(!empty($_SESSION['email']) && !empty($_SESSION['pass'])){
    $email=$_SESSION['email'];
    $pass = $_SESSION['pass'];
    $sql = "select * from users where email='".$email."' and password='".$pass."' ";
    $users = $con->query($sql);
    $row = $users->num_rows;
    if($row > 0){
        $user = $users->fetch_array(MYSQLI_ASSOC);
        if($user['status'] == 1){
            
        }else{
            header("location:".$site_url);
        }
    }else{
        header($site_url.'login.php');
    }
}

 
  
function faicon($name){
    return "<span class='fa fa-".$name."' ></span>";
}

function SuccessAlert($name){

            $message = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="icon fa fa-check"></i> '.$name.' !</p>
              </div>';
return $message;
}
function WarningAlert($name){

            $message = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="icon fa fa-warning"></i> '.$name.' !</p> 
              </div>';
return $message;
}
function ErrorAlert($name){

            $message = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$name.' !</h4> 
              </div>';
return $message;
}
 
 
 
function get_time_difference($time1, $time2)
{ 

    $time1 = strtotime("1/1/1980 $time1");
    $time2 = strtotime("1/1/1980 $time2"); 
    return round(abs(date("i", $time1-$time2))); 
}

function redirect($url){
    echo "<script>window.location.href = '$url';</script>";
}


function input_text($name,$value=NULL,$placeholder=NULL,$class=NULL,$id=NULL){
    if($value==NULL&&isset($_REQUEST[$name])) $value=$_REQUEST[$name];
    echo "<input type='text' class='form-control "; 
    if(isset($class)){
        echo $class;
    }
    else {

    }
    echo "' name='".$name."' aria-describedby='basic-addon1'";
    if($value) echo " value='".$value."' ";
    //if($class) echo " class='".$class."' ";
    if($id) echo " id='".$id."' ";
    if($placeholder) echo " placeholder='".$placeholder."'";
    echo "/>";
}
function status($name,$id,$value){

$html = '';

$html = '<form method="post" action=""> ';
  
    if($value == 1){
        $html= $html.'<button type="submit" name="'.$name.'" value="0" class="btn btn-success btn-xs ">Active</button>';
    } else if($value == 0){
        $html= $html. '<button type="submit" name="'.$name.'" value="1" class="btn btn-warning btn-xs">Inactive</button>';
    }else{
          $html=  "Status Not set !";
    }
    $html= $html.'<input type="hidden" name="'.$name.'id" value="'.$id.'"></form>';
    return $html;
}
 


function eidtUpdate($id){

$html = '<div class="dropdown">
<button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  '.faicon('gears').' Action
  <span class="caret"></span>
</button> 
<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  <li><a href="?edit='.$id.'">'.faicon('pencil').'Edit</a></li>
  <li><a  href="?delete='.$id.'">'.faicon('trash').' Delete</a></li>
</ul>
</div> ';

return $html;
}
function input_submit($name,$value=NULL){
    if($value==NULL&&isset($_REQUEST[$name])) $value=$_REQUEST[$name];
    echo "<input type='submit' class='btn btn-primary' name='".$name."'";
        if($value) echo "value='".$value."' ";
    echo "/>";
}
function close($link){
    $html = '<button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>';
    if($link){
        $html = '<a href="'.$link.'">'.$html.'</a>';
    }
    echo $html;   
}
function SqlDelete($table,$id){
    global $con;
    $allOptionDelete = "delete from $table where id =$id";
    $con->query($allOptionDelete);
}
function SqlStatus($table,$id,$status){
    global $con;
    $sql = "update $table set status =$status where id=$id";
    $con->query($sql);
}


 

// Get Table Dropdown 

function input_select($name,$table,$selected=NULL,$value=NULL,$display=NULL,$active=1){
    global $con;
    if($value==NULL)$value='id';
    if($display==NULL)$display=$table;
    if($selected==NULL&&isset($_REQUEST[$name]))$selected=$_REQUEST[$name];
    $qs="SELECT * FROM ".$table;
    if($active!=NULL) $qs=$qs." WHERE status='".$active."'";
    
    $q=$con->query($qs);
    echo "<select name='".$name."' class='form-control'>";
    echo "<option value=''>Select Any ".$name."</option>";
    if($selected=="blank") echo "<option value=''>None</option>";
    while($d=$q->fetch_array()){
        echo "<option value='".$d[$value]."'";
            if($selected==$d[$value]) echo "selected";
        echo ">".$d[$display]."</option>";
    }
    echo "</select>";
}
 

 
// get quantity from database
function getQuantity($id){
    global $con;
    $sql2 = "select * from quantitys where product_id='".$id."'";
    $infos = $con->query($sql2);
    $total = 0;
    foreach ($infos as $info) {
        # code...
        
        $total = $total + $info['quantity'];
    }
    
    return  $total;
}
 

// type in product table
function getMedicineType($id){
    global $con;
    $sql2 = "select * from types where id='".$id."' and status = 1";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return  $info['type'];

}
function getMedicineName($id){
    global $con;
    $sql2 = "select * from products where id='".$id."'";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return  $info['product'];

}
function getCustomerName($id){
    global $con;
    $sql2 = "select * from users where id='".$id."'";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return  $info['username'];

}
function getCustomerPhone($id){
    global $con;
    $sql2 = "select * from users where id='".$id."'";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return  $info['phone'];

}
function getTotalMedicine(){
    global $con;
    $sql2 = "SELECT count(id) FROM products";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return $info['count(id)'];

}
function getRequestTotalMedicine(){
    global $con;
     $sql2 = "SELECT count(id) FROM products where status=3";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return $info['count(id)'];

}
function getTotalSalesman(){
    global $con;
    $sql2 = "SELECT count(id) FROM users";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return count($info);

}
function getMedicinePrice($id){
    global $con;
    $sql2 = "select * from products where id='".$id."'";
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return  $info['price'];

}

// to show stock
function select_digit($name, $from , $to, $sel, $int=1){
    echo "
            <select name = '".$name."' class='form-control'> ";
    for($i=$from; $i<=$to; $i = $i + $int){
        if($sel==$i)
            echo "<option selected>".$i."</option>";
        else
            echo "<option >".$i."</option>";
    }
        echo "</select>";
}


function TotalStock(){
    global $con;
    $sql2 = "select * from orders where status='1' and date='".date('Y-m-d')."'";
    $infos = $con->query($sql2);
    $total = 0;
    foreach ($infos as $info) {        
        $total = $total + $info['total_price'];
    }
    
    return  $total;
}
function getTotalInvoice(){
    global $con;
    $sql2 = "select  count(id)  from orders where status='1' and date='".date('Y-m-d')."'"; 
    $infos = $con->query($sql2);
    $info = $infos->fetch_array();
    return $info['count(id)'];

}
 