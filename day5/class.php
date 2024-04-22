    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
    echo "<div class='container'> ";
    echo "<h1>Classes   </h1>";

#===========================================================

class Database
{

    public $DB_HOST = "localhost";
    public $DB_USER = "phpdatabase";
    public $DB_PASSWORD = "phpdatabase";
    public $DB_DATABASE = "phpdatabase";


    function connect()
    {
        $dsn = 'mysql:dbname=phpdatabase;host=127.0.0.1;port=3306;';
        $db = new PDO($dsn, $this->DB_USER, $this->DB_PASSWORD);
        return $db;
    }

    function select($tableName)
    {
        $db = $this->connect();
        $query = "select * from {$tableName}";
        $stat = $db->prepare($query);
        $res = $stat->execute();
     
        $data = $stat->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    function selectById($tableName, $id)
    {
        $db = $this->connect();
        $query = "select * from {$tableName} where id={$id}";
        $stat = $db->prepare($query);
        $res = $stat->execute();
        $data = $stat->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    function selectValidate($tableName, $email, $password)
    {
        $db = $this->connect();
        $query = "select `email`,`password` from {$tableName} where `email`='{$email}' and `password`='{$password}'";
        $stat = $db->prepare($query);
        $res = $stat->execute();
        $data = $stat->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function insert($tableName, $colName, $values)
    {
        $db = $this->connect();
        $query = "Insert INTO {$tableName} ($colName) Values($values)";
        var_dump($query);
        $stat = $db->prepare($query);
        $res = $stat->execute();
        $data = $stat->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // function update($tableName,$col_values,$id){
    //     $db = $this->connect();
    //     $query="update {$tableName} set ";
    //     foreach($col_values as $col=>$val){
    //         $query .= $col . "="  ."'" .$val ."'" ;
    //     }
    //     $query .= " where  id = ". $id ;
    //     $stat = $db->prepare($query);
    //     $res = $stat->execute();
    //     $data = $stat->fetchAll(PDO::FETCH_ASSOC);
    //     return $data;
    // }

    function update($table, $name, $email, $pass, $id)
    {
        $db = $this->connect();
        $query = "update {$table} set name='{$name}',email=' {$email}',password='{$pass}' where id= {$id}";
       var_dump($query);
        $stat = $db->prepare($query);
        $res = $stat->execute();
        var_dump($res);
        $data = $stat->fetch(PDO::FETCH_ASSOC);
        return $data;
    }



    function delete($tableName, $id)
    {
        $db = $this->connect();
        $query = "delete from {$tableName} where id={$id}";

        $stat = $db->prepare($query);
        $res = $stat->execute();
        $data = $stat->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

$test = new Database();
$table = "students";

// var_dump($test->connect());
// var_dump($test->select("students"));
// var_dump($test->insert("students", "name , email , password , image", "'test4' ,'tst4@gg.com' , '3334'"));
// var_dump($test->update("students", "1", "'test4' ,'tst4@gg.com' , '3334'"));

// var_dump($test->update("students", array("'email,name'=>'tst4@gg.com ,fatma' "), "1"));


// var_dump($test->delete("students" , "54"));
// var_dump($test->selectById("students" , "88"));
// var_dump($test->update("students", "xxxx","xxxx@gmail.com" ,"8888","91"));
