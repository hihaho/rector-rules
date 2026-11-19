"""Prepend a release's notes to CHANGELOG.md.

Usage: RELEASE_BODY=... python3 prepend-changelog.py <version> <YYYY-MM-DD> [CHANGELOG.md]

Strips HTML comments (the `verified-sha` pin), demotes the body's headings one level
so they nest under the `## <version> - <date>` entry, and inserts the entry above the
newest one. Exits without a change when the version already has an entry.
"""

import os
import re
import sys

version, date = sys.argv[1], sys.argv[2]
path = sys.argv[3] if len(sys.argv) > 3 else "CHANGELOG.md"

body = re.sub(r"<!--.*?-->\n?", "", os.environ["RELEASE_BODY"], flags=re.S).strip()

lines, in_fence = [], False
for line in body.splitlines():
    if line.lstrip().startswith("```"):
        in_fence = not in_fence
    elif not in_fence and line.startswith("#"):
        line = "#" + line
    lines.append(line)

entry = f"## {version} - {date}\n\n" + "\n".join(lines) + "\n\n"

with open(path, encoding="utf-8") as handle:
    changelog = handle.read()

if re.search(rf"^## {re.escape(version)} ", changelog, flags=re.M):
    sys.exit(0)

first = re.search(r"^## ", changelog, flags=re.M)
at = first.start() if first else len(changelog)

with open(path, "w", encoding="utf-8") as handle:
    handle.write(changelog[:at] + entry + changelog[at:])
