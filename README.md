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

Proje Teknoloji ve Paket Önerileri (özet)

Not: Aşağıdaki öneriler en stabil, yaygın kullanılan ve uzun süreli destek gören kombinasyonlara dayanır (2025 Kasım sonu itibarıyla yapılan kontrol). "En kısa yol" olarak Laravel 12 + `jeroennoten/laravel-adminlte` (AdminLTE v3.2) kombinasyonunu öneriyorum — bu yol kurulumu en kolay ve kararlı çalışacak seçenektir.

- **Laravel sürümü (önerilen, kararlı):** Laravel 12.x (ör. `v12.10.1`) — gereksinim: `php ^8.2` (Sizde PHP 8.3.6 var, uyumlu).
- **Admin panel (önerilen):** AdminLTE v4 (modern Bootstrap 5 tabanlı). AdminLTE v4 (ör. `4.0.0-rc3`) modern araç zinciri ve yeni bileşenlerle geliyor. Not: v4 halen rc/beta sürüm döngüsünde olabileceğinden, eğer mutlak en stabil (uzun süreli LTS) tercih isterseniz AdminLTE v3.2'yi seçebilirsiniz. Ancak siz v4 istediniz; aşağıda v4 için kısa ve çalışır kurulum adımlarını bulabilirsiniz.

Gereksinimler (kısa):
- **PHP:** >= 8.2 (sisteminizde PHP 8.3.6 mevcut)
- **Composer:** Composer 2.x (sisteminizde Composer 2.9.1 mevcut)
- **MySQL:** 8.x (sisteminizde MySQL 8.0.43 mevcut)
- **Node / npm:** AdminLTE 3 için Node >= 14 tavsiye edilir; AdminLTE 4 (RC) için Node >= 16/18 tavsiye edilir.

Kesin (Pinned) Sürümler — Bu proje için tam sabitlenmiş sürümler (değiştirilmeyecek):

- **İşletim Sistemi:** Ubuntu 24.04 LTS
- **PHP (CLI):** 8.3.6
- **PHP yolu:** `/usr/bin/php8.3`
- **MySQL:** 8.0.43
- **Composer:** 2.9.1
- **Laravel:** 12.10.1
- **Node.js:** 18.20.1 (LTS)
- **npm:** 9.8.1
- **AdminLTE (frontend):** 4.0.0-rc3
- **Bootstrap:** 5.3.7
- **Bootstrap Icons:** 1.13.1
- **OverlayScrollbars:** 2.11.0
- **Laravel-AdminLTE (opsiyonel, sadece v3 kullanımı için):** jeroennoten/laravel-adminlte 3.15.2

NOT: Bu sürümler proje gereği sabitlenecektir — `composer.json` ve `package.json` içinde belirtilen sürümlere sadık kalınacak ve `composer.lock` / `package-lock.json` repoya eklenecektir. Güvenlik yamaları özel süreçle ele alınacaktır.

Laravel ile yaygın/önerilen paketler (ama zorunlu değil; proje gereksinimine göre seçilecek):
- **Resmi Laravel paketleri:** `laravel/sanctum`, `laravel/telescope` (dev), `laravel/horizon` (kuyruklar için), `laravel/scout`, `laravel/octane` (performans, isteğe bağlı), `laravel/sail` (yerel geliştirme), `laravel/breeze` veya `laravel/jetstream` (auth scaffolding).
- **Topluluk paketleri (admin/kurumsal ihtiyaçlar):** `jeroennoten/laravel-adminlte` (AdminLTE entegrasyonu, tavsiye edilen yol), `spatie/laravel-permission` (rol/izin yönetimi), `yajra/laravel-datatables` (büyük tablolar), `maatwebsite/excel` (Excel export/import), `barryvdh/laravel-dompdf` (PDF), `intervention/image` (görsel işleme), `spatie/laravel-activitylog` (loglama).
- **Geliştirici / araç paketleri (opsiyonel):** `barryvdh/laravel-debugbar` (dev), `nunomaduro/pint` (kod formatlama), `pestphp/pest` veya `phpunit` (testler), `orchestra/testbench` (paket testi).

AdminLTE v3 entegrasyonu (kısa yol, Laravel 12 ile, kesin sürümler)

Not: Bu proje için kesin tercih AdminLTE v3.2.0'dır. Aşağıdaki adımlar Laravel 12 ile sorunsuz çalışacak şekilde hazırlanmıştır ve `jeroennoten/laravel-adminlte` paketini kullanarak blade şablonlarıyla hızlı entegrasyon sağlar.

1. Laravel 12 projesi oluşturun (kesin sürüm kullanımı):

   composer create-project laravel/laravel=12.10.1 syncra

2. Gerekli PHP/Composer ayarlarını doğrulayın (sisteminizde zaten uyumlu PHP 8.3.6 ve Composer 2.9.1 bulunuyor).

3. `jeroennoten/laravel-adminlte` paketini kesin sürüm ile ekleyin (bu paket `almasaeed2010/adminlte` 3.2.* bağımlılığını çekecektir):

   composer require jeroennoten/laravel-adminlte=3.15.2

   (Eğer isterseniz adminlte paketini doğrudan pin'leyebilirsiniz: `composer require almasaeed2010/adminlte=3.2.0`)

4. Paket yapılandırmasını ve view'leri yayınlayın:

   php artisan vendor:publish --provider="JeroenNoten\\LaravelAdminLte\\ServiceProvider" --tag=config
   php artisan vendor:publish --tag=adminlte --force

5. Frontend (assets) için kesin sürümleri yükleyin (AdminLTE v3 kullandığı bootstrap4 + jquery tabanlıdır):

   npm install bootstrap@4.6.0 jquery@3.6.0 overlay-scrollbars@1.13.1 --save

6. `resources/js/app.js` ve `resources/sass/app.scss` (veya `resources/css/app.css`) içine gerekli import'ları ekleyin. Örnek:

   resources/js/app.js
   --------------------------------
   import 'jquery';
   import 'bootstrap';
   import 'overlayscrollbars';
   import '../sass/app.scss';

   resources/sass/app.scss
   --------------------------------
   @import "~admin-lte/dist/css/adminlte.min.css";

7. Asset'leri derleyin:

   npm install
   npm run build

8. Blade layout'unuzu `layouts` dizininde AdminLTE yapılarına göre ayarlayın; `jeroennoten/laravel-adminlte` paket dokümantasyonundaki blade örneklerini kullanın.

AdminLTE v3 (stable) için özet sabitlenmiş sürümler:
- AdminLTE: `3.2.0`
- jeroennoten/laravel-adminlte: `3.15.2`
- Bootstrap: `4.6.0`
- jQuery: `3.6.0`
- OverlayScrollbars: `1.13.1`
- Node.js: `18.20.1` (uyumluluk için; npm 9.8.1)

Versiyon sabitleme politikası:
- `composer.json` ve `package.json`'da yukarıdaki exact sürümleri kullanın ve `composer.lock` ile `package-lock.json` dosyalarını repoya ekleyin. Paket güncellemeleri otomatik yapılmayacak; güvenlik yamaları gerektiğinde ayrı süreçle uygulanacaktır.

Detaylı paket/dökümantasyon bağlantıları:
- Laravel docs: https://laravel.com/docs/12.x
- Laravel-AdminLTE docs: https://jeroennoten.github.io/Laravel-AdminLTE/
- AdminLTE (v3) docs/examples: https://adminlte.io/themes/v3/
