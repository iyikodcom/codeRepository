# 🔹 PHP `implode()` ve `explode()` Örnekleri

PHP'de **`implode()`** ve **`explode()`** fonksiyonları diziler ve stringler arasında dönüşüm yapmak için kullanılır.

---

## 1️⃣ implode() – Dizi → String

`implode()` bir diziyi belirli bir ayraç ile birleştirerek string hâline getirir.

```php
$meyveler = ['Elma', 'Armut', 'Muz'];
$sonuc = implode(', ', $meyveler);

echo $sonuc; // Çıktı: Elma, Armut, Muz
```

##2️⃣ explode() – String → Dizi

`explode()` bir stringi belirli bir ayraçtan bölerek dizi hâline getirir.
```php
$renkler = "kirmizi,mavi,yesil";
$dizi = explode(',', $renkler);

print_r($dizi);
/* Çıktı:
Array
(
    [0] => kirmizi
    [1] => mavi
    [2] => yesil
)
*/
```
**Not:** Ayraç stringde kaç kez geçerse dizi o kadar parçaya bölünür.

##3️⃣ Kombinasyon Örneği
```php
$hayvanlar = ['Kedi', 'Köpek', 'Kuş'];

// Dizi → String
$hayvanStr = implode(' | ', $hayvanlar);
echo $hayvanStr; // Kedi | Köpek | Kuş

// String → Dizi
$hayvanDizi = explode(' | ', $hayvanStr);
print_r($hayvanDizi);
/* Çıktı:
Array
(
    [0] => Kedi
    [1] => Köpek
    [2] => Kuş
)
*/
```
