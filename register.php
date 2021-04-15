<?php
if(isset($_POST["username"]) && isset($_POST["password"]))
{
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
 
    // register user or pop up message
    if( $finduser )
    {
        echo $_POST["username"];
        echo ' existed!';
        include 'register.html';
    }
    else
    {
        $file = fopen("file/login.txt", "a");
        fputs($file,$_POST["username"].";".$_POST["password"]."\r\n");
        fclose($file);
        echo $_POST["username"];
        echo "<script>alert('registered successfully!')</script>";
        echo "<script>location.href='login.html'</script>";
    }
}

?>