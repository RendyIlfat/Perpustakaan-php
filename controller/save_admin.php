<?php

require('../db/database.php');
$db = new Database();


$username = $_POST['username'];
$password = $_POST['password'];
$jk = $_POST['jk'];
$status = $_POST['status'];

//--MENGGUNAKAN BIND
$db->query('INSERT INTO admins (username, password, jk, status) VALUES (:username, :password, :jk, :status)');

$db->bind(':username', $username);
$db->bind(':password', MD5($password));
$db->bind(':jk', $jk);
$db->bind(':status', $status);

$db->execute();

header("Location: ../data_admin.php");