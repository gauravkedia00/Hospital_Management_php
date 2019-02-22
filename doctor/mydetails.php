<?php
	session_start();
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
			.docdetail{
				width:30%;
				margin:auto;
			}
			.docdetail label{
				width:30%;
				float:left;
				text-align:right;
			}
			.docdetail input{
				background:white;
				width:70%;
				border:0;border-bottom:1px solid green;
				border-radius:0;
				color:gray;
				font-size:100%;
				font-family:Imprint MT Shadow,CountryBlueprint,VNI-Revue,RomanD,Lucida Calligraphy,Kristen ITC;
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
			$row=$conn->query("select * from doctor where docid='$docid'")->fetch_object();
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li class="active"><a href="mydetails.php">My Details</a></li>
					<li><a href="myappointment.php">My Appointment</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="adddescription.php">Add Description</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>View My Details!!</h1>
				<form action="" method="post" class="docdetail">
					<label>Doctor ID : </label> <input type="button" name="docid" value="<?php	echo $row->docid ;?>"><br><br>
					<label>Name : </label> <input type="button" name="doctorname" value="<?php echo $row->doctorname ;?>"><br><br>
					<label>Address : </label> <input type="button" name="address" value="<?php	echo $row->address ;?>"><br><br>
					<label>Mobile : </label> <input type="button" name="contactno" value="<?php	echo $row->contactno ;?>"><br><br>
					<label>Categorie : </label> <input type="button" name="cat" value="<?php echo $row->category ;?>" ><br><br>
				</form>
			</article>
		</section>
		<?php
			include("../footer.html");
		?>
	</body>
</html>