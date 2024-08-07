#!/bin/bash

docker-compose -f docker-compose.prod.yml up --detach --remove-orphans

sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/composer.json
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/config
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/config/
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/public
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/html/
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chown -R www-data:www-data /var/www/var/
sudo docker-compose -f docker-compose.prod.yml exec mapasculturais chmod -R +w /var/www/html/assets
#sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais sed -i '/\"MapasCulturais\\\\Themes\\\\\"/d' composer.json
#sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais sed -i '/\"MapasCulturais\\\\Modules\\\\\"/d' composer.json
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais composer.phar require php-curl-class/php-curl-class
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www/src mapasculturais pnpm --recursive install 
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www/src mapasculturais pnpm run build
sudo docker-compose -f docker-compose.prod.yml exec --workdir /var/www mapasculturais ./scripts/deploy.sh
