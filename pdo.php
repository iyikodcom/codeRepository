<?php

//--veritabanı bağlantısı
try {
     $db = new PDO("mysql:host=localhost;dbname=veritabaniAdi;charset=utf8", "kullaniciAdi", "sifre");
} catch ( PDOException $e ){
     print $e->getMessage();
}

//--veritabanına veri eklme
$insert = $db->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
$insert->execute(array('veri1','veri2'));

//--veritabanındaki veriyi güncelleme

//--veritabanındaki veriyi silme

//--veritabanındaki verileri ekrana basma

//--veritabanı bağlantısını sonlandırma
$db = null;
?>
