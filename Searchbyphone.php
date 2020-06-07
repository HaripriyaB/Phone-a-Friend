 <html>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
<?php
$host = "host=localhost";
$port = "port=5433";
$dbname = "dbname=MyPgAdmin";
$credentials = "user=postgres password=root";
$db = pg_connect( "$host $port $dbname $credentials" );
if(!$db){
echo "Error : Unable to open database\n";
}
$start=$_POST['start'];
$mid=$_POST['mid'];
$end=$_POST['end'];
$any=$_POST['any'];
if($_POST['start']!=null && IS_NUMERIC($start) && $_POST['mid']!=null && IS_NUMERIC($mid) && $_POST['end']!=null && IS_NUMERIC($end))
{
	$sql =<<<EOF
SELECT * FROM public."PhoneBook" WHERE "PhoneNumber"::text LIKE '$start%$mid%$end$';
EOF;
}
else if($_POST['any']!=null && IS_NUMERIC($any))
{
	$sql =<<<EOF
SELECT * FROM public."PhoneBook" WHERE "PhoneNumber"::text LIKE '%$any%';
EOF;
}
else if($_POST['start']!=null && IS_NUMERIC($start))
{
	$sql =<<<EOF
SELECT * FROM public."PhoneBook" WHERE "PhoneNumber"::text LIKE '$start%';
EOF;
}
else if($_POST['mid']!=null && IS_NUMERIC($mid))
{
	$sql =<<<EOF
SELECT * FROM public."PhoneBook" WHERE "PhoneNumber"::text LIKE '%$mid%';
EOF;
}
else if($_POST['end']!=null && IS_NUMERIC($end))
{
	$sql =<<<EOF
SELECT * FROM public."PhoneBook" WHERE "PhoneNumber"::text LIKE '$end$';
EOF;
}
else
{
	echo "<script type='text/javascript'>alert('Invalid Entries!');window.location.href='TelSearch.php'</script>";
}
$ret = pg_query($db, $sql);
if(!$ret){
echo "Please go back and check Your Inputs!";
exit;
}
$num = pg_numrows($ret);
echo "<h1>Phone Book</h1>";
echo "<table border='1'>
<tr>

<th>S.NO</th>

<th>FirstName</th>

<th>LastName</th>

<th>Email</th>

<th>PhoneNumber</th>

<th>DOB</th>

<th>Address</th>

<th>AlternateNumber</th>

</tr>";
$no=0;

while($row = pg_fetch_row($ret))

  {

  echo "<tr>";
  
  $no++;
  
  echo "<td> $no </td>";

  echo "<td> $row[0] </td>";

  echo "<td> $row[1] </td>";

  echo "<td> $row[2] </td>";

  echo "<td> $row[3] </td>";
  
  echo "<td> $row[4] </td>";
  
  echo "<td> $row[5] </td>";
  
  echo "<td> $row[6] </td>";
  
  echo "</tr>";

  }
echo "</table>";

if($no==0)
{
	echo "NO RECORDS FOUND!";
}	
pg_close($db);

?>
</body>
</html>