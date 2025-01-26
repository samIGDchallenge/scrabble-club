# Setup

## Clone repository

Clone repository to your local machine with:
```
git clone git@github.com:samIGDchallenge/scrabble-club.git
cd scrabble-club
```

## Install dependencies

Install the project's dependencies using the following:
```
composer install
```
Then install Node dependencies with
```
npm install
```
then,
```
npm run build
```

## Set up environment

Copy .env.example file to .env and update the DB_ settings to match your local database settings.
Use the following command to generate the app key:
```
php artisan key:generate
```

## Perform migrations and seed the database

Use the following to migrate the database
```
php artisan migrate
```
Then do this to seed the database with dummy data
```
php artisan db:seed
```

## Start application

Use the following to start the development server, so you can run the app on your machine
```
php artisan serve
```

## Run tests

Use the following to run tests
```
php artisan test
```
