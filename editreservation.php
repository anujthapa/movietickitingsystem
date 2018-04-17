<?php include('config.php');
	session_start();
	
	if($_SESSION["logged"] != true )
		header("location: index.php");
		$id = isset($_GET['id']) ? $_GET['id'] : 1;


	if(isset($_POST['Submit'])){
		$reservationid=$_POST['reservationid'];
		$reservedate=$_POST['reservedate'];
		$showtime=$_POST['showtime'];
		$customername=$_POST['customername'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$moviename=$_POST['moviename'];
		$nseat=$_POST['nseat'];
		mysql_query("UPDATE reservation SET reservedate='$reservedate',showtime='$showtime',customername='$customername',phone='$phone',address='$address',moviename='$moviename',seatsrequired='$nseat' where reservationid='$reservationid'") or die(mysql_error());
		//result message for operation
		$result = "Reservation Edited Successfully";
		header("Location: reservation.php?result=$result");
	}elseif(isset($_GET['delete']))
	{
	$id = $_GET['delete'];
	mysql_query("DELETE FROM reservation WHERE reservationid=$id");
		$result = "Reservation Deleted Successfully";
		header("Location: reservation.php?result=$result");
	
	
	}
	
	
$sql = mysql_query("SELECT * FROM reservation WHERE reservationid = $id") or die(mysql_error());

$row = mysql_fetch_object($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Reservation</title>
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
            <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td colspan="2"><h1>EDIT Reservation</h1>
                 <s$result?></p></td>
              </tr>
              <tr>
                <td width="25%">Reservation ID</td>
                <td width="75%"><input type="text" name="reservationid" id="reservationid" value="<?=$row->reservationid?>"/></td>
              </tr>
              <tr>
                <td>Reserve Date</td>
                <td><input type="text" name="reservedate" id="reservedate" value="<?=$row->reservedate?>"/></td>
              </tr>
              <tr>
                <td>Showtime</td>
                <td><input type="text" name="showtime" id="showtime" value="<?=$row->showtime?>"/></td>
              </tr>
               <tr>
                <td>Customer Name</td>
                <td><input type="text" name="customername" id="customername" value="<?=$row->customername?>"/></td>
              </tr>
               <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" id="phone" value="<?=$row->phone?>"/></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><input type="text" name="address" id="address" value="<?=$row->address?>"/></td>
              </tr>
              <tr>
                <td>Movie Name</td>
                <td><input type="text" name="moviename" id="moviename" value="<?=$row->moviename?>"/></td>
              </tr>
              <tr>
                <td>No. of Seat</td>
                <td><input type="text" name="nseat" id="nseat" value="<?=$row->seatsrequired?>"/></td>
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
