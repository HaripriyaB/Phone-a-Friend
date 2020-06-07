<html>
<body>
<link rel="stylesheet" href="csstyle.css"/>
<?php

if((!isset($_POST['first_name'])|| trim($_POST['first_name']) == '') || (!isset($_POST['last_name']) || trim($_POST['last_name']) == ''))
{
		echo "<script type='text/javascript'>alert('Check Your Entries!');window.location.href='Delete.php';</script>";

}
$host = "host=localhost";
$port = "port=5433";
$dbname = "dbname=MyPgAdmin";
$credentials = "user=postgres password=root";
$db = pg_connect( "$host $port $dbname $credentials" );
if(!$db){
echo "Error : Unable to open database\n";
} 
if((!isset($_POST['phno'])|| trim($_POST['phno']) == ''))
{$sql =<<<EOF
DELETE FROM public."PhoneBook" WHERE "FirstName"='$_POST[first_name]' and "LastName"='$_POST[last_name]';
EOF;
}
else if($_POST['phno']!=null && IS_NUMERIC($_POST['phno']))
{
	$sql =<<<EOF
DELETE FROM public."PhoneBook" WHERE "FirstName"='$_POST[first_name]' and "LastName"='$_POST[last_name]' and "PhoneNumber"='$_POST[phno]';
EOF;
}
$ret = pg_query($db, $sql);
if(!$ret){
echo pg_last_error($db);
} else {
echo "<br/>Record deleted successfully\n";
}
pg_close($db);
?>
<p>Deleted Data: <?php echo $_POST['first_name'].' '.$_POST['last_name']; ?></p>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
</body>
</html>