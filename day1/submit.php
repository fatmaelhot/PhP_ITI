<?php
// Check if form is submitted
// var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $skills = isset($_POST['skills']) ? $_POST['skills'] : array();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $code = $_POST['code'];
    
$genderType = ($gender == "male") ? "Mr." : "Ms.";
echo "thanks $genderType $firstname $lastname <br>";
 echo "please review your information <br>";
    echo "Address: $address <br/>";
    echo "Country: $country <br>";
    echo "Gender: $gender <br>";
    echo "Skills: ";
    if (!empty($skills)) {
        echo implode(", ", $skills); 
    } else {
        echo "No skills selected";
    }
    echo "<br>";
    echo "Username: $username <br>";
    echo "Department: $department <br>";
    echo "Code: $code <br>";
    echo "these all the data";
}
else{
    echo "error";
}
?>
