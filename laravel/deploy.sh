#!/bin/bash

# Assuming you're in the root directory of your project

# Step 1: Git pull
git pull

# Step 2: Install npm packages
npm install

# Step 3: Install composer packages (if needed)
composer install

# Step 4: Create .env file if not exists
if [ ! -f ".env" ]; then
    cp .env.example .env
fi

# Step 5: Create database.sqlite if not exists
touch database/database.sqlite

# Step 6: Run migrations
php artisan migrate

# Step 7: Generate application key
php artisan key:generate

# Step 8: Install api dependencies
php artisan install:api
