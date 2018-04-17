<?php include('config.php');
	session_start();
	
	if($_SESSION["logged"] != true )
		header("location: index.php");
$id = isset($_GET['id']) ? $_GET['id'] : 1;


	if(isset($_POST['Submit'])){
		$movieid=$_POST['movieid'];
		$moviename=$_POST['moviename'];
		$starcast=$_POST['starcast'];
		$director=$_POST['director'];
		$releasedate=$_POST['releasedate'];
		mysql_query("UPDATE movielist SET moviename='$moviename',starcast='$starcast',director='$director',releasedate='$releasedate' where movieid='$movieid'") or die(mysql_error());
		//result message for operation
		$result = "Movielist Edit Successfully";
		//header("Location: editmovielist.php?result=$result");
	}
	
	

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Movielist</title>
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
                <td colspan="6"><h1>EDIT Movie List</h1>
                <p></p></td>
              </tr>
              <tr>
                <th width="25%">Movie Id</th>
                <th width="75%">Movie Name</th>
                <th width="75%">Star Cast</th>
                <th width="75%">Director</th>
                <th width="75%">Release Date</th>
                <th width="75%">Edit/Delete</th>
              </tr>
              <?php
			  
$sql = mysql_query("SELECT * FROM movielist") or die(mysql_error());

while($row = mysql_fetch_object($sql))
{
             print '<tr>
                <td>'.$row->movieid.'</td>
                <td>'.$row->moviename.'</td>
                <td>'.$row->starcast.'</td>
                <td>'.$row->director.'</td>
                <td>'.$row->releasedate.'</td>
                <td><a href="editmovielist.php?id='.$row->movieid.'">Edit</a> | <a href="editmovielist.php?delete='.$row->movieid.'" onClick="return confirm(\'Are you Sure you want to Delete?\');" >Delete</a></td>
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

