<?php 
include('library_prodi.php');
$lib = new Library();
$data_prodi = $lib->show();

if(isset($_GET['hapus_prodi']))
{
    $id_prodi = $_GET['hapus_prodi'];
    $status_hapus = $lib->delete($id_prodi);
    if($status_hapus)
    {
        header('Location: index_prodi.php');
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
                <h3>Data Prodi</h3>
            </div>
            <div class="card-body">
                <a href="form_add_prodi.php" class="btn btn-success">Tambah</a>
                <hr/>
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>No</th>
                        <th>Nama Prodi</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_prodi as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['nama_prodi']."</td>";
                        echo "<td><a class='btn btn-info' href='form_edit_prodi.php?id_prodi=".$row['id_prodi']."'>Update</a>
                        <a class='btn btn-danger' href='index_prodi.php?hapus_prodi=".$row['id_prodi']."'>Hapus</a></td>";
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





