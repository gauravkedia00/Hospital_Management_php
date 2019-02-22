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
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body>
		<a id="top"></a>
		<?php
			require("../header.html");
		?>
			
		<div class="admincontent">
			<nav id="nav">
				<ul>
					<li><a href="adddoctor.php">Add<big>/</big>Delete Doctor</a></li>
					<li><a href="viewdoctor.php">View Doctor</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="viewappointments.php">View Appointments</a></li>
					<li><a href="viewfeedback.php">View Feedback</a></li>
					<li><a href="organdonor.php">Organ Donor</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>! Welcome Admin !</h1>
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
		header("Location:  ../alogin.html");
?>