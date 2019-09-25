<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="styles/style.css" type="text/css" rel="stylesheet">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <style type="text/css">a#vlb{display:none}</style>
<script src="js/core.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
  <script language="javascript" type="text/javascript" src="js/datepickr.js"></script>
  <script type="text/javascript" src="js/wowslider.js"></script>
  <style type="text/css">a#vlb{display:none}</style>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<?php
    $pname = basename($_SERVER['PHP_SELF'], ".php");
    if ($pname=="index") {
      $title="Home";  
    }
        elseif ($pname=="about-us") {
      $title="About Us";  
    }
        elseif ($pname=="appointment") {
      $title="Appointment";  
    }
        elseif ($pname=="department") {
      $title="Department";  
    }
        elseif ($pname=="employee") {
      $title="Employee";  
    }
        elseif ($pname=="investigation") {
      $title="Invastigation";  
    }
    else {
      $title="Admin Panel";  
    }
?>

<title>Doctors Lab - <?php echo $title; ?></title>
</head>

<body>
<div id="header">
      <div id="logo">
        <a href="index.php"><img src="img/logo.png" alt="Doctors Lab"></a>
      </div>
        <div id="logo1">
          <img src="img/sts.jpg" alt="Doctors Lab">
        </div>
        <?php 
          include("includes/config.php"); 
          $link = OpenCon();
          $dep = "select * from department"; 
          $deps = mysqli_query($link, $dep);
          $doc = "select * from doctor";
          $docs = mysqli_query($link, $doc);
          $ses = "select * from session";
          $sess = mysqli_query($link, $ses);
          $da = "select * from day";
          $day = mysqli_query($link, $da);
        ?>
    </div>
<!-- Start SlideShow BODY section -->

<div id="wowslider-container1">
  <div class="ws_images">
  <span><img src="img/city_scan.jpg" alt="city_scan" title="city_scan" id="wows0"/></span>
  <span><img src="img/diagnosis.jpg" alt="diagnosis" title="diagnosis" id="wows1"/></span>
  <span><img src="img/speacialist.jpg" alt="speacialist" title="speacialist" id="wows2"/></span>
  <span><img src="img/tests.jpg" alt="tests" title="tests" id="wows3"/></span>
  <span><img src="img/trained_stuff.jpg" alt="trained_stuff" title="trained_stuff" id="wows4"/></span>
  <span><img src="img/we_care.jpg" alt="we_care" title="we_care" id="wows5"/></span>
  </div>
  <div class="ws_bullets">
  <a href="#wows0" title="city_scan"><img src="img/city_scan.jpg" alt="city_scan"/>1</a>
  <a href="#wows1" title="diagnosis"><img src="img/diagnosis.jpg" alt="diagnosis"/>2</a>
  <a href="#wows2" title="speacialist"><img src="img/speacialist.jpg" alt="speacialist"/>3</a>
  <a href="#wows3" title="tests"><img src="img/tests.jpg" alt="tests"/>4</a>
  <a href="#wows4" title="trained_stuff"><img src="img/trained_stuff.jpg" alt="trained_stuff"/>5</a>
  <a href="#wows5" title="we_care"><img src="img/we_care.jpg" alt="we_care"/>6</a>

</div>
<a style="display:none" href="http://wowslider.com">jQuery Slider Drag by WOWSlider.com v2.0</a>
  <a href="#" class="ws_frame"></a>
  <div class="ws_shadow"></div>
  </div>
 <script type="text/javascript" src="js/script.js"></script>

  <!-- End SlideShow BODY section -->
  <div id="nav">     
        <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="about-us.php">ABOUT US</a></li>
        <li ><a href="department.php">DEPARTMENT</a></li>
        <li><a href="appointment.php">APPOINTMENT</a></li>
        <li><a href="investigation.php">INVESTIGATION</a></li>
        <li><a href="employee.php">EMPLOYEE</a></li>
        </ul>
      </div>

<div id="content">