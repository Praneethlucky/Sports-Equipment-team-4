<?php
session_start();
if($_SESSION['set']==1){


if(isset($_POST['submit'])){
$obj= mysqli_connect("127.0.0.1", "root", "", "sports_issue");

if(!$obj)
{
	die("SERVER PROBLEM".mysqli_connect_error());	
}

	
	$id=mysqli_real_escape_string($obj, $_POST['st_id']); 
	$branch=mysqli_real_escape_string($obj, $_POST['branch']);
	if(empty($id) || empty($branch) )
	{
	echo "<script>";
					echo "window.alert('ID and BRANCH are empty please fill')";
					echo "</script>";
								
		
		exit();
	}else{
			$sql="INSERT INTO STUDENT VALUES($id,'$branch')";
			$result=mysqli_query($obj, $sql);
			
			if($result){
				$sql="INSERT INTO FINE VALUES($id,0)";
				$result=mysqli_query($obj, $sql);
								
				header("Location: ../Project-It/Home2.php?enroll=success"); 
		exit();
				
			}else{
					echo "<script>";
					echo "window.alert('".mysqli_errno($obj)."')";
					echo "</script>";
							

				}
}
}
}else{
					echo "<script>";
					echo "alert('Admin is Inactive,Please Login')";
					echo "</script>";
					

				}
?> 

