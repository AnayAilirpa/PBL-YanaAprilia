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

    public function get_all_users() {
        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();
        return $query->fetchAll();
    }

    public function get_all_prodi() {
        $query = $this->db->prepare("SELECT * FROM prodi");
        $query->execute();
        return $query->fetchAll();
    }

    public function add_data($id_prodi, $id_user, $nama_mahasiswa, $nim, $prodi, $alamat, $email)
    {
        $data = $this->db->prepare('INSERT INTO mahasiswa (id_prodi, id_user, nama_mahasiswa, nim, prodi, alamat, email) VALUES (?, ?, ?, ?, ?, ?, ?)');
        
        $data->bindParam(1, $id_prodi);
        $data->bindParam(2, $id_user);
        $data->bindParam(3, $nama_mahasiswa);
        $data->bindParam(4, $nim);
        $data->bindParam(5, $prodi);
        $data->bindParam(6, $alamat);
        $data->bindParam(7, $email);

        $data->execute();
        return $data->rowCount();
    }
    
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM mahasiswa");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id_mahasiswa){
        $query = $this->db->prepare("SELECT * FROM mahasiswa where id_mahasiswa=?");
        $query->bindParam(1, $id_mahasiswa);
        $query->execute();
        return $query->fetch();
    }

    public function update($id_mahasiswa, $id_prodi, $id_user, $nama_mahasiswa, $nim, $prodi, $alamat, $email){
        $data = $this->db->prepare('UPDATE mahasiswa set id_prodi=?,id_user=?,nama_mahasiswa=?,nim=?,prodi=?,alamat=?,email=? where id_mahasiswa=?');
        
        $data->bindParam(1, $id_prodi);
        $data->bindParam(2, $id_user);
        $data->bindParam(3, $nama_mahasiswa);
        $data->bindParam(4, $nim);
        $data->bindParam(5, $prodi);
        $data->bindParam(6, $alamat);
        $data->bindParam(7, $email);
        $data->bindParam(8, $id_mahasiswa);

        $data->execute();
        return $data->rowCount();
    }

    public function delete($id_mahasiswa)
    {
        $query = $this->db->prepare("DELETE FROM mahasiswa where id_mahasiswa=?");

        $query->bindParam(1, $id_mahasiswa);

        $query->execute();
        return $query->rowCount();
    }

}
?>










