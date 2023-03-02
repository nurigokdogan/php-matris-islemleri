/*Soru 5: ogrenci.txt dosyasına yeni kayıt ekleyen, var olan bir kaydı dosyadan silen, bir öğrencinin adı ve bölümünü güncelleyen(değiştiren), 
öğrenciyi numarsıyla sorgulayan ve orgencileri listeleyen programı yazınız. Programda söyle bir kod kullanınız ve gerisini siz tamamlayınız:

print "Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? ";
$islem = (int) fgets(STDIN);
switch($islem){
	case 0:	print "Hoscakalin!";
			exit;
	case 1:	kayitEkle();
			break;
	case 2:	kayitSil();
			break;
	case 3: kayitGuncelle();
			break;
	case 4:	kayitListele();
			break;
	case 4:	kayitsorgula();
			break;
}

Örnek senaryo:

Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? 4

Kayit listeleme:
----------------
12 Ali KURT 10
13 Ayse KURT 12
15 Metin KURT 10
16 Mahmut KURT 12

Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? 2
Silinecek ogrenci no? 14

Kayit bulunamadı!

Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? 2
Silinecek ogrenci no? 15

Kayit silindi!

Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? 1

Yeni ogrenci no? 18
Yeni ogrenci adi? Mithat KURT
Yeni ogrenci bolumu? 13

[18, Mithat KURT, 13] kaydı dosyaya eklendi!

Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? 3

Degistirilecek kayit için ogrenci no? 13
Kayıt bulundu: [13, Ayse KURT, 12]
Yeni ogrenci adi? Aysenur KURT
Yeni ogrenci bolumu? 10

Kayıt değiştirildi: [13, Aysenur KURT, 10]

Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? 5

Ogrenci no? 19
Kayit bulunamadı!

Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? 5

Ogrenci no? 18
Kayit bulundu: [18, Mithat KURT, 13]
*/


<?php
print "Yapilacak islem (0:cikis, 1:kayit ekle, 2:kayit sil, 3:kayit degistir, 4:kayit listele, 5:kayit sorgula)? ";
$islem = (int)fgets(STDIN);
switch ($islem) {
    case 0:
        print "Hoscakalin!";
        exit;
    case 1:
        kayitEkle();
        break;
    case 2:
        kayitSil();
        break;
    case 3:
        kayitGuncelle();
        break;
    case 4:
        kayitListele();
        break;
    case 5:
        kayitsorgula();
        break;
}

function kayitEkle()
{

    print "Yeni ogrenci no?";
    $ogrno = (int)fgets(STDIN);
    print "Yeni ogrenci adi?";
    $adi = trim(fgets(STDIN));
    print "Yeni ogrenci bolumu?";
    $bolumno = (int)fgets(STDIN);
$dosya = fopen("ogrenci.txt","a");
fputs($dosya, "$ogrno $adi $bolumno\n");
    fclose($dosya);
}


function kayitGuncelle()
{
    print "Ogrenci no?";
    $no = trim(fgets(STDIN));
    print "Yeni ogrenci adi? ";
    $yeniadi = trim(fgets(STDIN));
    print "Yeni ogrenci bolumu?";
    $yenibolum = trim(fgets(STDIN)); 
    $dosya = fopen("ogrenci.txt", "r");    // dosyayı okumak için ac
    $cikti = fopen("temp.txt", "w");    // dosyayı okumak için ac
    while (!feof($dosya)) {    // dosya'nın sonuna vardık mı?
        $satir = fgets($dosya);    // $dosya dosyasından 1 satır oku
        $veri = explode(' ', $satir); // array olarak dondurur
        $ogrno = $veri[0];
        $adi = $veri[1];
        $soyadi = $veri[2];
        $bolumno = $veri[3];
        if ($ogrno == $no) {
fputs($cikti, "$ogrno $yeniadi $yenibolum\n");
break;
}else
fputs($cikti, $satir);
}
fclose($dosya);
unlink("ogrenci.txt"); // dosya sil
fclose($cikti);
rename("temp.txt", "ogrenci.txt");
}

function kayitSil()
{
    // ogrenci.txt den numarası verilen ogrenciyi silen program
    print "Ogrenci no?";
    $no = trim(fgets(STDIN));
    $f1 = fopen('ogrenci.txt', 'r');
    $f2 = fopen('temp.txt', 'w');
    while (!feof($f1)) {
        $satir = fgets($f1);
        $words = explode(" ", $satir);
        if ($words[0] != $no) { // aranan degilse
            fputs($f2, $satir);
        } else
            print"Kayit bulunamadı!";
    }
    fclose($f1);
    unlink("ogrenci.txt"); // dosya sil
    fclose($f2);
    rename("temp.txt", "ogrenci.txt"); // isim degistirme
}

function kayitListele()
{
   
    $dosya = fopen("ogrenci.txt", "r");    // dosyayı okumak için ac
    while (!feof($dosya)) {    // dosya'nın sonuna vardık mı?
        $satir = fgets($dosya);    // $dosya dosyasından 1 satır oku
        $veri = explode(" ", $satir); // array olarak dondurur
        $ogrno = $veri[0];
        $adi = $veri[1];
        $soyadi = $veri[2];
        $bolumno = $veri[3];
        echo "$ogrno $adi $soyadi $bolumno\n";
    }
    fclose($dosya);
}


function kayitsorgula()
{
    print "ogrenci no? ";
    $no = fgets(STDIN);
    $no = trim($no);
    $dosya = fopen("ogrenci.txt", "r");    // dosyayı okumak için ac
    while (!feof($dosya)) {    // dosya'nın sonuna vardık mı?
        $satir = fgets($dosya);    // $dosya dosyasından 1 satır oku
        $veri = explode(' ', $satir); // array olarak dondurur
        $ogrno = $veri[0];
        $adi = $veri[1];
        $soyadi = $veri[2];
        $bolumno = $veri[3];
        if ($ogrno == $no) {
            print "[$ogrno, $adi $soyadi, $bolumno]";
        } 
    }
    fclose($dosya);
}


?>