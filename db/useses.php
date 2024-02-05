<?php
require('database.php');

$database = new Database();

// Contoh penggunaan query SELECT
$database->query('SELECT * FROM nama_tabel WHERE id = :id');
$database->bind(':id', 1); // Bind parameter ':id' dengan nilai 1

// Eksekusi query dan ambil satu hasil
$result = $database->single();
print_r($result); // Melihat hasil query

// Contoh penggunaan query INSERT
$database->query('INSERT INTO nama_tabel (field1, field2, field3) VALUES (:field1, :field2, :field3)');
$database->bind(':field1', $value1); // Bind parameter ':field1' dengan nilai $value1
$database->bind(':field2', $value2); // Bind parameter ':field2' dengan nilai $value2
$database->bind(':field3', $value3); // Bind parameter ':field3' dengan nilai $value3

// Eksekusi query INSERT
$insertedRows = $database->execute();

if ($insertedRows > 0) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Gagal menambahkan data";
}

// Contoh penggunaan query UPDATE
$database->query('UPDATE nama_tabel SET field1 = :field1 WHERE id = :id');
$database->bind(':field1', $newValue); // Bind parameter ':field1' dengan nilai $newValue
$database->bind(':id', $idToUpdate); // Bind parameter ':id' dengan nilai $idToUpdate

// Eksekusi query UPDATE
$updatedRows = $database->execute();

if ($updatedRows > 0) {
    echo "Data berhasil diperbarui";
} else {
    echo "Gagal memperbarui data";
}

// Contoh penggunaan query DELETE
$database->query('DELETE FROM nama_tabel WHERE id = :id');
$database->bind(':id', $idToDelete); // Bind parameter ':id' dengan nilai $idToDelete

// Eksekusi query DELETE
$deletedRows = $database->execute();

if ($deletedRows > 0) {
    echo "Data berhasil dihapus";
} else {
    echo "Gagal menghapus data";
}


// Setelah menjalankan query
$database->execute();
// Reset statement
$database->reset();

// Atau bisa digunakan sebelum menjalankan query baru
$database->reset();
// Jalankan query baru
$database->query('SELECT * FROM tabel_baru');
$hasil = $database->get();

