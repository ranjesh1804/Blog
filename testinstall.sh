
composer update
composer dump-autoload

php artisan migrate:fresh --drop-views

php artisan db:seed

npm install
npm run build

