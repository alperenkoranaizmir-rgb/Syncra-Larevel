# İş Listesi (Otomatik)

Bu dosya `todo.json` kaynağından otomatik olarak üretilmektedir. `scripts/update_todos.py` veya git hook tarafından güncellenir.

- [x] **1. Switch README to AdminLTE v3** - Replace AdminLTE v4 content with AdminLTE v3.2.0 (pinned) instructions; commit and push.
- [x] **2. Add automation scripts** - Create scripts/update_todos.py and todo.json to generate Is_listesi.md and update README automatically from the todo file.
- [ ] **3. Install git hooks** - Add githooks/post-commit and scripts/install-hooks.sh to install hook that runs update script after commits.
- [x] **4. Verify automation** - Trigger a sample todo change to confirm Is_listesi.md and README update automatically and commit automated changes.
