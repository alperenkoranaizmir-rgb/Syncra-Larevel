# İş Listesi (Otomatik)

Bu dosya `todo.json` kaynağından otomatik olarak üretilmektedir. `scripts/update_todos.py` veya `githooks/post-commit` hook'u tarafından güncellenir.

Mevcut görevler:

- [x] **1. Switch README to AdminLTE v3** - Replace AdminLTE v4 content with AdminLTE v3.2.0 (pinned) instructions; commit and push.
- [ ] **2. Add automation scripts** - Create `scripts/update_todos.py` and `todo.json` to generate `Is_listesi.md` and update README automatically from the todo file.
- [ ] **3. Install git hooks** - Add `githooks/post-commit` and `scripts/install-hooks.sh` to install hook that runs update script after commits.
- [ ] **4. Verify automation** - Trigger a sample todo change to confirm `Is_listesi.md` and README update automatically and commit automated changes.

Kurulum ve kullanım:

1. Hooks'ları kurmak için proje kökünde çalıştırın:

```bash
bash scripts/install-hooks.sh
```

2. Manuel olarak güncellemek isterseniz veya hook'u test etmek için:

```bash
python3 scripts/update_todos.py
```

3. `todo.json` dosyasını düzenleyerek görevleri ekleyin / güncelleyin. Değişiklik yaptıktan sonra `scripts/update_todos.py` veya commit sonrası hook otomatik güncelleme yapacaktır.

Notlar:
- Otomasyon, `Is_listesi.md` ve `README.md` içindeki `<!-- TODOS-START -->` / `<!-- TODOS-END -->` işaretleri arasını günceller. Eğer README'de bu işaretler yoksa otomatik olarak sonuna ekler.
- Otomatik commitler `Automated: ...` mesajı ile yapılır; hook kendini tetiklememesi için bu mesajla başlayan commit'ler sırasında işlem yapmaz.
