# 🚀 Git ve Terminal Temel Komutlar Rehberi

Bu rehber, Git versiyon kontrol sistemi ve temel terminal komutlarını anlamanıza ve hızlıca kullanmanıza yardımcı olmak için hazırlanmıştır.

## 1. 📁 Temel Terminal Komutları
Terminal üzerinde dosya ve klasör işlemleri yapmak için kullanılır.

### a. Konum ve gezinme
- `pwd` : Bulunduğun dizinin tam yolunu gösterir. Git projesinin nerede olduğunu görmek için kullanılır.
- `cd Desktop/` : Desktop klasörüne geçiş yapar.
- `cd <dosya ismi>` : Belirtilen klasöre girer.

### b. Listeleme ve dosya işlemleri
- `ls -al` : Klasördeki tüm dosyaları (gizli dosyalar dahil) detaylı şekilde listeler.
- `touch <dosya ismi>` : Yeni boş bir dosya oluşturur.
- `mkdir <dosya ismi>` : Yeni klasör oluşturur.
- `rm <dosya ismi>` : Belirtilen dosyayı siler.
- `rmdir /s <dosya ismi>` : Klasörü ve içindekileri siler (onay ister).
- `mv <eski isim> <yeni isim>` : Dosya veya klasörün adını değiştirir.

### c. Geliştirme araçları
- `code .` : Bulunduğun klasörü Visual Studio Code ile açar.

## 2. ⚙️ Git Temel Komutları
Git ile proje başlatma ve genel durum kontrolü için kullanılır.

### a. Repo oluşturma
- `git init` : Boş bir Git deposu (local repo) oluşturur.

### b. Durum kontrolü
- `git status` : Dosyaların durumunu detaylı gösterir.
- `git status -s` : Daha kısa ve özet durum bilgisi verir.

### c. Git ayarları
- `git config --list` : Tüm Git ayarlarını listeler.

## 3. 📦 Staging & Commit İşlemleri
Dosyaları kaydetmeden önce hazırlama ve commit etme işlemleri.

### a. Staging (hazırlık alanı)
- `git add .` : Tüm dosyaları staging alanına alır.
- `git add -A` : Silinenler dahil tüm değişiklikleri ekler.
- `git restore --staged <dosya>` : Dosyayı staging alanından çıkarır.

### b. Commit işlemleri
- `git commit -m "mesaj"` : Değişiklikleri açıklama ile kaydeder.
- `git commit -am "mesaj"` : Hem staging hem commit işlemini tek komutta yapar (tracked dosyalar için).

## 4. 🔍 Geçmiş ve Log İşlemleri
Projede yapılan değişiklikleri incelemek için kullanılır.

### a. Log görüntüleme
- `git log` : Tüm commit geçmişini detaylı gösterir.
- `git log --oneline` : Kısa ve tek satırlık log.
- `git log -p -2` : Son 2 commit’in detaylı değişikliklerini gösterir.
- `git log --since=30minutes` : Son 30 dakikadaki değişiklikler.

### b. Commit detayları
- `git show` : Son commit’in detaylarını gösterir.
- `git diff --stat <sha1> <sha2>` : İki commit arasındaki farkı satır sayısı olarak gösterir.

## 5. ⏪ Geri Alma ve Reset İşlemleri
Yanlış yapılan işlemleri geri almak için kullanılır.

### a. Checkout (zaman yolculuğu)
- `git checkout <commit id>` : Belirli bir commit’e geçiş yapar.
- `git checkout master` : En güncel sürüme geri döner.

### b. Revert & Reset
- `git revert <commit id>` : Sadece belirtilen commit’i geri alır (güvenli yöntem).
- `git reset --soft <commit id>` : Commit’i geri alır ama dosyalar korunur.
- `git reset --mixed <commit id>` : Staging alanını sıfırlar.
- `git reset --hard <commit id>` : Her şeyi tamamen geri alır (çok tehlikeli ⚠️).

### c. Dosya geri alma
- `git restore <dosya>` : Dosyayı eski haline getirir.

## 6. 🌿 Branch (Dal) İşlemleri
Farklı geliştirme süreçleri için branch kullanılır.

### a. Branch yönetimi
- `git branch <isim>` : Yeni branch oluşturur.
- `git branch -a` : Tüm branch’leri listeler.
- `git branch -d <isim>` : Branch siler (dikkatli kullanılmalı).

### b. Branch geçiş & birleştirme
- `git checkout <branch>` : Branch değiştirir.
- `git merge <branch>` : Branch’i mevcut branch ile birleştirir.

## 7. ☁️ Remote (GitHub) İşlemleri
Local repo ile GitHub arasında bağlantı kurmak için kullanılır.

### a. Veri gönderme & alma
- `git push` : Local → Remote veri gönderir.
- `git pull` : Remote → Local veri çeker (fetch + merge).
- `git fetch` : Remote’daki değişiklikleri indirir ama birleştirmez.

### b. Repo işlemleri
- `git clone <url>` : Projeyi bilgisayara indirir.

## 8. 🔐 SSH ve Güvenlik
GitHub bağlantısı için SSH anahtarları oluşturulur.

- `ssh-keygen -t rsa -b 4096 -C "email"` : SSH key oluşturur (`.ssh/id_rsa.pub` dosyası oluşur).

## 9. 🧹 Temizlik ve Özel İşlemler
Dikkatli kullanılması gereken komutlar.

- `git rm -r --cached .` : Cache temizler (.gitignore sonrası kullanılır).
- `rm -rf .git` : Git repo’yu tamamen siler (çok tehlikeli ⚠️).

## 10. 📄 .gitignore Kullanımı
- `.gitignore` : Takip edilmesini istemediğin dosyaları belirtir.
- 📌 **Not:** Sonradan eklersen cache temizlemen gerekir.

## 11. 📝 Editör Komutları (Vim)
Git bazı durumlarda Vim açar.

- `ESC` : Komut moduna geçer
- `:wq` : Kaydet ve çık
- `:x!` : Zorla kaydet ve çık
- `q` : log ekranından çık

## 12. 🚀 Sıfırdan GitHub Bağlama
Yeni bir projeyi GitHub’a bağlamak için:

```bash
echo "# proje" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin <ssh url>
git push -u origin main
```
