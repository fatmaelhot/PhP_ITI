<?php
include 'connect_to_DB.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>save Data </h1>";

#validation....
// var_dump($_POST);
// var_dump($_FILES["image"]);


$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
$formData = [];


if (empty($name) and isset($name)) {
    $errors['name'] = 'name required';
} else {
    $formData["name"] = $name;
}

if (empty($email) and isset($email)) {
    $errors['email'] = 'email required';
} else {
    $formData["email"] = $email;
}

if ($errors) {
    $errors_str = json_encode($errors);
    // var_dump($errors);

    $url = "Location:form.php?errors={$errors_str}";

    if ($formData) {
        $old_data = json_encode($formData);
        $url .= "&old={$old_data}";
    }
    header($url);
} else {

    $id = time();
    $imageNewName = '';


    if (isset($_FILES["image"]) and !empty($_FILES["image"])) {
        // var_dump($_FILES);
        $imgname = $_FILES["image"]['name'];
        // var_dump($imgname);
        $tmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($imgname)['extension'];
        // var_dump($ext);
        $imageNewName = "images/{$id}.{$ext}";
        // var_dump($imageNewName);

        #check for being photo
        if (in_array($ext, ['png', 'jpg'])) {
            try {

                $uploaded = move_uploaded_file($tmp, "$imageNewName");
            //     var_dump($uploaded);
            } catch (Exception $e) {
                var_dump($e->getMessage());
                exit;
            }
        }
    }

    try {
        $db = connect_to_db();
        if ($db) {
            $query = "Insert INTO `students` (`name`, `email`,`password`,`image`) Values(:username,:useremail,:userpassword,:userimage)";
            $stat = $db->prepare($query);
            $stat->bindParam('username', $name, PDO::PARAM_STR);
            $stat->bindParam('useremail', $email, PDO::PARAM_STR);
            $stat->bindParam('userpassword', $password, PDO::PARAM_INT);
            $stat->bindParam('userimage', $imageNewName, PDO::PARAM_STR);
            $res = $stat->execute();
            // var_dump($res);
            // var_dump($stat->rowCount());
        }
    } catch (Exception $e) {
        echo  $e->getMessage();
    }

    header('Location:login.php');
}
