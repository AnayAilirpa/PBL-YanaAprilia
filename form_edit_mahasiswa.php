<?php 
include('library_mahasiswa.php');
$lib = new Library();
if(isset($_GET['id_mahasiswa'])){
    $id_mahasiswa = $_GET['id_mahasiswa']; 
    $data_mahasiswa = $lib->get_by_id($id_mahasiswa);
}
else
{
    header('Location: index_mahasiswa.php');
}

if(isset($_POST['tombol_update'])){
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $id_prodi = $_POST['id_prodi'];
    $id_user = $_POST['id_user'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $status_update = $lib->update($id_mahasiswa, $id_prodi, $id_user, $nama_mahasiswa, $nim, $prodi, $alamat, $email);
    if($status_update)
    {
        header('Location:index_mahasiswa.php');
    }
}

// if(isset($_POST['tombol_kembali'])){ 
//     header('Location:index_mahasiswa.php');
// }
?>
<html>
    <head>
        <title>Update Data Mahasiswa</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    </head>
    <body><br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Update Data Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="id_mahasiswa" value="<?php echo $data_mahasiswa['id_mahasiswa']; ?>"/>
                <div class="form-group row">
                    <label for="id_user" class="col-sm-2 col-form-label">Id User</label>
                    <div class="col-sm-10">
                    <select name="id_user" class="form-control" id="id_user" required>
                        <option></option>
                        <?php 
                            $data_users = $lib->get_all_users();
                            foreach($data_users as $user){
                                $selected = ($user['id_user'] == $data_mahasiswa['id_user']) ? 'selected' : '';
                                echo "<option value='".$user['id_user']."' $selected>".$user['username']."</option>";
                            }
                        ?>
                    </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="id_prodi" class="col-sm-2 col-form-label">Id Prodi</label>
                    <div class="col-sm-10">
                    <select name="id_prodi" class="form-control" id="id_prodi" required>
                        <option></option>
                        <?php 
                            $data_prodi = $lib->get_all_prodi();
                            foreach($data_prodi as $prodi){
                                $selected = ($prodi['id_prodi'] == $data_mahasiswa['id_prodi']) ? 'selected' : '';
                                echo "<option value='".$prodi['id_prodi']."' $selected>".$prodi['nama_prodi']."</option>";
                            }
                        ?>
                    </select>                    
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo $data_mahasiswa['nama_mahasiswa']; ?>" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $data_mahasiswa['nim']; ?>" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="prodi" id="prodi" value="<?php echo $data_mahasiswa['prodi']; ?>" readonly>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $data_mahasiswa['alamat']; ?>" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $data_mahasiswa['email']; ?>" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_update" class="btn btn-primary" value="Update" id="tombol_update">
                    <a href="index_mahasiswa.php"><input type="button" name="tombol_kembali" class="btn btn-secondary" value="Kembali" id="tombol_kembali"></a>
                    </div>
                </div><br>
            </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script type="text/javascript">	
	    $(document).ready(function() {
		$('#id_user').select2();
	    });
    </script>
    <script type="text/javascript">	
	    $(document).ready(function() {
		$('#id_prodi').select2();
	    });
    </script> -->
    <script>
    $('#id_prodi').change(function() {
        var selectedProdi = $(this).find('option:selected').text();
        $('#prodi').val(selectedProdi);
    });
    </script>
    </body>
</html>