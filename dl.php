<?php
ob_start();
$YourWebURL = "http://file.v1.server.playall.hu/"; 
$filename= $_GET['ID'];
$filecont = ("".$YourWebURL."/contents/".$filename."");
//echo readfile($filecont);
$myfile = fopen($filecont, "r") or die("<p></p><h2>Invaild request!</h2>");
//echo $myfile;
$thefilelocal = fgets($myfile);
fclose($myfile);
//fájl letöltése
//$file_name = $thefilelocal;
 
// make sure it's a file before doing anything!
if(is_file($thefilelocal)) {
 
	/*
		You can check user permissions here  or 
		file download times/counter
	*/
 
	// required for IE
	if(ini_get('zlib.output_compression')) { 
		ini_set('zlib.output_compression', 'Off');	
	}
 
	// get the file Mime type using the file extension
	switch(strtolower(substr(strrchr($thefilelocal, '.'), 1))) {
		case 'pdf':  $mime = 'application/pdf'; break; // pdf files
		case 'zip':  $mime = 'application/zip'; break; // zip files
		case 'jpeg': $mime = 'image/jpeg'; break;// images jpeg
		case 'jpg':  $mime = 'image/jpg'; break;
		case 'mp3':  $mime = 'audio/mpeg'; break; // audio mp3 formats
		case 'doc':  $mime = 'application/msword'; break; // ms word
		case 'avi':  $mime = 'video/x-msvideo'; break;  // video avi format
		case 'txt':  $mime = 'text/plain'; break; // text files
		case 'png':  $mime = 'image/png'; break; // png
		case 'xls':  $mime = 'application/vnd.ms-excel'; break; // ms excel
		default: $mime = 'application/force-download';
	}
	
	header('Pragma: public'); 	// required
	header('Expires: 0');		// no cache
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($thefilelocal)).' GMT');
	header('Cache-Control: private',false);
	header('Content-Type: '.$mime);
	header('Content-Disposition: attachment; filename="'.basename($thefilelocal).'"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: '.filesize($thefilelocal));	// provide file size
	header('Connection: close');
	readfile($thefilelocal);		
	exit();
 
}
ob_end_flush();
?>