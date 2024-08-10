<?php 
include('library_prodi.php');
$lib = new Library();
if(isset($_GET['id_prodi'])){
    $id_prodi = $_GET['id_prodi']; 
    $data_prodi = $lib->get_by_id($id_prodi);
}
else
{
    header('Location: index_prodi.php');
}

if(isset($_POST['tombol_update'])){
    $id_prodi = $_POST['id_prodi'];
    $nama_prodi = $_POST['nama_prodi'];

    $status_update = $lib->update($id_prodi, $nama_prodi);
    if($status_update)
    {
        header('Location:index_prodi.php');
    }
}

// if(isset($_POST['tombol_kembali'])){ 
//     header('Location:index_prodi.php');
// }
?>
<html>
    <head>
        <title>Update Data Prodi</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    </head>
    <body><br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Update Data Prodi</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="id_prodi" value="<?php echo $data_prodi['id_prodi']; ?>"/>
                <div class="form-group row">
                    <label for="nama_prodi" class="col-sm-2 col-form-label">Nama Prodi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" value="<?php echo $data_prodi['nama_prodi']; ?>" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_update" class="btn btn-primary" value="Update" id="tombol_update">
                    <a href="index_prodi.php"><input type="button" name="tombol_kembali" class="btn btn-secondary" value="Kembali" id="tombol_kembali"></a>
                    </div>
                </div><br>
            </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </script>
    </body>
</html>