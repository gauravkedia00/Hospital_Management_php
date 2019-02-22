<!doctype html>
<html>
	<head>
		<title>National Health Care</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="js/min.css">
		<script src="js/jquery.js"></script>
		<script src="js/min.js"></script>
		<script src=""></script>
		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
			}
		</style>
		<link href="header.footer.css" rel="stylesheet">
		<link href="main.css" rel="stylesheet">
		<link href="donateonline.css" rel="stylesheet">
	</head>
	<body>
		<a id="top"></a>
		<header>
			<img src="mainlogo.png">
			<b id="banner">National Health Care</b>
			<nav>
				<ul>
					| <li><a href="index.html" target="_self">Home</a></li>
					| <li><a href="aboutus.html" target="_self">About us</a></li>
					| <li><a href="contactus.html" target="_self">Contact us</a></li>
					| <li class="active"><a href="donateonline.php" target="_self">Donate Online</a></li>
				</ul>
			</nav>
		</header>
		
		<section align="center" class="requiredfield">
			<form action="donateonline.php" method="post">
				<h3>Required Field</h3>
				<h5>Donation Information</h5>
				Organ :&nbsp
					<input type="radio" name="organ" value="Eye" selected> Eye &nbsp
					<input type="radio" name="organ" value="Kidney"> Kidney &nbsp
					<input type="radio" name="organ" value="Blood"> Blood &nbsp
					<input type="radio" name="organ" value="Other"> Other &nbsp
					<input type="text" name="otherorgan" placeholder="type here"><br><br>				Blood Group:				<input type="text" placeholder="your blood group" size="14%" name="bgroup"><br><br>
				<h5>Contact Information</h5>
					<label>*</label>First Name<input type="text" name="fname" value="" placeholder="First name" required><br><br>
					<label>*</label>Last Name<input type="text" name="lname" value="" placeholder="Last name" required><br><br>					<label>*</label>Gender <input type="radio" name="gender" value="Male" selected required> Male <input type="radio" name="gender" value="Female" selected> Female<br><br>
					<label>*</label>Company Name<input type="text" name="cname" value="" placeholder="Company name" required><br><br>					<label>*</label>Age<input type="number" name="age" placeholder="your age" min="18" max="99" required><br><br>
					<label>*</label>Address<textarea name="address" placeholder="address 1" required></textarea><br><br>
					<label>*</label>Address 2<textarea name="address2" placeholder="address 2" required></textarea><br><br>
					<label>*</label>City<input type="text" name="city" placeholder="City" required><br><br>
					<label>*</label>State
						<input type="text"name="stt" list="stt" required>
						<datalist id="stt">
							<option value="Maharashtra">
							<option value="Gujrat">
							<option value="Panjab">
							<option value="Delhi">
						</datalist><br><br>
					Postal Code<input type="text" name="pin" value="" placeholder=" pin" required><br><br>
					Mobile no.<input type="tel" name="contactno" value="" placeholder="contact number" maxlength="10" required><br><br>
					Email<input type="email" name="email" value="" placeholder="  example@domain.com" size="30%" required><br><br>
					<input type="submit" name="submit" value="Submit">
				</form>				<?php					if(isset($_POST['submit']))					{						include("conn.php");						if($_POST['organ']=="Other")							$organ=$_POST['otherorgan'];						else							$organ=$_POST['organ'];						$bgroup=$_POST['bgroup'];						$fname=$_POST['fname'];						$lname=$_POST['lname'];						$age=$_POST['age'];						$gender=$_POST['gender'];						$cname=$_POST['cname'];						$address=$_POST['address'];						$address2=$_POST['address2'];						$city=$_POST['city'];						$state=$_POST['stt'];						$pin=$_POST['pin'];						$contactno=$_POST['contactno'];						$email=$_POST['email'];						$date=date("Y-m-d  H:i:s");						//inserts the info to donateonline table						if($conn->query("insert into donateonline values('$organ','$bgroup','$fname','$lname','$age','$gender','$cname','$address','$address2','$city','$state','$pin','$contactno','$email','$date')"))						{							echo "<script>alert('Submitted successfully!');</script>";						}						else								echo "<script>alert('Not submitted');</script><i style='color:red;'>you have already filled this form..</i>";					}				?>
		</section>						<footer id="footer">			<a href="#top" id="top">TOP</a>				<nav id="footnav">					<ul><i><a href="../index.html" id="homesite">nationalhealthcare.com</a></i>						<li><a href="../clinic.html">Our Clinics</a></li>						<li><a href="../privacypolicy.html">Privacy Policy</a></li>						<li><a href="../faqs.html">FAQs</a></li>					</ul>				</nav>				<script type="text/javascript">					var d=new Date();					var y=d.getFullYear();					document.write("Copyright &copy "+y);				</script>				<!--Copyright &copy; <?php echo date("Y")?>-->		</footer>
	</body>
</html>	

