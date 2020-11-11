<?php include "koneksi.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Pendaftaran</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>

  <script>
  function showUser(str) {
   
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("inputKota").innerHTML = this.responseText;
          console.log(this.responseText)
        }
      };
      xmlhttp.open("GET","getKota.php?id="+str,true);
      xmlhttp.send();

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("namaProvinsi").innerHTML = this.responseText;
          console.log(this.responseText)
        }
      };
      xmlhttp.open("GET","getProvinsi.php?id="+str,true);
      xmlhttp.send();
  }
  </script>

  <div class="container">
  <h1 class="p-4 text-center">Form Pendaftaran Mahasiswa</h1>
  <a href="admin.php" class="d-block text-center pb-4">Admin Panel</a>
  <form method="POST">
    <div class="form-row">
      <div class="form-group col-md-6 col-sm-12">
        <label for="inputNama">Nama</label>
        <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukan Nama">
      </div>
      <div class="form-group col-md-6 col-sm-12">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Masukan Email">
      </div>
    </div>

    <div class="form-group">
      <label for="inputTempatLahir">Tempat Lahir</label>
      <input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir" placeholder="Contoh : Bali">
    </div>
    <div class="form-group">
      <label for="inputTglLahir">Tanggal Lahir</label>
      <input type="date" class="form-control" name="tglLahir" id="inputTglLahir">
    </div>

    <div class="form-row">
      <div class="form-group col-md-6 col-sm-12">
        <label for="inputProvinsi">Provinsi</label>
        <select id="inputProvinsi" class="form-control" onchange="showUser(this.value)">
          <option value="Belum Memilih Provinsi">Silahkan pilih provinsi</option>
          <?php

              $query = "SELECT DISTINCT nama_provinsi, id_provinsi FROM provinsi ";
              $sql = mysqli_query($conn, $query);

              foreach ($sql as $row) {
                echo "<option value='".$row["id_provinsi"]."' selected>". $row["nama_provinsi"] ."</option>";
              }

              ?>
        </select>
      </div>
      
     <div class="form-group col-md-6 col-sm-12 d-none">
        <label for="inputKota">Nama Provinsi</label>
        <select id="namaProvinsi" class="form-control" name="nama_provinsi">

        </select>
      </div>

      <div class="form-group col-md-6 col-sm-12">
        <label for="inputKota">Kota</label>
        <select id="inputKota" class="form-control" name="kota">
          <option value="">Akan otomatis terisis ketika memilih provinsi</option>
        </select>
      </div>
    </div>  

    <div class="form-row">
      <div class="form-group col-md-6 col-sm-12">
        <label for="inputAlamat">Alamat</label>
        <textarea class="form-control" id="inputAlamat" name="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
      </div>
      <div class="form-group col-md-6 col-sm-12">
        <label for="asalSekolah">Asal Sekolah</label>
        <input type="text" class="form-control" id="asalSekolah" name="asal_sekolah" placeholder="Masukan Nama">
      </div>
    </div>  
    <button name="daftar" class="btn btn-primary">Daftar</button>
  </form>

  <?php
    if(isset($_POST['daftar'])){
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $tempat_lahir = $_POST['tempat_lahir'];
      $tglLahir = $_POST['tglLahir'];
      $alamat = $_POST['alamat'];
      $asal_sekolah = $_POST['asal_sekolah'];
      $nama_provinsi = $_POST['nama_provinsi'];
      $kota = $_POST['kota'];

      $query = "INSERT INTO mahasiswa (nama, email, tempat_lahir, tanggal_lahir,  nama_provinsi, nama_kota, alamat, asal_sekolah) VALUES('".$nama."', '".$email."', '".$tempat_lahir."', '".$tglLahir."', '".$nama_provinsi."', '".$kota."', '".$alamat."', '".$asal_sekolah."')";

      $sql = mysqli_query($conn, $query);
      
      if($sql){
        echo "<script>alert('Data Berhasil di tambahkan!')</script>";
      } else {
        echo "<script>alert('Data gagal di tambahkan!')</script>";
      }

    }
  ?>

  </div>
</body>
</html>