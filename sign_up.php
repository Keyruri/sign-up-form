<?php
if (isset($_REQUEST["email"])){
    //getting our form data
    $names = $_REQUEST["names"];
    $email = $_REQUEST["email"];
    $dob = $_REQUEST["dob"];
    $gender = $_REQUEST["gender"];
    $password = $_REQUEST["password"];
    $password = password_hash($password, PASSWORD_BCRYPT);
    //creating a connection to our DB
    $con = mysqli_connect("localhost", "root", "", "signup") or die(mysqli_connect_error());

    //create sql statement
    $sql = "insert into users (id,names,email,gender,dob,password) value (null,'$names','$email','$gender','$dob','$password')";
    if (mysqli_query($con, $sql)) {
        echo "Account Created Sucessfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-sm-5">
            <h4>User Registration</h4>
            <form class="shadow-sm " action="sign_up.php" method="post">
                <div class="form-group">
                    <label>FullName</label>
                    <input type="text" class="form-control" name="names" required>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="date" class="form-control" name="dob" required>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="male">Male
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="female">Female
                    </label>
                </div>
                <div class="form-check-inline disabled">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="other" >Other
                    </label>
                </div>
                <div class="form-group"><br>
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button class="btn btn-block btn-light">Register</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
