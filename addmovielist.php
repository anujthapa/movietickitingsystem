<?php include('config.php');
	session_start();
	
	if($_SESSION["logged"] != true )
		header("location: index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Movielist</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<?php
	if(isset($_POST['Submit'])){
		if(!empty($_POST['moviename']))
		{
		$movieid=$_POST['movieid'];
		$moviename=$_POST['moviename'];
		$starcast=$_POST['starcast'];
		$director=$_POST['director'];
		$releasedate=$_POST['releasedate'];
		mysql_query("INSERT INTO movielist(movieid,moviename,starcast,director,releasedate) values(null, '$moviename', '$starcast','$director','$releasedate')") or die(mysql_error());
		//result message for operation
		$result = "Movie Added Successfully";
		header("Location: addmovielist.php?c=ok&result=$result");
		}
		else{
		$result='Moviename cannot be blank';
		header("Location: addmovielist.php?c=warn&result=$result");
		}
	}	
	
?>

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
                <td colspan="2"><h1>ADD Movie List</h1>
                <s$_GET["result"]?>
                </td>
              </tr>
              <tr>
                <td width="25%">Movie id</td>
                <td width="75%"><input type="text" name="movieid" id="movieid" /></td>
              </tr>
              <tr>
                <td>Movie Name</td>
                <td><input type="text" name="moviename" id="moviename" /></td>
              </tr>
              <tr>
                <td>Starcast</td>
                <td><input type="text" name="starcast" id="starcast" /></td>
              </tr>
               <tr>
                <td>Director</td>
                <td><input type="text" name="director" id="director" /></td>
              </tr>
               <tr>
                <td>Release Date</td>
                <td><input type="text" name="releasedate" id="releasedate" /></td>
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
