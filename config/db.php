<?php 

// 1. localhost
// 2. root
// 3. password
// 4. databasename


$db = mysqli_connect("localhost", "root", "", "lr");

if(!$db){
    echo "could not connect to database" . mysqli_connect_error();
}
?>