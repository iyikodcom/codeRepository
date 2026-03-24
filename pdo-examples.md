# 🐘 PHP PDO Örnekleri
Bu doküman, PHP'de PDO kullanarak **veritabanı bağlantısı, veri ekleme, güncelleme, silme ve çekme** işlemlerinin temel kullanımını örneklerle açıklar.  

---

## 🔌 Veritabanı Bağlantısı
PDO ile MySQL bağlantısı oluşturma ve hata yönetimi:
```php
try {
    $db = new PDO("mysql:host=localhost;dbname=veritabaniAdi;charset=utf8", "kullaniciAdi", "sifre");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
```
##➕ Veritabanına Veri Ekleme (INSERT)
```php
$query = $db->prepare("INSERT INTO tabloAdi (sutun1, sutun2) VALUES (?, ?)");
$query->execute(['deger1', 'deger2']);

if ($query->rowCount() > 0) {
    echo "Kayıt başarıyla eklendi!";
} else {
    echo "Kayıt eklenemedi.";
}
```
##✏️ Veri Güncelleme (UPDATE)
```php
$query = $db->prepare("UPDATE tabloAdi SET sutun1 = ? WHERE id = ?");
$query->execute(['yeniDeger', 1]);

if ($query->rowCount() > 0) {
    echo "Güncelleme başarılı!";
} else {
    echo "Güncelleme yapılmadı.";
}
```
##❌ Veri Silme (DELETE)
```php
$query = $db->prepare("DELETE FROM tabloAdi WHERE id = ?");
$query->execute([1]);

if ($query->rowCount() > 0) {
    echo "Silme başarılı!";
} else {
    echo "Silme yapılmadı.";
}
```
##🔍 Tek Kayıt Çekme (FETCH)
```php
$query = $db->prepare("SELECT sutun1 FROM tabloAdi WHERE id = ?");
$query->execute([1]);
$blg = $query->fetch(PDO::FETCH_ASSOC);

if ($blg) {
    echo $blg['sutun1'];
} else {
    echo "Veri bulunamadı.";
}
```
##📋 Çoklu Kayıt Çekme (FETCH ALL)
```php
$query = $db->prepare("SELECT sutun1 FROM tabloAdi");
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

if ($rows) {
    foreach ($rows as $row) {
        echo $row['sutun1'] . "<br>";
    }
} else {
    echo "Veri yok.";
}
```
##🆔 7. Son Eklenen ID'yi Alma
```php
$query = $db->prepare("INSERT INTO tabloAdi (sutun1) VALUES (?)");
$query->execute(['deger']);
$lastInsertID = $db->lastInsertId();
echo "Son eklenen ID: " . $lastInsertID;
```
##🔚 8. Veritabanı Bağlantısını Kapatma
```php
$db = null;
```
