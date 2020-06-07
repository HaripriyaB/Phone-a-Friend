<html>
<head><title>Date Calculation</title>
<link rel="stylesheet" href="csstyle.css">
</head>
<body>
<form action="MainPage.php" method="POST">
 <input type="submit" value="MainPage" class="buttons"/>
 </form>
<h1 style="background-color:pink;">Date Calculation</h1>
<?php
$host = "host=localhost";
$port = "port=5433";
$dbname = "dbname=MyPgAdmin";
$credentials = "user=postgres password=root";
$db = pg_connect( "$host $port $dbname $credentials" );
if(!$db){
echo "Error : Unable to open database\n";
}
?>
<br>
<?php
$sql =<<<EOF
SELECT * FROM public."PhoneBook";
EOF;
$ret = pg_query($db, $sql);
if(!$ret){
echo pg_last_error($db);
exit;
}
$num = pg_numrows($ret);
$no=0;
echo "<select id='list'><option value='default'>--Select--</option>";
while($row = pg_fetch_row($ret))
{
$no++;	
echo "<option value='$row[4]'> $row[0] $row[1] $row[3] $row[4] </option>";
}
echo "</select>";
if($no==0)
{
	echo "NO RECORDS FOUND!";
}

?>
<br>
<form action="#" method="POST">
<input type="button" name="age" value="Calculate Age" id="Calperson1" class="buttons"/>
YYY:DD:MM:HH:MM:SS: <input type="text" name="ageformat1" id="format1" style="width: 350px;" placeholder="YYY:DD:MM:HH:MM:SS" />
Days: <input type="text" name="agedays1" id="days1" placeholder="Days" />
Weeks: <input type="text" name="ageweeks1" id="weeks1" placeholder="Weeks" /></br>
On 1st January 2000 <input type="text" name="janage1" id="janage1" placeholder="age" /> years old.
</form>
<br><br>


<?php
$sql =<<<EOF
SELECT * FROM public."PhoneBook";
EOF;
$ret = pg_query($db, $sql);
if(!$ret){
echo pg_last_error($db);
exit;
}
$num = pg_numrows($ret);
$no=0;
echo "<select id='list2'><option value='default'>--Select--</option>";
while($row = pg_fetch_row($ret))
{
$no++;	
echo "<option value='$row[4]'> $row[0] $row[1] $row[3] $row[4] </option>";
}
echo "</select>";
if($no==0)
{
	echo "NO RECORDS FOUND!";
}
?>
<form action="#" method="POST">
<input type="button" name="age" value="Calculate Age" id="Calperson2" class="buttons"/>
YYY:DD:MM:HH:MM:SS: <input type="text" name="ageformat11" id="format11" style="width: 350px;" placeholder="YYY:DD:MM:HH:MM:SS"/>
Days: <input type="text" name="agedays11" id="days11" placeholder="Days" />
Weeks: <input type="text" name="ageweeks11" id="weeks11" placeholder="Weeks" /></br>
On 1st January 2000 <input type="text" name="janage11" id="janage11" placeholder="age" /> years old.
</br></br>
<input type="button" name="age" value="Calculate Age Difference" id="diff" class="buttons"/>
YYY:DD:MM:HH:MM:SS: <input type="text" name="differenceformat" id="difformat" style="width: 350px;" placeholder="YYY:DD:MM:HH:MM:SS"/>
Days: <input type="text" name="differencedays" id="diffdays" placeholder="Days"/>
</form>

<script language="javascript">
(function() {
    
    var sel = document.getElementById('list');
    var el = document.getElementById('weeks1');
	var eldays = document.getElementById('days1');
	var format=document.getElementById('format1');
	var jan=document.getElementById('janage1');
	var today=new Date();
	var dd=today.getDate();
	var mm=today.getMonth();
	var yy=today.getFullYear();

    function getSelectedOption(sel) {
        var opt;
        for ( var i = 0, len = sel.options.length; i < len; i++ ) {
            opt = sel.options[i];
            if ( opt.selected === true ) {
                break;
            }
        }
        return opt;
    }
	var diy;
	var dim;
	 document.getElementById('Calperson1').onclick = function () {
		 
	 var x=(Date.now()-Date.parse(sel.value))/1000;   //now this is seconds...as it is in milliseconds it is div by 1000
	 el.value = ((((x/60)/60)/24)/7).toFixed(2) ; 	 //week
	 eldays.value=(((x/60)/60)/24).toFixed(2) ;      //days
	 var p=sel.value;
	jan.value=2000-(p[0]*1000+p[1]*100+p[2]*10+p[3]*1);
	if((p[0]*1000+p[1]*100+p[2]*10+p[3]*1)>2000)
	{
		jan.value="NaN";
	}
	
	var f=new Date(sel.value);
	var d=f.getDate();
	var m=f.getMonth();
	var y=f.getFullYear();
	diy=yy-y;
	dim=mm-m;
	if(diy<0){diy=y-yy;}
	if(dim<0){dim=m-mm;}
	if(diy==1){diy=0;dim=12-dim;}
	
	var yyddmm=diy+":"+(((x/60)/60)/24).toFixed(0)+":"+dim+":"+((x/60)/60).toFixed(0)+":"+(x/60).toFixed(0)+":"+x.toFixed(0);
	format.value=yyddmm;
	 }
	 
	 
    var sel2 = document.getElementById('list2');
    var el2 = document.getElementById('weeks11');
	var eldays2 = document.getElementById('days11');
	var format2=document.getElementById('format11');
	var jan2=document.getElementById('janage11');

    function getSelectedOption(sel2) {
        var opt;
        for ( var i = 0, len = sel2.options.length; i < len; i++ ) {
            opt = sel2.options[i];
            if ( opt.selected === true ) {
                break;
            }
        }
        return opt;
    }
	var diy2;
	var dim2;
	 document.getElementById('Calperson2').onclick = function () {

	 var x=(Date.now()-Date.parse(sel2.value))/1000;
	 el2.value = ((((x/60)/60)/24)/7).toFixed(2) ; 	 
	 eldays2.value=(((x/60)/60)/24).toFixed(2) ;
	 var p=sel2.value;
	 jan2.value=2000-(p[0]*1000+p[1]*100+p[2]*10+p[3]*1);
	if((p[0]*1000+p[1]*100+p[2]*10+p[3]*1)>2000)
	{
		jan2.value="NaN";
	}
	
	var f2=new Date(sel2.value);
	var d2=f2.getDate();
	var m2=f2.getMonth();
	var y2=f2.getFullYear();
	diy2=yy-y2;
	if(diy2<0){diy2=y2-yy;}
	dim2=mm-m2;
	if(dim2<0){dim2=m2-mm;}
	if(diy2==1){diy2=0;dim2=12-dim2;}
	
	var yyddmm=diy2+":"+(((x/60)/60)/24).toFixed(0)+":"+dim2+":"+((x/60)/60).toFixed(0)+":"+(x/60).toFixed(0)+":"+x.toFixed(0);
	format2.value=yyddmm;
	
	 }
	 
	 var diff=document.getElementById('diffdays');
	 var diffformat=document.getElementById('difformat');
	 
	 document.getElementById('diff').onclick = function () {

	 var first=(Date.now()-Date.parse(sel.value))/1000;
	 var second=(Date.now()-Date.parse(sel2.value))/1000;
	diff.value=Math.abs(eldays.value-eldays2.value);
	diffformat.value=Math.abs(diy2-diy)+":"+diff.value+":"+Math.abs(dim-dim2)+":"+Math.abs(((first/3600)-(second/3600)).toFixed(0))+":"+Math.abs(((first/60)-(second/60)).toFixed(0))+":"+Math.abs((first-second).toFixed(0));	 
	 }
	 
}());
</script>

</body>
</html>