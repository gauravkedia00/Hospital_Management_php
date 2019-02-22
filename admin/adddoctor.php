<?php	
	session_start();
	if(isset($_SESSION["adminid"]))
	{
?>
<!doctype html>
<html>
	<head>
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../header.footer.css" rel="stylesheet">
		<link href="admin.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body>
		<a id="top"></a>
		<?php
			include("../conn.php");
			require("../header.html");
		?>
		<div class="admincontent">
			<nav id="nav">
				<ul>
					<li class="active"><a href="adddoctor.php">Add<big>/</big>Delete Doctor</a></li>
					<li><a href="viewdoctor.php">View Doctor</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="viewappointments.php">View Appointments</a></li>
					<li><a href="viewfeedback.php">View Feedback</a></li>
					<li><a href="organdonor.php">Organ Donor</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<?php
					//$no=$conn->query("select  * from doctor") -> num_rows+100;
					//$docid="D".rand($no,date("sHy"));
					do{
						$docid=rand(1000,9999); 
						if($conn->query("select docid from doctor where docid='$docid'")->num_rows>0)
							continue;
						else 
							break;
					}while(($conn->query("select * from doctor")->num-rows)>=0);
				?>
				<h1>Add Doctor !!</h1>
				<form action="adddoctor.php" method="post">
					<label>Doctor ID:- </label><input type="button" name="Doc ID" value="<?php echo $docid ;?>"	id="doctorid" style="background:white;width:100px;border:solid;height:30px;">	<br><br>
					<label>Name :-</label> <input type="text" name="doctorname" placeholder="Doctor name" required><br> <br>
					<label>Gender :-</label><!-- <input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female-->
									<input type ="text" name="gender" placeholder="Male or Female" required><br> <br>
					<label>Address :- </label> <textarea name="address" rows="4" cols="20" placeholder="Address" required></textarea> <br><br>
					<label>Mobile No :-  </label><input type="tel" name="contactno" maxlength="10" placeholder="contact no." required><br><br>
					<label>Email :- </label><input type="email" name="email" placeholder="example@domain.com" required><br><br>
					<label>Categories:-  </label>
						<select name="cat" required>
							<option value="null">--Select--</option>
							<option value="Normal">Normal</option>
							<option value="Bone">Bone</option>
							<option value="Heart">Heart</option>
							<option value="Dentist">Dentist</option>
							<option value="Neurologist">Neurologist</option>
							<option value="Kidney">Kidney</option>
							<option value="Cardiologist">Cardiologist</option>
							<option value="Plastic Surgeon">Plastic Surgeon</option>							<				
						</select><br><br>
					<input type="submit" value="Submit" class="submit" name="add">
				</form>
				<?php
					if(isset($_POST['add']))
					{
						
						$doctorname=$_POST['doctorname'];
						$gender=$_POST['gender'];
						$contactno=$_POST['contactno'];
						$address=$_POST['address'];
						$email=$_POST['email'];
						$cat=$_POST['cat'];
						$pwd=$docid.rand();
						//this inserts all the values to our database
						$result=$conn->query("insert into doctor values('$docid','$doctorname','$pwd','$gender',$contactno,'$address','$email','$cat')");
						//$num_rows=$result->num_rows;
						if(!$result)
							echo "<script>alert('Not added , Doctor may already exist !')</script>";
						else
						{
							echo "<script>alert('Doctor added successfully.')</script>";
							header("Location:	adddoctor.php"); //redirects user to the same page
						}
					}
				?>		
				<br><hr width="40%" color="gray" size="1px">				
				<form action="" method="post">
					<h1>Delete Doctor</h1>
					Doctor ID : <input type="text" name="delid" placeholder="Doctor ID" required> &nbsp&nbsp
					<input type ="submit" value="Delete" name="delete" style="background:white;height:30px;color:red;border:0;border-bottom:solid red;">
				</form>
				<?php
					if(isset($_POST['delete']))
					{
						$delid=$_POST['delid'];
						//Deletes the value from the database
						$result=$conn->query("delete from doctor where docid='$delid'");
						//checks if id exists in the database or not
						if(!($result))
							echo "<script>alert ( 'No such ID or Doctor is Already been deleted. ' ) ; </script>";
						else	
						{
							echo "<script>alert ( 'Doctor ('$docid') is deleted.' ) ; </script>";
							header("Location : adddoctor.php");
						}
					}
				?>
			</article>
		</div>
		<?php
			require("../footer.html");
		?>
	</body>
</html>
<?php
	}
	else
		header("Location : ../alogin.html");
?>


					<!----Categorie:- 
						<select name="cat">
						<option value="null">--Select--</option>
						<option value="normal">Normal</option>
						<option value="bone">Bone</option>
						<option value="heart">Heart</option>
						<option value="dent">Dentist</option>
						<option value="neuro">Neurologist</option>
						<option value="kidney">Kidney</option>
						<option value="cardio">Cardiologist</option>
						<option value="plast">Plastic Surgeon</option>							<				
					</select><br><br>
						Date:- <input type="date" name="date"><br>(DD/MM/YYYY)<br><br>
						Time:- 
							<select name="tym">
								<option value="null">07 am</option>
								<option value="normal">08 am</option>
								<option value="bone">09 am</option>
								<option value="heart">10 am</option>
								<option value="dent">11 am</option>
								<option value="neuro">12 pm</option>
								<option value="kidney">01 pm</option>
								<option value="cardio">02 pm</option>
								<option value="plast">03 pm</option>
								<option value="plast">04 pm</option>
								<option value="plast">05 pm</option>
								<option value="plast">06 pm</option>
								<option value="plast">07 pm</option>
								<option value="plast">08 pm</option>
							</select><br><br>--->