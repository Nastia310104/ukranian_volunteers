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

database-drop:
	${CONSOLE} doctrine:database:drop --force
	${CONSOLE} doctrine:database:create

admin:
	${CONSOLE} sonata:user:create adminuser --super-admin admin admin

# server
server-start:
	symfony local:server:start -d

server-stop:
	symfony local:server:stop

# other
cache:
	${CONSOLE} cache:clear --env=dev

#telegram
webhook-set:
	php bin/console telegram:bot:webhook:set

webhook-info:
	php bin/console telegram:bot:webhook:info

webhook-delete:
	php bin/console telegram:bot:webhook:delete


