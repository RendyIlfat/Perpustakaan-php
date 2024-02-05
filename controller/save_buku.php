<?php

require('../db/database.php');
$db = new Database();


$no = $_POST['no_induk'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$penerbit = $_POST['penerbit'];
$subject = $_POST['subject'];


$photo = null;

// Mengambil data gambar
// cek apakah gambar ada atau tidak
if(isset($_FILES["image"])) {

    // Mengambil data dari input image ke dalam variable $file
    $file = $_FILES['image']['tmp_name'];

    if ($file) {
        // merubah file gambar menjadi format base64 kemudian di simpan ke dalam variable $photo
        $photo = @base64_encode(file_get_contents($file));
    }
}

// -- CARA LANGSUNG
//$db->query("INSERT INTO books (no_induk, judul, penulis, tahun, penerbit, subjek) VALUES ('$no', '$judul', '$penulis', $tahun, '$penerbit', '$subject')");

//--MENGGUNAKAN BIND
$db->query('INSERT INTO books (no_induk, judul, penulis, tahun, penerbit, subjek, photo) VALUES (:no_induk, :judul, :penulis, :tahun, :penerbit, :subjek, :photo)');

$db->bind(':no_induk', $no);
$db->bind(':judul', $judul);
$db->bind(':penulis', $penulis);
$db->bind(':tahun', $tahun);
$db->bind(':penerbit', $penerbit);
$db->bind(':subjek', $subject);
$db->bind(':photo', $photo);

$db->execute();

header("Location: ../data_buku.php");