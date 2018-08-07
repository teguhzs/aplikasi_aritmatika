<!DOCTYPE html>
<html>
<head>
 <title>Aplikasi Aritmatika Penambahan, Pengurangan, Perkalian Dan Pembagian</title>
 <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
</head>
<body>
    <?PHP
        error_reporting(0);

        echo '<h1 align="center">Aplikasi Aritmatika Penjumlahan, Pengurangan, Perkalian Dan Pembagian</h1>';


         if(!$_POST['aksi'])
         {      
         /*-----Menampilkan Form Pengisian----*/
          echo '
         <form method="post" action="'.$_SERVER['PHP_SELF'].'">
         <div align="center">
          <input type="text" name="angka1" size="5">
          <select name="aksi">
           <option value="tambah"> + </option>
           <option value="kurang"> - </option>
           <option value="bagi"> / </option>
           <option value="kali"> * </option>
           <option value="persen"> % </option>
          </select>
          <input type="text" name="angka2" size="5">
          <input type="submit" name="hitung" value="hitung">
          </div>
         </form>
         ';
         }else{
         /*-----memasukan nilai ke variabel----*/
         $angka1 = $_POST['angka1'];
         $angka2 = $_POST['angka2'];
         
         /*----Cek Operasi----*/
          if($_POST['aksi'] == 'tambah')
          {
           $hasil = $angka1 + $angka2;
           $operasi = '+';
          }
          if($_POST['aksi'] == 'kurang')
          {
           $hasil = $angka1 - $angka2;
           $operasi = '-';
          }
          if($_POST['aksi'] == 'bagi')
          {
           $hasil = $angka1 / $angka2;
           $operasi = '/';
          }
          if($_POST['aksi'] == 'kali')
          {
           $hasil = $angka1 * $angka2;
           $operasi = 'X';
          }
          if($_POST['aksi'] == 'persen')
          {
           $hasil = (($angka2 * $angka1)/100);
           $operasi = '% dari';
          }

 /*-----------Fungsi Hasil terbilang...........*/ 
 
  function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
  }
 
  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
    } else {
      $hasil = trim(penyebut($nilai));
    }         
    return $hasil;
  }
 
        
          
?>
<!-- Fungsi Hasil terbilang dengan suara -->
<script type="text/javascript">
  function play (){
   responsiveVoice.speak(
    "<?php echo $hasil; ?>",
    "Indonesian Female",
   );
  }
</script>




<?php 
/*-----Hasil----*/
          echo '<div align=center>';
          echo  $angka1.' '.$operasi.' '.$angka2.' = '.$hasil;
          echo '<br>';
          echo '==========================================================';
          echo '<br>';
          echo terbilang($hasil);
          echo '<br>';
          echo '==========================================================';
          echo '<br>';
          echo '<input onclick="play();" type="button" value="🔊 Play" /></input>';
          echo '</div> ';
         }

 ?>
</body>
</html>