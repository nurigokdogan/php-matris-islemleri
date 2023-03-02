/*Soru 4: Dosyaları karakter, kelime veya satırların kümesi kabul edip, dosyalar üzerinde bileşim, kesişim ve fark küme işlemleri yapan programı yazınız.
 Bu soruda dosyaBirlesim($dosya1, $dosya2, $islemTuru), dosyaKesisim($dosya1, $dosya2, $islemTuru) ve dosyaFark($dosya1, $dosya2, $islemTuru) 
 fonksiyonlarını yazmanız gerekmektedir. $islemTuru parametresi 'karakter', 'kelime', yada 'satir' olabilir. 
 Küme işlemleri $islemTuru parametresine göre hesaplanmalıdır.

Örnek senaryo: 

Birinci dosya adi? a.txt
Ikinci dosya adi? b.txt
Kume islemi (0: cikis, 1: birlesim, 2: kesisim, 3: fark)? 1
Islem turu (1: karakter, 2: kelime, 3:  satir)? 2

a.txt dosyasi:
ali
kurt
ali
ayse
demir

b.txt dosyasi:
kemal
ayse
zeynep
kurt

a.txt kelime-birlesim b.txt:
ali
kurt
ayse
demir
kemal
zeynep

Kume islemi (0: cikis, 1: birlesim, 2: kesisim, 3: fark)? 1
Islem turu (1: karakter, 2: kelime, 3:  satir)? 1

a.txt karakter-birlesim b.txt:
alikurtysedmznp

Kume islemi (0: cikis, 1: birlesim, 2: kesisim, 3: fark)? 0
Hoscakal kullanici.*/

<?php
// klavyeden ogrenci nosu verilen ogrenciyi ogrenci.txt dosyasinda bulup kaydinı ekrana yazar

print "Birinci dosya adi??";
$bir = fgets(STDIN);
$bir = trim($bir);
$dosyabir = fopen($bir, "r");   //open and read the first file
print "Ikinci dosya adi?";
$iki = fgets(STDIN);
$iki = trim($iki);
$dosyaiki = fopen($iki, "r");//open and read the second  file

print"Kume islemi (0: cikis, 1: birlesim, 2: kesisim, 3: fark)? ";
$islem = (int)fgets(STDIN);

print"Islem turu (1: karakter, 2: kelime, 3:  satir)?";
$islemturu = (int)fgets(STDIN);

// print birinci dosyasi
print $bir."  dosyasi:\n";
while (!feof($dosyabir)) {    // dosya'nın sonuna vardık mı?
    $satir1 = trim(fgets($dosyabir));    // $dosya dosyasından 1 satır oku
    echo $satir1."\n";
}

// print ikinci dosyasi
print $iki."  dosyasi:\n";
while (!feof($dosyaiki)) {    // dosya'nın sonuna vardık mı?
    $satir2 = trim(fgets($dosyaiki));    // $dosya dosyasından 1 satır oku
    
    echo $satir2."\n";
}


// karater print alani
print $bir."karakter birlesimi:".$iki."\n";
print karakterbirlesim($satir1, $satir2);
print $bir." karakter kesisim:  ".$iki."\n";
print karakterkesisim($satir1, $satir2);
print $bir."karakter farki:".$iki."\n";
print karakterfark($satir1, $satir2);


 
// kelime print alani
print $bir."kelime-birlesimi:".$iki."\n";
print_r( kelimebirlesim($satir1, $satir2));
print $bir." kelime-kesisim:  ".$iki."\n";
print_r(kelimekesisim($satir1, $satir2));
print $bir."kelime-farki:".$iki."\n";
print_r(kelimefark($satir1, $satir2));


switch ($islem) {
    case 0:
        print "Hoscakal kullanici";
        exit;
    case 1:
        birlesim($satir1, $satir2, $islemturu);
        break;
    case 2:
        kesisim($satir1, $satir2, $islemturu);
        break;
    case 3:
        fark($satir1, $satir2, $islemturu);
        break;
}

function birlesim($string1, $string2, $islemturu)  //birlesim function

{
    switch ($islemturu) {
        case 1:
			karakterbirlesim($string1, $string2);
            break;
        case 2:
            kelimebirlesim($string1, $string2); 
            break;
        case 3:
            print 2.3;
            break;
    }
}

function karakterbirlesim($string1, $string2)
{ // karakter-birlesim function
    $sonuc = '';
    for ($i = 0; $i < strlen($string1); $i++)
        if (!icindemi($sonuc, $string1[$i]))
            $sonuc .= $string1[$i];
    for ($i = 0; $i < strlen($string2); $i++)
        if (!icindemi($sonuc, $string2[$i]))
            $sonuc .= $string2[$i];
    return $sonuc;
}

function kelimebirlesim($string1, $string2)
{ //kelime-birlesim function
    $sonuc = array();
    for ($i = 0; $i < sizeof($string1); $i++)
        if (!icindemi($sonuc, $string1[$i])) {
            $sonuc[] = $string1[$i];
            $sonuc[] = ' ';
        }
    for ($i = 0; $i < sizeof($string2); $i++)
        if (!icindemi($sonuc, $string2[$i])) {
            $sonuc[] = $string2[$i];
            $sonuc[] = ' ';
        }
    return $sonuc;
}

function kesisim($string1, $string2, $islemturu)   //kesisim function 

{
    switch ($islemturu) {
        case 1:
            karakterkesisim($string1, $string2);
            break;
        case 2:
            kelimekesisim($string1, $string2); 
            break;
        case 3:
            print 2.3;
            break;
	}
}

function karakterkesisim($string1, $string2)   //karakter kesisim function
    {
        $sonuc = array();
        $z = 0;
        for ($i = 0; $i < strlen($string1); $i++) {
            for ($j = 0; $j < strlen($string2); $j++) {
                if ($string1[$i] == $string2[$j] && !in_array($string1[$i], $sonuc)) {
                    $sonuc[$z] = $string1[$i];
                }
                $z++;
            }
        }
        return implode('', $sonuc);
    }

    function kelimekesisim($string1, $string2)   // kelime kesisim function
    {
        $sonuc = array();
        $z = 0;
        for ($i = 0; $i < sizeof($string1); $i++) {
            for ($j = 0; $j < sizeof($string2); $j++) {
                if ($string1[$i] == $string2[$j] && !in_array($string1[$i], $sonuc)) {
                    $sonuc[$z] = $string1[$i];
                }
                $z++;
            }
        }
        return $sonuc;
    }

function fark($string1, $string2, $islemturu)
{
    switch ($islemturu) {
        case 1:
            karakterfark($string1, $string2);
            break;
        case 2:
            kelimefark($string1, $string2);
            break;
        case 3:
            print 2.3;
            break;
    }
}

function karakterfark($string1, $string2)

{
    $sonuc = '';
    for ($i = 0; $i < strlen($string1); $i++) {
        if (!icindemi($string2, $string1[$i])) {
            $sonuc .= $string1[$i];
        }
    }
    return $sonuc;
}

function kelimefark($string1, $string2)

{
    $sonuc = array();
    for ($i = 0; $i < sizeof($string1); $i++) {
        if (!icindemi($string2, $string1[$i])) {
            $sonuc[] = $string1[$i];
        }
    }
    return $sonuc;
}
function icindemi($haystack, $needle)

{
    for ($i = 0; $i < sizeof($haystack); $i++)
        if ($haystack[$i] == $needle)
            return true;
    return false;
}
?>