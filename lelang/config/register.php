<?php 
include "koneksi.php";

$username   = $_POST['name'];
$password   = $_POST['password'];
$password2  = $_POST['password2'];
$email      = $_POST['email'];
$full_name     = $_POST['full_name'];


if($password == $password2)
{
    $fpassword = password_hash($password, PASSWORD_DEFAULT);
    $insert =  mysqli_query($koneksi,
    "
        INSERT INTO user (nama,password,email,full_name,role) VALUES (
            '$username','$fpassword','$email','$full_name','member'
        ) 
    ");

    if($insert) {
        header('location:../web/main.php?page=login');
    } else {
        mysqli_error($koneksi);
    }
} 
else 
{
    header('location:../web/main.php?page=login&&message=failregis');
}

?>