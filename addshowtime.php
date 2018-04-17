<?php include('config.php');
	session_start();
	
	if($_SESSION["logged"] != true )
		header("location: index.php");

if(isset($_POST['Submit'])){
		if(!empty($_POST['showtime']))
		{
		$showtimeid=$_POST['showtimeid'];
		$showtime=$_POST['showtime'];
		$moviename=$_POST['moviename'];
		$price=$_POST['price'];
		$seatsavailable=$_POST['seatsavailable'];
		$err="";
		if(($price)){
		$err="PRICE SHOULD BE NUMERIC";
			}

		if(err==""){

		mysql_query("INSERT INTO movieshowtime(showtimeid,showtime,moviename,price,seatsavailable) values(null, '$showtime', '$moviename','$price','$seatsavailable')") or die(mysql_error());
		//result message for operation
		$result = "Showtime Added Successfully";
		header("Location: addshowtime.php?c=ok&result=$result");
		}
		else{
		$result='Showtime cannot be blank';
		header("Location: addshowtime.php?c=warn&result=$result");
		}
	}	
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Showtime</title>
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
            <form id="form1" name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td colspan="2"><h1>ADD Showtime</h1>
                <s$_GET["result"]?>
                </td>
              </tr>
              <tr>
                <td width="25%">Showtime ID</td>
                <td width="75%"><input type="text" name="showtimeid" id="showtimeid" /></td>
              </tr>
              <tr>
                <td>Showtime</td>
                <td><input type="text" name="showtime" id="showtime" /></td>
              </tr>
              <tr>
                <td>Movie Name</td>
                <td><input type="text" name="moviename" id="moviename" /></td>
              </tr>
               <tr>
                <td>Price</td>
                <td><input type="text" name="price" id="price" /></td>
              </tr>
               <tr>
                <td>Seats Available</td>
                <td><input type="text" name="seatsavailable" id="seatsavailable" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
              </tr>
            </table>
          </form>             
          </td>
        </tr>
      </table></td>
    </tr>

  </table>
</div>

<div id="footer">
	<?php include('footer.php'); ?>
</div>
</div>
</body>
</html>
