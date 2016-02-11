<?php 
include("function.php");


if($_GET['log_file'])
			define("log_file", get_logs_folder().$_GET['log_file']);
				log_info(log_file, "db backup file after closing .");
//echo "mysqldump --opt -hlocalhost -u" .$db_user. " -p" .$db_password.  " " .$db_name. " > C:/inetpub/vhosts/ip-192-169-255-12.secureserver.net/httpdocs/testing/proprietary/files/db-backup/closing_backup_admin_icai14_".date("Y-m-d",strtotime($_GET['date'])).".sql";				
exec("C:/xampp/mysql/bin/mysqldump.exe --opt -hlocalhost -uadmin_icai14other -pReset930$$ admin_icai14other > C:/xampp/htdocs/proprietary/files/db-backup/closing_backup_admin_icai14_".date("Y-m-d",strtotime($_GET['date'])).".sql");
//exec("database.bat");

	 
	 log_info(" Closing Process Finished  ");
	 
	 

?>