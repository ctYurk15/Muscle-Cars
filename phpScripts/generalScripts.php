<?php

    function alert($msg)
    {
        echo "<script>alert({$msg})</script>";
    }

    function gotoURL($url)
    {
        echo "<script>location.replace('{$url}')</script>";
    }

?>