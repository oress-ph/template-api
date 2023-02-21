php artisan storage:link &&
php artisan migrate &&
php artisan optimize &&
touch /var/www/html/ready &&
(crontab -l ; echo "* * * * * cd /var/www/html && php artisan schedule:run > /dev/stdout 2>&1") | crontab - &&
crond -l 0 -f &
php-fpm
