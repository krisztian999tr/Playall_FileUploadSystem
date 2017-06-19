<?php
$randomString2 = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
$target_path = "uploads/";
$YourWebURL = "http://file.v1.server.playall.hu/"; 
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
$filename = (basename( $_FILES['uploadedfile']['name'])); 
    echo '<a href="'.$YourWebURL.'dl.php?ID='.$randomString2.'">'.$YourWebURL.'dl.php?ID='.$randomString2.'<a/>';
    $myfile = fopen("contents/".$randomString2."", "w") or die("Unable to open file!");
$txt = "./uploads/".$filename. "";
fwrite($myfile, $txt);
}
?>
