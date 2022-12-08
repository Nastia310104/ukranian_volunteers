docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --rmi all --volumes

migration-create:
	php bin/console make:migration

migrate:
	php bin/console doctrine:migrations:migrate

cache-clear:
	./bin/console cache:clear --env=dev