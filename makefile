run-dev:
	docker-compose up -d
	docker-compose exec app composer install

composer:
	docker-compose exec app composer $(filter-out $@,$(MAKECMDGOALS))

webpack-install:
	docker-compose exec app npm install --prefix ./public/front

webpack-dev:
	docker-compose exec app npm run start --prefix ./public/front

webpack-build:
	docker-compose exec app npm run build --prefix ./public/front
