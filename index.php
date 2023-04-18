<?php
//koneksi database
$server = "localhost";
$user   = "root";
$pass   = "";
$database ="dblatihan";

$koneksi = mysqli_connect($server,$user,$pass,$database)or die(mysqli_eror($koneksi));

// jika tombol simpan diklik 
if(isset($POST['bsimpan']))
{
    $simpan = mysqli_query($koneksi, "INSERT INTO tmobil ( no, namamobil,warna, harga )
                                        VALUES ('$_POST[tno]', 
                                               '$_POST[tnamamobil]',
                                               '$_POST[twarna]',
                                               '$_POST[tharga]')
                                        ");
    if($simpan) // jika simpansukses
    {
        echo "<script>
                alert(Simpan data sukses!');
                document.location= 'index.php';
              <script>";
    }
    else
    {
        echo "<script>
                alert(Simpan data GAGAL!');
                document.location= 'index.php';
              <script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Mobil</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
</head>
<body>
<div class="container"></div>


    <h1 class ="text-center">CRUD PHP DATA MOBIL</h1>
    <h2 class="text-center">TRI</h2>

    <!-- awal card form -->
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Form Input Data Mobil
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>NO</label>
                <input type="text" name="tno" class="form-control" placeholder="Input No anda disini!" required>
            </div>
            <div class="form-group">
                <label>Nama Mobil</label>
                <select class="form-control" name="tnama">
                    <option value="">- option -</option>
                    <option value="BR_V">BR_V</option>
                    <option value="BANDENG">BANDENG</option>
                    <option value="MIO">MIO</option>
                </select>
            </div>
            <div class="form-group">
                <label>Warna</label>
                <input type="text" name="twarna" class="form-control" placeholder="Input warna anda disini!" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="tharga" class="form-control" placeholder="Input harga anda disini!" required>
            </div>

            <button type="submit" class="btn btn-success" name="bsimpan" >Simpan</button>
            <button type="reset" class="btn btn-danger" name="breset">kosongkan</button>

        </form>
    </div>
    </div>
    <!-- akhir card form -->

    <!-- awal card tabel-->
    <div class="card mt-3">
    <div class="card-header bg-success text-white">
        Daftar MObil
    </div>
    <div class="card-body">

        <table class="table" table-bordered table-striped>
            <tr>
                <th>NO</th>
                <th>Nama Mobil</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no=1;
                $tampil = mysqli_query($koneksi, "SELECT * from tmobil order by id_mobil desc");
                while($data = mysqli_fecth_array($tampil)) :

            
            ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$data['namamobil']?></td>
                <td><?=$data['warna']?></td>
                <td><?=$data['harga']?></td>
                <td>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Hapus</a>
                
                </td>
            </tr>
        <?php endwhile; // penutup berulang ?>
        </table>
        
    </div>
    </div>
    <!-- akhir card tabel -->

<script class="text/javascript" src="css/bootstrap.min.css"></script>
</body>
</html>