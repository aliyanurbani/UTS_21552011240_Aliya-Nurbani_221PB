<!--registration process-->
<?php
include("config/connection.php");

    //get user inputs
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($db, $_POST["cpassword"]);

    if($username == '' || $email == '' || $password == '' || $cpassword == '')
        echo 'No field can be blank';
    //check passwords
    else if($password != $cpassword)
        echo "Passwords do not match";
    else{
        //hash password - can be ommitted
        $password = password_hash($password, PASSWORD_DEFAULT);
        //add user to db table query
        $query = "INSERT INTO users(USERNAME, EMAIL, PASSWORD) values('$username','$email','$password')";

        if(mysqli_query($db,$query))
            echo 'Registration Successful';
        else
            echo 'Registration Failed';
    }	
?>
<!-- /registration process -->
