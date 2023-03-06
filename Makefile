CONSOLE = ./bin/console
DOCKER = docker-compose


### docker ###
docker-up:
	${DOCKER} up -d

docker-down:
	${DOCKER} down

docker-stop:
	${DOCKER} stop


### database ###
migration-create:
	${CONSOLE} make:migration

migrate:
	${CONSOLE} doctrine:migrations:migrate

database-drop:
	${CONSOLE} doctrine:database:drop --force
	${CONSOLE} doctrine:database:create

admin:
	${CONSOLE} sonata:user:create admin --super-admin admin admin


### server ###
server-start:
	symfony local:server:start -d --port=8443

server-stop:
	symfony local:server:stop


### other ###
cache:
	${CONSOLE} cache:clear --env=dev


### telegram ###
webhook-set:
	${CONSOLE} telegram:bot:webhook:set

webhook-info:
	${CONSOLE} telegram:bot:webhook:info

webhook-delete:
	${CONSOLE} telegram:bot:webhook:delete


### project ####
project-stop: docker-stop server-stop

project-start: docker-up server-start


