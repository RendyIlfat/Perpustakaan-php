<?php
class Database {
    private $host = 'localhost';
    private $user = 'root'; // Ganti dengan username database Anda
    private $pass = ''; // Ganti dengan password database Anda
    private $dbname = 'perpusku'; // Ganti dengan nama database Anda
    private $dbh;
    private $error;
    private $stmt;

    public function __construct(){
        // Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Buat instance PDO
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function reset(){
        $this->stmt = null; // Mengatur statement menjadi null untuk meresetnya
    }
    

    // Query database
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // Bind parameter
    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi statement
    public function execute(){
        return $this->stmt->execute();
    }

    // Ambil semua hasil
    public function get(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil satu hasil
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Hitung jumlah baris yang terpengaruh
    public function rowCount(){
        return $this->stmt->rowCount();
    }

    // Insert data
    public function insert($query){
        $this->query($query);
        $this->execute();
        return $this->rowCount();
    }

    // Update data
    public function update($query){
        $this->query($query);
        $this->execute();
        return $this->rowCount();
    }

    // Delete data
    public function delete($query){
        $this->query($query);
        $this->execute();
        return $this->rowCount();
    }
}
?>
