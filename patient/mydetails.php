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
		<link rel="stylesheet" href="js/min.css">
		<script src=""></script>
		
		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
			}
			#pdetail{
				box-shadow:0px 0px 0px white;
				width:40%;
			}
			#pdetail td{
				background:white;
				text-align:left;
				width:50%;
				font-variant:normal;
				padding-left:5%;
			}
			#pdetail .l{
				text-align:right;
				font-weight:900;
				width:50%;
				font-style:italic;
				font-variant:small-caps;
			}
			#pdetail .l+td{
				background:rgba(0,0,0,0.1);
			}
			@media screen and (min-width:100px) and (max-width:500px){
				#pdetail{
					width:100%;
					font-size:85%;
					margin:0 auto;
				}
				#pdetail .l{
					text-align:left;
					padding:0;
					width:24%;
				}
			}
			@media screen and (min-width:501px) and (max-width:1000px){
				#pdetail{
					width:60%;
					font-size:100%;
				}
				#pdetail td{
					width:70%;
				}
				#pdetail .l{
					width:30%;
				}
			}
			
			
		</style>
		
		<link href="../header.footer.css" rel="stylesheet">
		<link rel="stylesheet" href="patient.css" />
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body class="body">
		<a id="top"></a>
		<?php	
			include_once("../conn.php");
			include("../header.html");
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li class="active"><a href="mydetails.php" >My Details</a></li>
					<li><a href="newbook.php">New Booking</a></li>
					<li><a href="viewbookings.php">View Bookings</a></li>
					<li><a href="cancelbooking.php">Cancel Booking</a></li>
					<li><a href="searchdoctor.php">Search Doctor</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<?php
					include("../conn.php");
					$uid=$_SESSION["uid"];
					if($result=$conn->query("SELECT * FROM patient where uid='$uid'"))
					{
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<script>alert('No result found!')</script>";
						}
						//echo "";
						echo "<center><h1>Details</h1>";//<div id='div'>";
						$row=$result->fetch_object();
						//echo "<label>User ID :</label><u>" .  $row->uid . "</u><br><label>Name :</label><u>" . $row->username ."</u><br><label>Address :</label><u>" . $row->address ."</u><br><label>Mobile no. :</label><u> ". $row->contactno."</u><br><label>Email :</label> <u>". $row->email."</u><br>";
						echo "<table id=pdetail><tr><td class=l>User ID :</td><td>" .  $row->uid . "</td></tr><tr><td class=l>Name :</td><td>" . $row->username ."</td></tr><tr><td class=l>Address :</td><td>" . $row->address ."</td></tr><tr><td class=l>Mobile no. :</td><td> ". $row->contactno."</td></tr><tr><td class=l>Email :</td><td>". $row->email."</td></tr></table></center><br><br>";
						//echo "</div></center><br><br>";
					}
					if($result=$conn->query("SELECT * FROM patient p,doctortreat dt where p.uid=dt.uid and p.uid='$uid'"))
					{
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<script>alert('No Treatment History')</script>";
							echo "<i style='color:red;'>No Treatment History...</i>";
						}
						else
						{
							echo "<center><h1>Treatment History</h1><table><tr><th>Username</th><th>Disease</th><th>Treatment</th><th>Doctor Note</th><th>Date & time</th></tr>";
							while($row=$result->fetch_array())
							{
								echo "<tr><td>" .  $row['username']. "</td><td>" . $row['treatmentfor']."</td><td>" . $row['treatment']."</td><td>". $row['doctornote']."</td><td>". $row['tdatetime']."</td></tr>";
							}
							echo "</table></center>";
						}
					}
					$conn->close();
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
label css**************

			#div{
				width:30%;
				margin:auto;
			}
			#div label{
				width:30%;
				float:left;
			}
			label,u{
				padding:1%;display:block;
				text-decoration:none;
				text-align:center;
				border:1px solid black;
			}
			label{	background:linear-gradient(to bottom , rgba(0,0,0,0.8) , cornsilk);color:white;}
			label+u{	background:rgba(0,0,0,0.1);}
			@media screen and (min-width:100px) and (max-width:500px)
			{
				#div{
					width:100%;font-size:80%;
				}
				#div label{width:25%;}
				
			}

distinct(dt.uid),p.username,dt.treatmentfor,dt.treatment,dt.doctornote,pb.ap_date
-->