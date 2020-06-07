 <html>
<head><title>Search</title></head>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<h1 style="background-color:pink;">Search</h1>
<form action="Searchbyphone.php" method="POST">
Enter Starting Numbers: <input type="number_format" name="start" /><br>OR<br/>
Enter Middle Numbers: <input type="number_format" name="mid" /><br>OR<br/>
Enter Ending Numbers: <input type="number_format" name="end" /><br>OR<br/>
Enter Any Numbers: <input type="number_format" name="any" /><br><br/>
<input type="submit" name="submit" value="Search" class="buttons" />
</form>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
<body>
</html>