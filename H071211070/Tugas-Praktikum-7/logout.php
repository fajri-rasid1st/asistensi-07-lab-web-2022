<?php

session_start();
session_unset();
session_destroy();
$_SESSION = [];
header("Location: login.php");