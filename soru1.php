/*Soru 1 (matris.php)
-----------------------------------------------------------
Matris işlemlerini hesaplayan bir program yazınız:
- Matrisi satır satır okuyan bir fonksiyon yazınız
- 2 matrisi çarpımını döndüren bir fonksiyon yazınız
- 2 matrisi toplamını döndüren bir fonksiyon yazınız
- 2 matrisin farkını döndüren bir fonksiyon yazınız
- 1. matrisin discriminantını döndüren bir fonksiyon yazınız
- 1. matrisin transpose'ını (satırlarla sutunları yer değiştiren) döndüren bir fonksiyon yazınız

Örnek Senaryo (dikkat sayılar gerçek değerler değildir.)

Matrislerin satır sayısını giriniz? 2
Matrislerin sutun sayısını giriniz? 3

1. Matrisin 1,1 elemanını giriniz? 20
1. Matrisin 1,2 elemanını giriniz? 21
1. Matrisin 1,3 elemanını giriniz? 33
1. Matrisin 2,1 elemanını giriniz? 44
1. Matrisin 2,2 elemanını giriniz? 23
1. Matrisin 2,3 elemanını giriniz? 54

2. Matrisin 1,1 elemanını giriniz? 10
2. Matrisin 1,2 elemanını giriniz? 11
2. Matrisin 1,3 elemanını giriniz? 13
2. Matrisin 2,1 elemanını giriniz? 54
2. Matrisin 2,2 elemanını giriniz? 53
2. Matrisin 2,3 elemanını giriniz? 74

Matris çarpımı:
12 32 65
32 54 25

Matris toplamı
34 65 99
34 45 63 

Matris farkı
12 29 19
34 25 13

Matris transpose
12 29
34 25
23 45

Discriminant: 34.54   
*/


<?php 
print "Matrislerin satır sayısını giriniz?";
$n = (int)fgets(STDIN);
print "Matrislerin sutun sayısını giriniz?";
$m = (int)fgets(STDIN);
print "1. Matris için\n";
$matris1 = matrisOku($n, $m);
print "2. Matris için\n";
$matris2 = matrisOku($n, $m);


$toplam = matrisToplami($matris1, $matris2, $n, $m);
$carpmi = matriscarpmi($matris1, $matris2, $n, $m);
$farki = matrisfarki($matris1, $matris2, $n, $m);

print" Matris transpose :\n";
 
print_r(transpose($matris1));


print "1.Matris \n";
matrisYaz($matris1);
print "2.Matris \n";
matrisYaz($matris2);

print"Matris Carpımı:\n";
matrisYaz($carpmi);

print"Matris Toplam :\n";
matrisYaz($toplam);

print"Matris farki :\n";
matrisYaz($farki);

function matrisYaz($matris){

	for($i = 0; $i < count($matris); $i++){
		for($j = 0; $j < count($matris[$i]); $j++){
			print "{$matris[$i][$j]} ";
		}
		print "\n";
	}
}

function matrisOku($satirSayisi, $sutunSayisi)

{

	$a = array();
	for($i = 0; $i < $satirSayisi; $i++){
		for($j = 0; $j < $sutunSayisi; $j++){
			print "Matrisin ".($i+1).", ".($j+1).". degerini veriniz? ";
			$a[$i][$j] = (int)fgets(STDIN);
		}
	}
	return $a;
}

function matrisToplami($matris1, $matris2, $n, $m)

{
    $sonuc = array();
    for ($i=0; $i < $n; $i++){
        for($j=0; $j < $m; $j++){
            $sonuc[$i][$j] = $matris1[$i][$j] + $matris2[$i][$j];
        }
    }
return $sonuc;
}

function matriscarpmi($matris1, $matris2, $n, $m)

{
    $sonuc = array();
    for ($i=0; $i < $n; $i++){
        for($j=0; $j < $m; $j++){
            $sonuc[$i][$j] = $matris1[$i][$j] * $matris2[$i][$j];
        }
    }
return $sonuc;
}


function matrisfarki($matris1, $matris2, $n, $m)

{
    $sonuc = array();
    for ($i=0; $i < $n; $i++){
        for($j=0; $j < $m; $j++){
            $sonuc[$i][$j] = $matris1[$i][$j] - $matris2[$i][$j];
        }
    }
return $sonuc;
}

// Matris transpose
function transpose($matris1){
   
    $sonuc = [];
    $keys   = array_keys($matris1);
    foreach($matris1[$keys[0]] as $index => $temp) {
        $data = [];
        foreach($keys as $i => $key) {
            $data[$key] = $matris1[$key][$index];
        }
        $sonuc[] = $data;
    }
   return $sonuc;

}
 
function determ($matris1, $n, $m){
    $d = 0;
    $temp[0][0];
    $sign =1 ;
    for($i = 0;$i < $n ;$i++){

    }
    $determinant = ($matris1[0][0] * $matris1[1][1]) - ($matris1[0][1] * $matris1[1][0]);
  
echo $determinant;
  
}

determ($matris1);

?>


