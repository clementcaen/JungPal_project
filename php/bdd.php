<?php
  ini_set('display_errors','on');
  error_reporting(E_ALL);

  $mysqlServerIp     = "localhost";
  $mysqlServerPort   = "3306";
  $mysqlDbName     = "jungpal";
  $mysqlDbUser     = "pal";
  $mysqlDbPwd     = "pal";
  $mysqlDbCharset   = "UTF8";

  $mysqlDsn = "mysql:host=".$mysqlServerIp.";port=".$mysqlServerPort.";dbname=".$mysqlDbName.";charset=".$mysqlDbCharset.";";

  //Connexion à la BDD
  try {
    $pdo = new PDO($mysqlDsn,$mysqlDbUser,$mysqlDbPwd, array(PDO::ATTR_PERSISTENT => true));
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  } 
?>