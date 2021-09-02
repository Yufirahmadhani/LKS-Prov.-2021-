<?php 

    session_start();

    if($_SESSION['role'] == 'member') {
        header('location:admin/main.php');
	echo "mantap";
    } 
    elseif($_SESSION['role'] == 'admin')
    {
        header('location:admin/main.php');
	echo "mantap";

    }    
    else 
    {
        header('location:web/main.php');
	echo "gagal";
    }
?>
