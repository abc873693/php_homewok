<?php
$s = array();
echo "<table border=\"1\"><tbody><tr>";
for($i = 0; $i < 6; $i++) {
	$x = 1;
	$r = rand(1,49);
	while(x==1){
		$x = 0;
		for($j = 0; $j < i; $j++) {
			if(r ==$s[$j])$x = 1;
		}
	}
  array_push($s, $r);
}
sort($s);  
for($i = 0; $i < 6; $i++) {
    echo "<td width=50>".$s[$i]."</td>";
}
echo "</tr>";
echo "</tbody></table>";
?>
<html>
<form type="post">
<input type="submit" name="submit" value="產生樂透號碼" onClick="location.href='rand.php';"/>
</form>
</html>