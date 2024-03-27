@echo off
for /f "tokens=2 delims==" %%a in ('wmic OS Get localdatetime /value') do set "dt=%%a"
set "YY=%dt:~2,2%" & set "YYYY=%dt:~0,4%" & set "MM=%dt:~4,2%" & set "DD=%dt:~6,2%"
set "HH=%dt:~8,2%" & set "Min=%dt:~10,2%" & set "Sec=%dt:~12,2%"

set "datestamp=%YYYY%%MM%%DD%" & set "timestamp=%HH%%Min%%Sec%"
set "fullstamp=%YYYY%-%MM%-%DD%_%HH%-%Min%-%Sec%"

echo datestamp: "%datestamp%"
echo timestamp: "%timestamp%"
echo fullstamp: "%fullstamp%"

set "mysqldump="C:\xampp\mysql\bin\mysqldump.exe""
set "mysqluser=root"
set "mysqlpassword="
set "backupdir=D:\Laravel\backup\RedeColaborativa"
set "dbname=redecolaborativa"

"%mysqldump%" --user=%mysqluser% --password=%mysqlpassword% --result-file="%backupdir%\%dbname%_%fullstamp%.sql" %dbname%
