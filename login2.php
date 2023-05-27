<?php
include("config.php");

// cek apakah tombol daftar sudah diklik atau belum

if (isset($_POST['login'])) 
{
    // ambil data dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = pg_query("SELECT * FROM users");

    while($users = pg_fetch_array($query))
    {   
        if ($username == $users['username'] and $password == $users['password']) 
        {
            header('Location: halamanutama.php?id='.$users['id']);
        }
    }
}