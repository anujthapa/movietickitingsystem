<?php include('config.php');
	session_start();
	
	if($_SESSION["logged"] != true )
		header("location: index.php");
$id = isset($_GET['id']) ? $_GET['id'] : 1;


	if(isset($_POST['Submit'])){
		$showtimeid=$_POST['showtimeid'];
		$showtime=$_POST['showtime'];
		$moviename=$_POST['moviename'];
		$price=$_POST['price'];
		$seatsavailable=$_POST['seatsavailable'];
		mysql_query("UPDATE movieshowtime SET showtime='$showtime',moviename='$moviename',price='$price',seatsavailable='$seatsavailable' where showtimeid='$showtimeid'") or die(mysql_error());
		//result message for operation
		$result = "Showtime Edit Successfully";
		header("Location: showtime.php?result=$result");
	}elseif(isset($_GET['delete']))
	{
	$id = $_GET['delete'];
	mysql_query("DELETE FROM movieshowtime WHERE showtimeid=$id");
		$result = "Showtime Deleted Successfully";
		header("Location: showtime.php?result=$result");
	
	
	}
	
	
$sql = mysql_query("SELECT * FROM movieshowtime WHERE showtimeid = $id") or die(mysql_error());

$row = mysql_fetch_object($sql);

	
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Showtime</title>
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
                <td colspan="2"><h1>EDIT Showtime</h1>
                <p><?=$result?></p>
                </td>
              </tr>
              <tr>
                <td width="25%">Showtime ID</td>
                <td width="75%"><input type="text" name="showtimeid" id="showtimeid" value="<?=$row->showtimeid?>"/></td>
              </tr>
              <tr>
                <td>Showtime</td>
                <td><input type="text" name="showtime" id="showtime" value="<?=$row->showtime?>"/></td>
              </tr>
              <tr>
                <td>Movie Name</td>
                <td><input type="text" name="moviename" id="moviename" value="<?=$row->moviename?>"/></td>
              </tr>
               <tr>
                <td>Price</td>
                <td><input type="text" name="price" id="price" value="<?=$row->price?>"/></td>
              </tr>
               <tr>
                <td>Seats Available</td>
                <td><input type="text" name="seatsavailable" id="seatsavailable" value="<?=$row->seatsavailable?>"/></td>
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


	<?php include('footer.php'); ?>
</div>
</body>
</html>
