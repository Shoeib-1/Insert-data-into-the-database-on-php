<?php

 $server = "localhost";
 $user = "root";
 $password = "";
 $data_base = "product_added";

  $mysqli = new mysqli("$server" , "$user" , "$password" ,"$data_base");

  if($mysqli -> connect_errno){
    echo "Failed to connect to my MySQL" . $mysqli -> connect_error;
    exit();
  }
?>