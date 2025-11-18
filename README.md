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

Laravel ile yaygın/önerilen paketler (ama zorunlu değil; proje gereksinimine göre seçilecek):
- **Resmi Laravel paketleri:** `laravel/sanctum`, `laravel/telescope` (dev), `laravel/horizon` (kuyruklar için), `laravel/scout`, `laravel/octane` (performans, isteğe bağlı), `laravel/sail` (yerel geliştirme), `laravel/breeze` veya `laravel/jetstream` (auth scaffolding).
- **Topluluk paketleri (admin/kurumsal ihtiyaçlar):** `jeroennoten/laravel-adminlte` (AdminLTE entegrasyonu, tavsiye edilen yol), `spatie/laravel-permission` (rol/izin yönetimi), `yajra/laravel-datatables` (büyük tablolar), `maatwebsite/excel` (Excel export/import), `barryvdh/laravel-dompdf` (PDF), `intervention/image` (görsel işleme), `spatie/laravel-activitylog` (loglama).
- **Geliştirici / araç paketleri (opsiyonel):** `barryvdh/laravel-debugbar` (dev), `nunomaduro/pint` (kod formatlama), `pestphp/pest` veya `phpunit` (testler), `orchestra/testbench` (paket testi).

AdminLTE v4 entegrasyonu (kısa yol, Vite + npm ile Laravel 12 için)

Not: Laravel 12 Vite varsayılan asset pipeline'ını kullanır. Aşağıdaki adımlar AdminLTE v4'ü (ör. `4.0.0-rc3`) doğrudan npm üzerinden projeye ekleyip Vite ile import ederek en kısa ve güvenilir entegrasyonu sağlar.

1. Laravel 12 projesi oluşturun (varsa bu adımı atlayın):

	composer create-project laravel/laravel:^12 syncra

2. Node ve npm kurulumu ve kontrol (v4 RC için Node >=16/18 önerilir):

	node -v
	npm -v

3. AdminLTE v4 ve gerekli frontend paketlerini yükleyin:

	npm install admin-lte@4.0.0-rc3 bootstrap@5.3.7 bootstrap-icons overlay-scrollbars --save

4. Vite / Laravel varsayılan `resources/js/app.js` ve `resources/css/app.css` içine AdminLTE import'ları ekleyin.

	resources/css/app.css
	--------------------------------
	@import "admin-lte/dist/css/adminlte.min.css";

	resources/js/app.js
	--------------------------------
	import 'bootstrap';
	import 'overlay-scrollbars';
	import 'admin-lte/dist/js/adminlte.min.js';
	import '../css/app.css';

5. `vite` ile asset'leri derleyin:

	npm install
	npm run build

6. Blade layout'ınızda Vite tag'larını kullanın (Laravel 12 default):

	@vite(['resources/js/app.js'])

7. Yönetici paneli taslağını AdminLTE örnekleriyle oluşturarak tek panel tabanlı uygulamanızı geliştirin (tüm işlemler panel üzerinden yapılacak şekilde route ve controller'larınızı kurgulayın).

AdminLTE v3 ile gelen `jeroennoten/laravel-adminlte` paketinin (Laravel-AdminLTE) avantajı hazır blade şablonları ve komutlarla hızlı entegrasyon sağlamasıdır; fakat bu paket AdminLTE v3.2 ile uyumludur. AdminLTE v4'ü kullanmak istiyorsanız v4'ü npm ile ekleyip (veya AdminLTE 4 kaynaklarını manuel olarak kopyalayarak) Vite üzerinden import etmek en doğrudan yoldur.

AdminLTE v4 (RC) için özet gereksinimler:
- Node: >= 16 / 18 (LTS önerilir)
- npm veya pnpm/yarn
- Bootstrap: 5.3.7
- OverlayScrollbars, Bootstrap Icons vb. (yukarıdaki `npm install` komutunda eklenmiştir)

Versiyon sabitleme ve yükseltme kısıtı (sizin isteğiniz):
- Projede paket güncellemeleri yapılmayacaksa `composer.json` ve `package.json`'da versiyonları kesin şekilde kilitleyin ve `composer.lock` / `package-lock.json`'ı repoda tutun. AdminLTE v4 RC olduğundan, repoda tam sürüm etiketi (`4.0.0-rc3`) ile tutmak istenirse risk ve bakım sorumluluğu üstlenilmiş olur.


Alternatif (modern Bootstrap 5 tabanlı AdminLTE v4):
- AdminLTE v4 (ör. `4.0.0-rc3`) Bootstrap 5 tabanlı, modern araç zinciri kullanır (ES Modules, Typescript tooling). Ancak hâlâ RC/beta döneminde olduğu için kritik/uzun süreli üretim projelerinde tavsiye edilmez. Eğer v4 istenirse: `npm install admin-lte@4.0.0-rc3` ve Node >= 16/18 gerekecektir.

Versiyon sabitleme ve yükseltme kısıtı (sizin isteğiniz):
- Projede paket güncellemeleri yapılmayacaksa `composer.json` ve `package.json`'da versiyonları kesin şekilde (ör. `"laravel/framework": "12.10.1"`) kilitleyin ve `composer.lock` / `package-lock.json`'ı repoda tutun. Bu sayede CI veya başka geliştiriciler aynı sürümleri kullanır. Not: güvenlik yamaları gerekirse ayrı politika ile değerlendirilmelidir.

Kısa kurulum (en kısa yol özet):
1. `composer create-project laravel/laravel:^12 .`
2. `composer require jeroennoten/laravel-adminlte:^3.15`
3. `php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=config` (paket dökümantasyonuna göre)
4. `npm install && npm run build` (asset'leri derlemek için)

Detaylı paket dokümantasyonlarına bağlantılar:
- Laravel docs: https://laravel.com/docs/12.x
- AdminLTE v3 docs: https://adminlte.io/docs/3.2/
- Laravel-AdminLTE paket docs: https://jeroennoten.github.io/Laravel-AdminLTE/
