<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
echo "<div class='container'> ";
echo "<h1> Connect to Databases Mysqli-> OOP </h1>";

const DB_HOST = "localhost";
const DB_USER = "phpdatabase";
const DB_PASSWORD = "phpdatabase";
const DB_DATABASE = "phpdatabase";

try {

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, 3306);
    // var_dump($conn);
    $query = "Insert into `phpdatabase`.`students`(name, email) values('test', 'test@gmail.com');";

    $res = $conn->query($query);
    var_dump($res);
    // var_dump($data2 = $res->fetch_all(1));

    // var_dump($data2);

} catch (Exception $e) {
    $e->getMessage();
}
