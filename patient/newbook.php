<?php	
	session_start();
	if(isset($_SESSION["uid"]))
	{
?>
<!doctype html>
<html>
	<head>
		<script type="text/javascript">
		</script>
		
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<link href="../header.footer.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body class="body">
		<a id="top"></a>
		<?php
			include("../header.html");
			include("../conn.php");
			$uid=$_SESSION["uid"];
			//$row=$conn->query("select * from patientbook")->num_rows;
			//$apid=rand().date("s").date("y")
			$_SESSION["apid"]=rand(1000,9999);
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li class="active"><a href="newbook.php">New Booking</a></li>
					<li><a href="viewbookings.php" >View Bookings</a></li>
					<li><a href="cancelbooking.php">Cancel Booking</a></li>
					<li><a href="searchdoctor.php" >Search Doctor</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>New Booking !!</h1>
				<form action="checkdoctor.php" method="post">
					Appointment ID:- <input type="button" name="apid" value="<?php echo $_SESSION['apid']; ?>"><br><br>
					Categorie:- 
						<select name="cat" required>
							<option value="Normal">--Select--</option>
							<option value="Normal">Normal</option>
							<option value="Bone">Bone</option>
							<option value="Heart">Heart</option>
							<option value="Dentist">Dentist</option>
							<option value="Neurologist">Neurologist</option>
							<option value="Kidney">Kidney</option>
							<option value="Cardiologist">Cardiologist</option>
							<option value="Plastic Surgeon">Plastic Surgeon</option>							<				
						</select><br><br>
					Date:- <input type="date" name="date"placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>" required><br><br>
					Time:- 
						<select name="time">
							<option value="07:00:00">07 am</option>
							<option value="08:00:00">08 am</option>
							<option value="09:00:00">09 am</option>
							<option value="10:00:00">10 am</option>
							<option value="11:00:00">11 am</option>
							<option value="12:00:00">12 pm</option>
							<option value="13:00:00">01 pm</option>
							<option value="14:00:00">02 pm</option>
							<option value="15:00:00">03 pm</option>
							<option value="16:00:00">04 pm</option>
							<option value="17:00:00">05 pm</option>
							<option value="18:00:00">06 pm</option>
							<option value="19:00:00">07 pm</option>
							<option value="20:00:00">08 pm</option>
						</select><br><br>
					<input type="submit" value="Check" name="check">
				</form>
			</article>
		</section>
		<?php
			include("../footer.html");
		?>
	</body>
</html>
<?php
	}
	else	
		header("Location:  ../plogin.html");
?>

<!--

												/*select d.docid,d.doctorname from patientbook p , doctor d
												where d.docid!=p.docid and p.time!='$time' and d.category!='$cat' and p.date!='$date'*/
												
												
-->