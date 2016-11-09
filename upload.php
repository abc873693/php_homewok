<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    請選擇檔案上傳 照片/表單:
    <input type="file" name="fileToUpload" id="fileToUpload" accept=".csv,image/*,text/*">
    <input type="submit" value="上傳" name="submit">
</form>

</body>
</html>

<?php
$target_dir = "/app/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "抱歉!檔案已經存在 <br>";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "抱歉!檔案太大";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {
		$uploadOk = 1;
	}
	else if($imageFileType == "txt" ) {
		$uploadOk = 2;
	}
	else if($imageFileType == "csv" ) {
		$uploadOk = 3;
	}
	else{
		echo "抱歉檔案格式不符合";
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk != 0) {
		if (move_uploaded_file(.$_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "檔案名稱: ". basename( $_FILES["fileToUpload"]["name"]). "<br>";
			echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";
			if($uploadOk == 1){ //照片
				echo '<img src="/AppServ/www/upload/' .$_FILES["fileToUpload"]["name"]. '">';
				//echo '<img src="14125590_10208467737069252_1939695402823578945_o.jpg">';
				//echo '<img src="file/'.$_FILES['file']['name'].'">';
			}
			else if($uploadOk == 2){  //文字檔
				$myfile = fopen('/app/upload/'.$_FILES["fileToUpload"]["name"], "r") or die("Unable to open file!");
				// Output one line until end-of-file
				$x = 0;
				while(!feof($myfile)) {
					$s = fgets($myfile); 
					echo "$s<br>";
				}
				fclose($myfile);
			}
			else if($uploadOk == 3){	//表格
				$handle = fopen('/app/upload/'.$_FILES["fileToUpload"]["name"],"r")or die("Unable to open file!");
				echo '<table border="1" ><tbody>';
				while ($data = fgetcsv($handle, 1000, ",")) {
					$num = count($data);
					//echo "<p> $num fields in line $row: <br>\n";
					echo "<tr>";
					for($i = 0; $i < $num; $i++) {
						echo '<td border="1" width=300>'.($data[$i]).'</td>';
					}
					echo "</tr>";
				}
				fclose($handle);
				echo '</tbody></table>';
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	// if everything is ok, try to upload file
	} 
}
?>