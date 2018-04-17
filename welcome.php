<?php include('config.php');
	session_start();
	
	if($_SESSION["logged"] != true )
		header("location: index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome </title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="warp">
    <?php include('header.php');?>
    <div class="menucontent">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="220" bgcolor="#3399FF"><?php include('menu.php');?> </td>
          <td width="80%" valign="top">
            <table width="100%" height="164" border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td height="107" colspan="2"><h1>WELCOME To Admin Panel</h1></td>
              </tr>
              <tr>
                <td width="42%" height="29"><h2>Movie List</h2></td>
                <td width="58%"><h2>Reservation</h2></td>
              </tr>
              <tr>
                <td><h3>No.of Movies :</h3>
                <?php 
			$num=mysql_num_rows(mysql_query("select * from movielist "));
			print $num;
		?>
        </td>
                <td><h3>No. of Reservation :</h3>
                 <?php 
			$num=mysql_num_rows(mysql_query("select * from reservation "));
			print $num;
		?>
        </td>
              </tr>
            </table>          
          </td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>


	<?php include('footer.php'); ?>
</div>
</body>
</html>
