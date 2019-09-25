<?php 
include("includes/header.php");
$link = OpenCon();
?>

<!-- main body start -->

<div id="con_alo">
  <div id="left_con">
    <center><underline><h1>List Of Specialist We Have<br /><br /></h1></underline></center> 
    <div id="doctor">
      <h2>Department: 
        <?php 
        $did=1;
        if (isset($_GET['did'])) {
          $did = $_GET['did'];
        }
        $sqls = mysqli_query($link, "select dept_name from department where dept_id = '$did'");
        $gh=mysqli_fetch_array($sqls);
        $ph=$gh['dept_name'];
        echo $ph;
        ?>
      </h2>
      <ul>
        <?php
        $i=1;
        $que="SELECT * FROM doctor where doc_dept_id = '$did'";
        $res=mysqli_query($link, $que);  
        while($data = mysqli_fetch_array($res)){
          ?>
          <li>
           <img src="member/doctor/<?php echo $data['doc_img'];?>" />
           <h2><?php echo $data['doc_name'];?> <h2>
             <h3><?php echo $data['doc_qualification'];?></h3>
             <p>Specialist On: <?php echo $data['doc_dept'];?><br />Schedule Date: <?php echo $data['doc_sche_date'];?> <br /> Schedule Time: <?php echo $data['doc_sche_time'];?></p>
           </li>
           <?php } ?>
           </ul>
         </div>
       </div>
       <div id="right_con">
        <h3> Select Your Desire Department</h3>
        <ul>
          <?php
          while($row = mysqli_fetch_array($deps))
          {
            echo "<a href='department.php?did=$row[dept_id]'><li> $row[dept_name]</li></a>";
          }
          ?>

      <!--<a href="#"><li>department 1</li></a>
      <a href="#"><li>department 2</li></a>
      <a href="#"><li>department 3</li></a>
      <a href="#"><li>department 4</li></a>
      <a href="#"><li>department 5</li></a>
      <a href="#"><li>department 6</li></a>
      <a href="#"><li>department 7</li></a> -->
    </ul>
  </div>
</div>
<!-- main body end -->

<?php include("includes/footer.php") ?>