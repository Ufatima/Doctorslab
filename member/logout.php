<?php
session_start();
$_session=array();
if(isset($_COOKIE[session_name()])){
setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
header("location: ../employee.php?msg=1");
?>