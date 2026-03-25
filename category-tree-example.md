# 📘 PHP Kategori Ağaç Yapısı (Tree Structure)
## 1. 🗄️ Veritabanı Yapısı
Tek tablo üzerinden kategori hiyerarşisi kurulmuştur.

| id | name | parent_id |
| :------------: | :------------: | :------------: |
| 1 | Yok | 0 |
| 4 | Kategori1 | 1 |
| 5 | Kategori2 | 1 |

📌 **Açıklama**

- `id` : kategori ID
- `name` : kategori adı
- `parent_id` : üst kategori ID (0 = root)

## 2. ⚙️ Veritabanı Bağlantısı

```php
$data['host'] = 'localhost';
$data['dbname'] = 'veritabanı adı';
$data['uName'] = 'root';
$data['uPass'] = '';

try {
    $db = new PDO(
        "mysql:host=".$data['host'].";dbname=".$data['dbname'].";charset=utf8",
        $data['uName'],
        $data['uPass']
    );
} catch(PDOException $e) {
    print $e->getMessage();
}
```
📌 **Açıklama** : PDO kullanılarak MySQL veritabanına bağlantı sağlanır.

## 3. 📥 Kategorileri Diziye Aktarma

```php
function getCategories(PDO $db): array
{
    $stmt = $db->prepare("
        SELECT id, name, parent_id 
        FROM categories 
        ORDER BY name ASC
    ");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```

📌 **Açıklama** : Veritabanındaki tüm kategorileri alıp düz (flat) bir diziye çevirir.

## 4. 🌳 Kategori Ağacı Oluşturma

```php
function buildCategoryTree(array $items, int $root = 0): array
{
    $tree = [];
    $indexed = [];

    // ID bazlı indexleme
    foreach ($items as $item) {
        $item['items'] = [];
        $indexed[$item['id']] = $item;
    }

    // Tree oluşturma
    foreach ($indexed as $id => &$node) {
        if ($node['parent_id'] == $root) {
            $tree[] = &$node;
        } else {
            if (isset($indexed[$node['parent_id']])) {
                $indexed[$node['parent_id']]['items'][] = &$node;
            }
        }
    }

    return $tree;
}
```

📌 **Açıklama**
- Flat diziyi tree (ağaç) yapısına dönüştürür
- Her kategoriye childs alanı eklenir

## 5. 🔽 Select İçin HTML Üretme

```php
function buildSelectOptions(array $tree, int $depth = 0, array $selected = []): string
{
    $html = '';

    foreach ($tree as $node) {
        $isSelected = in_array($node['id'], $selected) ? 'selected' : '';

        $html .= '<option value="'.$node['id'].'" '.$isSelected.'>';
        $html .= str_repeat('--', $depth) . $node['name'];
        $html .= '</option>' . PHP_EOL;

        if (!empty($node['items'])) {
            $html .= buildSelectOptions($node['items'], $depth + 1, $selected);
        }
    }

    return $html;
}
```

📌 **Açıklama** : Kategori ağacını `<select>` içinde hiyerarşik şekilde gösterir.

## 6. 📊 Table İçin HTML Üretme

```php
function buildTableRows(array $tree, int $depth = 0): string
{
    $html = '';

    foreach ($tree as $node) {

        if ($node['id'] != 1) {
            $html .= '<tr>';
            $html .= '<td>'.$node['id'].'</td>';
            $html .= '<td>'.str_repeat('--', $depth).$node['name'].'</td>';
            $html .= '</tr>' . PHP_EOL;
        }

        if (!empty($node['items'])) {
            $html .= buildTableRows($node['items'], $depth + 1);
        }
    }

    return $html;
}
```

📌 **Açıklama** : Kategori ağacını tablo formatında listeler.

## 7. 🔎 Alt Kategorileri Getirme

```php
function getAllChildCategories(array $items, int $parentId): array
{
    $result = [];

    foreach ($items as $item) {
        if ($item['parent_id'] == $parentId) {
            $result[] = $item;

            $result = array_merge(
                $result,
                getAllChildCategories($items, $item['id'])
            );
        }
    }

    return $result;
}
```

📌 **Açıklama** : Seçilen kategorinin tüm alt kategorilerini recursive olarak getirir.

## 8. 🆔 Alt Kategori ID’lerini Alma

```php
function getCategoryIds(array $categories): array
{
    return array_column($categories, 'id');
}
```

📌 **Açıklama** : Alt kategorilerin sadece ID’lerini içeren bir dizi üretir.

## 9.📘 Kategori Fonksiyonları – Örnek Kullanım

### a. 🔧 Fonksiyonlar (Özet)
- `getCategories($db)` : Veritabanından kategorileri getirir.
- `buildCategoryTree($items, $root = 0)` : Flat diziyi tree yapısına dönüştürür.
- `buildSelectOptions($tree, $depth = 0, $selected = [])` : `<select>` için HTML üretir.
- `buildTableRows($tree, $depth = 0)` : `<table>` için HTML üretir.
- `getAllChildCategories($items, $parentId)` : Belirtilen kategori altındaki tüm alt kategorileri getirir.
- `getCategoryIds($categories)` : Kategorilerin sadece ID’lerini döndürür.

### b. 📥 Kategorileri Alıp Tree Oluşturma
```php
// Veritabanından tüm kategoriler
$cats = getCategories($db);

// Tree yapısına dönüştür
$tree  = buildCategoryTree($cats);
```

### c. 🔽 Select Listesi Oluşturma
```php
// Örneğin önceden seçilmiş kategoriler
$selected = [4,5];
echo '<select name="category">';
echo buildSelectOptions($tree, 0, $selected);
echo '</select>';
```
📌 **Sonuç** : `<select>` içinde hiyerarşik kategori listesi, seçili kategoriler işaretli olacak.

### d. 📊 Table Görünümü Oluşturma
```php
echo '<table border="1">';
echo '<tr><th>ID</th><th>Ad</th></tr>';
echo buildTableRows($tree);
echo '</table>';
```
📌 **Sonuç** : Tüm kategori ağacını tablo olarak gösterebilirsin. Depth’e göre isimlerin başında `--` artacak.

### e. 🔎 Belirli Kategorinin Tüm Alt Kategorilerini Alma
```php
// Ana kategori ID
$parentId = 1;
$children = getAllChildCategories($items, $parentId);
print_r($children);
```
📌 **Sonuç** : Belirtilen kategori altındaki tüm kategoriler (recursive) bir dizi olarak döner.

### f. 🆔 Alt Kategorilerin ID Listesi
```php
$childIds = getCategoryIds($children);
print_r($childIds);
```
📌 **Sonuç** : Sadece ID’ler içeren bir dizi elde edilir. Örneğin filtreleme veya toplu işlemler için kullanabilirsin.

### g. 💡 Tüm Kullanım Akışı Örnek

```php
// 1. Kategorileri al
$items = getCategories($db);

// 2. Tree oluştur
$tree = buildCategoryTree($items);

// 3. Select HTML üret
$selectHTML = buildSelectOptions($tree, 0, [4,5]);

// 4. Table HTML üret
$tableHTML = buildTableRows($tree);

// 5. Belirli bir kategorinin tüm alt kategorilerini al
$allChildren = getAllChildCategories($items, 1);

// 6. Alt kategorilerin ID listesini al
$allChildIds = getCategoryIds($allChildren);

// HTML çıktısı
echo '<h2>Kategori Select</h2>';
echo '<select>'.$selectHTML.'</select>';

echo '<h2>Kategori Tablosu</h2>';
echo '<table border="1">'.$tableHTML.'</table>';

echo '<h2>Alt Kategori ID Listesi</h2>';
print_r($allChildIds);
```
📌 **Açıklama** : Bu örnek ile veritabanından al `→` tree’ye çevir `→` select ve table üret `→` alt kategori ID’lerini al akışı tamamlanmış oldu.
