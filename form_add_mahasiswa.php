<?php 
include('library_mahasiswa.php');
$lib = new Library();
if(isset($_POST['tombol_tambah'])){
    $id_prodi = $_POST['id_prodi'];
    $id_user = $_POST['id_user'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $add_status = $lib->add_data($id_prodi, $id_user, $nama_mahasiswa, $nim, $prodi, $alamat, $email);
    if($add_status){
    header('Location: index_mahasiswa.php');
    }
}

// if(isset($_POST['tombol_kembali'])){
//     header('Location:index_mahasiswa.php');
// }
?>
<html>
    <head>
        <title>Tambah Data Mahasiswa</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    </head>
    <body><br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <div class="form-group row">
                    <label for="id_user" class="col-sm-2 col-form-label">Id User</label>
                    <div class="col-sm-10">
                    <select name="id_user" class="form-control" id="id_user" required>
                        <option></option>
                    <?php 
                        $data = $lib->get_all_users();
                        foreach($data as $data_mahasiswa){
                    ?>
                        <option value="<?php echo $data_mahasiswa['id_user'] ?>"><?php echo $data_mahasiswa['username']; ?></option>
                    <?php
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
                        $data = $lib->get_all_prodi();
                        foreach($data as $data_prodi){
                    ?>
                        <option value="<?php echo $data_prodi['id_prodi'] ?>"><?php echo $data_prodi['nama_prodi']; ?></option>
                    <?php
				        }
				    ?>
                    </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" id="nim" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="prodi" id="prodi" readonly>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_tambah" class="btn btn-primary" value="Tambah" id="tombol_tambah">
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