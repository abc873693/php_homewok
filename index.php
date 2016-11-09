<html>
<?php
$dir = "/app/";
echo "首頁";
// 判斷是否為目錄
if(is_dir($dir)){

if ($dh = opendir($dir)) {
while (($file = readdir($dh)) !== false) {

//只過讀取出php 的檔案
if (strpos( $file, '.php')){
//echo "filename: $file : filetype: " . filetype($dir . $file) . "<br>";
echo "<DT><A HREF=\"/$file\" >$file</A><br>";
}
}
closedir($dh);
}
else echo "無法打開";

}
else echo "不是目錄";
?>

</html>