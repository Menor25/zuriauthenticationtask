<?php  session_start(); // session starts with the help of this function ?>  

<?php
 
if(isset($_SESSION['username']) && $_SESSION['password']){
    echo "<h1>Welcome ".$_SESSION['username']."</h1>";
    echo "<br><a href='reset_password.php'><input type='button' value='Reset Password'></a><br>";
    echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
}
//else {
//     echo "<script>location.href='login.html'</script>";
//  }
 
if(isset($_POST['logged-in']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['username'];
     $pass = $_POST['password'];
 
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $file = fopen('file/login.txt', 'r');
        $good=false;

        while(!feof($file)){
            $line = fgets($file);
            $array = explode(";",$line);

            if(trim($array[0]) == $_POST['username'] && trim($array[1]) == $_POST['password']){
                    $good=true;
                    break;
                }
        }
 
        if($good){
            $_SESSION['username'] = $user;
            $_SESSION['password'] = $pass;
            echo '<script type="text/javascript"> window.open("login.php","_self");</script>';  

        }else{
            echo "<script>alert('Invalid Username or Password. Please login!')</script>";
            echo "<script>location.href='login.html'</script>";
        }
            fclose($file);
    }
   
 
}
?>