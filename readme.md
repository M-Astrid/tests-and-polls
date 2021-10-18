composer install  
php bin/console doctrine:schema:update --force  
php bin/console fos:user:create admin admin@mail.com password --super-admin
