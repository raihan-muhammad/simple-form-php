<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Admin</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
  <h1 class="text-center pt-4">Selamat Datang, Admin</h1>
  <a href="daftar.php" class="text-center d-block pb-4">Form Pendaftaran</a>
  <div class="container">
  
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Provinsi</th>
          <th scope="col">Kota</th>
          <th scope="col">Alamat</th>
          <th scope="col">Asal Sekolah</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include "koneksi.php";
          $query = "SELECT * FROM mahasiswa";
          $sql = mysqli_query($conn, $query);
          $no = 1;
          foreach ($sql as $row){

            echo "
            <tr>
              <td>".$no++."</td>
              <td>".$row['nama']."</td>
              <td>".$row['email']."</td>
              <td>".$row['tempat_lahir']."</td>
              <td>".$row['tanggal_lahir']."</td>
              <td>".$row['nama_provinsi']."</td>
              <td>".$row['nama_kota']."</td>
              <td>".$row['alamat']."</td>
              <td>".$row['asal_sekolah']."</td>
            </tr>";

          }

        ?>
      </tbody>
    </table>

  </div>
</body>
</html>