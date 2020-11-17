<?php
//--php'de bulunan hazır fonksiyonlardan explode() fonksiyonunun kullanımı ile ilgili örnek kodlar;

$string = 'İstanbul,Ankara,İzmir';
$explode = explode(',', $string);
print_r($explode);

//--result: Array( [0] => İstanbul [1] => Ankara [2] => İzmir ) -- (array)
?>
