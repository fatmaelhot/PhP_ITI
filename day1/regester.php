<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Submission</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mb-3">
    <h2 class="mt-5 mb-3">Submit Form</h2>

    <form action="submit.php" method="post">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <select class="form-control" id="country" name="country">
                <option value="Egypt">Egypt</option>
                <option value="China">China</option>
                <option value="Canada">Canada</option>
            </select>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="male" name="gender" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="female" name="gender" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>
        <div class="form-group">
            <label>Skills:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="html" name="skills[]" value="HTML">
                <label class="form-check-label" for="html">HTML</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="css" name="skills[]" value="CSS">
                <label class="form-check-label" for="css">CSS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="javascript" name="skills[]" value="JavaScript">
                <label class="form-check-label" for="javascript">JavaScript</label>
            </div>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="form-group">
          <h6>code : dtr5</h6>
            <label for="code">please enter Code:</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</div>

</body>
</html>

