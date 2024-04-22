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
    # create conection
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, 3306);
    // var_dump($connect);

    #write query
    $query = "create table `students`(`id` serial primary key, `name` varchar (40), `email` varchar (50))";

    ###########excute query------return true but once query excuted return false....################

    $res = mysqli_query($connect, $query);
    // var_dump($res);
    // $query = "insert into `phpdatabase`.`students` (name,email) values ('hhh', 'hhh@gmail.com')";
    // var_dump($res);
    // var_dump(mysqli_affected_rows($connect));
    //    $res= mysqli_query($connect,$query);
    //  var_dump($res);
    //  var_dump(mysqli_affected_rows($connect));
    //  var_dump(mysqli_insert_id($connect));
    $query = "SELECT * FROM `phpdatabase`.`students` ";


    // $query="UPDATE `phpdatabase`.`students` set name='fatma123' where id=1 ";

    
    $res = mysqli_query($connect, $query);
    // var_dump($res);
    // var_dump($connect);
    // $data= mysqli_fetch_all($res);
    // $data= mysqli_fetch_all($res);
       // $data= mysqli_fetch_all($res,2);
    // $data= mysqli_fetch_all($res);
    var_dump($data);
//   while(  $row= mysqli_fetch_assoc($res)){  ##get the next row
//     var_dump($row);
// }

// while ($row = mysqli_fetch_object($res)) {
//        var_dump($row);
// }


} catch (Exception $e) {
    $e->getMessage();
}
