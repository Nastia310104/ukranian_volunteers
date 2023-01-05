CONSOLE = ./bin/console
DOCKER = docker-compose

# docker
docker-up:
	${DOCKER} up -d

docker-down:
	${DOCKER} down

docker-stop:
	${DOCKER} stop

# database
migration-create:
	${CONSOLE} make:migration

migrate:
	${CONSOLE} doctrine:migrations:migrate

# server
server-start:
	symfony local:server:start -d

server-stop:
	symfony local:server:stop

# other
cache:
	${CONSOLE} cache:clear --env=dev
