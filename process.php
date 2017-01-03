<?php
$conn = mysqli_connect("localhost", "root", "twiw1534");
mysqli_select_db($conn, "opentutorials");
$sql = "INSERT INTO topic (title,description,author,created) VALUES(' ".$_POST['title']." ', '".$_POST['description']."', '".$_POST['author']."', now())";
$result = mysqli_query($conn, $sql);

$sql = "INSERT INTO topic (title, description, author, created) VALUES('".$_POST['title']."', '".$_POST['description']."', '".$_POST['author']."', now())";

$sql = "SELECT * FROM user WHERE name='".$_POST['author']."'";
$user_id = 1;
$sql = "INSERT INTO topic (title, descriptio, author, created) VALUES ('".$_POST['title']."', '".$_POST['description']."', '".$user_id."', now())";
echo $sql;

?>