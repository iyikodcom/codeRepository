# 🎬 OpenShot Dikey Videoyu Yatay Formata Çevirme (Blur Arka Plan) [Türkçe]

### 🎯 Amaç
Dikey (9:16) bir videoyu yatay (16:9) bir alana yerleştirirken oluşan boş yan alanlar, aynı videonun bulanık bir versiyonu ile doldurularak modern ve profesyonel bir görünüm elde edilir.

### ⚙️ Önerilen Blur Ayarları (Sweet Spot)
**Gaussian Blur** efektini aşağıdaki değerlerle kullanın:

- **Yatay Yarıçap:** `12`
- **Dikey Yarıçap:** `12`
- **Sigma:** `5`
- **Döngüler (Iterations):** `4`

Bu değerler:
- Dikkat dağıtan detayları yok eder  
- Yumuşak geçişler sağlar  
- Aşırı bulanıklığı engeller  

### 🎨 Ek Ayarlar (Profesyonel Görünüm İçin)
Bu ayarları yalnızca **arka plan katmanına** uygulayın:

- **Parlaklık (Brightness):** `-0.15`  
- **Kontrast (Contrast):** Biraz düşürülebilir (opsiyonel)

#### ✅ Sonuç:
- Arka plan geri planda kalır  
- Ana video odak noktası olur  
- Genel görünüm daha temiz ve sinematik olur  

### 🧠 Uygulama Adımları
1. Dikey videoyu timeline’a ekleyin (ön plan katmanı)  
2. Aynı videoyu kopyalayıp **alta yerleştirin** (arka plan katmanı)  
3. Arka plan videosunu ekranı tamamen dolduracak şekilde ölçeklendirin (16:9)  
4. Yukarıdaki blur ayarlarını uygulayın  
5. Parlaklık (ve gerekirse kontrast) ayarını yapın  

### ⚠️ Notlar
- Çok düşük blur değerlerinden kaçının → arka plan dikkat dağıtır  
- Çok yüksek blur değerlerinden kaçının → görüntü çamur gibi olur  
- En iyi sonuç için **1080p (1920x1080)** proje ayarlarını kullanın  

### 🚀 İpucu
Daha iyi performans için:
- Bulanık arka planı ayrı bir video olarak render alın  
- Ana projede tekrar kullanın  

### 📌 Özet
Bu yöntem, şu içeriklerde yaygın olarak kullanılır:
- YouTube videoları  
- Shorts/Reels içerik dönüşümleri  
- Profesyonel sosyal medya düzenlemeleri  

---

# 🎬 OpenShot Convert Vertical Video to Horizontal Format (Blur Background) [English]

### 🎯 Purpose
When placing a vertical video inside a horizontal canvas (e.g., YouTube), empty side areas can be filled with a blurred version of the same video to achieve a modern and professional look.

### ⚙️ Recommended Blur Settings (Sweet Spot)
Use the **Gaussian Blur** effect with the following values:

- **Horizontal Radius:** `12`
- **Vertical Radius:** `12`
- **Sigma:** `5`
- **Iterations:** `4`

These values provide a balanced blur that:
- Removes distracting details
- Maintains smooth gradients
- Avoids excessive softness

### 🎨 Additional Adjustments (For Professional Look)
Apply these adjustments to the **background layer only**:

- **Brightness:** `-0.15`  
- **Contrast:** Slightly reduced (optional)

#### ✅ Result:
- Background visually recedes  
- Main (foreground) video becomes the focal point  
- Overall composition looks cleaner and more cinematic  

### 🧠 Implementation Steps
1. Place your vertical video on the timeline (foreground layer)  
2. Duplicate the same video and place it **below** (background layer)  
3. Scale the background video to fill the entire frame (16:9)  
4. Apply the blur settings listed above  
5. Adjust brightness (and contrast if needed)  

### ⚠️ Notes
- Avoid very low blur values → background remains distracting  
- Avoid extremely high blur values → image may look muddy  
- Always use **1080p (1920x1080)** project settings for best results  

### 🚀 Tip
For better performance:
- Pre-render the blurred background as a separate video  
- Then reuse it in your main project  

### 📌 Summary
This setup creates a widely used "blurred background" effect seen in:
- YouTube videos  
- Shorts/Reels repurposed content  
- Professional social media edits  
