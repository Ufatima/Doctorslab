<?php session_start(); 
if($_SESSION['user']==""){
	header("Location: ../employee.php");
}

if(!isset($_SESSION['user']) && empty ($_SESSION['user'])){
	header("Location: ../employee.php?msg=2");
}
?>
<?php include("includes/header.php");
$link = OpenCon();
?>
<!-- main body start -->
<div id="con_alo">
	<div id="left_con">
		<h1>Fill The Form To Edit Doctor</h1>
		<?php
		if(isset($_GET['edit'])){
			$id=$_GET['edit'];
			$query="SELECT * FROM doctor WHERE doc_id='$id' ";
			$result=mysqli_query($link, $query);	
			$edit_me=mysqli_fetch_array($result);
		}
		?>

		<form method="post" action="process.php" enctype="multipart/form-data">
			<input type="hidden" name="old_id" value="<?php echo$edit_me['doc_id'];?>"/>
			<table border="0">
<tr><td>Name     </td><td><input type="text" name="name" value="<?php echo$edit_me['doc_name'];?>"/></td></tr>
<tr><td>Qualification     </td><td><input type="text" name="qualification" value="<?php echo$edit_me['doc_qualification'];?>"/></td></tr>
<tr><td>Department     </td><td><input type="text" name="department" value="<?php echo$edit_me['doc_dept'];?>"/></td></tr>
<tr><td>Schedule Date     </td><td><input type="text" name="sch_date" value="<?php echo$edit_me['doc_sche_date'];?>"/></td></tr>
<tr><td>Schedule Time     </td><td><input type="text" name="sch_time" value="<?php echo$edit_me['doc_sche_time'];?>"/></td></tr>
<tr><td>Image     </td><td><input type="file" name="up_img"/></td></tr>
				<tr><td align="center" colspan="2"><input type="submit" name="update" value="Update"/></td></tr>
			</table>
		</form>

		<br/><br/>


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
		</div>
			  <div id="right_con">
      <h3><?php echo "Welcome $_SESSION[user] "; ?> </h3>
<p><a href="logout.php">Log Out</a></p>
  </div>
</div>
<!-- main body end -->

<?php include("includes/footer.php") ?>