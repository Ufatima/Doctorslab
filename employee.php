<?php 
session_start();
include("includes/header.php");
$link = OpenCon();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
  header("Location: member/add.php");
  }

if(isset($_POST['send'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    
  $query="SELECT * FROM member WHERE user='$user' AND pass='$pass' ";
  $query=mysqli_query($link, $query);
  if(mysqli_num_rows($query)==1){
    
    $data=mysqli_fetch_array($query);
    $_SESSION['user']=$data['user'];
    header("Location: member/add.php");
  }else{
    $msg=3;
  }
  
  
}else{
  $msg=2;
}

?>
 <!-- main body start -->
<div id="con_alo">
  <div id="left_con">
<!--    <h3>Registration</h3>
    <p><form id="registration" method="post" action="employee.php">
        Username:<input class="input" type="text" name="user" /><br /><br />
        Password:<input class="input" type="password" name="pass" /><br /><br />
        Department:<input class="input" type="text" name="role" /><br /><br />
        <input type="submit" value="Registration" />
        </form></p>
-->  </div>
  <div id="right_con">
      <h3>LOGIN</h3>
   <p><form id="user" method="POST" action="employee.php">
        Username:<input class="input" type="text" name="user" /><br /><br />
        Password:<input class="input" type="password" name="pass" /><br /><br />
        <input type="submit" name="send" value="Login" /><br />
         <?php
if(isset($msg)){
  if(isset($_POST['msg']) && $_POST['msg']==1){
    echo "You Logged Out";
  }elseif($msg==2){
    echo "Please login.";
  }elseif($msg==3){
    echo "Wrong Username / Password";
  }
  
}
?>
        </form> </p>
   <p></p>
   <p></p>
  </div>
</div>
<!-- main body end -->

<?php include("includes/footer.php") ?>