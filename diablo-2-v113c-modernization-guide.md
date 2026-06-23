# 🎮 Diablo 2 Lord of Destruction (v1.13c) Modernizasyon Rehberi

Bu rehber, klasik Diablo 2 LoD (v1.13c) sürümünü tek oyunculu (Single Player) modda modern bilgisayarlara uyarlamak, akıcı 60+ FPS almak, 16:9 geniş ekran hatasını çözmek, sınırsız sandık eklemek ve sinematik grafik filtresi kurmak için yapılmış adımları içerir.

---

## 🛠️ Bölüm 1: D2DX (Grafik & Motor) Kurulumu

D2DX, oyunun 25 FPS sınırını kaldırır, 16:9 geniş ekran desteği sunar ve oyunu modern bir DirectX 11 mimarisiyle çalıştırır.

### Kurulum Adımları
1. D2DX (v0.99.529) içerisinden çıkan `glide3x.dll` ve `d2dx-defaults.cfg` dosyalarını Diablo II ana klasörüne kopyalayın.
2. `d2dx-defaults.cfg` dosyasının adını **`d2dx.cfg`** olarak değiştirin.
3. `d2dx.cfg` dosyasını Not Defteri ile açın ve içeriğini aşağıdaki **Kusursuz 16:9 Ayarları** ile tamamen değiştirin:

```ini
[window]
scale=3			# Ekran ölçeklemesini en yüksek seviyede tutar
position=[-1,-1]	# Oyunu ekranın tam ortasına hizalar
frameless=true         # Beyaz pencereli kenarlıkları kaldırır, tam ekran hissi verir

[game]
size=[1152,648]		# 16:9 formatında harita yırtılmasını (sol üst siyah alan hatası) engelleyen en kararlı çözünürlük!
filtering=2             # Catmull-Rom filtresi aktiftir (Yumuşak ve kaliteli görüntü)

[optouts]
noclipcursor=false	 # Fareyi oyun ekranına kilitler, dışarı kaçmasını önler
nofpsfix=false		 # 25 FPS sınırını kaldırarak yüksek kare hızı desteğini açar
noresmod=false		 # Dahili D2HD geniş ekran modunu aktif tutar
nowide=false		 # False kalsın ki ekranı sağa ve sola doğru tamamen kaplasın
nologo=false		 # Başlangıçta D2DX logosunu gösterir (Çalıştığını doğrulamak için)
novsync=false		 # Ekran yırtılmalarını önlemek için dikey eşitlemeyi (V-Sync) açar
noaa=false		 # Kenar yumuşatmayı (Anti-Aliasing) aktif eder, tırtıkları siler
nocompatmodefix=false	 
notitlechange=false	 
nomotionprediction=false # Yapay zeka hareket tahminini açar (Oyunu yağ gibi 60+ FPS yapar)
```

---

## 📦 Bölüm 2: PlugY (Gelişmiş Single Player) Kurulumu

ChaosMarc/PlugY (v14.03) reponuz üzerinden indirilen bu mod; sınırsız sayfa, ortak sandık ve single player modunda kapalı olan etkinlikleri açar.

### Kurulum Adımları
1. Zip içerisindeki `PlugY.exe`, `PlugY.dll`, `PlugY.ini` dosyalarını ve **`PlugY` isimli klasörü** olduğu gibi Diablo II ana klasörüne atın.
2. `PlugY.ini` dosyasını Not Defteri ile açın. Sınırsız sandık ve gizli görevler için şu ayarları doğrulayın (Eğer `[UBERQUEST]` başlığı yoksa en alta elinizle ekleyin):

```ini
[STASH]
ActiveSharedStash=1      # Karakterler arası ortak sandığı açar
ActiveBigStash=1         # Sandık boyutunu devasa yapar
ActiveMultiPageStash=1    # Sandığı sınırsız sayfalı yapar

[UBERQUEST]
ActiveUberQuest=1        # Hellfire Torch için Uber Tristram görevini açar
ActiveDiabloClone=1      # Annihilus Charm için Diablo Clone baskınını aktif eder
ActiveWorldEvent=1       # Dünya etkinliklerini tetikler
```

---

## 🚀 Bölüm 3: Kısayol Ayarı ve Oyunu Başlatma

Modların ve grafik motorunun birlikte sorunsuz tetiklenmesi için oyunu her zaman özel hazırlanan bu kısayoldan başlatmalısınız.

1. Oyun klasöründeki `PlugY.exe` dosyasına sağ tıklayıp **Masaüstüne Kısayol Oluştur** deyin.
2. Masaüstündeki kısayola sağ tıklayıp **Özellikler**'e girin.
3. **Hedef (Target)** satırının en sonuna gidin, bir boşluk bırakın ve **`-3dfx`** komutunu ekleyin.
   * *Örnek Görünüm:* `"C:\Games\Diablo II\PlugY.exe" -3dfx`
4. Uygula ve Tamam diyerek kaydedin. Oyuna artık hep buradan giriş yapın.

---

## 🎨 Bölüm 4: Reshade Sinematik Efekt Kurulumu

Oyunun yaşlanan renklerini canlandırmak ve kasvetli bir korku oyunu atmosferi (The Dark Horror) katmak için uygulanan harici katman ayarlarıdır.

### Kurulum Adımları
1. Reshade kurulum ekranında oyun olarak Diablo II klasöründeki **`PlugY.exe`** dosyasını seçin.
2. Render motoru olarak **`DirectX 10/11/12`** seçeneğini işaretleyin.
3. Oyun içinde **`Home`** tuşuna basarak yönetim panelini açın / kapatın.
4. "The Dark Horror" atmosferi için panelden şu efektleri aktifleştirin ve kendinize göre ayarlayın:
   * **`Vignette`:** Ekranın köşelerine hafif sinematik karanlık çöktürür.
   * **`Levels` (`Levels.fx`):** İçindeki *BlackPoint* ayarını sağa kaydırarak zindan zeminlerindeki siyahlığı derinleştirir, gri parlamaları siler.
   * **`AdaptiveSharpen`:** 720p çözünürlükten kaynaklı piksellerdeki yumuşaklığı keskinleştirir, detayları netleştirir.

---

## 💡 Bölüm 5: Kritik Oyun İçi İpuçları & Komutlar

* **Yandan Sıkıştırılmış Ekran Hissini Çözmek:** Oyun içinde `Esc -> Options -> Video Options` yolunu izleyin ve **`Perspective`** ayarını **`OFF`** (Kapalı) yapın. Envanter pencereleri ve can/mana küreleri anında orijinal dik formuna gelecektir.
* **Zorluk ve Drop Oranı Ayarı (`/players X`):** Normalde oyun `players 1` zorluğundadır. Oyun içinde sohbet satırını açıp `/players 3`, `/players 5` veya `/players 7` yazarak canavarların canını artırabilir, buna karşılık **XP (Tecrübe) kazanımını ve yerlere düşen rün/eşya miktarını devasa oranda artırabilirsiniz.** (Eşya düşme kırılımları tek sayılarda olduğu için tek sayıları tercih edin).
