<?php

// menambahkan class database
require('../db/database.php');
$db = new Database();

// mengambil data username menggunakan GET
$username = $_GET['username'];

// buat query untuk melakukan penghapusan data di table
$db->query('DELETE FROM admins WHERE username=:username');

// binding data query dengan variable
$db->bind(':username', $username);

// execute query ke database
$db->execute();

// kembalikan ke halaman data_admin.php
header("Location: ../data_admin.php");