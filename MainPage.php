<html>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<h1 style="background-color:pink;">PhoneBook Management System</h1>
<div class="bg">

 <img onclick="location.href='CreateTable.php';" src="conf.png" height="50" width="50" title="Configure" />
 
 <img onclick="location.href='Insert.php';" src="insertimg.png" height="50" width="50" title="Insert Data"/>
 
 <img onclick="location.href='Delete.php';" src="deleteimg.jpg" height="50" width="50" title="Delete Data"/>
 
 <img onclick="location.href='Display.php';" src="display.png" height="50" width="50" title="Display Table"/>
 
 <img onclick="location.href='Search.php';" src="searchimg.png" height="50" width="50"title="Search Data"/>
 
 <img onclick="location.href='DateCalculation.php';" src="calander.png" height="50" width="50"title="Calculate Age"/>
 

 
<?php
$host = "host=localhost";
$port = "port=5433";
$dbname = "dbname=MyPgAdmin";
$credentials = "user=postgres password=root";
$db = pg_connect( "$host $port $dbname $credentials" );
if(!$db){
echo "Error : Unable to open database\n";
}
$sql =<<<EOF
SELECT * FROM public."PhoneBook";
EOF;
$ret = pg_query($db, $sql);
if(!$ret){
echo pg_last_error($db);
exit;
}
$num = pg_numrows($ret);
echo "<h2>Phone Book</h2>";
echo "<table border='1' style='align:left;'>

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
