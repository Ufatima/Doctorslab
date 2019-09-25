<?php session_start(); 
  if($_SESSION['user']==""){
  header("Location: ../employee.php");
  }

  if(!isset($_SESSION['user']) && empty ($_SESSION['user'])){
  header("Location: ../employee.php?msg=2");
  }
?>

<?php 
  include("includes/header.php");
  $link = OpenCon();
?>

 <!-- main body start -->
<div id="con_alo">
  <div id="left_con">
    <h1>Fill The Form To Add New Doctor</h1>
    <form method="post" action="process.php" enctype="multipart/form-data">
      <table border="0">
        <tr><td>Name     </td><td><input type="text" name="name"/></td></tr>
        <tr><td>Qualification     </td><td><input type="text" name="qualification"/></td></tr>
        <tr><td>Department     </td><td><input type="text" name="department"/></td></tr>
        <tr><td>Schedule Date     </td><td><input type="text" name="sch_date"/></td></tr>
        <tr><td>Schedule Time     </td><td><input type="text" name="sch_time"/></td></tr>
        <tr><td>Image     </td><td><input type="file" name="up_img"/></td></tr>
        <tr><td align="center" colspan="2"><input type="submit" name="send" value="Send"/></td></tr>
      </table>
    </form>

    <br/><br/>

    <?php
      if(isset($_GET['msg']) && $_GET['msg']==1){
        echo "<h1>Insert Successful</h1>";
      }elseif(isset($_GET['msg']) && $_GET['msg']==2){
        echo "<h1>Delete Successful</h1>";
      }elseif(isset($_GET['msg']) && $_GET['msg']==3){
        echo "<h1>Update Successful</h1>";
      }elseif(isset($_GET['error'])){
        echo $_GET['error'];
      }

    ?>
  </div>

  <div id="right_con">
      <h3><?php echo "Welcome $_SESSION[user] "; ?> </h3>
      <p><a href="logout.php">Log Out</a></p>
  </div>
</div>
<!-- main body end -->

<?php include("includes/footer.php") ?>