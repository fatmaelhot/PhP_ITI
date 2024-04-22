<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'  >";
echo "<h1 class='my-4'>Add User </h1>";



if (isset($_GET["errors"])) {
    $errors = json_decode($_GET["errors"], true);
}

if (isset($_GET["old"])) {
    $old_data = json_decode($_GET["old"], true);
}


?>

<form class="my-4" action="saveData.php" method="POST" enctype="multipart/form-data">
    <div class="form-group row my-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if (isset($old_data['name'])) echo $old_data['name']; ?>">
            <span class="text-danger"> <?php if (isset($errors['name'])) echo $errors['name']; ?></span>

        </div>
    </div>
    <div class="form-group row my-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" placeholder="Email" value=" <?php if (isset($old_data['email'])) echo $old_data['email']; ?> ">
            <span class="text-danger"> <?php if (isset($errors['email'])) echo $errors['email'];  ?></span>

        </div>
    </div>
    <div class="form-group row my-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="password">
        </div>
    </div>
    <div class="form-group row my-4">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>


    <div class="form-group row my-4">
        <label class="col-sm-2 col-form-label" for="inlineFormCustomSelectPref">Preference</label>
        <div class="col-sm-10">
            <select class="form-select form-select" aria-label=".form-select-sm example">
                <option value="1">Application one</option>
                <option value="2">Application Two</option>
                <option value="3">Cloud</option>
            </select>
        </div>
    </div>

    <div class="form-group row my-4">
        <label for="formFile" class="col-sm-2 col-form-label">Profile Image</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" name="image">
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Rigester</button>
        </div>
        <div>
            <a class="btn btn-danger" href="login.php">Login</a>
        </div>
    </div>
</form>