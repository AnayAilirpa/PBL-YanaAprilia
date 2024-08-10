<?php
class Library
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "si_magang";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function add_data($nama_prodi)
    {
        $data = $this->db->prepare('INSERT INTO prodi (nama_prodi) VALUES (?)');
        
        $data->bindParam(1, $nama_prodi);

        $data->execute();
        return $data->rowCount();
    }
    
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM prodi");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id_prodi){
        $query = $this->db->prepare("SELECT * FROM prodi where id_prodi=?");
        $query->bindParam(1, $id_prodi);
        $query->execute();
        return $query->fetch();
    }

    public function update($id_prodi, $nama_prodi){
        $data = $this->db->prepare('UPDATE prodi set nama_prodi=? where id_prodi=?');
        
        $data->bindParam(1, $nama_prodi);
        $data->bindParam(2, $id_prodi);

        $data->execute();
        return $data->rowCount();
    }

    public function delete($id_prodi)
    {
        $query = $this->db->prepare("DELETE FROM prodi where id_prodi=?");

        $query->bindParam(1, $id_prodi);

        $query->execute();
        return $query->rowCount();
    }

}
?>










