<?php

********************************************************************************************************************
//--veritabanı bağlantısı
try {
     $db = new PDO("mysql:host=localhost;dbname=veritabaniAdi;charset=utf8", "kullaniciAdi", "sifre");
} catch ( PDOException $e ){
     print $e->getMessage();
}

********************************************************************************************************************
//--veritabanına veri eklme
$query = $db->prepare('sql sorgusu');
$query->execute(array('veriler'));

if($query->rowCount() > 0)
{
     //--sorgunun sonucu olumlu ise
}
else
{
     //--sorgunun sonucu olumsuz ise
}

********************************************************************************************************************
//--veritabanındaki veriyi güncelleme
$query = $db->prepare('sql sorgusu');
$query->execute(array('veriler'));

if($query->rowCount() > 0)
{
     //--sorgunun sonucu olumlu ise
}
else
{
     //--sorgunun sonucu olumsuz ise
}

********************************************************************************************************************
//--veritabanındaki veriyi silme
$query = $db->prepare('sql sorgusu');
$query->execute(array('veriler'));

if($query->rowCount() > 0)
{
     //--sorgunun sonucu olumlu ise
}
else
{
     //--sorgunun sonucu olumsuz ise
}

********************************************************************************************************************
//--veritabanındaki verileri ekrana yazma (tekli)
$query = $db->prepare('sql sorgusu');
$query->execute(array('veriler'));
$blg = $query->fetch(PDO::FETCH_ASSOC);

if($query->rowCount() > 0)
{
     //--sorgunun sonucu olumlu ise
	echo $blg['değeri istenen sütunun adı'];
}
else
{
     //--sorgunun sonucu olumsuz ise
}

********************************************************************************************************************
//--veritabanındaki verileri ekrana yazma (çoklu)
$query = $db->prepare('sql sorgusu');
$query->execute(array('veriler'));

if($query->rowCount() > 0)
{
     //--sorgunun sonucu olumlu ise
     while($row = $query->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['değeri istenen sütunun adı'];
     	}
}
else
{
     //--sorgunun sonucu olumsuz ise
}

********************************************************************************************************************
//--veritabanı bağlantısını sonlandırma
$db = null;
?>
