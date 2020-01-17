all: up

up: 
	PUID=$$(id -u) PGID=$$(id -g) docker-compose up --build -d 
down: 
	PUID=$$(id -u) PGID=$$(id -g) docker-compose down
php:
	docker exec -it php-amqp bash
rabbitmq:
	docker exec -it rabbitmq bash
