# Syncra CRM V1.0

**Proje:** Syncra System CRM ERP otomasyonu

**Programın adı:** Syncra CRM V1.0

**Yazılımcı firma:** KORANA YAZILIM

**Yazar:** alperen korana

**İletişim:**
- GSM: 0.551 344 24 40
- Mail: alperen.korana@outlook.com

Bu depo Laravel tabanlı Syncra CRM V1.0 uygulamasının kaynak kodunu içerir.

Notlar:
- Push işlemleri `https://github.com/alperenkoranaizmir-rgb/Syncra-Larevel.git` uzak reposuna yapılacaktır.
- `.env` dosyası versiyon kontrolüne eklenmemelidir — çevresel değişkenleri yerel `.env` dosyanıza ekleyin.

Kurulum (özet):
1. `composer install`
2. `cp .env.example .env` ve gerekli yapılandırmayı yapın
3. `php artisan key:generate`
4. `php artisan migrate --seed`

Geliştirici notu: Bu repo'ya ilk push yerel commitleri uzak `main` branşına göndermeye çalışacaktır.

Sistem / Geliştirme Ortamı (kaydedildi):

- **İşletim Sistemi:** Ubuntu 24.04/24.3 (kullanıcı bildirimi)
- **PHP (CLI):** PHP 8.3.6 (cli) (built: Jul 14 2025 18:30:55) (NTS)
- **PHP yolu:** `/usr/bin/php8.3`
- **MySQL:** mysql  Ver 8.0.43-0ubuntu0.24.04.2 for Linux on x86_64 ((Ubuntu))
- **Composer:** Composer version 2.9.1 2025-11-13 16:10:38

Bu bilgiler isteğiniz üzerine README içine eklendi ve proje ortamı referansı olarak kaydedildi.

Veritabanı Bilgileri (isteğiniz üzerine - dikkat: hassas bilgi):

- **Database adı:** `syncra`
- **Database kullanıcı adı:** `syncra`
- **Db parolası:** "benq2535Aa."

UYARI: Bu bilgiler hassas bilgidir. Versiyon kontrolünde gerçek parolaların paylaşılmaması güvenlik açısından önemlidir. Bu depoya erişimi olan kişiler bu bilgiyi görebilir. Tavsiye: üretim parolalarını uzak repoya commit etmeyin; bunun yerine `.env` dosyanızı sunucuda veya güvenli bir yerel ortamda saklayın. Aşağıda proje kökünde bir örnek `.env.example` dosyası da oluşturuldu.
