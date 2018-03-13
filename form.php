<?php
session_start();
$_SESSION['message']='';
$mysqli= new mysqli('localhost', 'root', '' ,'login');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	if($_POST['password'] == $_POST['cpassword'])
	{
	
		$name = $mysqli->real_escape_string($_POST['name']);
		$username = $mysqli->real_escape_string($_POST['username']);
		$password = md5($_POST['password']);
		$email = $mysqli->escape_string($_POST['mail']);
		echo "$email";
		$sql= "INSERT INTO login_details VALUES ('$name', '$username', '$password', '$email')";
	}
		if($mysqli->query($sql)== true)
		{
			header("location: Success.php");
			
		}
	else
	{
		$_SESSION['message']= "Passwords Do not Match";	
		
	}
	
	//$_SESSION['message']='';
}
?>
<html>
<head>
<link rel="stylesheet" href="">
<title>Registration</title>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
</head>
<body>
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post">
      <div class="alert alert-error"><?= $_SESSION['message']?></div>
	  <input type="text" placeholder="Name" name="name" required />
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="mail" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="cpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
</body>
</html>