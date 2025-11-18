<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Local Setup

Quick steps to get a working local environment (assumes Linux/macOS):

- **Node.js**: use Node 20+ (recommended). Older Node may build but can produce warnings.
- **PHP/Composer**: PHP 8.2+ and Composer 2.

Note: This project vendors FullCalendar CSS into `resources/css/vendor/fullcalendar.min.css` so the calendar styles are bundled by Vite.

If you use `nvm`, run:

```bash
nvm install 20
nvm use 20
```

After switching Node versions, run the frontend build:

```bash
npm ci
npm run build
```

Run these commands from the project root:

```bash
# PHP deps
composer install --no-interaction --prefer-dist --optimize-autoloader

# If you need sqlite for local testing
mkdir -p database
touch database/database.sqlite

# Publish Spatie permission config/migrations (if using roles/permissions)
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="permission-config" --force
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="permission-migrations" --force

# Run migrations
php artisan migrate --force

# Seed roles/permissions (PermissionSeeder is tolerant if Spatie isn't installed)
php artisan db:seed --class="\Database\Seeders\PermissionSeeder"

# Frontend
npm ci
npm run build
```

Add `HasRoles` to your `App\Models\User` model after you install `spatie/laravel-permission`:

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasRoles; // plus existing traits
	// ...
}
```

Set filesystem permissions for the webserver (adjust group as needed):

```bash
# make writable by owner and group
chmod -R ug+rwx storage bootstrap/cache
# set group to www-data if appropriate
sudo chown -R $USER:www-data storage bootstrap/cache || true
```

Notes:
- `PermissionSeeder` will create `admin` and `user` roles and assign the first user the `admin` role if Spatie is available.
- CI (GitHub Actions) is configured to run `composer install`, prepare an sqlite DB, run migrations & seeders, then `npm ci` and `npm run build`.

User profile fields now include:
- `tckn` (T.C. Kimlik No)
- `phone` (Telefon)
- `address_city`, `address_district`, `address_line` (Adres bilgileri)
- `education` (Eğitim durumu — options: İlkokul, Ortaokul, Lise, Ön Lisans, Lisans, Yüksek Lisans, Doktora, MBA, Sertifika, Diğer)

You can edit these fields via the profile page at `/profile/edit` after logging in.

## Admin Arayüzü Geliştirme (Hızlı Yol Haritası)

Aşağıda admin panelini tam anlamıyla AdminLTE şablonuna geçirip kullanıcı yönetimi ve profil sayfalarını tamamlamak için adımlar yer alıyor. Bu repo üzerinde ben veya siz bu adımları takip ederek ilerleyebilirsiniz.

- 1) AdminLTE varlıklarını hazırlayın:
	- `public/vendor/adminlte` içine AdminLTE `dist` dosyalarını (css/js/img) kopyalayın veya `npm` ile paketleyin.
	- Eğer Vite kullanıyorsanız `vite.config.js` ve `resources/js/app.js` içinde admin varlıklarını bundle edin.

- 2) Layout ve partial dosyaları:
	- `resources/views/layouts/admin.blade.php` oluşturun ve AdminLTE tam şablonunu buraya taşıyın (header, sidebar, footer, control-sidebar).
	- `resources/views/vendor/adminlte/partials` altında `navbar.blade.php`, `sidebar.blade.php`, `footer.blade.php` dosyalarını ekleyin.

- 3) Header (navbar) güncelleme:
	- Oturum açmış kullanıcı bilgisini (`Auth::user()`) gösterin.
	- Çıkış (logout) butonunu yerleştirin ve POST `/logout` route'unu kullanın.

- 4) Sidebar menü öğeleri:
	- `config/adminlte.php` veya `layouts/admin.blade.php` içinden menü öğelerini doldurun (Dashboard, Users, Profile, Calendar, Settings...).

- 5) Profil sayfaları:
	- GET `/profile` — profil görüntüleme.
	- GET `/profile/edit` — profil düzenleme formu.
	- POST/PUT `/profile` — güncelleme ve validasyon.

- 6) Kullanıcı yönetimi (Admin):
	- Resource controller: `App\Http\Controllers\Admin\UserController` (index, create, store, show, edit, update, destroy).
	- Admin yetkileri: `Admin` rolü kontrolü (Spatie veya `is_admin` fallback).

- 7) Test & doğrulama:
	- Oturum açma, profil güncelleme, kullanıcı CRUD ve takvim sayfası akışlarını test edin.

Her adım için isterseniz ben dosya şablonlarını oluşturup, route ve controller kodunu yazabilirim. Hangi adımla başlamamı istersiniz? (örn. `layouts/admin` şablonunu oluşturayım ve navbar/sidebar'ı ekleyeyim)

<!-- TODOS-START -->


**Project Status (otomatik)**

# İş Listesi (Otomatik)

Bu dosya `todo.json` kaynağından otomatik olarak üretilmektedir. `scripts/update_todos.py` veya git hook tarafından güncellenir.

- [x] **1. Switch README to AdminLTE v3** - Replace AdminLTE v4 content with AdminLTE v3.2.0 (pinned) instructions; commit and push.
- [x] **2. Add automation scripts** - Create `scripts/update_todos.py` and `todo.json` to generate `Is_listesi.md` and update README automatically from the todo file.
- [x] **3. Install git hooks** - Add `githooks/post-commit` and `scripts/install-hooks.sh` to install hook that runs update script after commits.
- [x] **4. Verify automation** - Trigger a sample todo change to confirm `Is_listesi.md` and README update automatically and commit automated changes.
- [x] **5. Install Laravel skeleton** - Create Laravel 12.10.1 project skeleton in repo, copy files, install deps, create .env and generate app key.
- [x] **6. Install AdminLTE v3 and Laravel-AdminLTE** - Composer require jeroennoten/laravel-adminlte and AdminLTE v3, npm install frontend deps, publish vendor assets, update resources imports and run build.
- [x] **7. Publish AdminLTE config & views** - Publish package config and view stubs into `config/adminlte.php` and `resources/views/vendor/adminlte` (manual copy done).
- [ ] **8. Document frontend environment** - Add Node.js version recommendation and npm build steps to README; consider upgrading Node to 20+.
- [ ] **9. Set filesystem permissions** - Ensure `storage` and `bootstrap/cache` have correct write permissions on deployment environments.
- [x] **10. CI / Deployment** - Add CI workflow to run composer install, npm ci, build assets and run migrations on deploy.
- [ ] **11. Copy AdminLTE dist to public** - Copy AdminLTE `dist` assets (css/js/img) into `public/vendor/adminlte` and ensure paths in config/layout point to them.
- [x] **12. Add AdminLTE example views** - Add partials: `partials/sidebar.blade.php`, auth views, and dashboard card examples under `resources/views/vendor/adminlte`.
- [x] **13. Kernel: restore default content** - Replace current minimal `app/Http/Kernel.php` with the standard Laravel Kernel content compatible with the installed framework.
- [x] **14. AdminMiddleware: role/permission-based** - Make `AdminMiddleware` use role/permission checks (Spatie) and gracefully fallback to `is_admin` property.
- [x] **15. Spatie permissions: seeders** - Add seeder `PermissionSeeder` to create roles/permissions and assign to first user (run during migrations/seeds).
- [x] **16. config/adminlte.php: richer menu** - Update `config/adminlte.php` with a richer menu and user settings.
- [x] **17. Create admin user** - Create admin user 'admin' with full permissions and profile fields.
- [x] **18. Add auth & profile pages** - Add login, logout, forgot password, profile show/edit pages and routes.


<!-- TODOS-END -->
