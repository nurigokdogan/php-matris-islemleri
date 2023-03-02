/*Soru 3: ogrenci.txt dosyasını satır satır okuyup, öğrenci numarasına göre sıralı ogrenciNoSiraliOgrenci.txt, bolumNoSiraliOgrenci, soyadSiraliOgrenci.txt 
dosyalarını oluşturan programı veriniz. Bu dosyalardaki kayıtlar öğrenci numarası, bölüm no ve soyada göre sıralanmış kayıtları içerecektir. 
Yani ogrenci.txt dosyasi 'r' fgets okunacak, diğer dosyalar ise 'w' fputs ile yazılacak*/



<?php
// Bir dosyada her satırda öğrenci no, adi, soyadı, bölüm-no'su bulunmaktadır. Bu dosyayı satır satır okuyup ekrana bir tablo şeklinde yazdıran programı yazınız
$i = 0;
$dosya = fopen("ogrenci.txt", "r");	// dosyayı okumak için ac
$veriler = [];
$nosira = fopen("ogrenciNoSiraliOgrenci.txt", "w"); 
$bolumsira = fopen("bolumNoSiraliOgrenci.txt", "w"); 
$soyadsira = fopen("soyadSiraliOgrenci.txt", "w"); 
while(! feof($dosya)){	// dosya'nın sonuna vardık mı?
    $satir = trim(fgets($dosya));	// $dosya dosyasından 1 satır oku
    $veri = explode(" ", $satir); // array olarak dondurur
    $veriler[] = ['ogrno' =>  $veri[0], 'ad' =>  $veri[1], 'soyad' =>  $veri[2], 'bolumno' =>  $veri[3]] ;
    

 $string = implode(array_sort($veriler,'ogrno', SORT_ASC));
 $string1 = implode(array_sort($veriler,'bolumno', SORT_ASC));
 $string2 = implode(array_sort($veriler,'soyad', SORT_ASC));
 fputs($nosira, $string);
 fputs($bolumsira, $string1);
 fputs($soyadsira, $string2);
}

print_r(array_sort($veriler,'ad', SORT_DESC));
fclose($nosira);
fclose($bolumsira);
fclose($soyadsira);
fclose($dosya);


function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }
    return $new_array;
}


?>