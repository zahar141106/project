<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "dbryzhikov";

 $conn = mysqli_connect($servername, $username, $password, $dbname);

 if(!$conn) {
    die("ПРОВАЛ". mysqli_connect_error());
 } else {
   echo "kaif";
 }

?>