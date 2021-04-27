<?php
    $name = $_GET['name'];
    $value = $_GET['value'];
    $time = $_GET['time'];
    $redirect = $_GET['redirect'];

    setcookie($name, $value, time()+($time), '/');

    echo "<script>location.replace('{$redirect}')</script>";
?>