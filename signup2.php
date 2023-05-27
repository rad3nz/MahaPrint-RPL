<?php
include("config.php");

// cek apakah tombol signup sudah diklik atau belum

if (isset($_POST['register']))
{
    // ambil data dari formulir
    $nama_lengkap = $_POST['namaLengkap'];
    $no_telp = $_POST['noTelp'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // buat query
    $query = pg_query("INSERT INTO users (namaLengkap, noTelp, email, password) VALUEs ('$nama_lengkap', '$no_telp', '$email', '$password')");

    // apakah query simpan berhasil?
    if ($query == TRUE) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
        header('Location: index.php?status=gagal');
    }
}

else 
{
    die("Akses dilarang...");
}