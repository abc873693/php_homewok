<?php
function print99($i) {
    echo "<tr><td bgcolor=\"#d0d0d0\" width=100>  $i</td>";
	for($j = 1; $j <= 9; $j++) {
    echo "<td border=\"1\" width=100>".($i * $j)."</td>";
	}
	echo "</tr>";
}
echo "<table border=\"1\" ><tbody><tr border=\"1\" bgcolor=\"#d0d0d0\"><td width=100>    </td>";
for($x = 1; $x <= 9; $x++) {
    echo "<td width=100>$x</td>";
} 
echo "</tr>";
for($i = 1; $i <= 9; $i++) {
	print99($i);
} 
echo "</tbody></table>";
?>