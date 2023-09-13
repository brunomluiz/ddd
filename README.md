# ddd

- docker-compose up -d
- docker-compose exec php-fpm composer install
- docker-compose exec php-fpm vendor/bin/phpunit
# coverage
- docker-compose exec php-fpm vendor/bin/phpunit --whitelist tests/ --coverage-html cover/
