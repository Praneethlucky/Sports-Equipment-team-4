<?php
if(isset($_POST['submit'])){
	session_start();
	$_SESSION['set']=0;
	
$obj= mysqli_connect("127.0.0.1", "root", "", "sports_issue");

if(!$obj)
{
	die("SERVER PROBLEM".mysqli_connect_error());	
}
	$fname=mysqli_real_escape_string($obj, $_POST['username']); 
	$password=mysqli_real_escape_string($obj, $_POST['password']);
	if(empty($fname) || empty($password) )
	{
		header("Location: ../Project-It/Home1.php?login=empty");
		
		exit();
	}else{
			$sql="SELECT * FROM ADMIN WHERE user_id='$fname' and password='$password'";
			$result=mysqli_query($obj, $sql);
			$count=mysqli_num_rows($result);
			if($count>0){
				
								$_SESSION['set']=1;
				header("Location: ../Project-It/Home2.php?login=success"); 
		exit();
				
			}else{

			echo "<script>";
					echo "window.alert('".mysqli_errno($obj)."')";
					echo "</script>";
					
		}
}
	
}else{
	
	echo "sdfgthyujikjuhgfd";
}
?> 