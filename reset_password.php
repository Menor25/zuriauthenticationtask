<?php
    session_start();

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
 

    if(isset($_POST['resetPassword'])){
        $currentUser = $_POST['username'];
        $pass = $_POST['password'];

        if($currentUser == $username){
            // check if user exist.
            $file=fopen("file/login.txt","r");
            $finduser = false;
            while(!feof($file))
            {
                $line = fgets($file);
                $array = explode(";",$line);
                if(trim($array[0]) == $_POST['username'])
                {
                    $finduser=true;
                    break;
                }
            }
            fclose($file);

            if( $finduser ){
                $file = fopen("file/login.txt", "w");
                fputs($file,$_POST["username"].";".$_POST["password"]."\r\n");
                fclose($file);
                
                echo "<script>alert('Password reset successfully!')</script>";
                echo "<script>location.href='login.php'</script>";
            }
    
       
        }else {
            echo "<script>alert('User does not exist!')</script>";
            echo "<script>location.href='reset_password.php'</script>";
        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container login-form">
        <div class="wrapper">
            <h2 class="text-center">Reset Password</h2>
            <p class="text-center">Please fill in your new password.</p>

            <form action="reset_password.php" method="post">  
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username ?>" required>
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password  ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="resetPassword" class="btn btn-primary" value="Reset Password">
                </div>
                <p>Go back to <a href="login.php">Home</a>.</p>
            </form>
        </div>
    </div>
    
</body>
</html>