<?php
session_start();
$email = $_SESSION['email'];
$act = $_GET['act'];
include '../../config/koneksi.php';

if($act == 'active')
{
    $id = $_GET['id'];
    $query = "UPDATE user SET status = 'aktif' WHERE id = '$id'";
    $execute = mysqli_query($koneksi,$query);

    if($execute){
        echo "<script>alert('User Diaktifkan.');window.location='../main.php?page=member';</script>";
    }
}
elseif($act == 'inactive')
{
    $id = $_GET['id'];
    $query = "UPDATE user SET status = 'nonaktif' WHERE id = '$id'";
    $execute = mysqli_query($koneksi,$query);

    if($execute){
        echo "<script>alert('User Dinonaktifkan.');window.location='../main.php?page=member';</script>";
    }
}
?>
