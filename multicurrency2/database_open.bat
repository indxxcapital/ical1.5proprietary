for /f "tokens=2 delims==" %%a in ('wmic OS Get localdatetime /value') do set "dt=%%a"
set "YY=%dt:~2,2%" & set "YYYY=%dt:~0,4%" & set "MM=%dt:~4,2%" & set "DD=%dt:~6,2%"
set "HH=%dt:~8,2%" & set "Min=%dt:~10,2%" & set "Sec=%dt:~12,2%"
set "fullstamp=%YYYY%-%MM%-%DD%_%HH%-%Min%-%Sec%"
mysqldump --opt -hlocalhost -uadmin_icai4 -pIndxxb3930@db admin_icai5 > C:/inetpub/vhosts/ip-192-169-255-12.secureserver.net/httpdocs/testing/proprietary/files/db-backup/opening_backup_admin_icai15_%fullstamp%.sql
