<?php
include "koneksi.php";
$q = $_GET['id'];

$sql="SELECT nama_provinsi FROM provinsi WHERE id_provinsi = '".$q."'";
$result = mysqli_query($conn,$sql);
$fetch = mysqli_fetch_array($result);


echo "<option value='".$fetch['nama_provinsi']."'> ";

?>