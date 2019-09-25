<?php session_start(); 
if($_SESSION['user']==""){
header("Location: ../employee.php");
}

if(!isset($_SESSION['user']) && empty ($_SESSION['user'])){
header("Location: ../employee.php?msg=2");
}
?>
<?php include("includes/header.php");
$link = OpenCon();?>
 <!-- main body start -->
<div id="con_alo">
  <div id="left_con">

    <center><underline><h1>Doctors List<br /><br /></h1></underline></center> 
    <div id="doctor">
<ul>
        <?php
        $i=1;
        $ques="SELECT * FROM doctor";
        $resl=mysqli_query($link, $ques);  
        while($datas = mysqli_fetch_array($resl)){
          ?>
          <li>
           <img src="doctor/<?php echo $datas['doc_img'];?>" />
           <h2><?php echo $datas['doc_name'];?> <h2>
             <h3><?php echo $datas['doc_qualification'];?></h3>
             <p>Specialist On: <?php echo $datas['doc_dept'];?><br />Schedule Date: <?php echo $datas['doc_sche_date'];?> <br /> Schedule Time: <?php echo $datas['doc_sche_time'];?>
             <br /><a href="process.php?del= <?php echo $datas['doc_id'];?>">Delete</a> | <a href="edit.php?edit=<?php echo $datas['doc_id'];?>">Edit</a></p>
           
           </li>
           <?php } ?>
           </ul>
         </div>

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