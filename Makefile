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

server-start:
	symfony local:server:start -d

server-stop:
	bin/console local:server:stop

start-project: docker-up migrate server-start
