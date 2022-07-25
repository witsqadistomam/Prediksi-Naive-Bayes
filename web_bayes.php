<?php
require_once 'autoload.php';

$obj = new Bayes();

// echo $obj->sumData()."<br>";
// echo $obj->sumTrue()."<br>";
// echo $obj->sumFalse()."<br>";
// echo $obj->probUmur(21,0)."<br>";

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = 20;
$a2 = "tk";
$a3 = "amt";
$a4 = "sehat";
$a5 = "bg";

//TRUE
$umur = $obj->probUmur($a1,1);
$role = $obj->probRole($a2,1);
$it = $obj->probItem($a3,1);
$kesehatan = $obj->probKesehatan($a4,1);
$skill = $obj->probSkill($a5,1);

//FALSE
$umur2 = $obj->probUmur($a1,0);
$role2 = $obj->probRole($a2,0);
$it2 = $obj->probItem($a3,0);
$kesehatan2 = $obj->probKesehatan($a4,0);
$skill2 = $obj->probSkill($a5,0);

//result
$paT = $obj->hasilTrue($jumTrue,$jumData,$umur,$role,$it,$kesehatan,$skill);
$paF = $obj->hasilFalse($jumTrue,$jumData,$umur2,$role2,$it2,$kesehatan2,$skill2);

echo "
======================================<br>
umur : $a1<br>
role : $a2<br>
item : $a3<br>
kesehatan : $a4<br>
skill : $a5<br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan true : <br>
jumlah true : $jumTrue <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan false : <br>
jumlah false : $jumFalse <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
pATrue : $jumTrue / $jumData<br>
umur true : $umur / $jumTrue <br>
role true : $role / $jumTrue <br>
item true : $it / $jumTrue <br>
kesehatan true : $kesehatan / $jumTrue <br>
skill true : $skill / $jumTrue <br><br>
=======================================<br><br>
";

echo "
======================================<br>
pAFalse : $jumFalse / $jumData<br>
umur false : $umur2 / $jumFalse <br>
role false : $role2 / $jumFalse <br>
item false : $it2 / $jumFalse <br>
kesehatan false : $kesehatan2 / $jumFalse <br>
skill false : $skill2 / $jumFalse <br>
=======================================<br><br>
";

echo "
======================================<br>
PREDIKSI yes : $paT<br>
PREDIKSI no : $paF<br>
=======================================<br><br>
";

if($paT > $paF){
  echo "
  ======================================<br>
  PREDIKSI YES LEBIH BESAR DARI PADA PREDIKSI NO<br>
  =======================================
  <br><br>";
}else if($paF > $paT){
  echo "
  ======================================<br>
  PREDIKSI NO LEBIH BESAR DARI PADA PREDIKSI YES<br>
  =======================================
  <br><br>";
}

// echo $obj->hasilTrue($jumTrue,$jumData,$umur,$role,$it,$kesehatan,$skill)."<br>";
// echo $obj->hasilFalse($jumTrue,$jumData,$umur2,$role2,$it2,$kesehatan2,$skill2)."<br><br>";

$result = $obj->perbandingan($paT,$paF);
echo " Status : $result[0] <br>PREDIKSI Menang dalam bermain sebesar : ".round($result[1],2)." % <br>PREDIKSI Kalah dalam bermain sebesar : ".round($result[2],2)." % ";
 ?>
