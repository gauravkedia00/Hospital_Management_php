<?php
	session_start();
	if(isset($_SESSION["docid"]))
	{
?>
<!doctype html>
<html>
	<head>
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="js/min.css">
		<script src=""></script>
		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
			}
		</style>
		<link href="../header.footer.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("../header.html");
			include("../conn.php");
			$docid=$_SESSION["docid"];

		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li><a href="myappointment.php">My Appointment</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li class="active"><a href="adddescription.php">Add Description</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<?php
					if(isset($_POST['search']))
						//This retrieves the information of the patience which is searched for by the doctor.
					{
						$apid=$_POST['apid'];
						$_SESSION["apid"]=$apid;
						$result=$conn->query("select pb.apid,p.username from patientbook pb , patient p where pb.apid='$apid' and p.uid=pb.uid and pb.docid='$docid'");
						$row=$result->fetch_object();
						if(($result->num_rows)==0)
							echo "<br><br><br>Treatment has done already.<br><small>OR</small><br>$apid isn't your patient!!<br><br><big>Go to <a href=adddescription.php style='text-decoration:none;'><<&nbspprevious page&nbsp>></a><br><br><big>";
						else{		
				?>
							<form action="donetreatment.php" method="post">
								<h1>Add Treatment!!</h1><br><input type="button" name="apid" value="<?php echo $apid?>"><br><br>
								Name : <input type="text" name="username" value="<?php  echo $row->username ; ?>"><br><br>
								Treatment For : <input type="text" name="treatmentfor" placeholder="disease" required><br><br>
								Treatment : <input type="text" name="treatment" placeholder="treatment" required><br><br>
								** Note : <input type="text" name="doctornote" placeholder="To be care of" required><br><br>
								<input type="submit" value="Add" name="add">
							</form>
				<?php
					}}
				?>
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
		header("Location:  ../dlogin.html");
?>