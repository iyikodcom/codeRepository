# 🌐 Local Domain (.test) Kurulumu – XAMPP (Manuel)
Bu doküman, XAMPP kullanarak PHP projelerinde `.test` uzantılı local domainler oluşturmayı adım adım açıklar.

## 📌 Amaç
Local projelere aşağıdaki gibi erişmek:
```
http://proje1.test
http://api.proje1.test
```

## 🧱 Gereksinimler
- XAMPP (Apache çalışıyor olmalı)
- Windows işletim sistemi
- Yönetici (Administrator) yetkisi

## 1️⃣ Hosts Dosyasını Düzenleme

Windows, domainleri IP adresine çevirmek için `hosts` dosyasını kullanır.

📍 Dosya yolu: **C:\Windows\System32\drivers\etc\hosts**<br>
📌 Not: Dosyayı **Notepad yönetici olarak açarak** düzenlemelisin.
### ➕ Örnek ekleme:
```
127.0.0.1 proje1.test
127.0.0.1 api.proje1.test
127.0.0.1 admin.proje1.test
```

## 2️⃣ Apache VirtualHost Ayarı

Apache’ye gelen domain isteğini ilgili klasöre yönlendirmek için VirtualHost tanımlanır.

📍 Dosya: **C:\xampp\apache\conf\extra\httpd-vhosts.conf**
### ➕ Örnek yapı:
```
<VirtualHost *:80>
    ServerName proje1.test
    DocumentRoot "C:/xampp/htdocs/proje1/public"

    <Directory "C:/xampp/htdocs/proje1/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

<VirtualHost *:80>
    ServerName api.proje1.test
    DocumentRoot "C:/xampp/htdocs/proje1/api"

    <Directory "C:/xampp/htdocs/proje1/api">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## 3️⃣ VirtualHost Dosyasını Aktif Etme
📍 Dosya: **C:\xampp\apache\conf\httpd.conf**
Aşağıdaki satır aktif olmalıdır:
`Include conf/extra/httpd-vhosts.conf` 📌 Eğer başında `#` varsa kaldır.

## 4️⃣ Apache Yeniden Başlatma
```
XAMPP Control Panel aç
Apache → Stop
Apache → Start
```

## 5️⃣ Test Etme
Tarayıcıdan kontrol et:
```
http://proje1.test
http://api.proje1.test
```
