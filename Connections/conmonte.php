<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conmonte = "localhost";
$database_conmonte = "bd_mc";
$username_conmonte = "root";
$password_conmonte = "";
$conmonte = mysql_pconnect($hostname_conmonte, $username_conmonte, $password_conmonte) or trigger_error(mysql_error(),E_USER_ERROR); 
?>