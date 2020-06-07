<html>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<?php
$host = "host=$_POST[host]";
$port = "port=$_POST[port]";
$dbname = "dbname=$_POST[dname]";
$credentials = "user=$_POST[uname] password=$_POST[pwd]";
$db = pg_connect( "$host $port $dbname $credentials" );
if(!$db){
echo "Error : Unable to open database\n";
} 
$sql =<<<EOF
      CREATE TABLE public."PhoneBook"
      ("FirstName" TEXT NOT NULL,
      "LastName"  TEXT NOT NULL,
      "PhoneNumber" INT(10) NOT NULL,
	  "DOB" date, 
      "ADDRESS" CHAR(50),"AlternateNumber" INT(10));
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo "Problem creating table!";
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
?> 
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
</body>
</html>