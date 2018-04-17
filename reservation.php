<?php
 include('config.php');
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
		//header("Location: editmovielist.php?result=$result");
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reservation</title>
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
            <table width="100%" border="1" cellspacing="0" cellpadding="5">
              <tr>
                <td colspan="9"><h1>EDIT Reservation</h1>
                <s$_GET['result']?></p></td>
              </tr>
              <tr>
                <th width="25%">Reservation  Id</th>
                <th width="75%">Reserve Date</th>
                <th width="75%">Showtime</th>
                <th width="75%">Customer Name</th>
                <th width="75%">Phone</th>
                <th width="75%">Address</th>
                <th width="75%">Moviename</th>
                <th width="75%">No. of Seats</th>
                <th width="75%">Edit/Delete</th>
              </tr>
              <?php
			  
$sql = mysql_query("SELECT * FROM reservation") or die(mysql_error());

while($row = mysql_fetch_object($sql))
{
             print '<tr>
                <td>'.$row->reservationid.'</td>
                <td>'.$row->reservedate.'</td>
                <td>'.$row->showtime.'</td>
                <td>'.$row->customername.'</td>
                <td>'.$row->phone.'</td>
				<td>'.$row->address.'</td>
				<td>'.$row->moviename.'</td>
				<td>'.$row->seatsrequired.'</td>
                <td><a href="editreservation.php?id='.$row->reservationid.'">Edit</a> | <a href="editreservation.php?delete='.$row->reservationid.'" onClick="return confirm(\'Are you Sure you want to Delete?\');" >Delete</a></td>
              </tr>';

}
			  
			  ?>
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

