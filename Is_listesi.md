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
