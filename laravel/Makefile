deploy: public/build/manifest.json
	rsync -avz public/build stroll:sites/Stroll/laravel/public
	ssh stroll 'cd sites/Stroll/laravel && git pull origin main && make install'

install: vendor/autoload.php .env public/storage
	rm -rf public/build
	php artisan cache:clear
	php artisan migrate

.env:
	cp .env.example
	php artisan key:generate

public/storage:
	php artisan storage:link

vendor/autoload.php: composer.lock
	composer install
	touch vendor/autoload.php

public/build/manifest.json: package.json
	npm i
	npm run build
	npm run dev