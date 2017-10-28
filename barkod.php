<?php
// İçerik türünü belirtelim
header('Content-type: image/png');

// Resmi boş olarak oluşturalım
$resim = imagecreatetruecolor(400, 90);

// Renkleri tanımlayalım
$beyaz = imagecolorallocate($resim, 255, 255, 255);
$gri = imagecolorallocate($resim, 128, 128, 128);
$siyah = imagecolorallocate($resim, 0, 0, 0);
imagefilledrectangle($resim, 0, 0, 599, 99, $beyaz);
imagefill( $image, 0, 0, $white );
// Metni tanımlayalım
$metin = (isset($_GET["barkod"])?$_GET["barkod"]:"0");
$tasinir = (isset($_GET["tasinirkodu"])?$_GET["tasinirkodu"]:"0");
// Buraya kendi dosya yolunuzu yazın
$font = 'free3of9.ttf';

$font2 = 'FreeSansBold.ttf';

// Metne gölge verelim
//imagettftext($resim, 10, 0, 31, 41, $gri, $font2, $metin);
//Başlık ekleyelim
$baslik = 'Ezine Devlet Hastanesi';
imagettftext($resim, 10, 0, 10, 20, $siyah, $font2, $baslik);

// Metni ekleyelim
imagettftext($resim, 40, 0, 10, 62, $siyah, $font, $metin);

imagettftext($resim, 10, 0, 10, 73, $siyah, $font2, 'Barkod:'. $metin);

imagettftext($resim, 10, 0, 10, 84, $siyah, $font2, 'Taşınır Kodu:'. $tasinir);

// imagejpeg()'ye göre daha temiz sonuç veren imagepng()'yi kullanalım
imagepng($resim);
imagedestroy($resim);
?> 
