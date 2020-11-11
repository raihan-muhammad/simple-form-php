<?php
include "koneksi.php";
$q = $_GET['id'];

$sql="SELECT kota_provinsi FROM provinsi WHERE id_provinsi = '".$q."'";
$result = mysqli_query($conn,$sql);

foreach($result as $row)
  echo "<option value='".$row['kota_provinsi']."'>" . $row['kota_provinsi'] . "</td>";


?>