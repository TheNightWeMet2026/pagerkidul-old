#!/usr/bin/env bash
# Build script for Cloudflare Pages.
# Copies ONLY the public static site into dist/.
# Deliberately excluded:
#   - admin.html  (frontend-only demo with dummy data — not for public hosting)
#   - backend/    (Laravel app — Cloudflare Pages is static-only, needs PHP hosting)
#   - *.md, TODO, this script, .gitignore (repo housekeeping)
set -euo pipefail

cd "$(dirname "$0")"

rm -rf dist
mkdir -p dist

# Public pages
cp index.html profil.html perangkat.html potensi.html statistik.html umkm.html layanan.html berita.html 404.html dist/

# Static assets (css, js, images)
cp -r assets dist/assets

# Admin-demo-only assets are not used by any public page — keep them out too
rm -f dist/assets/css/admin.css \
      dist/assets/js/admin.js \
      dist/assets/js/admin-auth.js \
      dist/assets/js/admin-login-ui.js

echo "Deploy build ready in dist/:"
find dist -type f | sort
