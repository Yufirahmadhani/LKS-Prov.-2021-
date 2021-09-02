<?php
session_start();
$email = $_SESSION['email'];
include '../../config/koneksi.php';

// $emailuser = mysqli_query($koneksi,"SELECT id FROM admin WHERE email = '$email'"); 

// //$data = mysqli_result($emailuser);
// $useridx = mysqli_fetch_array($emailuser);
// $userid = $useridx['id'];


    $id = $_GET['id']+0; //var_dump($id);
    $select = mysqli_query($koneksi,"SELECT * FROM t_lelang WHERE id = $id");
    $item = mysqli_fetch_array($select);

    $barang_id = $item['barang_id']+0; //var_dump($barang_id);

    $filter = mysqli_query($koneksi,"SELECT * FROM t_lelang WHERE title = $title AND status = 'terpilih'");
    $check = mysqli_num_rows($filter); //var_dump($check); 

    if($check > 0){
        echo "<script>alert('Barang Telah Diterima Kandidat Lain.');window.location='../main.php?page=lelang';</script>";
    } else {
        $query = "UPDATE t_lelang SET status = 'terpilih' WHERE id = $id";
        $execute = mysqli_query($koneksi,$query);


        
        if($execute){
            echo "<script>alert('Kandidat Sudah Terpilih.');window.location='../main.php?page=lelang';</script>";
        }
    }

?>
