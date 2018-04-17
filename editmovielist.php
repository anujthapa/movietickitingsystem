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
		header("Location: movielist.php?result=$result");
	}elseif(isset($_GET['delete']))
	{
	$id = $_GET['delete'];
	mysql_query("DELETE FROM movielist WHERE movieid=$id");
		$result = "Movielist Deleted Successfully";
		header("Location: movielist.php?result=$result");
	
	
	}
	
	
$sql = mysql_query("SELECT * FROM movielist WHERE movieid = $id") or die(mysql_error());

$row = mysql_fetch_object($sql);

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Movielist</title>
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
                <td colspan="2"><h1>EDIT Movie List</h1>
                <p><?=$result?></p></td>
              </tr>
              <tr>
                <td width="25%">Movie id</td>
                <td width="75%"><input type="text" readonly="readonly" name="movieid" id="movieid" value="<?=$row->movieid?>" /></td>
              </tr>
              <tr>
                <td>Movie Name</td>
                <td><input type="text" name="moviename" id="moviename" value="<?=$row->moviename?>" /></td>
              </tr>
              <tr>
                <td>Starcast</td>
                <td><input type="text" name="starcast" id="starcast" value="<?=$row->starcast?>" /></td>
              </tr>
               <tr>
                <td>Director</td>
                <td><input type="text" name="director" id="director" value="<?=$row->director?>" /></td>
              </tr>
               <tr>
                <td>Release Date</td>
                <td><input type="text" name="releasedate" id="releasedate"  value="<?=$row->releasedate?>"/></td>
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

