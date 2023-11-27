<!--login process-->
<?php
    //include db connection
    include 'config/db.php';

    //get user inputs
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if($username == '' || $password == '')
        echo 'No field can be blank';
    else{
        //find user in db table
        $query = "SELECT * FROM users WHERE USERNAME='$username'";
        $users = mysqli_query($conn,$query);//execute query and return results into variable

        $count = mysqli_num_rows($users);//count number of rows returned
        
        if($count >=1 ){//user exists
            //change returned result into associative array
            $list = mysqli_fetch_all($users, MYSQLI_ASSOC);
            mysqli_free_result($users);

            //check password
            $correct = password_verify($password,$list[0]['PASSWORD']);
            if($correct){
                header("Location: haldetail.html");
                exit(); // Make sure to exit after redirection
            } else {
                // Password is incorrect
                echo 'Password incorrect';
            }
        } else {
            // No user with such username
            echo 'No user with such username';
        }
    }
?>
<!-- /login process -->
