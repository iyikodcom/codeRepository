<?php

**************************************************************************************************************************
//--veri kaydetmek için kullanılan örnek sql sorgusu
INSERT INTO musteri(ad, soyad, dtarih, sehir, cinsiyet, puan) VALUES ('Ali','Şahin','2000-10-12','Burdur','E',68)
  
**************************************************************************************************************************
//--veri silmek için kullanılan örnek sql sorgusu
DELETE FROM musteriler WHERE musterino = 4
  
**************************************************************************************************************************
//--veri güncelleme için kullanılan örnek sql sorgusu
UPDATE musteriler SET puan = 90 WHERE musterino = 3
 
**************************************************************************************************************************
//--ekrana tablodaki verileri yazdırmak için kullanılan örnek sql sorgusu
SELECT * FROM musteri WHERE cinsiyet='K'

?>
