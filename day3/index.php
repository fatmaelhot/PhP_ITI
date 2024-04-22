<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Registration Form</h2>

<?php
    $errors = [];

if (isset($_GET['errors'])) {
    $errors = $_GET['errors'];
}
?>
<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
        
         <form class="mt-3" method="post" action="register.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            
            <div class="form-group">
                <label for="room">Room No:</label>
                <select class="form-control" id="room" name="room">
                    <option value="application1">Application 1</option>
                    <option value="application2">Application 2</option>
                    <option value="cloud">Cloud</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="ext">Ext:</label>
                <input type="text" class="form-control" id="ext" name="ext">
            </div>
            
            <div class="form-group">
                <label for="profile_picture">Profile Picture:</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" accept="image/*" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
