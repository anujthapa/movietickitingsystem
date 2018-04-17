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
		//header("Location: editshowtime.php?result=$result");
	}
	
	

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Showtime</title>
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
                <td colspan="6"><h1>EDIT Showtime List</h1>
                  <s$_GET['result']?></p></td>
              </tr>
              <tr>
                <th width="25%">Showtime id</th>
                <th width="75%">Showtime</th>
                <th width="75%">Movie Name</th>
                <th width="75%">Price</th>
                <th width="75%">Seatsavailable</th>
                <th width="75%">Edit/Delete</th>
              </tr>
              <?php
			  
$sql = mysql_query("SELECT * FROM movieshowtime") or die(mysql_error());

while($row = mysql_fetch_object($sql))
{
             print '<tr>
                <td>'.$row->showtimeid.'</td>
                <td>'.$row->showtime.'</td>
                <td>'.$row->moviename.'</td>
                <td>'.$row->price.'</td>
                <td>'.$row->seatsavailable.'</td>
                <td><a href="editshowtime.php?id='.$row->showtimeid.'">Edit</a> | <a href="editshowtime.php?delete='.$row->showtimeid.'" onClick="return confirm(\'Are you Sure you want to Delete?\');" >Delete</a></td>
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

