.PHONY: up install migrate sqlite env key storage npm build setup

up:
	docker-compose up -d --build

install:
	docker exec -it laravel-app composer install

migrate:
	docker exec -it laravel-app php artisan migrate

sqlite:
	docker exec -it laravel-app bash -c "touch database/database.sqlite && chmod 666 database/database.sqlite"

env:
	docker exec -it laravel-app bash -c "if [ ! -f .env ]; then cp .env.example .env; fi"

key:
	docker exec -it laravel-app php artisan key:generate

storage:
	docker exec -it laravel-app php artisan storage:link

npm:
	docker exec -it laravel-app npm install

build:
	docker exec -it laravel-app npm run build

setup: up install env key sqlite migrate storage npm build
	@echo "Tudo pronto!"