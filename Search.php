<html>
<head><title>Search</title></head>
<link rel="stylesheet" href="csstyle.css"/>
<body>
<h1 style="background-color:pink;">Search</h1>
<form action="SearchResult.php" method="POST">
Enter FirstName: <input type="text" name="searchbox" /><br>OR<br/>
Enter LastName: <input type="text" name="searchbox2" /><br>OR<br/>
<input type="submit" name="submit" value="Search" class="buttons" />
</form>
<form action="TelSearch.php" method="POST">
<input type="submit" class="buttons" name="telsearch" value="Search-By-Telephone"/>
</form>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
<body>
</html>