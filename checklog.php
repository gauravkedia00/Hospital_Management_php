<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<title></title>
		 <style>
		</style>
	</head>
	<body>
		<?php
			include_once("conn.php");
			$uname=$_POST["uname"];
			$pwd=$_POST["pwd"];
			$type=$_POST["type"];
			
			//starts the session for admin
			if($type=="admin")
			{
				$sql="SELECT * FROM admin where username='$uname' and password='$pwd'";
				$result1=$conn->query($sql);
				$row=$result1->fetch_object();
				$_SESSION["adminid"]=$row->adminid;
			}
			//starts the session for patient
			else if($type=="patient")
			{
				$sql="SELECT * FROM patient where username='$uname' and password='$pwd'";
				$result1=$conn->query($sql);
				$row=$result1->fetch_object();
				$_SESSION["uid"]=$row->uid;
			}
			//starts the session for doctor
			else if($type=="doctor")
			{
				$sql="SELECT * FROM doctor where doctorname='$uname' and password='$pwd'";
				$result1=$conn->query($sql);
				$row=$result1->fetch_object();
				$_SESSION["docid"]=$row->docid;
			}
			$result=$conn->query($sql) or exit('$sql failed: '.mysql_error());
			$num_rows=$result->num_rows;
			if($num_rows==0)
			{
				echo "<script>	alert('Username or Password is incorrect ! ');	</script>";
				echo "<script>	alert('Login again... ')	;</script>";
				if($type=="doctor")
					header("Location: dlogin.html");
				else if($type=="patient")
					header("Location: plogin.html");
				else if($type=="admin")
					header("Location: alogin.html");
			}
			else
			{
				//redirects to home page of doctors
				if($type=="doctor")
					header("Location: ./doctor/welcomedoctor.php");
				//redirects to home page of patient
				else if($type=="patient")
					header("Location: ./patient/welcomepatient.php");
				//redirects to home page of admin
				else if($type=="admin")
					header("Location: ./admin/welcomeadmin.php");
			}
			
			$conn->close();
		?>
	</body>
</html>