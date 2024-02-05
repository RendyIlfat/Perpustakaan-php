<?php

// menambah class database 
require('../db/database.php');
$db = new Database();

// mengambil data id_cus menggunakan GET
$id = $_GET['id'];

// var_dump($_POST);
// exit;

// buat query untuk melakukan penghapusan data di table
$db->query('DELETE FROM loans WHERE id=:id');

// binding data query dengan variable 
$db->bind(':id',$id);

// execute query ke database
$db->execute();

// kembalikan ke halaman data_customer.php
header("Location: ../data_pinjam.php");