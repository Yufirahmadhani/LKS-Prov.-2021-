<?php
session_start();
$email = $_SESSION['email'];
$act = $_GET['act'];
include '../../config/koneksi.php';

$emailuser = mysqli_query($koneksi,"SELECT id FROM user WHERE email = '$email'"); 

//$data = mysqli_result($emailuser);
$useridx = mysqli_fetch_array($emailuser);
$userid = $useridx['id'];

if($act == 'add')
{
    
	// membuat variabel untuk menampung data dari form
    $nama_barang    = $_POST['title'];
    $kategori       = $_POST['kategori'];
    $keterangan     = $_POST['keterangan'];
    $close_time     = datetime("Y/m/d H:m:i",strtotime($_POST['close_time']));
    $open_bid_amount  = $_POST['open_bid_amount'];
    $gambar_produk  = $_FILES['barang']['name'];


    //cek dulu jika ada gambar produk jalankan coding ini
    if($gambar_produk != "") 
    {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['barang']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                    move_uploaded_file($file_tmp, '../../img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "INSERT INTO auction (title, kategori, keterangan, closing_time, open_bid_amount, foto, user_id) VALUES 
                    ('$title', '$kategori', '$keterangan', '$closing_time', '$open_bid_amount','$nama_gambar_baru', $userid)";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    } else {
                        //tampil alert dan akan redirect ke halaman index.php
                        //silahkan ganti index.php sesuai halaman yang akan dituju
                        echo "<script>alert('Data berhasil ditambah.');window.location='../main.php?page=barang';</script>";
                    }

                } else {     
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../main.php?page=barang&&method=add';</script>";
                }
    } 
    //else {
    // $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', null)";
    //                 $result = mysqli_query($koneksi, $query);
    //                 // periska query apakah ada error
    //                 if(!$result){
    //                     die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
    //                         " - ".mysqli_error($koneksi));
    //                 } else {
    //                     //tampil alert dan akan redirect ke halaman index.php
    //                     //silahkan ganti index.php sesuai halaman yang akan dituju
    //                     echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
    //                 }
    // }
}
elseif($act == 'update')
{
    $id = $_POST['id'];

    $title	    = $_POST['title'];
    $kategori       = $_POST['kategori'];
    $keterangan     = $_POST['keterangan'];
    $closing_time   = datetime("Y/m/d H:m:i",strtotime($_POST['closing_time']));
    $open_bit_amount     = $_POST['open_bid_amount'];
    
    $query = "UPDATE barang SET nama_barang = '$nama_barang',
    kategori   = '$kategori',
    keterangan = '$keterangan',
    tgl_tutup  = '$tgl_tutup',
    harga_buka = '$harga_buka' WHERE id = $id";

    $execute = mysqli_query($koneksi,$query);

    if($execute){
        echo "<script>alert('Data berhasil diubah.');window.location='../main.php?page=barang';</script>";
    }
}
elseif($act == 'hapus')
{
    $id = $_GET['id'];
    $query = "DELETE FROM barang WHERE id = '$id'";
    $execute = mysqli_query($koneksi,$query);

    if($execute){
        echo "<script>alert('Data berhasil dihapus.');window.location='../main.php?page=barang';</script>";
    }
}
?>
