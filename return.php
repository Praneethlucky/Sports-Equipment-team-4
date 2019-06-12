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
	if(empty($id)  )
	{
		header("Location: ../Home1.php?Id=empty");
		
		exit();
	}else{
				$sql3="SELECT * FROM ISSUE WHERE student_id=$id";
				$result3=mysqli_query($obj, $sql3);
				$count=mysqli_num_rows($result3);
				if($count>0){
									
									$row1=mysqli_fetch_assoc($result3);
									$sport_type=$row1['sports_type'];
									$da=date_create('$row1["date"]');
										
								echo $da;
									$datetime1 = date_create('2009-10-11');
									
									
								
									$diff=date_diff($da,date("Y-m-d"));
									$difference=intval($diff->format("%d"));
									if($difference>0){
										$fine=($diff->format("%a"))*5;
										$sql="UPDATE FINE SET FINE=FINE+$fine WHERE student_id=$id";
										if($result=mysqli_query($obj, $sql)){
											$sql6="UPDATE AVAILABILITY 
 											SET available=available+1 where sports_type='$sport_type'";
											if($result6=mysqli_query($obj, $sql6)){
												$sql5="DELETE * FROM ISSUE WHERE student_id=$id";
												if($result5=mysqli_query($obj, $sql5)){
													header("Location: ../Home2.php?return_successful");
												}else{
													echo "<script>";
													echo "window.alert('".mysqli_errno($obj)."')";
													echo "</script>";
					
													
												}
											}else{
												echo "<script>";
												echo "window.alert('".mysqli_errno($obj)."')";
												echo "</script>";
					
												
											}
										}else{
											echo "<script>";
											echo "window.alert('".mysqli_errno($obj)."')";
											echo "</script>";
					
											
										}
										
									}else{
										
										$sql6="UPDATE AVAILABLILITY SET available=available+1 where sports_type='$sport_type'";
											if($result6=mysqli_query($obj, $sql6)){
												$sql5="DELETE * FROM ISSUE WHERE student_id=$id";
												if($result5=mysqli_query($obj, $sql5)){
													header("Location: ../Home2.php?");
												}else{
													echo "<script>";
													echo "window.alert('".mysqli_errno($obj)."')";
													echo "</script>";
					
													
												}
											}else{
												echo "<script>";
												echo "window.alert('".mysqli_errno($obj)."')";
												echo "</script>";
					
												
											}
										}
			
									}
				}
	}				
		
}else{
	echo "<script>";
					echo "window.alert('Admin is Inactive,Please Login')";
					echo "</script>";

}
					

?> 
