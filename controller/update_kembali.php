<?php

// menambahkan class database
require('../db/database.php');
$db = new Database();

// mengambil data no menggunakan POST
$id = $_POST['id'];
$denda = $_POST['denda'];
$ket = $_POST['ket'];


// buat query untuk melakukan UPDATE data di table
$db->query('UPDATE loans SET end_date = now(), denda = :denda, ket = :ket WHERE id = :id');

// binding data query dengan variable
$db->bind(':id', $id);
$db->bind(':denda', $denda);
$db->bind(':ket', $ket);


// execute query ke database
$db->execute();

// kembalikan ke halaman data_customer.php
header("Location: ../data_pinjam.php");