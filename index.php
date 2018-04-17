`<?php
	session_start();
	
	if(isset($_GET["logout"])){
		$_SESSION["logged"] = false;
		header("location: index.php");
		}
	
	if(isset($_POST["LogIn"])) {
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		include('config.php');
		
		$sql = mysql_query("SELECT * FROM users WHERE username='$username' and password='$password'") or die(mysql_error());
		
			if(mysql_num_rows($sql)>0) {
			
				$_SESSION["logged"] = true;
				$_SESSION['username'] = $username;
				header("location: welcome.php");
			
			}else{
				$output ="Sorry Either your username or password is wrong.";
			}
		
		}else{
			$output ="Get signed in to Access Admin Panel ";
		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="loginbox">
<form id="form1" name="form1" method="post" action="">
    <table class="login" width="400" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#0099CC">
      <tr>
        <td><h1 align="center">Admin Panel</h1></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">Username: 
        <input type="text" name="username" id="username" /></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">Password: 
        <input type="password" name="password" id="password" /></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><input type="submit" name="LogIn" id="LogIn" value="Log In" /></td>
      </tr>
      <tr>
      <td><div class="logininfo"><strong><?php echo $output; ?></strong> <div>     </td>
      <td><a href="../index.php">HOME</a></td>
      </tr>
     
    </table></div>
</form>
</body>
</html>
