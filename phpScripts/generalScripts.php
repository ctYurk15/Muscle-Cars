<?php

    function alert($msg)
    {
        echo "<script>alert('{$msg}')</script>";
    }

    function gotoURL($url)
    {
        echo "<script>location.replace('{$url}')</script>";
    }

    function createCookie($name, $value, $time, $nextUrl)
    {
        gotoURL("/phpScripts/createCookie.php?name={$name}&value={$value}&time={$time}&redirect={$nextUrl}");
    }
?>