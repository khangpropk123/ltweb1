<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "testdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE students_info(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(70) NOT NULL,
    mssv VARCHAR(15) NOT NULL UNIQUE,
    phonenumber VARCHAR(15) NOT NULL,
    email VARCHAR(70) NOT NULL,
    birthday DATETIME NOT NULL,
    gender VARCHAR(1) ,
    address VARCHAR(100),
    note VARCHAR(500) 
    
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>