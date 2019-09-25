
<?php

  try {
    
    $objDb = new PDO('mysql:host=localhost;dbname=doctorslab', 'root', '');
    $objDb->exec('SET CHARACTER SET utf8');
    
    $sql = "SELECT * 
        FROM `department`";
    $statement = $objDb->query($sql);
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);
    
  } catch(PDOException $e) {
    echo 'There was a problem';
  }

?>

<?php
  include("includes/header.php");
  $link = OpenCon();
?>
 
 
<?php

  if(isset($_POST['submit'])){
      $doc_nam=$_POST['doc_name'];
        $sqas = mysqli_query($link, "SELECT `doc_name` FROM `doctor` WHERE `doc_id` = '$doc_nam'");
        $hga=mysqli_fetch_array($sqas);
        $doc_name=$hga['doc_name'];
      $dept_nam=$_POST['dept_name'];
        $sqws = mysqli_query($link, "SELECT `dept_name` FROM `department` WHERE `dept_id` = '$dept_nam'");
        $hgs=mysqli_fetch_array($sqws);
        $dept_name=$hgs['dept_name'];
      $pat_name=$_POST['pat_name'];
      $pat_email=$_POST['pat_email'];
      $pat_mobile=$_POST['pat_mobile'];
      $date=$_POST['date'];
      

  $query= "INSERT INTO appointment(doc_name, dept_name, pat_name, pat_email, pat_mobile, date) VALUES('$doc_name', '$dept_name', '$pat_name', '$pat_email', '$pat_mobile', '$date')";
    mysqli_query($link, $query)or die($query."<br/>".mysql_error());
    
    //header("location: appointment.php");
    
  }

?>


 <!-- main body start -->
<div id="con_alo">
  <div id="left_con">
      
       <!-- eikhan theke form er code start kora hoise -->

<div id="formwrap">
  <form action="appointment.php" method="post">
    <table border="0">
    Department :
    <select name="dept_name" id="dept" class="update">
      <option value="">Select one</option>
      <?php if (!empty($list)) { ?>
        <?php foreach($list as $row) { ?>
          <option value="<?php echo $row['dept_id']; ?>">
            <?php echo $row['dept_name']; ?>
          </option>
        <?php } ?>
      <?php } ?>
    </select>

    Doctor : 
    <select name="doc_name" id="doc" class="update"
      disabled="disabled">
      <option value="">Select Department First</option>
    </select>
   
    <br /><br />
    
<tr><td>Patient's Full Name :</td><td><input type="text" id="fullname" class="detail" name="pat_name" value=""></td></tr>
<tr><td>Email :</td><td><input type="text" id="fullname" class="detail" name="pat_email" value=""></td></tr>
<tr><td>Mobile No :</td><td><input type="text" id="fullname" class="detail" name="pat_mobile" value=""></td></tr>
<tr><td>Desired Session :
</td><td>
   <select name="session" id="session" value="">
    <option value="">Select one</option>
    <?php
    while($sessi = mysqli_fetch_array($sess)){
      echo "<option value=".$sessi['se_id'].">".$sessi['se_name']."</option>";
    }
    ?>  
    </select>
</td></tr>
<tr><td>Days :
</td><td>
   <select name="days" id="days" value="">
    <option value="">Select one</option>
    <?php
    while($days = mysqli_fetch_array($day)){
      echo "<option value=".$days['day_id'].">".$days['day_name']."</option>";
    }
    ?>  
    </select>
</td></tr>
<tr><td>Appointment date :</td><td><input id="datepick" name="date" class="date-pick" />
    <script type="text/javascript">
      new datepickr('datepick', { dateFormat: 'Y-m-d' },{ minDate: 0 });
    </script>
<tr><td><input type="submit" id="submit" name="submit" value="Submit"></td></tr>
</table> 
  </form>

</div>


<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="js/core.js" type="text/javascript"></script>
    <!-- eikhane form er code shesh-->
  </div>
  <div id="right_con">
      <h3>YOU SHOULD EXPECT</h3>
   <ul>
    <li>compassionate patient care</li>
    <li>highly trained staff</li>
    <li>lower priced exams than local hospitals</li>
    <li>timely exams</li>
    <li>prompt results</li>
   </ul>

  </div>
</div>
<!-- main body end -->

<?php include("includes/footer.php") ?>