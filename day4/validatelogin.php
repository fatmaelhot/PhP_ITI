<?php
include 'connect_to_DB.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>validate login</h1>";

$useremail = $_POST["email"];
$userpassword = $_POST["password"];

$errors = [];
$formdata = [];

if (empty($useremail) and isset($useremail)) {

    $errors['email'] = 'email required';
} else {
    $formdata["email"] = $useremail;
}

if (empty($userpassword) and isset($userpassword)) {

    $errors['password'] = 'password required';
} else {
    $formdata["password"] = $userpassword;
}
##############################

if ($errors) {
    $errors_str = json_encode($errors);
    $url = "form.php?errors={$errors_str}";

    if ($formdata) {
        $old_data = json_encode($formdata);
        $url .= "&old={$old_data}";
    }
    header($url);
} else {
    $db = connect_to_db();
    if ($db) {
        $query = "select `email`,`password` from `students` where `email`='{$useremail}' and `password`='{$userpassword}'";
        var_dump($query);
        $stat = $db->prepare($query);
        $res = $stat->execute();
       
        $data = $stat->fetchAll(PDO::FETCH_ASSOC);
    //   var_dump($data);
    //   exit; 
    }

    if( $data)
    {
        echo"seccess";
      var_dump($data);
      header('Location:usertable.php');
    }else{
        header('Location:login.php');
    }
    
}
