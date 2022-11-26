<?php
require_once("config/koneksi.php");
require_once("config/create-tables.php");

$db = new DatabaseConnection;
$conn = $db->con;

function redirect($msg, $icon, $page)
{
    $_SESSION['msg'] = "$msg";
    $_SESSION['icon'] = "$icon";
    header("location: $page");
    exit(0);
}

function validateInput($conn, $input)
{
    return mysqli_real_escape_string($conn, htmlspecialchars($input));
}

function renameImage($image)
{
    $rename = preg_replace("/\s+/", "_", $image);
    $imageExt = pathinfo($rename, PATHINFO_EXTENSION);
    $rename = pathinfo($rename, PATHINFO_FILENAME);
    return $rename."_".date("mjYHis").".".$imageExt;
}

?>