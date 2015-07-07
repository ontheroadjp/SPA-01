#!/bin/bash
set -e
#content_dir="/Users/hideaki/Vagrant/LAMP/www/SPA-01"
content_dir="$HOME/Vagrant/LAMP/www/SPA-01"

set -x
cd "$content_dir"
git add -A
git commit -m "backup at $(date "+%Y-%m-%d %T")" || true
git push -f origin bk
