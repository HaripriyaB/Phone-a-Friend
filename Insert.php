<html>
<title>Insertion</title>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<h1 style="background-color:pink;">Insertion</h1>

<form action="InsertDone.php" method="POST">

First name: <input type="text" name="first_name" /><br><br>

Last name: <input type="text" name="last_name" /><br><br>

PhoneNumber: <input type="tel" name="phno" /><br><br>

AlternateNumber: <input type="tel" name="aphno" value="0" /><br><br>

Email: <input type="email" name="email" /><br><br>

DOB: <input type="date" name="dob" /><br><br>

Address: <input type="text" name="address" /><br><br>

<input type="submit" value="Insert" class="buttons"/>	
</form>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
</body>
</html>
