/*Soru 2: ogrenci.txt dosyasını satır satır okuyup, bolum10.txt, bolum12.txt, ... gibi her bölümdekileri öğrencileri bolumBOLUNMO.txt 
şeklinde isimlendirilmiş ayrı ayrı dosyalara yazan yani bu bolumXX.txt dosyalarını oluşturan programı veriniz. Bölüm sayısı önceden bilinmemektedir. 
ogrenci.txt dosyasının her satırının son sutununda bolum numaraları mevcuttur. O numaralara gore dosyalar oluşturulacaktır. 
Bir dosya oluşturmak için $d = fpopen('dosyaadi', 'w'); gibi fopen komutunu kullanabilirsiniz. 'w' parameteresi dosyayı eğer yoksa oluşturup, 
için write etmek için açan parametredir. İpucu: $d gibi dosya değişkenlerini bir array içinde tutabilirsiniz. 
Eğer o isimde bolumXX.txt gibi bir dosya zaten açıldıysa, fopen yapmayıp sadece içine veriyi fputs ile yazmak yeterli olacaktır. 
fputs komutu fgets komutunun tersini yapar. Yani dosyadan bir satır okumak yerine dosyaya bir satır ekler. */

<?php
// Bir dosyada her satırda öğrenci no, adi, soyadı, bölüm-no'su bulunmaktadır. Bu dosyayı satır satır okuyup ekrana bir tablo şeklinde yazdıran programı yazınız
$i = 0;
$dosya = fopen("ogrenci.txt", "r");	// dosyayı okumak için ac
while(! feof($dosya)){	// dosya'nın sonuna vardık mı?
	$i++;
	$satir = fgets($dosya);	// $dosya dosyasından 1 satır oku
    $veri = explode(" ", $satir); // array olarak dondurur
    $ogrno = $veri[0];
    $adi = $veri[1];
    $soyadi = $veri[2];
    $bolumno = $veri[3];
    echo "$ogrno $soyadi $adi $bolumno\n";
  //  echo $i." satir: ".$satir;			// satırı ekrana yazdır


$length = count($bolumno);
for($i = 0;$i< $length ;$i++){
$dosya1 = fopen("bolum".$bolumno[$i].".txt", "w"); 	
fputs($dosya1,"$veri[$i]");


}
fclose($dosya1);
}
    
fclose($dosya);
?>