<?php
    session_start();
    $_SESSION['status']=null;
    $flag="kznctf{REDACTED}";
    try {
        if (isset($_GET['username']) && isset($_GET['password'])) {
            if (strcmp($_GET['username'], $flag)==0 && strcmp($_GET['password'], $flag)==0)
                $_SESSION['status']=$flag;
            else
                $_SESSION['status']="Invalid username or password";
        }
    } catch (Throwable $th) {
        $_SESSION['status']=$flag;
    }
?>