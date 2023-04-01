<?php
include '../config.php';

$id_project = $_GET['id'];

$query = "DELETE FROM project_monitoring where id_project='$id_project'";
mysqli_query($koneksi, $query);
header('location:../home.php');
