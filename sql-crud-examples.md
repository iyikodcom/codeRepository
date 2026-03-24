# 🗄️ SQL Örnekleri – Temel CRUD İşlemleri

Bu doküman, temel SQL işlemlerini (ekleme, silme, güncelleme ve veri çekme) örneklerle açıklar.

---

## ➕ 1. Veri Kaydetme (INSERT)
```php
INSERT INTO musteri(ad, soyad, dtarih, sehir, cinsiyet, puan)  VALUES ('Ali', 'Şahin', '2000-10-12', 'Burdur', 'E', 68);
```

## ❌ 2. Veri Silme (DELETE)
```php
DELETE FROM musteriler WHERE musterino = 4;
```
musterino değeri **4** olan kayıt tablodan silinir.

## ✏️ 3. Veri Güncelleme (UPDATE)
```php
UPDATE musteriler SET puan = 90 WHERE musterino = 3;
```
musterino değeri **3** olan kaydın puan sütunu **90** olarak güncellenir.

## 🔍 4. Veri Çekme (SELECT)
```php
SELECT * FROM musteri WHERE cinsiyet = 'K';
```
cinsiyet değeri **K** olan tüm kayıtlar tabloya yazdırılır.
