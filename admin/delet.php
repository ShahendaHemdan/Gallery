<?php
include "../model/connect.php";
$id=$_GET['id'];
$qdelete="DELETE FROM `category` WHERE id=$id";
$delete=$connect->query($qdelete);
header("Location: category.php");
