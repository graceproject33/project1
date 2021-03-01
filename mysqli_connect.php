<?php

define('DB_USER',  'root');
define('DB_PASSWORD', '');
define('DB_HOST','localhost');
define('DB_NAME','bookstore');

$conn= new MySQLi(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME);

if($conn->connect_error){
  echo "Sorry, the connection can't be made $conn->connect_error";
  unset($conn);
}else{
//   echo "You are connected successfully";
  $conn->set_charset('utf8');

}

 ?>
