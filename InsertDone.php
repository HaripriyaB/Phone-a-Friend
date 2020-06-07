<html>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<?php
if((!isset($_POST['first_name'])|| trim($_POST['first_name']) == '') || (!isset($_POST['last_name']) || trim($_POST['last_name']) == '') || (!isset($_POST['phno'])|| trim($_POST['phno']) == ''))
{
	echo "<script type='text/javascript'>alert('Check Your Entries!');window.location.href='Insert.php';</script>";
}

$host = "host=localhost";
$port = "port=5433";
$dbname = "dbname=MyPgAdmin";
$credentials = "user=postgres password=root";
$db = pg_connect( "$host $port $dbname $credentials" );
if(!$db){
echo "Error : Unable to open database\n";
}

$sql =<<<EOF
INSERT INTO public."PhoneBook" ("FirstName","LastName","Email","PhoneNumber","DOB","Address","AlternateNumber")
VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[phno]','$_POST[dob]','$_POST[address]','$_POST[aphno]');
EOF;
$ret = pg_query($db, $sql);
if(!$ret){
echo pg_last_error($db);
} else {
echo "Records created successfully\n";
}
pg_close($db);
?>
<p>New Inserted Data: <?php echo $_POST['first_name'].' '.$_POST['last_name']; ?></p>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
</body>
</html>