<html>
<?php
$i = $_GET["count"]==''?0:$_GET["count"];
$method = $_GET["method"];
$myfile = fopen("think.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
$s = array();
$x = 0;
while(!feof($myfile)) {
	$s[$x] = fgets($myfile); 
	$x++;
  
}
if($method=="up")$i = ($i==0?0:$i-1);
else if($method=="rand")$i = rand(0,$x-1);
else if($method=="next")$i = ($i==$x-1?$x-1:$i+1);
else ;
echo "靜思語<br>";
echo "第".($i+1)."筆,共".($x)."筆<br>";
echo $s[$i]."<br>";
echo "<button type=button formmethod=get onClick=location.href='think.php?count=$i&method=up'>上一個</button>";
echo "<button type=button formmethod=get onClick=location.href='think.php?count=$i&method=rand'>隨機</button>";
echo "<button type=button formmethod=get onClick=location.href='think.php?count=$i&method=next'>下一個</button>";
fclose($myfile);
?>

</html>