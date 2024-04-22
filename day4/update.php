<?php
include 'connect_to_DB.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';


echo '<div class="container fs-4">';
echo '<h2>Updated Data</h2>';
// var_dump($_GET);
// exit;

$updateId=$_GET['id'];
// var_dump($updateId);
$updatename=$_GET['name'];
// var_dump($updatename);
$updateEmail=$_GET['email'];
$updatepassword=$_GET['password'];
var_dump($updatepassword);

// var_dump($updateId);
// exit;
try {
   
$db=connect_to_db();
$query="update `students` set `name`=:userName, `email`=:userEmail, `password`=:userPassword where `id`=:id";
$stat=$db->prepare($query);

$stat->bindParam(':id',$updateId,PDO::PARAM_INT);
$stat->bindParam(':userName',$updatename,PDO::PARAM_STR);
$stat->bindParam(':userEmail',$updateEmail,PDO::PARAM_STR);
$stat->bindParam(':userPassword',$updatepassword,PDO::PARAM_INT);

$res=$stat->execute();
var_dump($res);





} catch (Exception $e){
    echo $e->getMessage();
}

header('location:usertable.php');





