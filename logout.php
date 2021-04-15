<?php
    session_start();

    if(isset($_SESSION['username']) && $_SESSION['password']) {
        session_destroy();
        echo "<script>location.href='login.html'</script>";
    } else {
        echo "<script>location.href='login.html'</script>";
    }
?>