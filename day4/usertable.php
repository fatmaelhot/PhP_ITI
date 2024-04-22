<?php
include 'connect_to_DB.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1>User Data</h1>";





try {

    $db = connect_to_db();
   
    if ($db) {
        $query = "select * from `students`";
        $stat = $db->prepare($query);
        $res = $stat->execute();
        $data = $stat->fetchAll(PDO::FETCH_ASSOC);
      
    }

    echo '<table class="table fs-5">
    <tr>
     <th>Id</th>  
     <th> Name</th>
     <th>Email</th>
     <th>Password</th>
     <th>image path</th>
     <th>image</th>
    </tr>';

    foreach ($data as $user) {
        echo '<tr>';
        foreach ($user as $info) {
            echo "<td> {$info}</td>";
          
            
        }
        // var_dump($user['image']);
        // exit;
        echo " 
        <td> <img width='100' height='100'  src='{$user['image']}'> </td>
        <td> <a class='btn btn-warning' href='edit.php?id={$user['id']}'> Edit</a></td>
        <td> <a class='btn btn-danger' href='delete.php?id={$user['id']}'> Delete</a></td>

       </tr>";
       //var_dump($user['id']);
    }
    echo "</table>";

    echo '<div>
   <a class="btn btn-info my-5" href="logout.php">Log Out</a>

   
   </div>';
} catch (Exception $e) {
    echo $e->getMessage();
}
