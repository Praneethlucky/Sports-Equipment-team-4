<?php
session_start();

$_SESSION['type']=array();
$_SESSION['available']=array();

$obj= mysqli_connect("127.0.0.1", "root", "", "sports_issue");

if(!$obj)
{
	die("SERVER PROBLEM".mysqli_connect_error());	
}


		
			$sql="SELECT * FROM AVAILABILITY";
			$result=mysqli_query($obj, $sql);
			$count=mysqli_num_rows($result);
			if($count>0){
				while($row=mysqli_fetch_assoc($result)){
					$sport=$row['sports_type'];
					$number=$row['available'];
					array_push($_SESSION['type'],$sport);
					array_push($_SESSION['available'],$number);
			
				}
		
				
				}else{
					echo "table is empty".mysqli_error($obj);
					
				}
				

	

?> 
<!DOCTYPE html>
<html>

<head>
	<title>
		Sports Information
	</title>
	<style>
		ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
button:hover {
    background-color: #111;
	cursor: pointer;
}
button {
	background-color:#333;
	color:white;
	border:none;
}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function enrollf() {
    var x = document.getElementById("enroll-div");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
</head>
<body>

<div style=" background-color: #6494e0;
    color: white;
	position:static;">
	<table >
		<tr>
			<td>
				<img src="logo.png">
			</td>
			<td style="font-family:;">
				<h2 style="color:white;
				weight:20px;"><b>CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY (AUTONOMUS) - SPORTS</b></h2>
			</td>
		</tr>	
	</table>
	</div>
	
	<ul>
  <li><a class="active" href="home.html">Home</a></li>
  <li><button  onclick="retur()"><a>Returns</a></button></li>
  <li><button  onclick="myFunction2()"><a>About</a></button></li>
  <?php if( $_SESSION['set']==0){?><li id="asd" ><button  onclick="myFunction()"><a>Admin</a></button></li><?php }?>
  <li><button onclick="myFunction1()"><a>Enroll</a></button></li>
  <li><a href="findpay.php">Find Payments</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<script>
function myFunction1() {
    var x = document.getElementById("Enrolldiv");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<script>
function myFunction2() {
    var x = document.getElementById("info");
	var y= document.getElementById("abo");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
}
</script>
<script>
function myFunction() {
	var g= document.getElementById("Admindiv").value;
    var x = document.getElementById("Admindiv");
	if(g==0){
    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	}
	else{
		if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	}
}
</script>

<div id="returndiv" style="display:none;
text-align:center;
background-color:#333;
font:10px;
padding-top:10px;
" >
<form action="return.php" method="POST">
<label  style="color:white;"for="username">User id:</label>
<input type="text" id="username" name="st_id">

<div id="lower">

<input type="submit" name="submit">
</div>
</form>
</div>
<script>
function retur() {
	var g= document.getElementById("returndiv").value;
    var x = document.getElementById("returndiv");
	if(g==0){
    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	}
	else{
		if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	}
}
</script>
<div id="Admindiv" style="display:none;
text-align:center;
background-color:#333;
font:10px;
padding-top:10px;
" >
<form action="login.inc.php" method="POST">
<label  style="color:white;"for="username">Username:</label>
<input type="text" id="username" name="username">
<label  style="color:white;" for="password">Password:</label>
<input type="password" id="password" name="password">
<div id="lower">

<input type="submit" name="submit">
</div>
</form>
</div>

<div id="Enrolldiv" style="display:none;">
<form action="enroll.php" method="POST">
<label for="username">Username:</label>
<input type="tel" id="username" name="st_id">
<label for="password">Password:</label>
<select  name="branch">
  <option value="cse">IT</option>
  <option value="it">CSE</option>
  <option value="ece">ECE</option>
  <option value="eee">EEE</option>
</select>
<div id="lower">
<input type="checkbox"><label for="checkbox">Keep me logged in</label>
<input type="submit" name="submit">

</div><!--/ lower-->
</form>
</div>
<p id="hj">hello</p>

<div style="1200px;">
<table>
<tr>
<td>
 <div style="float: left;  background-color:#ddd; color:black; width:400px;">
 <table>
 <tr>
 <td>
 <img src="bad20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][0]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][0]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue1()" style="float:right;" >Issue</button>
</td>
</tr>
 </table>
 
 </div>
 <div id="is0" style="display:none;">
<form action="issue.php"method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Badminton" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue1() {
	var x= document.getElementById("is0");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
 </td>
  <td>
  <div style="float: left;  background-color:#ddd;width:400px;">
   <table>
 <tr>
 <td>
 <img src="basket20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][1]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][1]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue2()" style="float:right;" >Issue</button>
</td>
</tr>
 </table>
  </div>
  <div id="is1" style="display:none;">
<form action="issue.php" method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Basketball" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue2() {
	var x= document.getElementById("is1");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
   </td>
  <td><div style="float: right; background-color:#ddd;position:relative;width:400px;">
   <table>
 <tr>
 <td>
 <img src="carr20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][2]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][2]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue3()" style="float:right;" >Issue</button>
</td>
</tr>
 </table>
  </div> 
  <div id="is2" style="display:none;">
<form action="issue.php"method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Carroms" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue3() {
	var x= document.getElementById("is2");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
  </td>
 

</tr>
</table>
</div>
<div style="1500px;">
<table>
<tr>
<td>
 <div style="float: left;  background-color:#ddd; color:black; width:400px;">
 <table>
 <tr>
 <td>
 <img src="ches20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][3]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][3]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue4()" style="float:right;">Issue</button>
</td>
</tr>
 </table>
 
 </div>
 
	<div id="is3" style="display:none;">
<form action="issue.php"method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Chess" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue4() {
	var x= document.getElementById("is3");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>

 </td>

 </td>
  <td><div style="float: left;  background-color:#ddd;width:400px;">
   <table>
 <tr>
 <td>
 <img src="cric20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][4]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][4]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue5()"  style="float:right;">Issue</button>
</td>
</tr>
 </table>
  </div>
  <div id="is4" style="display:none;">
<form action="issue.php"method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Cricket" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue5() {
	var x= document.getElementById("is4");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
   </td>
  <td><div style="float: right; background-color:#ddd;position:relative;width:400px;">
   <table>
 <tr>
 <td>
 <img src="footballcolour20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][5]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][5]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue6()"  style="float:right;">Issue</button>
</td>
</tr>
 </table>
  </div> 
  <div id="is5" style="display:none;">
<form action="issue.php"method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Football" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue6() {
	var x= document.getElementById("is5");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
  </td>
 

</tr>
</table>
</div>
<div style="1500px;">
<table>
<tr>
<td>
 <div style="float: left;  background-color:#ddd; color:black; width:400px;">
 <table>
 <tr>
 <td>
 <img src="table20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][6]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][6]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue7()"  style="float:right;">Issue</button>
</td>
</tr>
 </table>
 
 </div>
 <div id="is6" style="display:none;">
<form action="issue.php"method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Tabletennis" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue7() {
	var x= document.getElementById("is6");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
 </td>
  <td><div style="float: left;  background-color:#ddd;width:400px;">
   <table>
 <tr>
 <td>
 <img src="throw20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][7]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][7]?>
 </td>
 </tr>
 <tr>
 <td>
<button onClick="issue8()" style="float:right;" >Issue</button>
</td>
</tr>
 </table>
  </div>
   <div id="is7" style="display:none;">
<form action="issue.php"method="post">
 	Student Id: <input type="text" name="st_id"><br>
  Sport Selected: <input type="text" name="sport" value="Throwball" readonly><br>
  <input type="submit" name="submit">
</form>
</div>
<script>
function issue8() {
	var x= document.getElementById("is7");
    

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
   </td>
  <td><div style="float: right; background-color:#ddd;position:relative;width:400px;">
   <table>
 <tr>
 <td>
 <img src="volley20.jpg">
 </td>
 <td>
 <p><?php echo $_SESSION['type'][8]?></p>
 </td>
 </tr>
 <tr>
 <td>
 No.Of Available Kits:<?php echo $_SESSION['available'][8]?>
 </td>
 </tr>
 <tr>
 <td>
 
<button id="tt"onClick="issue9()" style="float:right;" >Issue</button>
</td>
</tr>
 </table>
  </div>
  <div id="is8" style="display:none;">
<form action="issue.php"method="post">
<table>
 	<tr><td>Student Id:</td><td> <input type="text" name="st_id"></td><br>
  <td>Sport Selected: </td><td><input type="text" name="sport" value="Volleyball" readonly></td><br>
 </tr>
  <input type="submit" name="submit">
 
  </table>
</form>
</div>
<script>
function issue9() {
	var x= document.getElementById("is8");
    var y=document.getElementById("is");

    if (x.style.display === "none") {
        x.style.display = "block";
		
    } else {
        x.style.display = "none";
		y.style.display="block";
    }
	
	
}
</script>
   </td>
 

</tr>
</table>
</div>


<div>

</div>

<div id="abo" style="display:none;">
	<article>
		About...<br>
CBIT is also famous for sports where the students from this college have won many medals in different<br>
intercollege championship. In the CBIT sports complex there is problem,that problem is given as problem<br>
statement. To solve that problem the idea to develop thus webpage is created<br>
This webpage is used to give the information about the eqiupments present in the sports complex. We<br>
can acces this web page from anywhere .<br>
We have to open this webpage and click the availabilty button present in the page to see the availabilty<br>
of the equipments of respective sports.here we have games like cricket,basket ball, volley<br>
ball,football,throw ball,chess,carroms,table tennis,badminton for which we have equipments like bat ,ball<br>
and etc..,so we created a platform where a user can able to know the availabilty of those eqipments .If<br>
the user want to take them ,then the admin who is present in the cabin as to task the user for details like<br>
rollno and password.<br>
The admin used to open the issue link and subbmit the details into it and it will check whether there is<br>
any fine or not. If there is no fine then the thing will be given to user and he has to return it within the time<br>
that was given by the admin.<br>
<address>contact:
Praneeth Prasad - 7416437358
Durga Prasad - 9100173002
Jai Simha - 9491861548
Hemanth Kakarla - 9542824868
Pavan Thalla - 7989116443
Manideep Laxmishetty - 7416262753
	</address>
	</article>
</div>
</body>
</html>