<?php
$mysqli = new mysqli("sql208.infinityfree.com", "if0_39196674", "ob3WsU8mEhqSYgl", "if0_39196674_news");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully!";
?>