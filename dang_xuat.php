<?php
session_start();
unset($_SESSION["thong_tin_user"]);
header("location: " . $_SERVER["HTTP_REFERER"]);
?>