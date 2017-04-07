<?php
// define variables and set to empty values
$firstnameErr =$lastnameErr= $emailErr = $passwordErr=$lpasswordErr=$lemailErr="";
$firstname = $lastname=$email =$password =$lpassword=$lemail="";
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if(isset($_POST['lemail']) and isset($_POST['lpassword']))
		{
			$lemail = test_input($_POST["lemail"]);
				// check if e-mail address is well-formed
			if (!filter_var($lemail, FILTER_VALIDATE_EMAIL)) 
			{
			$lemailErr = "Invalid email format"; 
			}
			$lpassword=test_input($_POST["lpassword"]);
			$sql="select * from verified where email='".$lemail."' and password ='".$lpassword."'";
			$result = $conn->query($sql);
			$Row = $result->fetch_assoc();
					if (is_null($Row) == true)
					{
						echo "<script>alert('Wrong Email Or PASSWORD');window.location.href='index.php';</script>";
					}
					else
					{
						session_start();
						$_SESSION['email']=$_POST['lemail'];
						$_SESSION['firstname']=$Row["firstname"];
						$_SESSION['lastname']=$Row["lastname"];
						header("Location:next.php");
					}	
	
		}
		else
		{
			$firstname = test_input($_POST["firstname"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$firstname))
			{
				$firstnameErr = "Only letters and white space allowed"; 
   
			}
  
			$lastname = test_input($_POST["lastname"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
			{
			$lastnameErr = "Only letters and white space allowed"; 
  
			}
  
  
  
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{
					$emailErr = "Invalid email format"; 
				}
			$password=test_input($_POST["password"]);
			if (!(filter_var($password, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^(?=.*\d).{8,}$/"))))) 
				{
				$passwordErr = "Minimum 8 characters at least 1 Number "; 
				}
  
 
			if(strcasecmp($firstnameErr,"")==0 &&  strcasecmp($lastnameErr,"")==0 &&strcasecmp($emailErr,"")==0 && strcasecmp($passwordErr,"")==0 )   
				{
	
					$sql="select * from unverified where email='".$email."'";
					$result = $conn->query($sql);
					$Row = $result->fetch_assoc();
				if (is_null($Row) == false)
					{
						echo "<script>alert('Email has been already registered');window.location.href='index.php';</script>";
					}
				else
					{
						$sql = "INSERT INTO unverified (firstname, lastname, email,password)
						VALUES ('$firstname', '$lastname', '$email','$password')";
						$conn->query($sql);
						header("Location: mail.php?email=$email&name=$firstname");
					}
				}
		}
	}
if (isset($_GET['email']) and isset($_GET['code']) )
	{

		$sql = "SELECT code FROM unverified where email='".$_GET['email']."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($_GET['code']==$row["code"])
			{
				$sql = "select * from unverified WHERE email='".$_GET['email']."'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$firstname=$row["firstname"];
				$lastname=$row["lastname"];
				$email=$row["email"];
				$password=$row["password"];
				$sql = "INSERT INTO verified (firstname, lastname, email,password)
						VALUES ('$firstname', '$lastname', '$email','$password')";
				$conn->query($sql);
				$sql = "DELETE FROM unverified WHERE email='".$_GET['email']."'";
				$conn->query($sql);
				echo "<script>alert('Email has been verified you can now login');window.location.href='index.php';</script>";
			}
	}
$conn->close();	
	
function test_input($data) 
	{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	}

	

?>