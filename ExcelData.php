<?php 
$fName = $_FILES['thisExcel']['name'];
$tmpName = $_FILES['thisExcel']['tmp_name'];
$fSize = $_FILES['thisExcel']['size'];
$fType = $_FILES['thisExcel']['type'];

echo "Filename: ".$fName."<br />";
echo "Filename: ".$tmpName."<br />";
echo "Filename: ".$fSize."<br />";
echo "Filename: ".$fType."<br />";
if (move_uploaded_file($tmpName, 'uploads/'.$fName)) {
	echo "SUCCESS~";
} else {
	echo "ERROR";
}
 ?>
