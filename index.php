<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$Register_number = $_POST['Register_number'];
	$deptname = $_POST['deptname'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE Register_number='$Register_number' AND deptname='$deptname' AND password='$password' ";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		if($deptname=="CSE")
		{
		header("Location: cse/index.html");
		}
		elseif($deptname=="ECE")
		{
			header("Location:ece.html");
		}
		elseif($deptname=="civil")
		{
			header("Location:civil.html");
		}
		elseif($deptname=="EEE")
		{
			header("Location:eee.html");
		}
		elseif($deptname=="MECH")
		{
			header("Location:mech.html");
		}
		
	} else {
		echo "<script>alert('Woops! Register_number or Password or is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form - Pure Coding</title>
</head>
<body>
	<div class="container">
      <center>
      <img src="data:image/jpeg;base64,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" alt="clg logo" width="250" height="166.5">
         </center>
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="varchar" placeholder="Register_number" name="Register_number" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="deptname" name="deptname" value="<?php echo $_POST['deptname']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>