docker-compose up -d --build
docker exec -it laravel-app composer install
docker exec -it laravel-app php artisan migrate
docker exec -it laravel-app cp /var/www/.env.example /var/www/.env
docker exec -it laravel-app php artisan key:generate
docker exec -it laravel-app npm install
docker exec -it laravel-app npm run build
Write-Host "✅ Tudo pronto!"