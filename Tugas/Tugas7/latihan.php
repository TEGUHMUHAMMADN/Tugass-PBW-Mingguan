<?php
  $jumlah_roda = 4;
  echo "Jumlah roda : $jumlah_roda<br>";
  switch ($jumlah_roda) {
     case 2:
         echo "Jenis kendaraan: Motor atau sepeda";
         break;
     case 3:
         echo "Jenis kendaraan : Bajai";
         break;
     case 4:
         echo "Jenis kendaraan : Mobil";
         break;
     default:
         echo "Jenis kendaraan : Tidak diketahui";
     }  
?>