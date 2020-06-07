<html>
<title>Connect</title>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<h1 style="background-color:pink;">Connect</h1>
<form action="Created.php" method="POST">

Host Name: <input type="text" name="host" /><br><br>

Port Number: <input type="number" name="port" /><br><br>

Database Name: <input type="text" name="dname" /><br><br>

UserName: <input type="text" name="uname" /><br><br>

Password: <input type="password" name="pwd" /><br><br>

<input type="submit" value="Create" class="buttons"/>	
</form>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
</body>
</html>