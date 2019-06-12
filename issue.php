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
	$type=$_POST['sport'];
	if(empty($id)  )
	{
		header("Location: ../Project-It/Home1.php?Id=empty");
		
		exit();
	}else{
			$sql4="SELECT * FROM AVAILABILITY WHERE sports_type='$type'";
			if($result4=mysqli_query($obj, $sql4)){
				$row1=mysqli_fetch_assoc($result4);
				if($row1['available']>0){
			
		$sql1="SELECT FINE FROM FINE WHERE student_id=$id";
			if($result1=mysqli_query($obj, $sql1)){
				$row=mysqli_fetch_assoc($result1);
				if($row['fine']<20){
				$sql3="SELECT * FROM ISSUE WHERE student_id=$id";
				$result3=mysqli_query($obj, $sql3);
				$count=mysqli_num_rows($result3);
				if($count==0){
			
		
			$date = date("Y-m-d");
			$sql="INSERT INTO ISSUE VALUES($id,'$type','$date')";
			$result=mysqli_query($obj, $sql);
			
			if($result){
				
				$sql2="UPDATE AVAILABILITY SET AVAILABLE=AVAILABLE-1 WHERE sports_type='$type'";
				$result=mysqli_query($obj, $sql2);
				header("Location: ../Project-It/Home2.php?issue=success");
		exit();
				
			}else{
				echo "insertion failed".mysqli_error($obj);
				}
				}else{
					echo "<script>";
					echo "window.alert('student has already has a pending issue')";
					echo "</script>";
				}
				}else{
									echo "your fine is greater than 20 iteams cannot be issued ";
									
								}	
			}else{
									echo "error in fetching amount ".mysqli_error($obj);
									
								}
	}
			}else{
									echo "error  ".mysqli_error($obj);
									
								}

			}
}

}else{
	echo "<script>";
					echo "window.alert('Admin is Inactive,Please Login')";
					echo "</script>";
					
}
?> 
