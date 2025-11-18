#!/usr/bin/env python3
import json
from pathlib import Path
import sys

ROOT = Path(__file__).resolve().parent.parent
TODO_FILE = ROOT / 'todo.json'
IS_FILE = ROOT / 'Is_listesi.md'
README = ROOT / 'README.md'

def load_todos():
    with TODO_FILE.open('r', encoding='utf-8') as f:
        return json.load(f)

def render_md(todos):
    lines = [
        '# İş Listesi (Otomatik)
',
        'Bu dosya `todo.json` kaynağından otomatik olarak üretilmektedir. `scripts/update_todos.py` veya git hook tarafından güncellenir.',
        ''
    ]
    for t in todos:
        mark = 'x' if t.get('status') == 'completed' else ' '
        lines.append(f"- [{mark}] **{t.get('id')}. {t.get('title')}** - {t.get('description')}")
    return '\n'.join(lines) + '\n'

def update_isfile(content):
    IS_FILE.write_text(content, encoding='utf-8')

def update_readme(content):
    marker_start = '<!-- TODOS-START -->'
    marker_end = '<!-- TODOS-END -->'
    rd = README.read_text(encoding='utf-8')
    block = '\n\n**Project Status (otomatik)**\n\n' + content + '\n'
    if marker_start in rd and marker_end in rd:
        pre, rest = rd.split(marker_start, 1)
        _, post = rest.split(marker_end, 1)
        newrd = pre + marker_start + '\n' + block + '\n' + marker_end + post
    else:
        newrd = rd + '\n\n' + marker_start + '\n' + block + '\n' + marker_end + '\n'
    README.write_text(newrd, encoding='utf-8')

def main():
    if not TODO_FILE.exists():
        print('todo.json not found', file=sys.stderr)
        sys.exit(2)
    todos = load_todos()
    md = render_md(todos)
    update_isfile(md)
    update_readme(md)
    print('Updated Is_listesi.md and README.md')

if __name__ == '__main__':
    main()
