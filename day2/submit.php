<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Server-side validation
    $errors = array();

    $firstname =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Validate First Name
    if (empty($firstname)) {
        $errors[] = "First name is required";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $firstname)) {
        $errors[] = "First name can only contain letters";
    }

    // Validate Last Name
    if (empty($lastname)) {
        $errors[] = "Last name is required";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $lastname)) {
        $errors[] = "Last name can only contain letters";
    }

    // Validate Email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate Gender
    if (empty($gender)) {
        $errors[] = "Gender is required";
    } elseif (!in_array($gender, array("male", "female"))) {
        $errors[] = "Invalid gender";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Save data to file
        $customerData = "$firstname, $lastname, $email, $gender\n";
        file_put_contents("customer.txt", $customerData, FILE_APPEND | LOCK_EX);

        echo "Data saved successfully.<br>";

        // Display all records in a table
        echo "<h2>Customer Records</h2>";
        echo "<table border='1'>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>Action</th></tr>";

        // Read data from file and display in table
        $fileData = file("customer.txt", FILE_IGNORE_NEW_LINES);
        foreach ($fileData as $line) {
            list($fname, $lname, $email, $gender) = explode(", ", $line);
            echo "<tr><td>$fname</td><td>$lname</td><td>$email</td><td>$gender</td><td><button type='submit'>Delete</button></td></tr>";
        }

        echo "</table>";
    }
} else {
    echo "Error: Form not submitted";
}
?>
