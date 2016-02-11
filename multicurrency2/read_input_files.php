<?php 
date_default_timezone_set("America/New_York");
include("function.php");
 include("convert_prices.php");
 include("convert_hedged_security_price.php");
error_reporting(2);
set_error_handler("error_handler", E_ALL);


//print_r($_SESSION);
//exit;
//echo ($_SESSION['User']['email'] ?$_SESSION['User']['email'].",ical@indxx.com" : 'ical@indxx.com');
//exit;
//$start_time = get_time();

/* Execution time for the script. Must be defined based on performance and load. */
ini_set('max_execution_time', 60 * 60);
ini_set("memory_limit", "1024M");

/* Prepare logging mechanism */
define("log_file", prepare_logfile());

/* Define date for fetching input files and manipulations */
if ($_GET['date'])
	define("date", $_GET['date']);
else
	{
		define("date", date("Y-m-d"));
		//define("date","2015-05-25");
	}
	save_process("Closing",date,"0");

	//echo date;
	//echo "<br>";
	//echo date("Y-m-d H:i:s");
//echo date_default_timezone_get();
	//exit;
//date="2014-05-20";
define("currencyfactor_file", get_input_file("CURRENCY_FACTOR", date));
define("liborrate_file", get_input_file("LIBOR_RATE", date));
define("cashindex_file", get_input_file("CASH_INDEX", date));
define("price_file", get_input_file("PRICE_FILE", date));
//echo liborrate_file.",".cashindex_file.",".price_file;
//exit;
read_input_files();
convert_prices();
convert_headged_security_to_indxx_curr();
//echo date;

?>