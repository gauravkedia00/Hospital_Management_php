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
			//generates a new id
			$no=$conn->query("select  * from patient")->num_rows+100;
			$uid="p".$no;
			$uname=$_POST["uname"];
			$pwd=$_POST["pwd"];
			//For Gender
			if($_POST["gender"]=="m"||$_POST["gender"]=="M")
				$gender="Male";
			else if($_POST["gender"]=="f"||$_POST["gender"]=="F")
				$gender="Female";
			$tel=$_POST["tel"];
			$addr=$_POST["addr"];
			$mail=$_POST["mail"];
			$age=$_POST["age"];
			$result=$conn->query("SELECT * FROM patient");
			$num_rows=$result->num_rows;
			while($num_rows>0)
			{
				$row=$result->fetch_assoc();
				//checks if the user already exists
				if($uname==$row['username']&&($pwd==$row['password']))
				{
					echo "<script>alert('You are already registered ! Just Sign In')</script>";
					header("Location: plogin.html");
				}
				else
				{
					//to insert into database
					$sql="INSERT INTO PATIENT VALUES('$uid','$uname','$pwd','$gender','$tel','$addr','$mail','$age')";
					
					$result=$conn->query($sql) or exit('$sql failed: '.$result->error);
					$num_rows=$result->num_rows;
					if($num_rows==0)
					{
						header("Location: plogin.html");
					}
					else 
					{
						header("Location: newacc.html");
					}
				}
				$num_rows--;
			}
		?>
	</body>
</html>