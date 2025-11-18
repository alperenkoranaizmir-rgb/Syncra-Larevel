#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "$0")/.." && pwd)"
HOOK_SRC="$ROOT_DIR/githooks/post-commit"
HOOK_DST="$ROOT_DIR/.git/hooks/post-commit"

if [ ! -d "$ROOT_DIR/.git" ]; then
  echo "This directory is not a git repository. Run this from the project root." >&2
  exit 1
fi

cp "$HOOK_SRC" "$HOOK_DST"
chmod +x "$HOOK_DST"
echo "Installed post-commit hook to .git/hooks/post-commit"
