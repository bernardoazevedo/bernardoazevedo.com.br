#!/bin/bash

set -u

echo "Deployment started ..."


wget -qO- https://cdn.rawgit.com/creationix/nvm/master/install.sh | bash
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"
nvm install 16

alias composer="php /usr/local/bin/composer2.phar"

source ~/.bashrc
cp .env.example .env
composer install
npm install
npm run build
php artisan key:generate --ansi
php artisan storage:link
ln -s public public_html
php artisan migrate


echo "Deployment finished!"