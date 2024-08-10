<?php 
include('library_mahasiswa.php');
$lib = new Library();
$data_mahasiswa = $lib->show();

if(isset($_GET['hapus_mahasiswa']))
{
    $id_mahasiswa = $_GET['hapus_mahasiswa'];
    $status_hapus = $lib->delete($id_mahasiswa);
    if($status_hapus)
    {
        header('Location: index_mahasiswa.php');
    }
}
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body><br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Mahasiswa</h3>
            </div>
            <div class="card-body">
                <a href="form_add_mahasiswa.php" class="btn btn-success">Tambah</a>
                <hr/>
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>Email</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_mahasiswa as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['nama_mahasiswa']."</td>";
                        echo "<td>".$row['nim']."</td>";
                        echo "<td>".$row['prodi']."</td>";
                        echo "<td>".$row['alamat']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td><a class='btn btn-info' href='form_edit_mahasiswa.php?id_mahasiswa=".$row['id_mahasiswa']."'>Update</a>
                        <a class='btn btn-danger' href='index_mahasiswa.php?hapus_mahasiswa=".$row['id_mahasiswa']."'>Hapus</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>





