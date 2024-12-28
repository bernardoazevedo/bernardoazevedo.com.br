#!/bin/bash

# set -u

echo "Começando deploy..."


wget -qO- https://cdn.rawgit.com/creationix/nvm/master/install.sh | bash
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"
nvm install 16

source ~/.bashrc

echo "Baixando Composer..."
wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet
php composer.phar install

npm install
npm run build

# echo "Configurações Laravel..."
# php artisan key:generate --ansi
# php artisan storage:link
# ln -s public public_html
# php artisan migrate


echo "Deploy finalizado!"