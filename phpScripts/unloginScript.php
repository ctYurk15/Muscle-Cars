<?php
    setcookie("login", "", time() - 100, "/"); //disabling cookie
    header("location: ../"); //redirecting to main page
?>