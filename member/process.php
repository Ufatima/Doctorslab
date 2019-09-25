<?php 

  header("Location: includes/config.php");
  $link = OpenCon();
?>

<?php
// make image directory
$basepath='doctor/';
@mkdir($basepath,0777);
@chmod($basepath,0777);

$errors='';
//settings
$max_allowed_file_size = 512; // size in KB
$allowed_extentions = array(".jpg", ".jpeg",".png");

if(isset($_POST['send'])){

	$name=$_POST['name'];
	$qualification=$_POST['qualification'];
	$dept_id=$_POST['department'];
	$sch_date=$_POST['sch_date'];
	$sch_time=$_POST['sch_time'];
	$kha = mysqli_query($link, "select dept_name from department where dept_id = '$dept_id'");
	$paa=mysqli_fetch_array($kha);
	$doc_dept_name=$paa['dept_name'];
	
	$query="INSERT INTO doctor (doc_name,doc_qualification,doc_dept,doc_dept_id,doc_sche_date,doc_sche_time) VALUES('$name','$qualification','$doc_dept_name','$dept_id','$sch_date','$sch_time')";
	mysqli_query($link, $query)or die($query."<br/>".mysql_error());

	
	$whatsnewid=mysqli_insert_id($link);	
		//Get the uploaded file information
	$name_of_the_uploaded_file= basename($_FILES['up_img']['name']);
	
		//Get the file extention
	$type_of_uploaded_file = substr($name_of_the_uploaded_file, strrpos($name_of_the_uploaded_file, '.') +1 );
	$size_of_uploaded_file = $_FILES['up_img']['size']/1024;

		//Do validation

	if($size_of_uploaded_file > $max_allowed_file_size)
	{
		$errors .= "Size of the image should be less than $max_allowed_file_size ";
	}

		//Validate file extention
	$allowed_ext=false;
	for ($i=0; $i<sizeof($allowed_extentions); $i++)
	{
		if(strcasecmp($allowed_extentions[$i],$type_of_uploaded_file)== 0)
		{
			$allowed_ext=true;
		}
	}

	if (!$allowed_ext)
	{
		$errors .= "Only the following image types are supported: ".implode(',',$allowed_extentions);
	}
		// rename the file

	$demoname="doc_". time().".".strtolower(end(explode(".", $name_of_the_uploaded_file)));


	if (empty($errors))
	{
		$query="UPDATE doctor SET doc_img='".$demoname."' WHERE doc_id ='".$whatsnewid."' ";
		mysqli_query($link, $query)or die($query."<br/><br/>".mysql_error());

		
			//copy the temp. uploaded file to upload folder
		$path_of_uploaded_file = $basepath . $demoname;
		$tmp_path = $_FILES['up_img']['tmp_name'];

		if (is_uploaded_file($tmp_path))
		{
			if (!copy($tmp_path,$path_of_uploaded_file))
			{
				$errors .='Error while copying the uploaded image';
			}
		}
	}
	header("location: add.php?msg=1");
	
	
	
}

if(isset($_GET['del'])){
	$id=$_GET['del'];

	$db_query="SELECT * FROM doctor WHERE doc_id=$id";
	$bd_result=mysqli_query($link, $db_query);
	$del_image_name=mysqli_fetch_array($bd_result);

	$old_image=$del_image_name['doc_img'];

	$query="DELETE FROM doctor WHERE doc_id='$id' ";
	mysqli_query($link, $query)or die($query."<br/>".mysql_error());
	if(mysqli_affected_rows($link))
	{
		@unlink($basepath. $old_image);
	}

	header("location: add.php?msg=2");
}

if(isset($_POST['update']))
{

	$name=$_POST['name'];
	$qualification=$_POST['qualification'];
	$dept_id=$_POST['department'];
	$sch_date=$_POST['sch_date'];
	$sch_time=$_POST['sch_time'];
	$id=$_POST['old_id'];
	$kha = mysqli_query($link, "select dept_name from department where dept_id = '$dept_id'");
	$paa=mysqli_fetch_array($kha);
	$doc_dept_name=$paa['dept_name'];
	$query="UPDATE `doctor` SET doc_name='$name',doc_qualification='$qualification',doc_dept_id='$dept_id',doc_sche_date='$sch_date',doc_sche_time='$sch_time',doc_dept='$doc_dept_name' WHERE doc_id='$id' ";
		$whatsnewid=mysqli_insert_id($link);	
		//Get the uploaded file information
	$name_of_the_uploaded_file= basename($_FILES['up_img']['name']);
	
		//Get the file extention
	$type_of_uploaded_file = substr($name_of_the_uploaded_file, strrpos($name_of_the_uploaded_file, '.') +1 );
	$size_of_uploaded_file = $_FILES['up_img']['size']/1024;

		//Do validation

	if($size_of_uploaded_file > $max_allowed_file_size)
	{
		$errors .= "Size of the image should be less than $max_allowed_file_size ";
	}

		//Validate file extention
	$allowed_ext=false;
	for ($i=0; $i<sizeof($allowed_extentions); $i++)
	{
		if(strcasecmp($allowed_extentions[$i],$type_of_uploaded_file)== 0)
		{
			$allowed_ext=true;
		}
	}

	if (!$allowed_ext)
	{
		$errors .= "Only the following image types are supported: ".implode(',',$allowed_extentions);
	}
		// rename the file

	$demoname="doc_". time().".".strtolower(end(explode(".", $name_of_the_uploaded_file)));


	if (empty($errors))
	{
		$query="UPDATE doctor SET doc_img='".$demoname."' WHERE doc_id ='".$whatsnewid."' ";
		mysqli_query($link, $query)or die($query."<br/><br/>".mysql_error());

		
			//copy the temp. uploaded file to upload folder
		$path_of_uploaded_file = $basepath . $demoname;
		$tmp_path = $_FILES['up_img']['tmp_name'];

		if (is_uploaded_file($tmp_path))
		{
			if (!copy($tmp_path,$path_of_uploaded_file))
			{
				$errors .='Error while copying the uploaded image';
			}
		}
	}
	header("location: add.php?msg=3");
	
	
	
}
?>