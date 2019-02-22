<?php
	session_start();
	if(isset($_SESSION["uid"]))
	{
?>
<!doctype html>
<html>
	<head>
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
				width: 70%;
				margin: auto;
			}
			.search{
				width:8%;
				height:30px;
				border-right:2px solid black;
				border-bottom:2px solid black;
			}
			@media screen and (min-width:100px) and (max-width:500px)
			{
				input{padding:1%;}
				.search{
					width:25%;
				}
			}
			@media screen and (min-width:501px) and (max-width:1000px)
			{
				.search{
					width:10%;
				}
			}
		</style>
		<link href="../header.footer.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
		<script type="text/javascript">
		</script>
	</head>
	<body class="body">
		<a id="top"></a>
		<?php
			include("../header.html");
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li><a href="newbook.php">New Booking</a></li>
					<li><a href="viewbookings.php">View Bookings</a></li>
					<li><a href="cancelbooking.php">Cancel Booking</a></li>
					<li class="active"><a href="searchdoctor.php" >Search Doctor</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<form autocomplete="ON" action="searchdoctor.php" method="post">
				<h1>Search Doctor</h1>
				Searcg By :
					<select name="select">
						<option value="doctorname" name="doctorname">Name</option>
						<option value="category" name="cat">Type</option>
						<option value="address" name="address">Address</option>
					</select><br><br>
				Type here :-
					<input type="text" name="value" placeholder="  type here" required class="value"><br><br>
				<input type="submit" value="search" name="search" class="search">
				</form>
				<?php
					include("../conn.php");
					if(isset($_POST['search']))
					{
						$val=$_POST['value'];
						if($_POST['select']=="doctorname")
							$result=$conn->query("SELECT * FROM doctor where doctorname='$val'");
						else if($_POST['select']=="category")
							$result=$conn->query("SELECT * FROM doctor where category='$val'");
						else if($_POST['select']=="address")
							$result=$conn->query("SELECT * FROM doctor where address='$val'");
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<script>alert('No result found!')</script>";
						}
						echo "<br><br><br><center><table><tr><th>ID</th><th>Name</th><th>Address</th><th>Mobile no.</th><th>Category</th><th>Gender</th></tr>";
						while($row=$result->fetch_assoc())
						{
							echo "<tr><td>" .  $row['docid']. "</td><td>" . $row['doctorname']."</td><td>" . $row['address']."</td><td>". $row['contactno']."</td><td>". $row['category']."</td><td>" .$row['gender']. "</td></tr>";
						}
						echo "</table></center>";
						$conn->close();
					}
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
		header("Location:  ../plogin.html");
?>
<!--
					<datalist id="dlist">
						<option value="Normal">
						<option value="Bone">
						<option value="Heart">
						<option value="Dentist">
						<option value="Neurologist">
						<option value="Kidney">
						<option value="Cardiologist">
						<option value="Plastic Surgeon">
					</datalist-->