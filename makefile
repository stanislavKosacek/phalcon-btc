run-dev:
	docker-compose up -d
	docker-compose exec app composer install

composer:
	docker-compose exec app composer $(filter-out $@,$(MAKECMDGOALS))
