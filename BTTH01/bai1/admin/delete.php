<?php
require 'connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM loai_hoa WHERE id = '$id'";
$stmt = $conn->prepare($sql);
$stmt -> execute();
header('location: index.php');
?>
