скопировать .env.example на .env

docker compose up --build

docker-compose exec app php artisan key:generate

перезапустить контейнер app

docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed

приложение запущено на localhost:8000
