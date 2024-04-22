<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }
    // if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com)$/', $email)) {
    //     $errors['email'] = "Invalid email format";
    // }
    

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password !== $confirm_password) {
        $errors['password'] = "Passwords do not match";
    }

    if ($_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK) {
        $errors['profile_picture'] = "Error uploading file";
    } else {
        $file_type = $_FILES['profile_picture']['type'];
        if ($file_type !== 'image/jpeg' && $file_type !== 'image/png') {
            $errors['profile_picture'] = "Invalid file type. Please upload a JPEG or PNG image";
        }
    }

    if (empty($errors)) {
        $data = [
            'name' => $_POST['name'],
            'email' => $email,
            'password' => $password,
            'room' => $_POST['room'],
            'ext' => $_POST['ext'],
            'profile_picture' => $_FILES['profile_picture']['name']
        ];
        file_put_contents('users.txt', json_encode($data) . PHP_EOL, FILE_APPEND);

        header("Location: login.php");
        exit;
    }else {
        $error_query = http_build_query(['errors' => $errors]);
        header("Location: index.php?$error_query");
        exit;
    }
}
?>
