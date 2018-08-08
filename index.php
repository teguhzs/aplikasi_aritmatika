<!DOCTYPE html>
<html>
<head>
 <title>Aplikasi Aritmatika Penambahan, Pengurangan, Perkalian Dan Pembagian</title>
 <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <?PHP
        error_reporting(0);

        echo '<h1 align="center">Kalkulator</h1>';


         if(!$_POST['aksi'])
         {      
         /*-----Menampilkan Form Pengisian----*/
          echo '
          <div class="container" >
         <form class="" method="post" action="'.$_SERVER['PHP_SELF'].'">
         <div align="center">
         <label>Masukkan bilangan pertama</label>
          <input type="number" class="form-control" name="angka1" size="" required>
          <br>
          <select class="form-control" name="aksi">
           <option value="tambah"> + </option>
           <option value="kurang"> - </option>
           <option value="bagi"> / </option>
           <option value="kali"> * </option>
          </select>
          <br>
          <label>Masukkan bilangan kedua</label>
          <input type="number" class="form-control" name="angka2" size="5" required>
          <br>
          <input type="submit" class="btn btn-success" name="hitung" value="hitung">
          </div>
         </form>
         </div>
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
           $op_terbilang = ' Ditambah '; 
          }
          if($_POST['aksi'] == 'kurang')
          {
           $hasil = $angka1 - $angka2;
           $operasi = '-';
           $op_terbilang = ' Dikurang '; 

          }
          if($_POST['aksi'] == 'bagi')
          {
           $hasil = $angka1 / $angka2;
           $operasi = '/';
           $op_terbilang = ' Dibagi '; 

          }
          if($_POST['aksi'] == 'kali')
          {
           $hasil = $angka1 * $angka2;
           $operasi = 'X';
           $op_terbilang = ' Dikali '; 

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
    "Hasil perhitungan <?php  echo  $angka1.' '.$op_terbilang.' '.$angka2.' = '.$hasil; ?>",
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
          echo 'Hasil Perhitungan ';
          echo terbilang($angka1);
          echo $op_terbilang;
          echo terbilang($angka2);
          echo " = ";
          echo terbilang($hasil);

          echo '<br>';
          echo '==========================================================';
          echo '<br>';
          echo '<input onclick="play();" type="button" value="🔊 Play" /></input>';
          echo '<br>';
          echo '<a href="">Kembali</a>';
          echo '</div> ';
         }

 ?>
</body>
</html>