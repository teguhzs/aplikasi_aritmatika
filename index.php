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
 
function konversi($x){
  
  $x = abs($x);
  $angka = array ("","Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  $temp = "";
  
  if($x < 12){
   $temp = " ".$angka[$x];
  }else if($x<20){
   $temp = konversi($x - 10)." Belas";
  }else if ($x<100){
   $temp = konversi($x/10)." Puluh". konversi($x%10);
  }else if($x<200){
   $temp = " Seratus".konversi($x-100);
  }else if($x<1000){
   $temp = konversi($x/100)." Ratus".konversi($x%100);   
  }else if($x<2000){
   $temp = " Seribu".konversi($x-1000);
  }else if($x<1000000){
   $temp = konversi($x/1000)." Ribu".konversi($x%1000);   
  }else if($x<1000000000){
   $temp = konversi($x/1000000)." Juta".konversi($x%1000000);
  }else if($x<1000000000000){
   $temp = konversi($x/1000000000)." Milyar".konversi($x%1000000000);
  }
  
  return $temp;
 }
  
 function tkoma($x){
  $str = stristr($x,",");
  $ex = explode(',',$x);
  
  if(($ex[1]/10) >= 1){
   $a = abs($ex[1]);
  }
  $string = array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan",   "Sembilan","Sepuluh", "Sebelas");
  $temp = "";
 
  $a2 = $ex[1]/10;
  $pjg = strlen($str);
  $i =1;
    
  
  if($a>=1 && $a< 12){   
   $temp .= " ".$string[$a];
  }else if($a>12 && $a < 20){   
   $temp .= konversi($a - 10)." Belas";
  }else if ($a>20 && $a<100){   
   $temp .= konversi($a / 10)." Puluh". konversi($a % 10);
  }else{
   if($a2<1){
    
    while ($i<$pjg){     
     $char = substr($str,$i,1);     
     $i++;
     $temp .= " ".$string[$char];
    }
   }
  }  
  return $temp;
 }
 
 function terbilang($x){
  if($x<0){
   $hasil = "Minus ".trim(konversi(x));
  }else{
   $poin = trim(tkoma($x));
   $hasil = trim(konversi($x));
  }
  
if($poin){
   $hasil = $hasil." Koma ".$poin;
  }else{
   $hasil = $hasil;
  }
  return $hasil;  
 }
 
        
          
?>
<!-- Fungsi Hasil terbilang dengan suara -->
<script type="text/javascript">
  function play (){
   responsiveVoice.speak(
    "Hasil perhitungan <?php  echo  $angka1.' '.$op_terbilang.' '.$angka2.' Adalah '.number_format($hasil,'2',',',''); ?>",
    "Indonesian Female",
   );
  }
</script>




<?php 
/*-----Hasil----*/
          echo '<div align=center>';
          
          echo  $angka1.' '.$operasi.' '.$angka2.' = '.number_format($hasil,'2',',','');
          echo '<br>';
          echo '==========================================================';
          echo '<br>';
          echo 'Hasil Perhitungan ';
          echo terbilang($angka1);
          echo $op_terbilang;
          echo terbilang($angka2);
          echo " Adalah ";
          echo ucwords(terbilang(number_format($hasil,'2',',','')));

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