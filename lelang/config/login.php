
<?php
// Memulai session.
//session_start();

// Jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin.
if (isset($_SESSION['username'])) {
    header("location:../web/main.php?page=login");
}

// Include koneksi database.
include "koneksi.php";

// Jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password.
if (isset($_POST['login'])) {

    $username = $_POST['name'];
    $userpass = $_POST['password']; // password yang di inputkan oleh user lewat form login.

    // Query ke database.
    $sql = mysqli_query($koneksi, "SELECT email, password, nama, full_name, role FROM user WHERE nama = '$username' AND status = 'aktif'");

    list($email, $password, $nama, $role) = mysqli_fetch_array($sql);

    // Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
    if (mysqli_num_rows($sql) > 0) {

        /*
            Validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
        */
        if (password_verify($userpass, $password)) {

            // Buat session baru.
            session_start();
            $_SESSION['email']    = $email;
            $_SESSION['nama']     = $nama;
            $_SESSION['role']     = $role;

            // Jika login berhasil, user akan diarahkan ke halaman admin.
            header("location: ../admin/main.php");
            //echo "ok";
            //session_destroy();
            die();
        }else {
            echo "<script>alert('Akun Belum Diaktifkan silahkan hubungi administrator.');window.location='../web/main.php?page=login';</script>";
         }
    } 
    else {
        echo "<script>alert('Akun Belum Diaktifkan silahkan hubungi administrator.');window.location='../web/main.php?page=login';</script>";
    }
}
?>