<?php
    $cn = pg_connect("host=localhost port=5432 dbname=mahaPrint user=postgres password=");

    if(!$cn) {
        die("gagal terhubung dengan database" . pg_connect_error());
    }
?>