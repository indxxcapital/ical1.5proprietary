<?php

class Calcftpclose extends Application{

	function __construct()
	{
		parent::__construct();
	}
	
	
	function index()
	{
	
				if($_GET['date'])
			define("date", $_GET['date']);
			else
			define("date", date("Y-m-d"));

	 //$datevalue2=date('Y-m-d',strtotime($this->_date)-86400);
	 $datevalue2=date('Y-m-d');
	 if($_GET['log_file'])
			define("log_file", $_GET['log_file']);
				$this->log_info(log_file, "in publish ftp close ");
	/*								
$indxxs=$this->db->getResult("select tbl_indxx.code from tbl_indxx  where status='1' and client_id='4' ",true);
	
	
	if(!empty($indxxs))
	{
	foreach ($indxxs as $indxx )
	{
	
	
	
	$file = '../files/ca-output/syntax/Closing-'.$indxx['code'].'-'. $datevalue2.'.txt';
	$strFileName= 'Closing-'.$indxx['code'].'-'. $datevalue2.'.txt';
	//$localFile = $_FILES[$fileKey]['tmp_name']; 
$conn_id = ftp_connect("ftp.processdo.com");

// login with username and password
$login_result = ftp_login($conn_id, "syntax@processdo.com", '.xafK3k(h#Op');


// upload a file
if (ftp_put($conn_id, $strFileName, $file, FTP_ASCII)) {
 echo "successfully uploaded $file\n";
} else {
mail("ical@indxx.com,isol@indxx.com", "File Uploading Error" ,$indxx['code']." file of ".$datevalue2." failed to upload. on syntax@processdo.com");
 echo "There was a problem while uploading $file\n";
}
ftp_close($conn_id);




$conn_id2 = ftp_connect("ftp.processdo.com");

// login with username and password
$login_result2 = ftp_login($conn_id2, "syntax_composite_file@processdo.com", 'Indxx$2015');


// upload a file
if (ftp_put($conn_id2, $strFileName, $file, FTP_ASCII)) {
 echo "successfully uploaded $file\n";
} else {
mail("ical@indxx.com,isol@indxx.com", "File Uploading Error" ,$indxx['code']." file of ".$datevalue2." failed to upload on Factset FTP (syntax_composite_file@processdo.com)");
 echo "There was a problem while uploading $file\n";
}
ftp_close($conn_id2);
	}}
										
$indxxs2=$this->db->getResult("select tbl_indxx.code from tbl_indxx  where status='1' and client_id='5' ",true);
	
	
	if(!empty($indxxs2))
	{
	foreach ($indxxs2 as $indxx )
	{
	
	
	
	$file = '../files/ca-output/aptus/Closing-'.$indxx['code'].'-'. $datevalue2.'.txt';
	$strFileName= 'Closing-'.$indxx['code'].'-'. $datevalue2.'.txt';
	//$localFile = $_FILES[$fileKey]['tmp_name']; 
$conn_id = ftp_connect("ftp.processdo.com");

// login with username and password
$login_result = ftp_login($conn_id, "aptus@processdo.com", 'aptus$indxx');


// upload a file
if (ftp_put($conn_id, $strFileName, $file, FTP_ASCII)) {
 echo "successfully uploaded $file\n";
} else {
mail("ical@indxx.com,isol@indxx.com", "File Uploading Error" ,$indxx['code']." file of ".$datevalue2." failed to upload. on aptus@processdo.com");
 echo "There was a problem while uploading $file\n";
}
ftp_close($conn_id);
	}}*/
/*
// set up basic connection
$conn_id = ftp_connect("ftp.processdo.com");

// login with username and password
$login_result = ftp_login($conn_id, "icaitest@processdo.com", 'icaitest@2014');
$file1 = '../files2/ca-output/pga/Closing-WDAA-'. $datevalue2.'.txt';
$remote_file1 = 'Closing-WDAA-'. $datevalue2.'.txt';

// upload a file
if (ftp_put($conn_id, $remote_file1, $file1, FTP_ASCII)) {
 echo "successfully uploaded $file1\n";
} else {
 echo "There was a problem while uploading $file\n";
}

$file2 = '../files2/ca-output/pga/Closing-IPJAS-'. $datevalue2.'.txt';
$remote_file2 = 'Closing-IPJAS-'. $datevalue2.'.txt';

// upload a file
if (ftp_put($conn_id, $remote_file2, $file2, FTP_ASCII)) {
 echo "successfully uploaded $file2\n";
} else {
 echo "There was a problem while uploading $file\n";
}
$file3 = '../files2/ca-output/pga/Closing-IPJAR-'. $datevalue2.'.txt';
$remote_file3 = 'Closing-IPJAR-'. $datevalue2.'.txt';

// upload a file
if (ftp_put($conn_id, $remote_file3, $file3, FTP_ASCII)) {
 echo "successfully uploaded $file3\n";
} else {
 echo "There was a problem while uploading $file\n";
}
$file4 = '../files2/ca-output/pga/pga-values-'. $datevalue2.'.xls';
$remote_file4 = 'pja-values-'. $datevalue2.'.xls';

// upload a file
if (ftp_put($conn_id, $remote_file4, $file4, FTP_ASCII)) {
 echo "successfully uploaded $file4\n";
} else {
 echo "There was a problem while uploading $file\n";
}



// close the connection
ftp_close($conn_id);

	

// set up basic connection
$conn_id2 = ftp_connect("ftp.processdo.com");

// login with username and password
$login_result2 = ftp_login($conn_id2, "commodity@processdo.com", 'commodity@2013');
$file5 = 'loncar/loncar-values-'. $datevalue2.'.xls';
$remote_file5 = 'loncar-values-'. $datevalue2.'.xls';

if(file_exists($file5))
{
// upload a file
if (ftp_put($conn_id2, $remote_file5, $file5, FTP_BINARY)) {
 echo "successfully uploaded $file5\n";
} else {
 echo "There was a problem while uploading $file5\n";
 mail("dbajpai@indxx.com,jsharma@indxx.com","Loncar File not uploaded","Loncar File not uploaded on commodity FTP");
}
}

// close the connection
ftp_close($conn_id2);
*/
	$this->saveProcess(2);
		$this->Redirect2("../multicurrency2/db_backup.php?date=" .date. "&log_file=" . basename(log_file),"","");
	}
}
?>